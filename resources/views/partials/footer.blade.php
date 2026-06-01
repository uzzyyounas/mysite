<footer class="footer">
    <div class="container">
        <div class="footer__inner">
            <a href="#home" class="footer__logo">
                <span class="logo-bracket">&lt;</span>Usman<span class="logo-dot">.</span>dev<span class="logo-bracket">/&gt;</span>
            </a>
            <p class="footer__copy">
                &copy; {{ date('Y') }} Muhammad Usman Younas. Crafted with ♥ using Laravel {{ app()->version() }} & PHP {{ PHP_MAJOR_VERSION }}.{{ PHP_MINOR_VERSION }}
            </p>
            <div class="footer__links">
                <a href="mailto:uzzy.younas@gmail.com" title="Email"><i data-feather="mail"></i></a>
                <a href="{{ $data['linkedin'] }}" target="_blank" rel="noopener" title="LinkedIn"><i data-feather="linkedin"></i></a>
                <a href="https://wa.me/{{ $data['whatsapp'] }}" target="_blank" rel="noopener" title="WhatsApp"><i data-feather="message-circle"></i></a>
            </div>
        </div>
    </div>
</footer>
