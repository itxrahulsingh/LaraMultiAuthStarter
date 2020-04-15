<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Http\Controllers\Controller;
use Session;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    public function index()
    {
        return view('admin.index');
    }

    public function settings()
    {
        $admin = Auth::guard('admin')->user();
        return view('admin.settings', compact('admin'));
    }

    public function login(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();

            //  Validating Requests
            $request->validate([
                'email' => 'required|email|max:255',
                'password' => 'required|string|max:255',
            ]);

            if (Auth::guard('admin')->attempt(['email' => $data['email'], 'password' => $data['password']])) {
                return redirect('admin/');
            } else {
                return redirect('admin/login')->withInput()->withErrors([
                    'email' => 'These credentials are not match with our records.',
                ]);
            }
        }
        return view('admin.login');
    }


    /**
     * Log the user out of the application.
     *
     * @param Request $request
     * @return Response
     */
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return $request->wantsJson()
            ? new Response('', 204)
            : redirect('/admin/login');
    }

    public function updatePwd(Request $request)
    {
        if ($request->isMethod('post')) {

            $data = $request->all();
            // Check the current Password Is correct or not
            if (Hash::check($data['current_pwd'], Auth::guard('admin')->user()->password)) {

                //  Check The New Password Or Confirm password Match Or not
                if ($data['new_pwd'] == $data['confirm_pwd']) {
                    // Updating the password
                    Admin::where('id', Auth::guard('admin')->user()->id)->update(['password' => bcrypt($data['new_pwd'])]);
                    Session::flash('success','password updated');
                    return redirect('admin/settings');

                } else {
                    return redirect('admin/settings')->withInput()->withErrors([
                        'new_pwd' => 'The password confirmation does not match.',
                    ]);
                }
            } else {

                return redirect('admin/settings')->withInput()->withErrors([
                    'current_pwd' => 'your current password is incorrect.',
                ]);
            }

        }

    }


}
