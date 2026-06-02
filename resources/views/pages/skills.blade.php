@extends('layouts.app')

@section('title', 'Technical Skills | Oracle ERP & Laravel Expertise')
@section('meta_description', 'Explore technical skills of Muhammad Usman Younas including Oracle ERP, Oracle Database, Laravel, PHP, PL/SQL, Oracle APEX, and full stack development.')
@section('canonical_url', route('skills'))

@section('content')
    <section class="section skills" id="skills">
        <div class="skills__bg"></div>
        <div class="container">
            <div class="section__header" data-animate="fade-up">
                <span class="section__tag">What I Know</span>
                <h2 class="section__title">Technical Skills</h2>
                <p class="section__sub">Core competencies and technologies I work with daily</p>
            </div>
            <div class="skills__grid">
                @foreach($data['skills'] as $skillGroup)
                    <div class="skill-card" data-animate="fade-up">
                        <div class="skill-card__icon">
                            <i data-feather="{{ $skillGroup['icon'] }}"></i>
                        </div>
                        <h3 class="skill-card__title">{{ $skillGroup['category'] }}</h3>
                        <ul class="skill-card__list">
                            @foreach($skillGroup['items'] as $item)
                                <li><i data-feather="check-circle"></i> {{ $item }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
