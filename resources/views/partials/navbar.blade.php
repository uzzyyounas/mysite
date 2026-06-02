<header class="navbar" id="navbar">
    <div class="container">
        <a href="{{ route('home') }}" class="navbar__logo">
            <span class="logo-bracket">&lt;</span>Usman<span class="logo-dot">.</span>dev<span class="logo-bracket">/&gt;</span>
        </a>

        <nav class="navbar__links" id="navLinks">
            <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">Home</a>
            <a href="{{ route('about') }}" class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}">About</a>
            <a href="{{ route('skills') }}" class="nav-link {{ request()->routeIs('skills') ? 'active' : '' }}">Skills</a>
            <a href="{{ route('experience') }}" class="nav-link {{ request()->routeIs('experience') ? 'active' : '' }}">Experience</a>
            <a href="{{ route('projects') }}" class="nav-link {{ request()->routeIs('projects') ? 'active' : '' }}">Projects</a>
            <a href="{{ route('contact.page') }}" class="nav-link {{ request()->routeIs('contact.page') ? 'active' : '' }}">Contact</a>

            <div class="nav-divider"></div>

            <a href="https://maubs.store/DIERP/" target="_blank" class="btn btn--ghost btn--sm">
                Digital Invoice
            </a>

            <a href="{{ route('cv.download') }}" class="btn btn--outline btn--sm">
                <i data-feather="download"></i> Download CV
            </a>
        </nav>

        <div style="display: flex; align-items: center;">
            @include('components.theme-toggle')

            <button class="navbar__toggle" id="menuToggle" aria-label="Toggle menu">
                <span></span><span></span><span></span>
            </button>
        </div>
    </div>
</header>
