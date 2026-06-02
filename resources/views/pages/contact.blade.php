@extends('layouts.app')

@section('title', 'Contact Me | Muhammad Usman Younas')

@section('content')
    <section class="section contact" id="contact">
        <div class="container">
            <div class="section__header" data-animate="fade-up">
                <span class="section__tag">Get In Touch</span>
                <h2 class="section__title">Contact Me</h2>
                <p class="section__sub">Have a project in mind or want to collaborate? I'd love to hear from you.</p>
            </div>
            <div class="contact__grid">
                <div class="contact__info" data-animate="fade-right">
                    <div class="contact-card">
                        <i data-feather="mail"></i>
                        <div>
                            <h4>Email</h4>
                            <a href="mailto:{{ $data['email'] }}">{{ $data['email'] }}</a>
                        </div>
                    </div>
                    <div class="contact-card">
                        <i data-feather="phone"></i>
                        <div>
                            <h4>Phone / WhatsApp</h4>
                            <a href="https://wa.me/{{ $data['whatsapp'] }}" target="_blank">{{ $data['phone'] }}</a>
                        </div>
                    </div>
                    <div class="contact-card">
                        <i data-feather="map-pin"></i>
                        <div>
                            <h4>Location</h4>
                            <span>{{ $data['location'] }}</span>
                        </div>
                    </div>
                    <div class="contact-card">
                        <i data-feather="linkedin"></i>
                        <div>
                            <h4>LinkedIn</h4>
                            <a href="{{ $data['linkedin'] }}" target="_blank" rel="noopener">View Profile</a>
                        </div>
                    </div>
                    <a href="{{ route('cv.download') }}" class="btn btn--primary btn--full">
                        <i data-feather="download"></i> Download My CV
                    </a>
                </div>

                <div class="contact__form-wrap" data-animate="fade-left">
                    <form id="contactForm" class="contact__form" novalidate>
                        @csrf
                        <div class="form-group">
                            <label for="name">Full Name</label>
                            <div class="input-wrap">
                                <i data-feather="user"></i>
                                <input type="text" id="name" name="name" placeholder="Your full name" required>
                            </div>
                            <span class="form-error" id="nameError"></span>
                        </div>
                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <div class="input-wrap">
                                <i data-feather="mail"></i>
                                <input type="email" id="email" name="email" placeholder="your@email.com" required>
                            </div>
                            <span class="form-error" id="emailError"></span>
                        </div>
                        <div class="form-group">
                            <label for="subject">Subject</label>
                            <div class="input-wrap">
                                <i data-feather="tag"></i>
                                <input type="text" id="subject" name="subject" placeholder="Project inquiry, collaboration..." required>
                            </div>
                            <span class="form-error" id="subjectError"></span>
                        </div>
                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea id="message" name="message" rows="5" placeholder="Tell me about your project or how I can help..." required></textarea>
                            <span class="form-error" id="messageError"></span>
                        </div>
                        <button type="submit" class="btn btn--primary btn--full" id="submitBtn">
                            <span class="btn-text"><i data-feather="send"></i> Send Message</span>
                            <span class="btn-loading hidden"><i data-feather="loader"></i> Sending...</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
