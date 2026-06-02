@extends('layouts.app')

@section('title', 'Muhammad Usman Younas | Software Engineer & Oracle ERP Specialist')
@section('meta_description', 'Professional Software Engineer with 4+ years experience in Oracle ERP, Laravel Development, and Full Stack Web Development. Available for projects in Pakistan.')
@section('meta_keywords', 'Muhammad Usman Younas, Software Engineer, Oracle ERP, Oracle Database, Laravel Developer, PHP Developer, Full Stack Developer, Oracle APEX')
@section('canonical_url', route('home'))

@section('content')
    {{-- Hero Section (same as before, but with proper route links) --}}
    <section class="hero" id="home">
        <div class="hero__bg-grid"></div>
        <div class="hero__glow hero__glow--1"></div>
        <div class="hero__glow hero__glow--2"></div>
        <div class="container">
            <div class="hero__inner">
                <div class="hero__text" data-animate="fade-up">
                    <div class="hero__badge">
                        <span class="badge-dot"></span> Available for Projects
                    </div>
                    <h1 class="hero__name">
                        Muhammad<br><span class="gradient-text">Usman Younas</span>
                    </h1>
                    <p class="hero__role">Software Engineer &mdash; <em>Oracle ERP & Full Stack Developer</em></p>
                    <p class="hero__summary">{{ Str::limit($data['summary'], 180) }}</p>
                    <div class="hero__actions">
                        <a href="{{ route('projects') }}" class="btn btn--primary">
                            <i data-feather="grid"></i> View Projects
                        </a>
                        <a href="{{ route('cv.download') }}" class="btn btn--ghost">
                            <i data-feather="download-cloud"></i> Download CV
                        </a>
                    </div>
                    <div class="hero__meta">
                        <span><i data-feather="map-pin"></i> {{ $data['location'] }}</span>
                        <span><i data-feather="briefcase"></i> 4+ Years Experience</span>
                        <span><i data-feather="award"></i> Oracle Certified</span>
                    </div>
                </div>
                <div class="hero__visual" data-animate="fade-left">
                    <div class="hero__card">
                        <div class="hero__avatar">
                            <div class="avatar-placeholder">UY</div>
                            <div class="avatar-ring avatar-ring--1"></div>
                            <div class="avatar-ring avatar-ring--2"></div>
                        </div>
                        <div class="hero__stats">
                            <div class="stat">
                                <span class="stat__num">4+</span>
                                <span class="stat__label">Years Exp.</span>
                            </div>
                            <div class="stat">
                                <span class="stat__num">{{ count($data['projects']) }}+</span>
                                <span class="stat__label">Projects</span>
                            </div>
                            <div class="stat">
                                <span class="stat__num">{{ count($data['certifications']) }}</span>
                                <span class="stat__label">Certifications</span>
                            </div>
                        </div>
                        <div class="hero__tags">
                            @foreach(['Oracle APEX', 'Laravel', 'PHP 8.2', 'PL/SQL', 'ERP'] as $tag)
                                <span class="tag">{{ $tag }}</span>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="hero__scroll-hint">
            <span>Scroll to explore</span>
            <i data-feather="chevrons-down"></i>
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
