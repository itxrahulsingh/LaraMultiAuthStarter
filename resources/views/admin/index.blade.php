@extends('layouts.admin')


@section('content')
    <div class="container-fluid py-4">
        <div class="row">

            <div class="col-md-3">
                <a href="#}"><div class="dc-card">
                    <i class="fa fa-users dc-icon"></i>
                    <span class="dc-count">435</span>
                    <span class="dc-name">Users</span>
                </div></a>
            </div>

            <div class="col-md-3">
                <a href=""> <div class="dc-card">
                    <i class="fas fa-archive dc-icon"></i>
                    <span class="dc-count">35</span>
                    <span class="dc-name">Archives</span>
                    </div></a>
            </div>

            <div class="col-md-3">
                <div class="dc-card">
                    <i class="fa fa-ticket-alt dc-icon"></i>
                    <span class="dc-count">599</span>
                    <span class="dc-name">Instances</span>
                </div>
            </div>

            <div class="col-md-3">
                <div class="dc-card">
                    <i class="fa fa-database dc-icon"></i>
                    <span class="dc-count">6875</span>
                    <span class="dc-name">Data</span>
                </div>
            </div>

        </div>


    </div>
@endsection
