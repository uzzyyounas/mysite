@extends('layouts.app')

@section('title', 'Projects Portfolio | Muhammad Usman Younas')

@section('content')
    <section class="section projects" id="projects">
        <div class="projects__bg"></div>
        <div class="container">
            <div class="section__header" data-animate="fade-up">
                <span class="section__tag">What I've Built</span>
                <h2 class="section__title">Featured Projects</h2>
                <p class="section__sub">Enterprise solutions, web applications, and custom software I've developed</p>
            </div>
            <div class="projects__grid">
                @foreach($data['projects'] as $project)
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
                            @foreach($project['tech'] as $t)
                                <span class="tech-badge">{{ $t }}</span>
                            @endforeach
                        </div>
                        @if(isset($project['url']))
                            <a href="{{ $project['url'] }}" target="_blank" rel="noopener" class="project-card__link">
                                Visit Site <i data-feather="external-link"></i>
                            </a>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
