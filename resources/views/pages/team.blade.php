@extends('layouts.app')

@section('title', 'Our Team — ' . $data['company'])
@section('meta_description', 'Meet the team behind NexaCode Solutions. Led by CEO Muhammad Usman Younas, Oracle APEX Cloud Developer Certified Professional with 4+ years of enterprise software experience.')
@section('canonical', route('team'))

@section('content')

<section class="page-hero">
    <div class="container">
        <div class="page-hero__inner" data-animate>
            <nav aria-label="Breadcrumb" class="breadcrumb">
                <a href="{{ route('home') }}">Home</a>
                <span>/</span>
                <span aria-current="page">Team</span>
            </nav>
            <span class="section__tag">The People</span>
            <h1 class="page-hero__title">Our <span class="gradient-text">Team</span></h1>
            <p class="page-hero__desc">Experienced engineers and developers dedicated to delivering enterprise-grade software solutions.</p>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        @foreach($data['team'] as $member)
        <div class="team-profile" data-animate>
            <div class="team-profile__header">
                <div class="team-avatar-placeholder team-avatar-placeholder--lg">
                    {{ substr($member['name'], 0, 1) }}{{ substr(explode(' ', $member['name'])[1] ?? '', 0, 1) }}
                </div>
                <div>
                    <h1 class="team-profile__name">{{ $member['name'] }}</h1>
                    <p class="team-profile__role">{{ $member['role'] }}</p>
                    <div style="display:flex; gap:10px; margin-top:16px; flex-wrap:wrap;">
                        <a href="mailto:{{ $member['email'] }}" class="btn btn--ghost btn--sm">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                            {{ $member['email'] }}
                        </a>
                        <a href="{{ $member['linkedin'] }}" target="_blank" rel="noopener noreferrer" class="btn btn--outline btn--sm">LinkedIn Profile</a>
                    </div>
                </div>
            </div>

            <div class="team-profile__body">
                <div class="team-profile__bio">
                    <h3>About</h3>
                    <p>{{ $member['bio'] }}</p>

                    <h3 style="margin-top:28px;">Core Skills</h3>
                    <div style="display:flex; flex-wrap:wrap; gap:10px; margin-top:12px;">
                        @foreach($member['skills'] as $skill)
                        <span class="tag">{{ $skill }}</span>
                        @endforeach
                    </div>

                    <h3 style="margin-top:28px;">Certifications</h3>
                    <div style="display:flex; flex-direction:column; gap:10px; margin-top:12px;">
                        @foreach($member['certifications'] as $cert)
                        <div class="cert-badge cert-badge--full">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="var(--accent)" stroke-width="2" aria-hidden="true"><circle cx="12" cy="8" r="6"/><path d="M15.477 12.89L17 22l-5-3-5 3 1.523-9.11"/></svg>
                            {{ $cert }}
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>

<section class="cta-band">
    <div class="container">
        <div class="cta-band__inner" data-animate>
            <div class="cta-band__content">
                <h2>Work With Our Team</h2>
                <p>Get expert software development for your next project.</p>
            </div>
            <div class="cta-band__actions">
                <a href="{{ route('contact.page') }}" class="btn btn--primary">Get in Touch</a>
            </div>
        </div>
    </div>
</section>

@endsection
