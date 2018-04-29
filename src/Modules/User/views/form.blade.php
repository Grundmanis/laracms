@extends('laracms.dashboard::layouts.app')

@section('content')

    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar bar1"></span>
                    <span class="icon-bar bar2"></span>
                    <span class="icon-bar bar3"></span>
                </button>
                <a class="navbar-brand" href="#">Pages</a>
            </div>
            @include('laracms.dashboard::partials.topnav')
        </div>
    </nav>

    <div class="content">
        <div class="container-fluid">
            <h1 class="page-header">Profile</h1>
            <div class="row">
                <div class="col-sm-4 col-md-2">
                    <img width="210" src="https://materiell.com/wp-content/uploads/2015/03/doug_full1.png" alt="avatar">
                </div>
                <div class="col-sm-8 col-md-4">
                    <form method="POST">
                        {{ csrf_field() }}
                        <table class="table table-bordered">
                            <tr>
                                <td>E-mail</td>
                                <td>
                                    <input type="text" name="email" value="{{ formValue($user ?? null, 'email') }}"
                                           class="form-control">
                                </td>
                            </tr>
                            <tr>
                                <td>Name</td>
                                <td>
                                    <input type="text" name="name" value="{{ formValue($user ?? null, 'name') }}"
                                           class="form-control">
                                </td>
                            </tr>
                            <tr>
                                <td>Password</td>
                                <td>
                                    <input type="password" name="password" class="form-control">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" class="text-right">
                                    <button class="btn btn-success">Save</button>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
