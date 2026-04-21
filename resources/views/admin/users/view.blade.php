@extends('admin.layouts.main')
@section('title', $user->full_name)
@section('content')

    @include('admin.partials.header')

    @include('admin.partials.menu')

    <main class="main">
        <div class="main-content page-users-view">
            <div class="page-users-view">
                <div class="page-header uv-page-header">
                    <div>
                        <h1 class="page-title">{{ $user->full_name }}</h1>
                        <nav class="breadcrumb">
                            <a href="{{ route('backend.dashboard') }}" class="breadcrumb-item">{{ __('breadcrumbs.admin.home') }}</a>
                            <a href="{{ route('backend.admins') }}" class="breadcrumb-item">{{ __('breadcrumbs.admin.admins') }}</a>
                            <span class="breadcrumb-item active">{{ $user->full_name }}</span>
                        </nav>
                    </div>
                    <div class="page-header-actions">
                        <a href="{{ route('backend.edit.admin', ['id' => $user->id]) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil me-1"></i> {{ __('admin.edit_user') }}</a>
                        <button class="btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteUserModal"><i class="bi bi-trash me-1"></i> {{ __('admin.text_delete') }}</a>
                    </div>
                </div>

                <div class="row g-3 mb-3">
                    <div class="col-xxl-8">
                        <div class="card uv-identity-card h-100">
                            <div class="card-body">
                                <div class="uv-identity-head">
                                    <div class="uv-identity-user">
                                        <div class="uv-identity-avatar-wrap">
                                        <img src="{{ asset('assets/img/profile-img.webp') }}" alt="{{ $user->full_name }}" class="uv-identity-avatar">
                                        <span class="uv-identity-status"></span>
                                        </div>
                                        <div>
                                            <h3 class="uv-identity-name">{{ $user->full_name }}</h3>
                                            <p class="uv-identity-email">{{ $user->email }}</p>
                                            <div class="uv-identity-tags">
                                                <span class="users-role admin"><i class="bi bi-shield-check"></i> {{ $user->role_name }}</span>
                                                <span class="uv-id-chip">#{{ $user->GUID }}</span>
                                                {{-- <span class="uv-id-chip">Engineering</span> --}}
                                            </div>
                                        </div>
                                    </div>
                                    <a href="{{ route('backend.edit.admin', ['id' => $user->id]) }}" class="uv-identity-cta">{{ __('admin.manage_profile') }} <i class="bi bi-arrow-right"></i></a>
                                </div>

                                <div class="uv-metrics-grid">
                                    {{-- <div class="uv-metric">
                                        <span class="uv-metric-icon"><i class="bi bi-box-arrow-in-right"></i></span>
                                        <span class="uv-metric-label">Logins</span>
                                        <span class="uv-metric-value">156</span>
                                    </div> --}}
                                    {{-- <div class="uv-metric">
                                        <span class="uv-metric-icon"><i class="bi bi-check2-square"></i></span>
                                        <span class="uv-metric-label">Tasks Closed</span>
                                        <span class="uv-metric-value">42</span>
                                    </div> --}}
                                    {{-- <div class="uv-metric">
                                        <span class="uv-metric-icon"><i class="bi bi-kanban"></i></span>
                                        <span class="uv-metric-label">Projects</span>
                                        <span class="uv-metric-value">18</span>
                                    </div> --}}
                                    {{-- <div class="uv-metric">
                                        <span class="uv-metric-icon"><i class="bi bi-diagram-3"></i></span>
                                        <span class="uv-metric-label">Teams</span>
                                        <span class="uv-metric-value">7</span>
                                    </div> --}}
                                </div>

                                <div class="uv-identity-details">
                                    <div class="uv-detail-item"><span>{{ __('admin.text_phone') }}</span><strong>{{ $user->phone }}</strong></div>
                                    {{-- <div class="uv-detail-item"><span>Location</span><strong>New York, USA</strong></div> --}}
                                    {{-- <div class="uv-detail-item"><span>Manager</span><strong>Chris Thompson</strong></div> --}}
                                    <div class="uv-detail-item"><span>{{ __('admin.text_joined') }}</span><strong>{{ \Carbon\Carbon::parse($user->created_at)->translatedFormat('F j, Y') }}</strong></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xxl-4">
                        <div class="card uv-health-card h-100">
                            <div class="card-header">
                                <h5 class="card-title">{{ __('admin.account_health') }}</h5>
                            </div>
                            <div class="card-body">
                                <div class="uv-health-item">
                                    <span class="uv-health-label">{{ __('admin.text_status') }}</span>
                                    <span class="users-status active"><span class="users-status-dot"></span> {{ $user->status_title }}</span>
                                </div>
                                {{-- <div class="uv-health-item">
                                    <span class="uv-health-label">Email Verification</span>
                                    <span class="uv-health-ok"><i class="bi bi-check-circle-fill"></i> Verified</span>
                                </div> --}}
                                {{-- <div class="uv-health-item">
                                    <span class="uv-health-label">2FA</span>
                                    <span class="uv-health-ok"><i class="bi bi-check-circle-fill"></i> Enabled</span>
                                </div> --}}
                                <div class="uv-health-item">
                                    <span class="uv-health-label">{{ __('admin.last_active') }}</span>
                                    <span class="uv-health-value">{{ \Carbon\Carbon::parse($user->last_activity)->translatedFormat('F j, Y H:i') }}</span>
                                </div>
                                {{-- <div class="uv-health-item">
                                    <span class="uv-health-label">Risk Score</span>
                                    <span class="uv-health-value">Low</span>
                                </div> --}}

                                {{-- <div class="uv-team-stack">
                                    <div class="uv-team-stack-item">
                                        <span class="uv-team-icon" style="background: color-mix(in srgb, var(--accent-color), transparent 88%); color: var(--accent-color);"><i class="bi bi-code-slash"></i></span>
                                        <div>
                                            <div class="uv-team-name">Engineering</div>
                                            <div class="uv-team-members">12 members</div>
                                        </div>
                                    </div>
                                    <div class="uv-team-stack-item">
                                        <span class="uv-team-icon" style="background: var(--success-color-light); color: var(--success-color);"><i class="bi bi-box-seam"></i></span>
                                        <div>
                                            <div class="uv-team-name">Product</div>
                                            <div class="uv-team-members">8 members</div>
                                        </div>
                                    </div>
                                    <div class="uv-team-stack-item">
                                        <span class="uv-team-icon" style="background: var(--info-color-light); color: var(--info-color);"><i class="bi bi-palette"></i></span>
                                        <div>
                                            <div class="uv-team-name">Design</div>
                                            <div class="uv-team-members">6 members</div>
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row g-3">
                    {{-- <div class="col-xl-8">
                        <div class="card h-100">
                            <div class="card-header">
                                <h5 class="card-title">Activity Timeline</h5>
                            </div>
                            <div class="card-body">
                                <div class="uv-timeline">
                                    <div class="uv-timeline-item">
                                        <div class="uv-timeline-dot success"></div>
                                        <div class="uv-timeline-content">
                                            <div class="uv-timeline-title">Logged in</div>
                                            <div class="uv-timeline-desc">Chrome on Windows • New York, USA</div>
                                            <div class="uv-timeline-time">Just now</div>
                                        </div>
                                    </div>
                                    <div class="uv-timeline-item">
                                        <div class="uv-timeline-dot info"></div>
                                        <div class="uv-timeline-content">
                                            <div class="uv-timeline-title">Updated profile information</div>
                                            <div class="uv-timeline-desc">Changed phone number and location</div>
                                            <div class="uv-timeline-time">2 hours ago</div>
                                        </div>
                                    </div>
                                    <div class="uv-timeline-item">
                                        <div class="uv-timeline-dot warning"></div>
                                        <div class="uv-timeline-content">
                                            <div class="uv-timeline-title">Enabled two-factor authentication</div>
                                            <div class="uv-timeline-desc">Using authenticator app</div>
                                            <div class="uv-timeline-time">Yesterday at 3:45 PM</div>
                                        </div>
                                    </div>
                                    <div class="uv-timeline-item">
                                        <div class="uv-timeline-dot accent"></div>
                                        <div class="uv-timeline-content">
                                            <div class="uv-timeline-title">Joined Engineering team</div>
                                            <div class="uv-timeline-desc">Added by Chris Thompson</div>
                                            <div class="uv-timeline-time">3 days ago</div>
                                        </div>
                                    </div>
                                    <div class="uv-timeline-item">
                                        <div class="uv-timeline-dot success"></div>
                                        <div class="uv-timeline-content">
                                            <div class="uv-timeline-title">Completed 5 tasks in Project Alpha</div>
                                            <div class="uv-timeline-desc">Sprint 12 milestone reached</div>
                                            <div class="uv-timeline-time">5 days ago</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    
                    <div class="col-xl-4">
                        @if ($user->roles->isNotEmpty())
                            <div class="card mb-3">
                                <div class="card-header">
                                    <h5 class="card-title">{{ __('admin.access_rights') }}</h5>
                                </div>
                                <div class="card-body">
                                    <div class="uv-access-note">
                                        <i class="bi bi-info-circle"></i>
                                        <span>{{ sprintf(__('admin.role_info'), $user->role_name) }} <a href="{{ route('backend.roles') }}">{{ __('breadcrumbs.admin.roles') }}</a>.</span>
                                    </div>
                                    <div class="uv-access-grid">
                                        @foreach ($user->roles->first()?->permissions->pluck('group')->unique() as $permission)
                                            <div class="uv-access-row"><span>{{ $permission }}</span><span class="uv-perm-yes"><i class="bi bi-check-lg"></i></span></div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Delete User Modal -->
        <div class="modal fade" id="deleteUserModal" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body text-center p-4">
                        <div class="ue-delete-icon">
                            <i class="bi bi-exclamation-triangle"></i>
                        </div>
                        <h5 class="mb-2">{{ __('admin.text_delete') }}</h5>
                        <p class="text-muted mb-4">{!! sprintf(__('admin.sure_to_delete_user'), $user->full_name) !!}</p>
                        <div class="d-flex justify-content-center gap-2">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('admin.text_cancel') }}</button>
                            <a type="button" href="{{ route('backend.delete.admin', ['id' => $user->id]) }}" class="btn btn-danger">{{ __('admin.text_delete') }}</a>
                        </div>
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