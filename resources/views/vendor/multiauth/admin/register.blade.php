@extends('vendor.multiauth.layouts.mainapp')
@section('nav_head')
    register
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-gradient-green text-white">Register New Admin</div>
                    <div class="card-body">
                        @include('multiauth::message')
                        <form method="POST" action="{{ route('admin.register') }}">
                            @csrf
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                           class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}"
                                           name="name" value="{{ old('name') }}"
                                           required autofocus>
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                           class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                           name="email" value="{{ old('email') }}"
                                           required>
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' text-danger' : '' }} row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                           class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                           name="password"
                                           required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm
                                    Password</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                           name="password_confirmation" required>
                                </div>
                            </div>

                            <div class="form-group row d-none">
                                <label for="role_id" class="col-md-4 col-form-label text-md-right">Assign Role</label>

                                <div class="col-md-6">
                                    <select name="role_id[]" id="role_id"
                                            class="form-control {{ $errors->has('role_id') ? ' is-invalid' : '' }}"
                                            multiple>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->id }}" selected>{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary btn-sm">
                                        Register
                                    </button>

                                    <a href="{{ route('admin.show') }}" class="btn btn-danger btn-sm float-right">
                                        Back
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection