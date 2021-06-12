@extends('layouts.app')

@section('konten')
<div class="layout-px-spacing">
    <div class="row layout-top-spacing">

        <div class="col-xl-4 col-lg-6 col-md-6 mb-4">
            <div class="card b-l-card-1 h-100" style="-webkit-box-shadow: 0 6px 10px 0 rgba(0,0,0,.14), 0 1px 18px 0 rgba(0,0,0,.12), 0 3px 5px -1px rgba(0,0,0,.2); -moz-box-shadow: 0 6px 10px 0 rgba(0,0,0,.14), 0 1px 18px 0 rgba(0,0,0,.12), 0 3px 5px -1px rgba(0,0,0,.2); box-shadow: 0 6px 10px 0 rgba(0,0,0,.14), 0 1px 18px 0 rgba(0,0,0,.12), 0 3px 5px -1px rgba(0,0,0,.2); ">
                <img class="card-img-top" src="assets/img/400x300 logo.jpg" alt="Card image cap">
                <div class="card-body">
                    {{-- <strong class="card-category">Trends</strong> --}}
                    <h5 class="card-title mt-2" align="center" style="font-weight: bold;">Profile</h5>
                    <p class="card-text meta-info meta-time mb-2" align="center" style="margin-top: -10px;"><small class="">Description</small></p>
                    <p class="card-text mb-4" align="center">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                    {{-- <button class="btn btn-outline-warning mt-2">Read More</button> --}}
                </div>
            </div>
        </div>

        <div class="col-xl-8 col-lg-6 col-md-6 col-sm-12 col-12" style="margin-bottom:24px;">
            <div class="statbox widget box box-shadow">
                <div class="widget-content widget-content-area" style="height: 571px;">
                    <div class="widget-header">
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                <div style="font-size:17px; color: #3b3f5c; font-weight: 600; margin-bottom: 15px; margin-left: -8px;">
                                General Information
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- menampilkan error validasi --}}
                    @if ($error = Session::get('error'))
                    <div class="alert alert-icon-left alert-light-danger mb-4 alert-dismissible fade show" role="alert"
                        style="margin-top:25px;">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-alert-triangle">
                            <path
                                d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z">
                            </path>
                            <line x1="12" y1="9" x2="12" y2="13"></line>
                            <line x1="12" y1="17" x2="12" y2="17"></line>
                        </svg>
                        <strong>Error!</strong> {{ $error }}
                    </div>
                    @endif

                    <form action="/profileuser/store" method="POST">
                        @csrf
                        @foreach ($akun as $item)
                        <input type="hidden" id="id" name="id" value="{{ $item->id }}">
                        <div class="form-row mb-4">
                            <div class="form-group col-md-6">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" name="username"
                                    value="{{ $item->name }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="email">Email/NIDN/NIDK</label>
                                <input type="text" class="form-control" id="email" name="email"
                                    value="{{ $item->email }}" readonly>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label for="password">New Password</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                        <div class="form-group mb-4">
                            <label for="pass">Re Password</label>
                            <input type="password" class="form-control" id="pass" name="pass">
                        </div>
                        @endforeach
                        <button type="submit" class="btn btn-primary mt-3">Save</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
