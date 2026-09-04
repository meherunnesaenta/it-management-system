@extends('layouts.app')

@section('title', 'Create Ticket')
@section('content')
<div class="card bg-base-100 shadow-xl">
    <div class="card-body">
        <h2 class="card-title">নতুন টিকেট</h2>
        <form method="POST" action="{{ route('student.tickets.store') }}">
            @csrf
            <div class="form-control">
                <label class="label">Subject</label>
                <input name="subject" class="input input-bordered" />
            </div>
            <button class="btn btn-primary mt-4">Submit</button>
        </form>
    </div>
</div>
@endsection
