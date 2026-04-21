@extends('admin.layouts.main')
@section('title', __('breadcrumbs.admin.profile'))
@section('content')

    @include('admin.partials.header')

    @include('admin.partials.menu')

    <main class="main">
        <div class="main-content page-profile">
            <div class="page-profile">
                <div class="card profile-shell mb-4">
                    <div class="profile-hero">
                        <div class="profile-hero-main">
                            <div class="profile-avatar-wrap">
                                <img src="{{ asset('assets/img/profile-img.webp') }}" alt="{{ auth('admins')->user()->full_name }}" class="profile-avatar">
                                <span class="profile-status-dot"></span>
                            </div>
                            <div class="profile-hero-copy">
                                {{-- <div class="profile-eyebrow">Product Design Lead</div> --}}
                                <h1 class="profile-name">{{ auth('admins')->user()->full_name }}</h1>
                                <p class="profile-role">{{ auth('admins')->user()->role_name }}</p>
                                <div class="profile-meta-row">
                                    {{-- <span><i class="bi bi-geo-alt"></i> New York, USA</span> --}}
                                    {{-- <span><i class="bi bi-briefcase"></i> 8 years experience</span> --}}
                                    <span><i class="bi bi-calendar3"></i> {{ __('admin.text_joined') }} {{ \Carbon\Carbon::parse(auth('admins')->user()->created_at)->translatedFormat('F j, Y') }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="profile-hero-actions">
                            <a href="{{ route('backend.edit.profile') }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil me-1"></i> {{ __('admin.edit_profile') }}</a>
                            {{-- <button class="btn btn-outline-secondary btn-sm"><i class="bi bi-share me-1"></i> Share</button> --}}
                        </div>
                    </div>

                    <div class="profile-metrics">
                        {{-- <div class="profile-metric">
                            <span class="profile-metric-icon"><i class="bi bi-check2-square"></i></span>
                            <span class="profile-metric-label">{{ __('breadcrumbs.contract') }}</span>
                            <strong class="profile-metric-value">{{ count(auth('admins')->user()->contracts) }}</strong>
                        </div> --}}
                        {{-- <div class="profile-metric">
                            <span class="profile-metric-icon"><i class="bi bi-check2-square"></i></span>
                            <span class="profile-metric-label">Tasks Closed</span>
                            <strong class="profile-metric-value">182</strong>
                        </div> --}}
                        {{-- <div class="profile-metric">
                            <span class="profile-metric-icon"><i class="bi bi-star"></i></span>
                            <span class="profile-metric-label">Avg. Rating</span>
                            <strong class="profile-metric-value">4.9</strong>
                        </div> --}}
                        {{-- <div class="profile-metric">
                            <span class="profile-metric-icon"><i class="bi bi-people"></i></span>
                            <span class="profile-metric-label">Team Size</span>
                            <strong class="profile-metric-value">12</strong>
                        </div> --}}
                    </div>
                </div>

                <div class="row g-3">
                    <div class="col-xl-4">
                        <div class="card mb-3">
                            <div class="card-header">
                                <h5 class="card-title">{{ __('admin.text_about') }}</h5>
                            </div>
                            <div class="card-body">
                                {{-- <p class="profile-about">Passionate product designer focused on accessible, high-performance interfaces with scalable design systems. I collaborate deeply with engineering and product teams to translate strategy into shipped experiences.</p> --}}
                                <div class="profile-contact-list">
                                    <div class="profile-contact-item"><i class="bi bi-envelope"></i> {{ auth('admins')->user()->email }}</div>
                                    <div class="profile-contact-item"><i class="bi bi-telephone"></i> {{ auth('admins')->user()->phone }}</div>
                                    <div class="profile-contact-item"><i class="bi bi-gender-{{ auth('admins')->user()->gender ? 'male' : 'female' }}"></i> {{ auth('admins')->user()->gender ? __('admin.text_male') : __('admin.text_female') }}</div>
                                    {{-- <div class="profile-contact-item"><i class="bi bi-globe"></i> kevinanderson.design</div> --}}
                                </div>
                            </div>
                        </div>

                        {{-- <div class="card mb-3">
                            <div class="card-header">
                                <h5 class="card-title">Skills</h5>
                            </div>
                            <div class="card-body">
                                <div class="profile-skills">
                                    <span class="profile-skill">Design Systems</span>
                                    <span class="profile-skill">Figma</span>
                                    <span class="profile-skill">UX Research</span>
                                    <span class="profile-skill">Interaction Design</span>
                                    <span class="profile-skill">Accessibility</span>
                                    <span class="profile-skill">HTML/CSS</span>
                                    <span class="profile-skill">Prototyping</span>
                                    <span class="profile-skill">Mentoring</span>
                                </div>
                            </div>
                        </div> --}}

                        {{-- <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Social</h5>
                            </div>
                            <div class="card-body">
                                <div class="profile-social-grid">
                                    <a href="#" class="profile-social-link"><i class="bi bi-twitter-x"></i> Twitter</a>
                                    <a href="#" class="profile-social-link"><i class="bi bi-linkedin"></i> LinkedIn</a>
                                    <a href="#" class="profile-social-link"><i class="bi bi-dribbble"></i> Dribbble</a>
                                    <a href="#" class="profile-social-link"><i class="bi bi-github"></i> GitHub</a>
                                </div>
                            </div>
                        </div> --}}
                    </div>

                    <div class="col-xl-8">
                        {{-- <div class="card mb-3">
                            <div class="card-header d-flex align-items-center justify-content-between">
                                <h5 class="card-title mb-0">Work Overview</h5>
                                <a href="activity.html" class="btn btn-outline-secondary btn-sm">View Activity</a>
                            </div>
                            <div class="card-body">
                                <div class="profile-info-grid">
                                    <div class="profile-info-item"><span class="profile-info-label">Department</span><span class="profile-info-value">Product Design</span></div>
                                    <div class="profile-info-item"><span class="profile-info-label">Team</span><span class="profile-info-value">Experience Platform</span></div>
                                    <div class="profile-info-item"><span class="profile-info-label">Manager</span><span class="profile-info-value">Chris Thompson</span></div>
                                    <div class="profile-info-item"><span class="profile-info-label">Location</span><span class="profile-info-value">New York HQ</span></div>
                                    <div class="profile-info-item"><span class="profile-info-label">Employment Type</span><span class="profile-info-value">Full-time</span></div>
                                    <div class="profile-info-item"><span class="profile-info-label">Timezone</span><span class="profile-info-value">UTC-5 (EST)</span></div>
                                </div>
                            </div>
                        </div> --}}

                        {{-- <div class="card mb-3">
                            <div class="card-header">
                                <h5 class="card-title">Recent Timeline</h5>
                            </div>
                            <div class="card-body">
                                <div class="profile-timeline">
                                    <div class="profile-timeline-item">
                                        <span class="profile-timeline-dot success"></span>
                                        <div>
                                            <div class="profile-timeline-title">Completed Design QA for Dashboard v2</div>
                                            <div class="profile-timeline-meta">Today, 10:45 AM</div>
                                        </div>
                                    </div>
                                    <div class="profile-timeline-item">
                                        <span class="profile-timeline-dot accent"></span>
                                        <div>
                                            <div class="profile-timeline-title">Published new typography tokens</div>
                                            <div class="profile-timeline-meta">Yesterday, 3:10 PM</div>
                                        </div>
                                    </div>
                                    <div class="profile-timeline-item">
                                        <span class="profile-timeline-dot info"></span>
                                        <div>
                                            <div class="profile-timeline-title">Ran cross-team design critique workshop</div>
                                            <div class="profile-timeline-meta">Monday, 11:00 AM</div>
                                        </div>
                                    </div>
                                    <div class="profile-timeline-item">
                                        <span class="profile-timeline-dot warning"></span>
                                        <div>
                                            <div class="profile-timeline-title">Updated accessibility checklist for release</div>
                                            <div class="profile-timeline-meta">Sunday, 5:40 PM</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}

                        {{-- <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Current Projects</h5>
                            </div>
                            <div class="card-body p-0">
                                <div class="profile-project-list">
                                    <div class="profile-project-item">
                                        <div>
                                            <div class="profile-project-name">Admin Refresh 2026</div>
                                            <div class="profile-project-desc">Redesign of core admin IA and visual language.</div>
                                        </div>
                                        <span class="profile-project-status on-track">On Track</span>
                                    </div>
                                    <div class="profile-project-item">
                                        <div>
                                            <div class="profile-project-name">Design Token Migration</div>
                                            <div class="profile-project-desc">Moving component library to semantic token architecture.</div>
                                        </div>
                                        <span class="profile-project-status review">In Review</span>
                                    </div>
                                    <div class="profile-project-item">
                                        <div>
                                            <div class="profile-project-name">Accessibility Initiative</div>
                                            <div class="profile-project-desc">WCAG 2.2 compliance pass across account settings flows.</div>
                                        </div>
                                        <span class="profile-project-status planning">Planning</span>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer -->
        @include('admin.partials.footer')
    </main>

  <!-- Back to Top -->
  <a href="#" class="back-to-top">
    <i class="bi bi-arrow-up"></i>
  </a>
@endsection