@extends('layouts.app')

@section('title', 'Muhammad Usman Younas | Oracle ERP & Laravel Developer')

@section('content')

{{-- ===== HERO ===== --}}
<section class="hero" id="home">
    <div class="hero__bg-grid"></div>
    <div class="hero__glow hero__glow--1"></div>
    <div class="hero__glow hero__glow--2"></div>
    <div class="container">
        <div class="hero__inner">
            <div class="hero__text" data-animate="fade-up">
                <div class="hero__badge">
                    <span class="badge-dot"></span> Available for Projects
                </div>
                <h1 class="hero__name">
                    Muhammad<br><span class="gradient-text">Usman Younas</span>
                </h1>
                <p class="hero__role">Software Engineer &mdash; <em>Oracle ERP & Full Stack Developer - usman</em></p>
                <p class="hero__summary">{{ Str::limit($data['summary'], 180) }}</p>
                <div class="hero__actions">
                    <a href="#projects" class="btn btn--primary">
                        <i data-feather="grid"></i> View Projects
                    </a>
                    <a href="{{ route('cv.download') }}" class="btn btn--ghost">
                        <i data-feather="download-cloud"></i> Download CV
                    </a>
                </div>
                <div class="hero__meta">
                    <span><i data-feather="map-pin"></i> {{ $data['location'] }}</span>
                    <span><i data-feather="briefcase"></i> 4+ Years Experience</span>
                    <span><i data-feather="award"></i> Oracle Certified</span>
                </div>
            </div>
            <div class="hero__visual" data-animate="fade-left">
                <div class="hero__card">
                    <div class="hero__avatar">
                        <div class="avatar-placeholder">UY</div>
                        <div class="avatar-ring avatar-ring--1"></div>
                        <div class="avatar-ring avatar-ring--2"></div>
                    </div>
                    <div class="hero__stats">
                        <div class="stat">
                            <span class="stat__num">4+</span>
                            <span class="stat__label">Years Exp.</span>
                        </div>
                        <div class="stat">
                            <span class="stat__num">10+</span>
                            <span class="stat__label">Projects</span>
                        </div>
                        <div class="stat">
                            <span class="stat__num">2</span>
                            <span class="stat__label">Certifications</span>
                        </div>
                    </div>
                    <div class="hero__tags">
                        @foreach(['Oracle APEX', 'Laravel', 'PHP 8.2', 'PL/SQL', 'ERP'] as $tag)
                            <span class="tag">{{ $tag }}</span>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="hero__scroll-hint">
        <span>Scroll to explore</span>
        <i data-feather="chevrons-down"></i>
    </div>
</section>

{{-- ===== ABOUT ===== --}}
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

{{-- ===== SKILLS ===== --}}
<section class="section skills" id="skills">
    <div class="skills__bg"></div>
    <div class="container">
        <div class="section__header" data-animate="fade-up">
            <span class="section__tag">What I Know</span>
            <h2 class="section__title">Technical Skills</h2>
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

{{-- ===== EXPERIENCE ===== --}}
<section class="section experience" id="experience">
    <div class="container">
        <div class="section__header" data-animate="fade-up">
            <span class="section__tag">My Journey</span>
            <h2 class="section__title">Work Experience</h2>
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

{{-- ===== PROJECTS ===== --}}
<section class="section projects" id="projects">
    <div class="projects__bg"></div>
    <div class="container">
        <div class="section__header" data-animate="fade-up">
            <span class="section__tag">What I've Built</span>
            <h2 class="section__title">Featured Projects</h2>
        </div>
        <div class="projects__grid">
            @foreach($data['projects'] as $project)
            <div class="project-card" data-animate="fade-up" style="--accent: {{ $project['color'] }}">
                <div class="project-card__top">
                    <div class="project-card__icon">
                        <i data-feather="{{ $project['icon'] }}"></i>
                    </div>
                    <span class="project-card__cat">{{ $project['category'] }}</span>
                </div>
                <h3 class="project-card__title">{{ $project['title'] }}</h3>
                <p class="project-card__desc">{{ $project['description'] }}</p>
                <div class="project-card__tech">
                    @foreach($project['tech'] as $t)
                        <span class="tech-badge">{{ $t }}</span>
                    @endforeach
                </div>
                @if(isset($project['url']))
                <a href="{{ $project['url'] }}" target="_blank" rel="noopener" class="project-card__link">
                    Visit Site <i data-feather="external-link"></i>
                </a>
                @endif
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ===== CONTACT ===== --}}
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
