@extends('layout.app')

@section('content')

    <div class="d-flex align-items-center justify-content-center vh-100 h-100 ">
        <div class="p-2 m-2 ">
            <div class="card shadow" style="width: 400px;">
                <div class="card-body">
                    <form action="{{ route('submit_login') }}" method="POST">
                        @csrf
                        <h5 class="card-title fw-bold fs-3">Sign In</h5>
                        <p class="card-title fw-bold">This is form sign in for Admin Student</p>
                        @if (session()->has('error'))
                        <div class="alert alert-danger" role="alert">
                            {{session('error')}}
                          </div>
                        @endif
                        <div class="mb-2 mt-3">
                            <label for="exampleFormControlInput1" class="form-label">Username</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1"
                                placeholder="name" name="username" required>
                        </div>
                        <div class="mb-4">
                            <label for="inputPassword5" class="form-label">Password</label>
                            <input type="password" id="inputPassword5" class="form-control" placeholder="********"
                                aria-describedby="passwordHelpBlock" name="password" required>
                            <div id="passwordHelpBlock" class="form-text">
                                Your password must be more than 8 characters long.
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary fw-bold">Sign In</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
    @endsection
