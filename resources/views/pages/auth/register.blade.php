@extends('layouts.app')

@section('title', 'Register')
@section('content')
<div class="max-w-md mx-auto py-12">
    <div class="card bg-base-100 shadow">
        <div class="card-body">
            <h2 class="card-title">Register (placeholder)</h2>
            <form method="POST" action="{{ route('register.post') }}">
                @csrf
                <div class="form-control">
                    <label class="label">Name</label>
                    <input name="name" class="input input-bordered" />
                </div>
                <div class="form-control">
                    <label class="label">Email</label>
                    <input name="email" type="email" class="input input-bordered" />
                </div>
                <div class="form-control">
                    <label class="label">Password</label>
                    <input name="password" type="password" class="input input-bordered" />
                </div>
                <div class="form-control">
                    <label class="label">Confirm Password</label>
                    <input name="password_confirmation" type="password" class="input input-bordered" />
                </div>
                <button class="btn btn-primary mt-4">Register</button>
            </form>
        </div>
    </div>
</div>
@endsection
