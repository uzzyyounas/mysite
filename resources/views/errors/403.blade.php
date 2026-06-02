@extends('layouts.app')

@section('title', 'Access Denied - Muhammad Usman Younas')

@section('content')
    <section class="section" style="min-height: 70vh; display: flex; align-items: center;">
        <div class="container" style="text-align: center;">
            <div style="font-size: 100px; margin-bottom: 20px;">🚫</div>
            <h1 style="font-size: 80px; margin-bottom: 20px;">403</h1>
            <h2 style="margin-bottom: 20px;">Access Denied</h2>
            <p style="margin-bottom: 30px; color: var(--text-muted);">
                You don't have permission to access this page.
            </p>
            <a href="{{ route('home') }}" class="btn btn--primary">
                <i data-feather="home"></i> Back to Home
            </a>
        </div>
    </section>
@endsection
