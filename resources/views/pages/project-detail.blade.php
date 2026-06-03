@extends('layouts.app')

@section('title', $project['title'] . ' — Case Study | ' . $data['company'])
@section('meta_description', $project['description'] . ' Client: ' . $project['client'] . '. Built with ' . implode(', ', array_slice($project['tech'], 0, 3)) . '.')
@section('meta_keywords', implode(', ', $project['tech']) . ', ' . $project['category'] . ', software project Pakistan, ' . $data['company'])
@section('canonical', route('project.detail', $project['slug']))

@section('schema_markup')
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "CreativeWork",
    "name": "{{ $project['title'] }}",
    "description": "{{ $project['description'] }}",
    "creator": {
        "@type": "Organization",
        "name": "{{ $data['company'] }}"
    },
    "dateCreated": "{{ $project['year'] }}",
    "url": "{{ route('project.detail', $project['slug']) }}"
}
</script>
@endsection

@section('content')

<section class="page-hero page-hero--project" style="--hero-color: {{ $project['color'] }}">
    <div class="container">
        <div class="page-hero__inner" data-animate>
            <nav aria-label="Breadcrumb" class="breadcrumb">
                <a href="{{ route('home') }}">Home</a>
                <span>/</span>
                <a href="{{ route('projects') }}">Projects</a>
                <span>/</span>
                <span aria-current="page">{{ $project['title'] }}</span>
            </nav>
            <span class="badge badge--green">{{ $project['category'] }}</span>
            <h1 class="page-hero__title">{{ $project['title'] }}</h1>
            <div class="page-hero__meta">
                <span><svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg> {{ $project['client'] }}</span>
                <span><svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg> {{ $project['year'] }}</span>
                <span><svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg> {{ $project['duration'] }}</span>
            </div>
            <div class="page-hero__techs">
                @foreach($project['tech'] as $tech)
                <span class="tag">{{ $tech }}</span>
                @endforeach
            </div>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="case-study__grid">

            {{-- Main Content --}}
            <div class="case-study__main">

                {{-- Overview --}}
                <div class="case-study__block" data-animate>
                    <h2>Project Overview</h2>
                    <p>{{ $project['description'] }}</p>
                </div>

                {{-- Challenge --}}
                <div class="case-study__block case-study__block--challenge" data-animate>
                    <div class="case-study__block-icon challenge">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                    </div>
                    <div>
                        <h2>The Challenge</h2>
                        <p>{{ $project['challenge'] }}</p>
                    </div>
                </div>

                {{-- Solution --}}
                <div class="case-study__block case-study__block--solution" data-animate>
                    <div class="case-study__block-icon solution">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><polyline points="9 11 12 14 22 4"/><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/></svg>
                    </div>
                    <div>
                        <h2>Our Solution</h2>
                        <p>{{ $project['solution'] }}</p>
                    </div>
                </div>

                {{-- Results --}}
                <div class="case-study__block" data-animate>
                    <h2>Results & Impact</h2>
                    <div class="results__list">
                        @foreach($project['results'] as $result)
                        <div class="result-item">
                            <div class="result-item__check">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" aria-hidden="true"><polyline points="20 6 9 17 4 12"/></svg>
                            </div>
                            {{ $result }}
                        </div>
                        @endforeach
                    </div>
                </div>

                {{-- Features --}}
                <div class="case-study__block" data-animate>
                    <h2>Key Features Delivered</h2>
                    <div class="svc-features__grid">
                        @foreach($project['features'] as $feature)
                        <div class="svc-feature-item">
                            <div class="svc-feature-item__check" style="background: {{ $project['color'] }}22; color: {{ $project['color'] }};">
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" aria-hidden="true"><polyline points="20 6 9 17 4 12"/></svg>
                            </div>
                            {{ $feature }}
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            {{-- Sidebar --}}
            <aside class="case-study__sidebar">
                {{-- Project Info --}}
                <div class="sidebar-card" data-animate>
                    <h3>Project Details</h3>
                    <div class="project-info-list">
                        <div class="project-info-item">
                            <span class="project-info-item__label">Client</span>
                            <span>{{ $project['client'] }}</span>
                        </div>
                        <div class="project-info-item">
                            <span class="project-info-item__label">Category</span>
                            <span>{{ $project['category'] }}</span>
                        </div>
                        <div class="project-info-item">
                            <span class="project-info-item__label">Duration</span>
                            <span>{{ $project['duration'] }}</span>
                        </div>
                        <div class="project-info-item">
                            <span class="project-info-item__label">Year</span>
                            <span>{{ $project['year'] }}</span>
                        </div>
                    </div>
                    @if(isset($project['url']))
                    <a href="{{ $project['url'] }}" target="_blank" rel="noopener noreferrer" class="btn btn--outline btn--full" style="margin-top:16px;">
                        View Live Site
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg>
                    </a>
                    @endif
                </div>

                {{-- Tech Stack --}}
                <div class="sidebar-card" data-animate>
                    <h3>Tech Stack</h3>
                    <div class="sidebar-tags">
                        @foreach($project['tech'] as $tech)
                        <span class="tag">{{ $tech }}</span>
                        @endforeach
                    </div>
                </div>

                {{-- CTA --}}
                <div class="sidebar-card sidebar-card--cta" data-animate>
                    <h3>Similar Project?</h3>
                    <p>We can build something like this for your business. Let's discuss.</p>
                    <a href="{{ route('contact.page') }}" class="btn btn--primary btn--full">Get a Quote</a>
                </div>
            </aside>

        </div>
    </div>
</section>

{{-- Related Projects --}}
@if(count($related))
<section class="section section--alt" aria-label="Related projects">
    <div class="container">
        <div class="section__header" data-animate>
            <span class="section__tag">More Work</span>
            <h2 class="section__title">Related Projects</h2>
        </div>
        <div class="projects__grid projects__grid--3">
            @foreach($related as $proj)
            <article class="project-card" data-animate>
                <div class="project-card__header" style="--proj-color: {{ $proj['color'] }}">
                    <div class="project-card__icon">@include('partials.icon', ['name' => $proj['icon']])</div>
                    <span class="badge badge--green">{{ $proj['category'] }}</span>
                </div>
                <div class="project-card__body">
                    <h3>{{ $proj['title'] }}</h3>
                    <p class="project-card__client">{{ $proj['client'] }}</p>
                    <p>{{ $proj['description'] }}</p>
                    <div class="project-card__tags">
                        @foreach(array_slice($proj['tech'], 0, 3) as $tech)<span class="tag">{{ $tech }}</span>@endforeach
                    </div>
                </div>
                <div class="project-card__footer">
                    <a href="{{ route('project.detail', $proj['slug']) }}" class="btn btn--ghost btn--sm">View Case Study</a>
                </div>
            </article>
            @endforeach
        </div>
    </div>
</section>
@endif

@endsection
