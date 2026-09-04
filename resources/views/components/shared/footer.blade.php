{{-- resources/views/components/footer.blade.php --}}

<footer class="footer-modern">
    <div class="footer-container">
        {{-- Left Section --}}
        <div class="footer-section footer-brand">
            <div class="footer-logo">
                <span class="logo-icon">G</span>
                <span class="logo-text">GUB<span>.</span>IT</span>
            </div>
            <p class="footer-tagline">
                Smart IT Service Management
            </p>
        </div>

        {{-- Center Section --}}
        <div class="footer-section footer-links">
            <a href="{{ route('home') }}" class="footer-link">Home</a>
            <a href="#" class="footer-link">About</a>
            <a href="#" class="footer-link">Contact</a>
            <a href="#" class="footer-link">Support</a>
        </div>

        {{-- Right Section --}}
        <div class="footer-section footer-social">
            <a href="#" class="social-link" aria-label="Facebook">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                </svg>
            </a>
            <a href="#" class="social-link" aria-label="Twitter">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/>
                </svg>
            </a>
            <a href="#" class="social-link" aria-label="LinkedIn">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                </svg>
            </a>
            <a href="#" class="social-link" aria-label="GitHub">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 0C5.37 0 0 5.37 0 12c0 5.31 3.435 9.795 8.205 11.385.6.105.825-.255.825-.57 0-.285-.015-1.23-.015-2.235-3.015.555-3.795-.735-4.035-1.41-.135-.345-.72-1.41-1.23-1.695-.42-.225-1.02-.78-.015-.795.945-.015 1.62.87 1.845 1.23 1.08 1.815 2.805 1.305 3.495.99.105-.78.42-1.305.765-1.605-2.67-.3-5.46-1.335-5.46-5.925 0-1.305.465-2.385 1.23-3.225-.12-.3-.54-1.53.12-3.15 0 0 1.005-.315 3.3 1.23.96-.27 1.98-.405 3-.405s2.04.135 3 .405c2.295-1.56 3.3-1.23 3.3-1.23.66 1.62.24 2.85.12 3.15.765.84 1.23 1.905 1.23 3.225 0 4.605-2.805 5.625-5.475 5.925.435.375.81 1.095.81 2.22 0 1.605-.015 2.895-.015 3.3 0 .315.225.69.825.57A12.02 12.02 0 0024 12c0-6.63-5.37-12-12-12z"/>
                </svg>
            </a>
        </div>
    </div>

    {{-- Bottom Bar --}}
    <div class="footer-bottom">
        <p>
            &copy; {{ date('Y') }} <strong>GUB IT Service</strong>. 
            Made with <span class="footer-heart">❤</span> by 
            <a href="#" class="footer-author">Meherun Nesa Enta</a>
        </p>
    </div>
</footer>

<style>
    /* ----- ফুটার স্টাইল ----- */
    .footer-modern {
        margin-top: 3rem;
        padding: 2.5rem 1.5rem 1.25rem;
        background: rgba(10, 10, 15, 0.75);
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
        border-top: 1px solid rgba(255, 255, 255, 0.05);
        border-radius: 32px 32px 0 0;
        box-shadow: 0 -10px 40px rgba(0, 0, 0, 0.3);
        transition: all 0.3s ease;
    }

    .footer-container {
        max-width: 1200px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: 1fr auto 1fr;
        align-items: center;
        gap: 2rem;
        padding-bottom: 1.5rem;
        border-bottom: 1px solid rgba(255, 255, 255, 0.05);
    }

    /* ----- ব্র্যান্ড সেকশন ----- */
    .footer-brand {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        gap: 0.25rem;
    }

    .footer-logo {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        text-decoration: none;
    }

    .footer-logo .logo-icon {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 32px;
        height: 32px;
        background: linear-gradient(135deg, #FF6B35, #FF8F65);
        border-radius: 10px;
        font-family: 'Space Grotesk', sans-serif;
        font-weight: 700;
        font-size: 1.125rem;
        color: #fff;
        box-shadow: 0 4px 12px rgba(255, 107, 53, 0.25);
    }

    .footer-logo .logo-text {
        font-family: 'Space Grotesk', sans-serif;
        font-size: 1.25rem;
        font-weight: 700;
        color: #fff;
        letter-spacing: -0.02em;
    }

    .footer-logo .logo-text span {
        background: linear-gradient(135deg, #FF6B35, #FF8F65);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
    }

    .footer-tagline {
        font-size: 0.8rem;
        color: rgba(255, 255, 255, 0.35);
        margin: 0;
        letter-spacing: 0.02em;
    }

    /* ----- সেন্টার লিংকস ----- */
    .footer-links {
        display: flex;
        gap: 1.5rem;
        justify-content: center;
        flex-wrap: wrap;
    }

    .footer-link {
        font-size: 0.875rem;
        font-weight: 500;
        color: rgba(255, 255, 255, 0.5);
        text-decoration: none;
        transition: all 0.3s ease;
        position: relative;
        padding: 0.25rem 0;
    }

    .footer-link::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 0;
        height: 2px;
        background: linear-gradient(90deg, #FF6B35, #FF8F65);
        transition: width 0.3s ease;
    }

    .footer-link:hover {
        color: #fff;
    }

    .footer-link:hover::after {
        width: 100%;
    }

    /* ----- সোশ্যাল আইকন ----- */
    .footer-social {
        display: flex;
        gap: 0.75rem;
        justify-content: flex-end;
    }

    .social-link {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 40px;
        height: 40px;
        border-radius: 12px;
        background: rgba(255, 255, 255, 0.04);
        border: 1px solid rgba(255, 255, 255, 0.06);
        color: rgba(255, 255, 255, 0.4);
        transition: all 0.3s ease;
        text-decoration: none;
    }

    .social-link:hover {
        background: rgba(255, 107, 53, 0.12);
        border-color: rgba(255, 107, 53, 0.3);
        color: #FF6B35;
        transform: translateY(-3px);
        box-shadow: 0 4px 16px rgba(255, 107, 53, 0.15);
    }

    /* ----- বটম বার ----- */
    .footer-bottom {
        max-width: 1200px;
        margin: 0 auto;
        padding-top: 1.25rem;
        text-align: center;
    }

    .footer-bottom p {
        font-size: 0.8rem;
        color: rgba(255, 255, 255, 0.25);
        margin: 0;
        letter-spacing: 0.01em;
    }

    .footer-bottom strong {
        color: rgba(255, 255, 255, 0.5);
        font-weight: 600;
    }

    .footer-heart {
        display: inline-block;
        color: #FF6B35;
        animation: heartBeat 1.5s ease-in-out infinite;
    }

    @keyframes heartBeat {
        0%, 100% { transform: scale(1); }
        14% { transform: scale(1.15); }
        28% { transform: scale(1); }
        42% { transform: scale(1.1); }
        70% { transform: scale(1); }
    }

    .footer-author {
        color: rgba(255, 255, 255, 0.4);
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .footer-author:hover {
        color: #FF6B35;
        text-decoration: underline;
    }

    /* ----- রেসপন্সিভ ----- */
    @media (max-width: 768px) {
        .footer-container {
            grid-template-columns: 1fr;
            text-align: center;
            gap: 1.5rem;
        }

        .footer-brand {
            align-items: center;
        }

        .footer-social {
            justify-content: center;
        }

        .footer-links {
            gap: 1rem;
        }

        .footer-modern {
            padding: 1.5rem 1rem 1rem;
            border-radius: 20px 20px 0 0;
        }
    }

    @media (max-width: 480px) {
        .footer-links {
            flex-direction: column;
            gap: 0.5rem;
        }

        .social-link {
            width: 36px;
            height: 36px;
        }

        .footer-logo .logo-text {
            font-size: 1rem;
        }
    }
</style>