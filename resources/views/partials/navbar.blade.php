<header class="navbar" id="navbar">
    <div class="container">
        <a href="#home" class="navbar__logo">
            <span class="logo-bracket">&lt;</span>Usman<span class="logo-dot">.</span>dev<span class="logo-bracket">/&gt;</span>
        </a>

        <nav class="navbar__links" id="navLinks">
            <a href="#about" class="nav-link">About</a>
            <a href="#skills" class="nav-link">Skills</a>
            <a href="#experience" class="nav-link">Experience</a>
            <a href="#projects" class="nav-link">Projects</a>
            <a href="#contact" class="nav-link">Contact</a>
            <a href="{{ route('cv.download') }}" class="btn btn--outline btn--sm">
                <i data-feather="download"></i> Download CV
            </a>
            <a href="{{ route('cv.download') }}" class="btn btn--outline btn--sm">
                <i data-feather="download"></i> Digital Invoice
            </a>
        </nav>

        <button class="navbar__toggle" id="menuToggle" aria-label="Toggle menu">
            <span></span><span></span><span></span>
        </button>
    </div>
</header>
