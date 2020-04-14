<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    public function index()
    {
        return view('admin.index');
    }

    public function login(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
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

}
