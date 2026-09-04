@extends('layouts.app')

@section('title', 'Ticket Details')
@section('content')
<div class="card bg-base-100 shadow-xl">
    <div class="card-body">
        <h2 class="card-title">টিকেট বিস্তারিত</h2>
        <p>Subject: {{ $ticket->subject ?? '' }}</p>
    </div>
</div>
@endsection
