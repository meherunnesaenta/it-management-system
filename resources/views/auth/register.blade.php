{{-- resources/views/auth/register.blade.php --}}

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'GUB IT Service') }} - Register</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

    <style>
        /* ----- রিসেট ও বেসিক স্টাইল ----- */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: #0A0A0F;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1.5rem;
            position: relative;
            overflow-x: hidden;
        }

        /* ----- অ্যানিমেটেড ব্যাকগ্রাউন্ড (Rise at Seven ভাইব) ----- */
        .bg-gradient-glow {
            position: fixed;
            inset: 0;
            z-index: 0;
            background:
                radial-gradient(ellipse at 30% 40%, rgba(255, 107, 53, 0.15) 0%, transparent 60%),
                radial-gradient(ellipse at 70% 60%, rgba(255, 107, 53, 0.08) 0%, transparent 50%),
                radial-gradient(ellipse at 50% 80%, rgba(255, 107, 53, 0.05) 0%, transparent 40%),
                #0A0A0F;
        }

        .glow-orb {
            position: absolute;
            border-radius: 50%;
            filter: blur(80px);
            opacity: 0.3;
            animation: float 8s ease-in-out infinite;
        }

        .glow-orb:nth-child(1) {
            width: 300px;
            height: 300px;
            background: #FF6B35;
            top: -10%;
            left: -10%;
            animation-delay: 0s;
        }

        .glow-orb:nth-child(2) {
            width: 400px;
            height: 400px;
            background: #FF8F65;
            bottom: -20%;
            right: -10%;
            animation-delay: -3s;
        }

        @keyframes float {
            0%, 100% { transform: translate(0, 0) scale(1); }
            33% { transform: translate(30px, -30px) scale(1.1); }
            66% { transform: translate(-20px, 20px) scale(0.9); }
        }

        /* ----- গ্লাসমরফিজম কার্ড ----- */
        .auth-card {
            position: relative;
            z-index: 10;
            width: 100%;
            max-width: 440px;
            padding: 2.5rem 2rem;
            background: rgba(26, 26, 46, 0.6);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.06);
            border-radius: 32px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.8), inset 0 1px 0 rgba(255, 255, 255, 0.05);
            animation: fadeInUp 0.8s ease forwards;
        }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* ----- লোগো ----- */
        .logo {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.75rem;
            margin-bottom: 2rem;
            text-decoration: none;
        }

        .logo-icon {
            width: 48px;
            height: 48px;
            background: linear-gradient(135deg, #FF6B35, #FF8F65);
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            font-weight: 700;
            color: #fff;
            box-shadow: 0 8px 24px rgba(255, 107, 53, 0.3);
            transition: transform 0.3s ease;
        }

        .logo:hover .logo-icon {
            transform: rotate(-6deg) scale(1.05);
        }

        .logo-text {
            font-family: 'Space Grotesk', sans-serif;
            font-size: 1.5rem;
            font-weight: 700;
            color: #fff;
            letter-spacing: -0.02em;
        }

        .logo-text span {
            background: linear-gradient(135deg, #FF6B35, #FF8F65);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        /* ----- ফর্ম এলিমেন্ট ----- */
        .form-label {
            display: block;
            font-size: 0.875rem;
            font-weight: 500;
            color: rgba(255, 255, 255, 0.7);
            margin-bottom: 0.5rem;
            letter-spacing: 0.01em;
        }

        .form-input {
            width: 100%;
            padding: 0.875rem 1rem;
            background: rgba(255, 255, 255, 0.04);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 12px;
            color: #fff;
            font-size: 1rem;
            transition: all 0.3s ease;
            outline: none;
        }

        .form-input:focus {
            border-color: #FF6B35;
            background: rgba(255, 107, 53, 0.06);
            box-shadow: 0 0 0 4px rgba(255, 107, 53, 0.1);
        }

        .form-input::placeholder {
            color: rgba(255, 255, 255, 0.25);
        }

        .form-error {
            margin-top: 0.5rem;
            font-size: 0.825rem;
            color: #f87171;
        }

        /* ----- বাটন ----- */
        .btn-primary {
            width: 100%;
            padding: 0.875rem;
            background: linear-gradient(135deg, #FF6B35, #FF8F65);
            border: none;
            border-radius: 12px;
            color: #fff;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            box-shadow: 0 4px 16px rgba(255, 107, 53, 0.25);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 32px rgba(255, 107, 53, 0.4);
        }

        .btn-primary:active {
            transform: translateY(0);
        }

        .btn-primary::after {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(255,255,255,0.15), transparent);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .btn-primary:hover::after {
            opacity: 1;
        }

        /* ----- ফুটার লিংক ----- */
        .auth-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 1.5rem;
            font-size: 0.875rem;
        }

        .auth-footer a {
            color: rgba(255, 255, 255, 0.4);
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .auth-footer a:hover {
            color: #FF6B35;
            text-decoration: underline;
        }

        /* ----- সেশন স্ট্যাটাস (error/success) ----- */
        .session-status {
            padding: 0.75rem 1rem;
            margin-bottom: 1.5rem;
            border-radius: 12px;
            font-size: 0.875rem;
            text-align: center;
        }

        .session-status.error {
            background: rgba(239, 68, 68, 0.1);
            border: 1px solid rgba(239, 68, 68, 0.2);
            color: #f87171;
        }

        /* ----- রেসপন্সিভ ----- */
        @media (max-width: 480px) {
            .auth-card {
                padding: 2rem 1.25rem;
                border-radius: 24px;
            }
            .logo-text {
                font-size: 1.25rem;
            }
            .auth-footer {
                flex-direction: column;
                gap: 0.75rem;
                align-items: center;
            }
        }
    </style>
</head>
<body>

    {{-- অ্যানিমেটেড ব্যাকগ্রাউন্ড --}}
    <div class="bg-gradient-glow">
        <div class="glow-orb"></div>
        <div class="glow-orb"></div>
    </div>

    {{-- মেইন কার্ড --}}
    <div class="auth-card">
        {{-- লোগো --}}
        <a href="{{ route('home') }}" class="logo">
            <div class="logo-icon">
                <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M12 2L2 7l10 5 10-5-10-5z"/>
                    <path d="M2 17l10 5 10-5"/>
                    <path d="M2 12l10 5 10-5"/>
                </svg>
            </div>
            <div class="logo-text">GUB<span>.</span></div>
        </a>

        {{-- হেডিং --}}
        <h2 class="text-center text-2xl font-bold text-white mb-1" style="font-family: 'Space Grotesk', sans-serif;">
            Create Account
        </h2>
        <p class="text-center text-white/50 text-sm mb-6">
            Join GUB IT Service Management
        </p>

        {{-- সেশন স্ট্যাটাস (error) --}}
        @if ($errors->any())
            <div class="session-status error">
                {{ $errors->first() }}
            </div>
        @endif

        {{-- রেজিস্ট্রেশন ফর্ম --}}
        <form method="POST" action="{{ route('register') }}">
            @csrf

            {{-- নাম --}}
            <div>
                <label for="name" class="form-label">Full Name</label>
                <input
                    id="name"
                    type="text"
                    name="name"
                    class="form-input"
                    placeholder="Enter your full name"
                    value="{{ old('name') }}"
                    required
                    autofocus
                    autocomplete="name"
                />
                @error('name')
                    <p class="form-error">{{ $message }}</p>
                @enderror
            </div>

            {{-- ইমেইল --}}
            <div class="mt-4">
                <label for="email" class="form-label">Email Address</label>
                <input
                    id="email"
                    type="email"
                    name="email"
                    class="form-input"
                    placeholder="you@example.com"
                    value="{{ old('email') }}"
                    required
                    autocomplete="username"
                />
                @error('email')
                    <p class="form-error">{{ $message }}</p>
                @enderror
            </div>

            {{-- পাসওয়ার্ড --}}
            <div class="mt-4">
                <label for="password" class="form-label">Password</label>
                <input
                    id="password"
                    type="password"
                    name="password"
                    class="form-input"
                    placeholder="Create a password"
                    required
                    autocomplete="new-password"
                />
                @error('password')
                    <p class="form-error">{{ $message }}</p>
                @enderror
            </div>

            {{-- কনফর্ম পাসওয়ার্ড --}}
            <div class="mt-4">
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <input
                    id="password_confirmation"
                    type="password"
                    name="password_confirmation"
                    class="form-input"
                    placeholder="Confirm your password"
                    required
                    autocomplete="new-password"
                />
                @error('password_confirmation')
                    <p class="form-error">{{ $message }}</p>
                @enderror
            </div>

            {{-- বাটন ও ফুটার --}}
            <button type="submit" class="btn-primary mt-6">
                Create Account
            </button>

            <div class="auth-footer">
                <a href="{{ route('login') }}">
                    Already registered? Log in →
                </a>
            </div>
        </form>
    </div>

    {{-- এনিমেশন স্ক্রিপ্ট --}}
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const card = document.querySelector('.auth-card');
            if (card) {
                card.style.animation = 'fadeInUp 0.8s ease forwards';
            }
        });
    </script>

</body>
</html>