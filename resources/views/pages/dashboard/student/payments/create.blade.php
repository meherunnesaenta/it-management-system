@extends('layouts.app')

@section('title', 'Make Payment')
@section('content')
<div class="card bg-base-100 shadow-xl">
    <div class="card-body">
        <h2 class="card-title">Payment (placeholder)</h2>
        <form method="POST" action="{{ route('student.payments.store') }}">
            @csrf
            <div class="form-control">
                <label class="label">Amount</label>
                <input name="amount" class="input input-bordered" />
            </div>
            <button class="btn btn-primary mt-4">Pay</button>
        </form>
    </div>
</div>
@endsection
