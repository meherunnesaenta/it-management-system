@extends('layouts.app')

@section('title', 'Create Equipment')
@section('content')
<div class="card bg-base-100 shadow-xl">
    <div class="card-body">
        <h2 class="card-title">নতুন ইকুইপমেন্ট</h2>
        <form method="POST" action="{{ route('admin.equipments.store') }}">
            @csrf
            <div class="form-control">
                <label class="label">Name</label>
                <input name="name" class="input input-bordered" />
            </div>
            <button class="btn btn-primary mt-4">Add</button>
        </form>
    </div>
</div>
@endsection
