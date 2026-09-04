{{-- resources/views/auth/verify-email.blade.php --}}

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'GUB IT Service') }} - Verify Email</title>

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

        /* ----- কন্টেন্ট স্টাইল ----- */
        .verify-icon {
            display: flex;
            justify-content: center;
            margin-bottom: 1.5rem;
        }

        .verify-icon svg {
            width: 64px;
            height: 64px;
            color: #FF6B35;
            animation: float 4s ease-in-out infinite;
        }

        .verify-title {
            font-family: 'Space Grotesk', sans-serif;
            font-size: 1.5rem;
            font-weight: 700;
            color: #fff;
            text-align: center;
            margin-bottom: 0.5rem;
        }

        .verify-message {
            color: rgba(255, 255, 255, 0.6);
            text-align: center;
            font-size: 0.95rem;
            line-height: 1.6;
            margin-bottom: 1.5rem;
        }

        .verify-message strong {
            color: #fff;
        }

        /* ----- সাফল্য বার্তা ----- */
        .success-message {
            padding: 0.75rem 1rem;
            margin-bottom: 1.5rem;
            border-radius: 12px;
            font-size: 0.875rem;
            text-align: center;
            background: rgba(16, 185, 129, 0.1);
            border: 1px solid rgba(16, 185, 129, 0.2);
            color: #34d399;
            animation: fadeInUp 0.5s ease forwards;
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

        .btn-secondary {
            width: 100%;
            padding: 0.875rem;
            background: transparent;
            border: 1px solid rgba(255, 255, 255, 0.15);
            border-radius: 12px;
            color: rgba(255, 255, 255, 0.7);
            font-size: 1rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-secondary:hover {
            background: rgba(255, 255, 255, 0.05);
            border-color: rgba(255, 255, 255, 0.3);
            color: #fff;
        }

        /* ----- ফর্ম গ্রুপ ----- */
        .form-group {
            display: flex;
            flex-direction: column;
            gap: 0.75rem;
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

        {{-- আইকন --}}
        <div class="verify-icon">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
            </svg>
        </div>

        {{-- হেডিং --}}
        <h2 class="verify-title">Verify Your Email</h2>
        <p class="verify-message">
            Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you?
        </p>

        @if (session('status') == 'verification-link-sent')
            <div class="success-message">
                ✅ A new verification link has been sent to your email address.
            </div>
        @endif

        {{-- ফর্ম --}}
        <div class="form-group">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <button type="submit" class="btn-primary">
                    Resend Verification Email
                </button>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn-secondary">
                    Log Out
                </button>
            </form>
        </div>
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