@extends('layouts.app')

@section('title', $service['title'] . ' — ' . $data['company'])
@section('meta_description', $service['description'])
@section('meta_keywords', implode(', ', $service['technologies']) . ', ' . $service['title'] . ', software house Pakistan, ' . $data['company'])
@section('canonical', route('service.detail', $service['slug']))

@push('schema')
    @php
        $schema = [
            '@context'   => 'https://schema.org',
            '@type'      => 'Service',
            'name'       => $service['title'],
            'description'=> $service['description'],
            'provider'   => [
                '@type' => 'Organization',
                'name'  => $data['company'],
                'url'   => url('/'),
            ],
            'areaServed' => 'PK',
            'url'        => route('service.detail', $service['slug']),
        ];
    @endphp

    <script type="application/ld+json">
        {!! json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
    </script>
@endpush

@section('content')

{{-- Page Hero --}}
<section class="page-hero page-hero--service" style="--hero-color: {{ $service['color'] }}; margin-top:100px">
    <div class="container">
        <div class="page-hero__inner" data-animate>
            <nav aria-label="Breadcrumb" class="breadcrumb">
                <a href="{{ route('home') }}">Home</a>
                <span>/</span>
                <a href="{{ route('services') }}">Services</a>
                <span>/</span>
                <span aria-current="page">{{ $service['title'] }}</span>
            </nav>
            <div class="page-hero__service-icon" style="background: {{ $service['color'] }}22; color: {{ $service['color'] }};">
                @include('partials.icon', ['name' => $service['icon']])
            </div>
            <h1 class="page-hero__title">{{ $service['title'] }}</h1>
            <p class="page-hero__desc">{{ $service['short'] }}</p>
            <div class="page-hero__techs">
                @foreach($service['technologies'] as $tech)
                <span class="tag">{{ $tech }}</span>
                @endforeach
            </div>
        </div>
    </div>
</section>

{{-- Overview + Features --}}
<section class="section">
    <div class="container">
        <div class="svc-detail__grid">

            {{-- Main Content --}}
            <div class="svc-detail__main">

                {{-- Description --}}
                <div class="svc-detail__block" data-animate>
                    <h2>About This Service</h2>
                    <p>{{ $service['description'] }}</p>
                </div>

                {{-- Features --}}
                <div class="svc-detail__block" data-animate>
                    <h2>What's Included</h2>
                    <div class="svc-features__grid">
                        @foreach($service['features'] as $feature)
                        <div class="svc-feature-item">
                            <div class="svc-feature-item__check" style="background: {{ $service['color'] }}22; color: {{ $service['color'] }};">
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" aria-hidden="true"><polyline points="20 6 9 17 4 12"/></svg>
                            </div>
                            {{ $feature }}
                        </div>
                        @endforeach
                    </div>
                </div>

                {{-- Process ── --}}
                <div class="svc-detail__block" data-animate>
                    <h2>Our Process</h2>
                    <div class="process__steps">
                        @foreach($service['process'] as $step)
                        <div class="process-step">
                            <div class="process-step__num" style="color: {{ $service['color'] }}; border-color: {{ $service['color'] }}44;">{{ $step['step'] }}</div>
                            <div class="process-step__content">
                                <h4>{{ $step['title'] }}</h4>
                                <p>{{ $step['desc'] }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                {{-- FAQ --}}
                @if(count($service['faq']))
                <div class="svc-detail__block" data-animate>
                    <h2>Frequently Asked Questions</h2>
                    <div class="faq__list">
                        @foreach($service['faq'] as $faq)
                        <details class="faq-item">
                            <summary>{{ $faq['q'] }}</summary>
                            <p>{{ $faq['a'] }}</p>
                        </details>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>

            {{-- Sidebar --}}
            <aside class="svc-detail__sidebar">
                {{-- Use Cases --}}
                <div class="sidebar-card" data-animate>
                    <h3>Industries Served</h3>
                    <ul class="sidebar-list">
                        @foreach($service['use_cases'] as $uc)
                        <li>
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><polyline points="9 18 15 12 9 6"/></svg>
                            {{ $uc }}
                        </li>
                        @endforeach
                    </ul>
                </div>

                {{-- Technologies --}}
                <div class="sidebar-card" data-animate>
                    <h3>Technologies</h3>
                    <div class="sidebar-tags">
                        @foreach($service['technologies'] as $tech)
                        <span class="tag">{{ $tech }}</span>
                        @endforeach
                    </div>
                </div>

                {{-- CTA Card --}}
                <div class="sidebar-card sidebar-card--cta" data-animate>
                    <h3>Start This Project</h3>
                    <p>Ready to get started? Tell us about your requirements and we'll send you a proposal.</p>
                    <a href="{{ route('contact.page') }}?service={{ urlencode($service['title']) }}" class="btn btn--primary btn--full">Get a Free Quote</a>
                    <a href="https://wa.me/{{ $data['whatsapp'] }}?text=Hi%2C%20I%27m%20interested%20in%20{{ urlencode($service['title']) }}" target="_blank" rel="noopener noreferrer" class="btn btn--ghost btn--full" style="margin-top:10px;">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 0 1-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 0 1-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 0 0-3.48-8.413z"/></svg>
                        Chat on WhatsApp
                    </a>
                </div>
            </aside>

        </div>
    </div>
</section>

{{-- Related Services --}}
@if(count($related))
<section class="section section--alt" aria-label="Related services">
    <div class="container">
        <div class="section__header" data-animate>
            <span class="section__tag">Also Available</span>
            <h2 class="section__title">Related Services</h2>
        </div>
        <div class="services__grid services__grid--3">
            @foreach($related as $rel)
            <article class="service-card" data-animate>
                <div class="service-card__icon" style="--svc-color: {{ $rel['color'] }}">
                    @include('partials.icon', ['name' => $rel['icon']])
                </div>
                <h3 class="service-card__title">{{ $rel['title'] }}</h3>
                <p class="service-card__desc">{{ $rel['short'] }}</p>
                <a href="{{ route('service.detail', $rel['slug']) }}" class="service-card__link">
                    Learn More <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                </a>
            </article>
            @endforeach
        </div>
    </div>
</section>
@endif

@endsection
