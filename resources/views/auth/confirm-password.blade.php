{{-- resources/views/auth/confirm-password.blade.php --}}

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'GUB IT Service') }} - Confirm Password</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
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

        /* Animated Background */
        .bg-gradient-glow {
            position: fixed;
            inset: 0;
            z-index: 0;
            background: 
                radial-gradient(ellipse at 20% 50%, rgba(255, 107, 53, 0.12) 0%, transparent 60%),
                radial-gradient(ellipse at 80% 20%, rgba(255, 107, 53, 0.08) 0%, transparent 50%),
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

        /* Main Card */
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

        /* Logo */
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

        /* Form Elements */
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

        /* Button */
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

        /* Help Text */
        .help-text {
            text-align: center;
            margin-top: 1.5rem;
            font-size: 0.875rem;
            color: rgba(255, 255, 255, 0.4);
        }

        .help-text a {
            color: #FF6B35;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .help-text a:hover {
            color: #FF8F65;
            text-decoration: underline;
        }

        /* Responsive */
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

    {{-- Animated Background --}}
    <div class="bg-gradient-glow">
        <div class="glow-orb"></div>
        <div class="glow-orb"></div>
    </div>

    {{-- Main Card --}}
    <div class="auth-card">
        {{-- Logo --}}
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

        {{-- Heading --}}
        <h2 class="text-2xl font-bold text-white text-center mb-2" style="font-family: 'Space Grotesk', sans-serif;">
            Confirm Password
        </h2>
        <p class="text-center text-white/50 text-sm mb-6">
            This is a secure area. Please confirm your password.
        </p>

        {{-- Form --}}
        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf

            <div>
                <label for="password" class="form-label">Password</label>
                <input
                    id="password"
                    type="password"
                    name="password"
                    class="form-input"
                    placeholder="Enter your password"
                    required
                    autocomplete="current-password"
                />
                @error('password')
                    <p class="form-error">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="btn-primary mt-6">
                Confirm Password
            </button>

            <p class="help-text">
                <a href="{{ route('login') }}">← Back to Login</a>
            </p>
        </form>
    </div>

    {{-- Optional: Add AOS or any animation library --}}
    <script>
        // Smooth entry animation
        document.addEventListener('DOMContentLoaded', () => {
            const card = document.querySelector('.auth-card');
            card.style.animation = 'fadeInUp 0.8s ease forwards';
        });
    </script>

</body>
</html>