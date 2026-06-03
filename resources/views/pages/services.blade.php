@extends('layouts.app')

@section('title', 'Software Development Services — ' . $data['company'])
@section('meta_description', 'Oracle ERP development, Laravel web apps, HRMS, inventory systems, institutional websites, and server administration — comprehensive software services in Pakistan.')
@section('meta_keywords', 'Oracle ERP Pakistan, Laravel development services, HRMS software, inventory management, institutional website development, Oracle APEX, software house services')
@section('canonical', route('services'))
@push('schema')
    @php
        $schema = [
            '@context' => 'https://schema.org',
            '@type' => 'ItemList',
            'name' => 'Software Development Services',
            'description' => 'Services offered by ' . $data['company'],
            'numberOfItems' => count($services),
            'itemListElement' => collect($services)->map(function ($s, $i) {
                return [
                    '@type' => 'ListItem',
                    'position' => $i + 1,
                    'item' => [
                        '@type' => 'Service',
                        'name' => $s['title'],
                        'description' => $s['short'],
                        'url' => route('service.detail', $s['slug']),
                    ],
                ];
            })->values()->toArray(),
        ];
    @endphp

    <script type="application/ld+json">
        {!! json_encode($schema, JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT) !!}
    </script>
@endpush
@section('content')

{{-- Page Hero --}}
<section class="page-hero" style="margin-top:100px">
    <div class="container">
        <div class="page-hero__inner" data-animate>
            <nav aria-label="Breadcrumb" class="breadcrumb">
                <a href="{{ route('home') }}">Home</a>
                <span aria-hidden="true">/</span>
                <span aria-current="page">Services</span>
            </nav>
            <span class="section__tag">What We Offer</span>
            <h1 class="page-hero__title">Our <span class="gradient-text">Services</span></h1>
            <p class="page-hero__desc">From Oracle ERP to modern web platforms — we provide end-to-end software development services tailored to your business needs.</p>
        </div>
    </div>
</section>

{{-- Services Grid --}}
<section class="section" aria-label="All services">
    <div class="container">
        <div class="services__list">
            @foreach($services as $index => $service)
            <article class="service-detail-card" data-animate>
                <div class="service-detail-card__left">
                    <div class="service-detail-card__icon" style="--svc-color: {{ $service['color'] }}">
                        @include('partials.icon', ['name' => $service['icon']])
                    </div>
                    <div class="service-detail-card__num">0{{ $index + 1 }}</div>
                </div>
                <div class="service-detail-card__body">
                    <h2>{{ $service['title'] }}</h2>
                    <p>{{ $service['description'] }}</p>
                    <div class="service-detail-card__features">
                        @foreach(array_slice($service['features'], 0, 4) as $feature)
                        <div class="feature-item">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" aria-hidden="true"><polyline points="20 6 9 17 4 12"/></svg>
                            {{ $feature }}
                        </div>
                        @endforeach
                    </div>
                    <div class="service-detail-card__techs">
                        @foreach($service['technologies'] as $tech)
                        <span class="tag">{{ $tech }}</span>
                        @endforeach
                    </div>
                </div>
                <div class="service-detail-card__action">
                    <a href="{{ route('service.detail', $service['slug']) }}" class="btn btn--primary">
                        Full Details
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                    </a>
                </div>
            </article>
            @endforeach
        </div>
    </div>
</section>

{{-- CTA --}}
<section class="cta-band" aria-label="Contact CTA">
    <div class="container">
        <div class="cta-band__inner" data-animate>
            <div class="cta-band__content">
                <h2>Not Sure Which Service You Need?</h2>
                <p>Tell us your challenge and we'll recommend the right solution — no obligation.</p>
            </div>
            <div class="cta-band__actions">
                <a href="{{ route('contact.page') }}" class="btn btn--primary">Free Consultation</a>
            </div>
        </div>
    </div>
</section>


@endsection
