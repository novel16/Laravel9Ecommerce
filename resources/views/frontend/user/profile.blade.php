@extends('layouts.app')

@section('title', 'User Profile')

@section('content')
    <div class="row container mx-auto py-4">
        <div class="col-md-10 mx-auto">

            @if (session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif

            <div class="card">
                <div class="card-header">
                    <h3>
                        User Details
                        <a href="{{ url('change-password') }}" class="btn  btn-warning float-end">Change Password</a>
                    </h3>

                </div>
                <div class="card-body">
                    <form action="{{ url('/profile') }}" method="POST">
                        @csrf

                        <div class="row">
                            <div class="form-group col-md-6  mb-3">
                                <label for="">Username</label>
                                <input type="text" name="username" value="{{ auth()->user()->name }}"
                                    class="form-control">
                            </div>
                            <div class="form-group col-md-6  mb-3">
                                <label for="">Email</label>
                                <input type="email" name="email" value="{{ auth()->user()->email }}"
                                    class="form-control" readonly>


                            </div>
                            <div class="form-group  col-md-6 mb-3">
                                <label for="">Phone #</label>
                                <input type="text" name="phone" value="{{ $userData->phone ?? '' }}"
                                    class="form-control">
                            </div>
                            <div class="form-group col-md-6  mb-3">
                                <label for="">Zip Code</label>
                                <input type="text" name="zip_code" value="{{ $userData->zip_code ?? '' }}"
                                    class="form-control">
                            </div>
                            <div class="form-group col-md-12  mb-3">
                                <label for="">Address</label>
                                <textarea name="address" rows="3" class="form-control">{{ $userData->address ?? '' }}</textarea>
                            </div>

                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary text-light btn-sm float-end">Save
                                    Data</button>
                            </div>
                        </div>
                    </form>
                </div>


            </div>

        </div>
    </div>

@endsection
