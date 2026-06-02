@extends('layouts.app')

@section('title', 'Server Error - Muhammad Usman Younas')

@section('content')
    <section class="section" style="min-height: 70vh; display: flex; align-items: center;">
        <div class="container" style="text-align: center;">
            <div style="font-size: 100px; margin-bottom: 20px;">⚠️</div>
            <h1 style="font-size: 80px; margin-bottom: 20px;">500</h1>
            <h2 style="margin-bottom: 20px;">Server Error</h2>
            <p style="margin-bottom: 30px; color: var(--text-muted);">
                Something went wrong on our end. Please try again later.
            </p>
            <a href="{{ route('home') }}" class="btn btn--primary">
                <i data-feather="home"></i> Back to Home
            </a>
        </div>
    </section>
@endsection
