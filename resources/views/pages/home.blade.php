@extends('layouts.app')

@section('title', 'Home - GUB IT Service')
@section('content')
<div class="hero min-h-[80vh]" style="background: linear-gradient(135deg, #1a2b4c 0%, #2d4a7a 100%);">
    <div class="hero-content text-center text-neutral-content">
        <div class="max-w-2xl">
            <h1 class="text-5xl font-bold animate-float" style="font-family: 'Space Grotesk', sans-serif;">
                GUB <span class="text-secondary">IT Service</span>
            </h1>
            <p class="py-6 text-lg">
                Green University of Bangladesh-এর আইটি সার্ভিস ম্যানেজমেন্ট সিস্টেম। 
                টিকেট সাপোর্ট, ইকুইপমেন্ট ট্র্যাকিং ও পেমেন্ট ম্যানেজমেন্ট।
            </p>
            <div class="flex justify-center gap-4">
                @auth
                    <a href="{{ route('dashboard') }}" class="btn btn-primary btn-lg">
                        <i class="fas fa-arrow-right"></i> ড্যাশবোর্ডে যান
                    </a>
                @else
                    <a href="{{ route('login') }}" class="btn btn-primary btn-lg">লগইন</a>
                    <a href="{{ route('register') }}" class="btn btn-secondary btn-lg">রেজিস্ট্রেশন</a>
                @endauth
            </div>
        </div>
    </div>
</div>
@endsection
