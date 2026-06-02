@extends('layouts.app')

@section('title', 'Work Experience | Muhammad Usman Younas')

@section('content')
    <section class="section experience" id="experience">
        <div class="container">
            <div class="section__header" data-animate="fade-up">
                <span class="section__tag">My Journey</span>
                <h2 class="section__title">Work Experience</h2>
                <p class="section__sub">4+ years of progressive experience in software development and ERP systems</p>
            </div>
            <div class="timeline">
                @foreach($data['experience'] as $i => $exp)
                    <div class="timeline__item {{ $exp['current'] ? 'timeline__item--current' : '' }}" data-animate="fade-up">
                        <div class="timeline__dot">
                            @if($exp['current'])
                                <i data-feather="zap"></i>
                            @else
                                <i data-feather="briefcase"></i>
                            @endif
                        </div>
                        <div class="timeline__card">
                            @if($exp['current'])
                                <span class="badge badge--green">Current Role</span>
                            @endif
                            <div class="timeline__meta">
                                <span class="timeline__period"><i data-feather="calendar"></i> {{ $exp['period'] }}</span>
                                <span class="timeline__loc"><i data-feather="map-pin"></i> {{ $exp['location'] }}</span>
                            </div>
                            <h3 class="timeline__role">{{ $exp['role'] }}</h3>
                            <p class="timeline__company">{{ $exp['company'] }}</p>
                            <ul class="timeline__highlights">
                                @foreach($exp['highlights'] as $h)
                                    <li>{{ $h }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
