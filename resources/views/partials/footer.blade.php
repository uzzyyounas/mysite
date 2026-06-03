{{--<footer class="footer">--}}
{{--    <div class="container">--}}
{{--        <div class="footer__inner">--}}
{{--            <a href="#home" class="footer__logo">--}}
{{--                <span class="logo-bracket">&lt;</span>Usman<span class="logo-dot">.</span>dev<span class="logo-bracket">/&gt;</span>--}}
{{--            </a>--}}
{{--            <p class="footer__copy">--}}
{{--                &copy; {{ date('Y') }} Muhammad Usman Younas. Crafted with ♥ using Laravel {{ app()->version() }} & PHP {{ PHP_MAJOR_VERSION }}.{{ PHP_MINOR_VERSION }}--}}
{{--            </p>--}}
{{--            <div class="footer__links">--}}
{{--                <a href="mailto:uzzy.younas@gmail.com" title="Email"><i data-feather="mail"></i></a>--}}
{{--                <a href="{{ $data['linkedin'] }}" target="_blank" rel="noopener" title="LinkedIn"><i data-feather="linkedin"></i></a>--}}
{{--                <a href="https://wa.me/{{ $data['whatsapp'] }}" target="_blank" rel="noopener" title="WhatsApp"><i data-feather="message-circle"></i></a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</footer>--}}


<footer class="footer">
    <div class="container">

        <div class="footer__top">

            <div class="footer__brand">
                <a href="{{ route('home') }}" class="navbar__logo">
                    {{--            <span class="logo-bracket">&lt;</span>Usman<span class="logo-dot">.</span>dev<span class="logo-bracket">/&gt;</span>--}}
                    <span>Uzy</span><span class="logo-dot"> Solution</span>
                </a>

                <p>
                    Building ERP Systems, Laravel Applications,
                    Oracle APEX Solutions and Enterprise Software
                    for businesses worldwide.
                </p>
            </div>

            <div class="footer__column">
                <h4>Quick Links</h4>
                <a href="#about">About</a>
                <a href="#skills">Services</a>
                <a href="#projects">Portfolio</a>
                <a href="#contact">Contact</a>
            </div>

            <div class="footer__column">
                <h4>Services</h4>
                <a href="#">Oracle APEX</a>
                <a href="#">Laravel Development</a>
                <a href="#">ERP Solutions</a>
                <a href="#">Consultancy</a>
            </div>

            <div class="footer__column">
                <h4>Contact</h4>
                <a href="mailto:uzzy.younas@gmail.com">
                    uzzy.younas@gmail.com
                </a>
                <a href="https://wa.me/{{ $data['whatsapp'] }}">
                    WhatsApp
                </a>
            </div>

        </div>

        <div class="footer__bottom">
            <p>
                © {{ date('Y') }}
                Muhammad Usman Younas.
                All Rights Reserved.
            </p>

            <div class="footer__social">
                <a href="{{ $data['linkedin'] }}">
                    <i data-feather="linkedin"></i>
                </a>

                <a href="mailto:uzzy.younas@gmail.com">
                    <i data-feather="mail"></i>
                </a>

                <a href="https://wa.me/{{ $data['whatsapp'] }}">
                    <i data-feather="message-circle"></i>
                </a>
            </div>
        </div>

    </div>
</footer>
