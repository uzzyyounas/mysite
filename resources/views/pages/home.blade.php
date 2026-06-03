@extends('layouts.app')

@section('title', 'Muhammad Usman Younas | Software Engineer & Oracle ERP Specialist')
@section('meta_description', 'Professional Software Engineer with 4+ years experience in Oracle ERP, Laravel Development, and Full Stack Web Development. Available for projects in Pakistan.')
@section('meta_keywords', 'Muhammad Usman Younas, Software Engineer, Oracle ERP, Oracle Database, Laravel Developer, PHP Developer, Full Stack Developer, Oracle APEX')
@section('canonical_url', route('home'))

@section('content')
    {{-- Hero Section (same as before, but with proper route links) --}}
{{--    <section class="hero" id="home">--}}
{{--        <div class="hero__bg-grid"></div>--}}
{{--        <div class="hero__glow hero__glow--1"></div>--}}
{{--        <div class="hero__glow hero__glow--2"></div>--}}
{{--        <div class="container">--}}
{{--            <div class="hero__inner">--}}
{{--                <div class="hero__text" data-animate="fade-up">--}}
{{--                    <div class="hero__badge">--}}
{{--                        <span class="badge-dot"></span> Available for Projects--}}
{{--                    </div>--}}
{{--                    <h1 class="hero__name">--}}
{{--                        Muhammad<br><span class="gradient-text">Usman Younas</span>--}}
{{--                    </h1>--}}
{{--                    <p class="hero__role">Software Engineer &mdash; <em>Oracle ERP & Full Stack Developer</em></p>--}}
{{--                    <p class="hero__summary">{{ Str::limit($data['summary'], 180) }}</p>--}}
{{--                    <div class="hero__actions">--}}
{{--                        <a href="{{ route('projects') }}" class="btn btn--primary">--}}
{{--                            <i data-feather="grid"></i> View Projects--}}
{{--                        </a>--}}
{{--                        <a href="{{ route('cv.download') }}" class="btn btn--ghost">--}}
{{--                            <i data-feather="download-cloud"></i> Download CV--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                    <div class="hero__meta">--}}
{{--                        <span><i data-feather="map-pin"></i> {{ $data['location'] }}</span>--}}
{{--                        <span><i data-feather="briefcase"></i> 4+ Years Experience</span>--}}
{{--                        <span><i data-feather="award"></i> Oracle Certified</span>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="hero__visual" data-animate="fade-left">--}}
{{--                    <div class="hero__card">--}}
{{--                        <div class="hero__avatar">--}}
{{--                            <div class="avatar-placeholder">UY</div>--}}
{{--                            <div class="avatar-ring avatar-ring--1"></div>--}}
{{--                            <div class="avatar-ring avatar-ring--2"></div>--}}
{{--                        </div>--}}
{{--                        <div class="hero__stats">--}}
{{--                            <div class="stat">--}}
{{--                                <span class="stat__num">4+</span>--}}
{{--                                <span class="stat__label">Years Exp.</span>--}}
{{--                            </div>--}}
{{--                            <div class="stat">--}}
{{--                                <span class="stat__num">{{ count($data['projects']) }}+</span>--}}
{{--                                <span class="stat__label">Projects</span>--}}
{{--                            </div>--}}
{{--                            <div class="stat">--}}
{{--                                <span class="stat__num">{{ count($data['certifications']) }}</span>--}}
{{--                                <span class="stat__label">Certifications</span>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="hero__tags">--}}
{{--                            @foreach(['Oracle APEX', 'Laravel', 'PHP 8.2', 'PL/SQL', 'ERP'] as $tag)--}}
{{--                                <span class="tag">{{ $tag }}</span>--}}
{{--                            @endforeach--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="hero__scroll-hint">--}}
{{--            <span>Scroll to explore</span>--}}
{{--            <i data-feather="chevrons-down"></i>--}}
{{--        </div>--}}
{{--    </section>--}}

    <section class="hero" aria-label="Hero">
        <div class="hero__bg-grid" aria-hidden="true"></div>
        <div class="hero__orb hero__orb--1" aria-hidden="true"></div>
        <div class="hero__orb hero__orb--2" aria-hidden="true"></div>

        <div class="container hero__inner">
            <div class="hero__content">
                <div class="badge badge--green" data-animate>
                    <span class="badge__dot" aria-hidden="true"></span>
                    Open for new projects
                </div>

                <h1 class="hero__title" data-animate>
                    We Build <span class="gradient-text">Enterprise Software</span> That Drives Growth
                </h1>

                <p class="hero__desc" data-animate>
                    Oracle ERP systems, Laravel web applications, HRMS, and custom enterprise solutions — engineered to scale. Based in Faisalabad, serving clients worldwide.
                </p>

                <div class="hero__actions" data-animate>
                    <a href="{{ route('services') }}" class="btn btn--primary">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><rect x="2" y="3" width="20" height="14" rx="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>
                        Explore Services
                    </a>
                    <a href="{{ route('contact.page') }}" class="btn btn--ghost">
                        Start a Project
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                    </a>
                </div>

                <div class="hero__meta" data-animate>
                    @foreach($data['stats'] as $stat)
                        <div class="hero__stat">
                            <strong>{{ $stat['value'] }}</strong>
                            <span>{{ $stat['label'] }}</span>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="hero__visual" aria-hidden="true">
                <div class="hero__card-stack">
                    <div class="hero__card hero__card--1">
                        <div class="hero__card-icon" style="background:rgba(0,212,255,0.15); color:#00d4ff;">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><ellipse cx="12" cy="5" rx="9" ry="3"/><path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"/><path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"/></svg>
                        </div>
                        <div>
                            <h4>Oracle ERP</h4>
                            <p>Enterprise systems built to last</p>
                        </div>
                    </div>
                    <div class="hero__card hero__card--2">
                        <div class="hero__card-icon" style="background:rgba(255,45,32,0.15); color:#ff2d20;">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/></svg>
                        </div>
                        <div>
                            <h4>Laravel Apps</h4>
                            <p>Clean, scalable PHP solutions</p>
                        </div>
                    </div>
                    <div class="hero__card hero__card--3">
                        <div class="hero__card-icon" style="background:rgba(6,214,160,0.15); color:#06d6a0;">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="3" width="20" height="14" rx="2"/><polyline points="8 21 12 17 16 21"/></svg>
                        </div>
                        <div>
                            <h4>Web Development</h4>
                            <p>SEO-optimised & responsive</p>
                        </div>
                    </div>
                    <div class="hero__floating-badge">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg>
                        Oracle Certified Team
                    </div>
                </div>
            </div>
        </div>

        <div class="hero__scroll" aria-hidden="true">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
    </section>

    {{-- Featured Projects Preview --}}
    <section class="section projects" id="featured">
        <div class="projects__bg"></div>
        <div class="container">
            <div class="section__header" data-animate="fade-up">
                <span class="section__tag">Featured Work</span>
                <h2 class="section__title">Featured Projects</h2>
                <p class="section__sub">Some of my best work across enterprise and web development</p>
            </div>
            <div class="projects__grid">
                @foreach(array_slice($data['projects'], 0, 3) as $project)
                    <div class="project-card" data-animate="fade-up">
                        <div class="project-card__top">
                            <div class="project-card__icon">
                                <i data-feather="{{ $project['icon'] }}"></i>
                            </div>
                            <span class="project-card__cat">{{ $project['category'] }}</span>
                        </div>
                        <h3 class="project-card__title">{{ $project['title'] }}</h3>
                        <p class="project-card__desc">{{ $project['description'] }}</p>
                        <div class="project-card__tech">
                            @foreach(array_slice($project['tech'], 0, 3) as $t)
                                <span class="tech-badge">{{ $t }}</span>
                            @endforeach
                        </div>
                        <a href="{{ route('projects') }}" class="project-card__link">
                            Learn More <i data-feather="arrow-right"></i>
                        </a>
                    </div>
                @endforeach
            </div>
            <div style="text-align: center; margin-top: 48px;">
                <a href="{{ route('projects') }}" class="btn btn--ghost">
                    View All Projects <i data-feather="arrow-right"></i>
                </a>
            </div>
        </div>
    </section>
@endsection
