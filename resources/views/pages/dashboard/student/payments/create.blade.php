@extends('layouts.app')

@section('title', 'Make Payment')
@section('content')
<div class="max-w-2xl mx-auto space-y-6">
    <div>
        <h1 class="text-2xl font-bold text-white font-space">Make Payment</h1>
        <p class="mt-1 text-sm text-white/45">Send the payment first, then submit the transaction ID for verification.</p>
    </div>

    <div class="grid gap-4 sm:grid-cols-2">
        <div class="rounded-2xl border border-pink-500/20 bg-pink-500/10 p-5">
            <p class="text-xs uppercase tracking-wider text-pink-200/60">bKash Personal/Merchant</p>
            <p class="mt-2 text-xl font-semibold text-white">{{ config('services.payments.bkash_merchant') ?: 'Not configured' }}</p>
        </div>
        <div class="rounded-2xl border border-orange-500/20 bg-orange-500/10 p-5">
            <p class="text-xs uppercase tracking-wider text-orange-200/60">Nagad Personal/Merchant</p>
            <p class="mt-2 text-xl font-semibold text-white">{{ config('services.payments.nagad_merchant') ?: 'Not configured' }}</p>
        </div>
    </div>

    <form method="POST" action="{{ route('student.payments.store') }}" class="space-y-6 rounded-2xl border border-white/10 bg-white/5 p-6 shadow-2xl sm:p-8">
        @csrf
        <div>
            <label for="method" class="mb-2 block text-sm font-medium text-white/75">Payment method</label>
            <select id="method" name="method" required class="w-full rounded-xl border border-white/10 bg-white/5 px-4 py-3 text-white focus:border-orange-400 focus:outline-none">
                <option value="bkash" class="text-black" @selected(old('method') === 'bkash')>bKash</option>
                <option value="nagad" class="text-black" @selected(old('method') === 'nagad')>Nagad</option>
            </select>
            @error('method')<p class="mt-1 text-sm text-red-400">{{ $message }}</p>@enderror
        </div>

        <div>
            <label for="amount" class="mb-2 block text-sm font-medium text-white/75">Amount (BDT)</label>
            <input id="amount" name="amount" type="number" min="1" max="99999999.99" step="0.01" value="{{ old('amount') }}" required class="w-full rounded-xl border border-white/10 bg-white/5 px-4 py-3 text-white placeholder-white/25 focus:border-orange-400 focus:outline-none" placeholder="Enter amount">
            @error('amount')<p class="mt-1 text-sm text-red-400">{{ $message }}</p>@enderror
        </div>

        <div>
            <label for="transaction_id" class="mb-2 block text-sm font-medium text-white/75">Transaction ID</label>
            <input id="transaction_id" name="transaction_id" type="text" value="{{ old('transaction_id') }}" required maxlength="100" class="w-full rounded-xl border border-white/10 bg-white/5 px-4 py-3 text-white placeholder-white/25 focus:border-orange-400 focus:outline-none" placeholder="Enter the TxID after payment">
            @error('transaction_id')<p class="mt-1 text-sm text-red-400">{{ $message }}</p>@enderror
        </div>

        <div>
            <label for="purpose" class="mb-2 block text-sm font-medium text-white/75">Payment purpose</label>
            <input id="purpose" name="purpose" type="text" value="{{ old('purpose') }}" required maxlength="255" class="w-full rounded-xl border border-white/10 bg-white/5 px-4 py-3 text-white placeholder-white/25 focus:border-orange-400 focus:outline-none" placeholder="For example: Lab fee">
            @error('purpose')<p class="mt-1 text-sm text-red-400">{{ $message }}</p>@enderror
        </div>

        <div class="flex items-start gap-3 rounded-xl border border-yellow-500/20 bg-yellow-500/10 p-4 text-sm text-yellow-100/75">
            <span>!</span><p>Your payment will remain pending until an administrator verifies the TxID.</p>
        </div>

        <button type="submit" class="w-full rounded-xl bg-gradient-to-r from-orange-500 to-orange-400 px-5 py-3 font-semibold text-white shadow-lg shadow-orange-500/20 transition hover:-translate-y-0.5 hover:shadow-orange-500/35">Submit Payment</button>
    </form>
</div>
@endsection
