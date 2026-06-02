@extends('layouts.app')

@section('title', 'About Muhammad Usman Younas | Software Engineer Bio')
@section('meta_description', 'Learn about Muhammad Usman Younas - Software Engineer with expertise in Oracle ERP, Laravel, and enterprise solutions. 4+ years of experience.')
@section('canonical_url', route('about'))

@section('content')
    <section class="section about" id="about">
        <div class="container">
            <div class="section__header" data-animate="fade-up">
                <span class="section__tag">Who I Am</span>
                <h2 class="section__title">About Me</h2>
            </div>
            <div class="about__grid">
                <div class="about__text" data-animate="fade-right">
                    <p>{{ $data['summary'] }}</p>
                    <p>I have a deep passion for building robust enterprise solutions and user-friendly web applications. My journey has taken me from managing garments production systems at textile factories to developing sophisticated ERP modules and institutional websites at universities.</p>
                    <div class="about__contact-list">
                        <div class="contact-item">
                            <i data-feather="mail"></i>
                            <a href="mailto:{{ $data['email'] }}">{{ $data['email'] }}</a>
                        </div>
                        <div class="contact-item">
                            <i data-feather="phone"></i>
                            <a href="tel:{{ $data['phone'] }}">{{ $data['phone'] }}</a>
                        </div>
                        <div class="contact-item">
                            <i data-feather="map-pin"></i>
                            <span>{{ $data['location'] }}</span>
                        </div>
                        <div class="contact-item">
                            <i data-feather="linkedin"></i>
                            <a href="{{ $data['linkedin'] }}" target="_blank" rel="noopener">LinkedIn Profile</a>
                        </div>
                    </div>
                </div>
                <div class="about__right" data-animate="fade-left">
                    <div class="about__education">
                        <h3><i data-feather="book-open"></i> Education</h3>
                        @foreach($data['education'] as $edu)
                            <div class="edu-item">
                                <div class="edu-item__degree">{{ $edu['degree'] }}</div>
                                <div class="edu-item__inst">{{ $edu['institution'] }}</div>
                                <div class="edu-item__year">{{ $edu['period'] }}</div>
                            </div>
                        @endforeach
                    </div>

                    <div class="about__certs">
                        <h3><i data-feather="award"></i> Certifications</h3>
                        @foreach($data['certifications'] as $cert)
                            <div class="cert-item">
                                <i data-feather="{{ $cert['icon'] }}"></i>
                                <div>
                                    <div class="cert-item__name">{{ $cert['name'] }}</div>
                                    <div class="cert-item__issuer">{{ $cert['issuer'] }}</div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="about__langs">
                        <h3><i data-feather="globe"></i> Languages</h3>
                        <div class="lang-list">
                            @foreach($data['languages'] as $lang)
                                <span class="tag">{{ $lang }}</span>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
