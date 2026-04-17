@extends('layouts.main')
@section('title', auth('admins')->user()->full_name)
@section('content')

    @include('partials.header')

    @include('partials.menu')

    <main class="main">
        <div class="main-content page-settings">
            <div class="page-settings">
                <div class="page-header">
                    <div>
                        <h1 class="page-title">Profil</h1>
                        {{-- <p class="settings-page-subtitle">Control profile, preferences, security, and account behavior from one place.</p> --}}
                    </div>
                    <div class="page-header-actions">
                        {{-- <button class="btn btn-outline-secondary btn-sm"><i class="bi bi-arrow-counterclockwise me-1"></i> Reset</button> --}}
                        <button type="submit" form="userEditForm" class="btn btn-primary btn-sm"><i class="bi bi-check-lg me-1"></i> {{ __('general.save_changes') }}</button>
                    </div>
                </div>

                {{-- <div class="settings-overview mb-3">
                    <div class="settings-overview-item">
                        <span class="settings-overview-icon"><i class="bi bi-person-check"></i></span>
                        <span class="settings-overview-label">Profile Completion</span>
                        <strong class="settings-overview-value">92%</strong>
                    </div>
                    <div class="settings-overview-item">
                        <span class="settings-overview-icon"><i class="bi bi-shield-lock"></i></span>
                        <span class="settings-overview-label">2FA Status</span>
                        <strong class="settings-overview-value">Enabled</strong>
                    </div>
                    <div class="settings-overview-item">
                        <span class="settings-overview-icon"><i class="bi bi-laptop"></i></span>
                        <span class="settings-overview-label">Active Sessions</span>
                        <strong class="settings-overview-value">3</strong>
                    </div>
                    <div class="settings-overview-item">
                        <span class="settings-overview-icon"><i class="bi bi-cloud-arrow-down"></i></span>
                        <span class="settings-overview-label">Last Backup</span>
                        <strong class="settings-overview-value">2h ago</strong>
                    </div>
                </div> --}}

                <div class="settings-shell row g-3">
                    <div class="col-xl-3 col-lg-4">
                        <div class="card settings-side-card">
                            <div class="card-body p-2">
                                <nav class="settings-nav">
                                    <a href="{{ route('edit.profile') }}" class="settings-nav-item active">
                                        <i class="bi bi-sliders"></i>
                                        <div class="settings-nav-text">
                                            <span class="settings-nav-label">General</span>
                                            <span class="settings-nav-desc">Profile and preferences</span>
                                        </div>
                                    </a>
                                    {{-- <a href="notifications.html" class="settings-nav-item">
                                        <i class="bi bi-bell"></i>
                                        <div class="settings-nav-text">
                                            <span class="settings-nav-label">Notifications</span>
                                            <span class="settings-nav-desc">Alerts and channels</span>
                                        </div>
                                    </a> --}}
                                    {{-- <a href="activity.html" class="settings-nav-item">
                                        <i class="bi bi-clock-history"></i>
                                        <div class="settings-nav-text">
                                            <span class="settings-nav-label">Activity Log</span>
                                            <span class="settings-nav-desc">History and sessions</span>
                                        </div>
                                    </a> --}}
                                </nav>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-9 col-lg-8 settings-main">
                        <div class="card mb-3">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Account Profile</h5>
                            </div>
                            <div class="card-body">
                                <form id="userEditForm" method="POST" enctype="multipart/form-data" action="{{ route('update.user', ['id' => auth('admins')->user()->id]) }}" data-validate>
                                    @csrf
                                    <div class="col-sm-6">
                                        <p class="text-muted small mb-2">Avatar</p>
                                        <div class="upload-avatar" id="avatar1">
                                            <input type="file" name="photo" accept="image/*" hidden>
                                            <img src="{{ auth('admins')->user()->photo ? asset('storage/users/'.auth('admins')->user()->photo) : asset('assets/img/profile-img.webp') }}" alt="{{ auth('admins')->user()->name }}" class="upload-avatar-img">
                                            <div class="upload-avatar-overlay">
                                                <i class="bi bi-camera"></i>
                                            </div>
                                        </div>
                                        <p class="text-muted small mt-2 text-center">{{ __('general.text_change') }}</p>
                                    </div>
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label class="form-label required">{{ __('general.first_name') }}</label>
                                            <input type="text" name="name" class="form-control" value="{{ auth('admins')->user()->name }}" required>
                                            @if ($errors->first('name'))
                                                <div class="invalid-feedback" style="display: block">{{ $errors->first('name') }}</div>
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label required">{{ __('general.last_name') }}</label>
                                            <input type="text" name="surname" class="form-control" value="{{ auth('admins')->user()->surname }}" required>
                                            @if ($errors->first('surname'))
                                                <div class="invalid-feedback" style="display: block">{{ $errors->first('surname') }}</div>
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label required">{{ __('general.text_email') }}</label>
                                            <input type="email" name="email" class="form-control" value="{{ auth('admins')->user()->email }}" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">{{ __('general.text_phone') }}</label>
                                            <input type="tel" name="phone" class="form-control" value="{{ auth('admins')->user()->phone }}">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">{{ __('general.text_gender') }}</label>
                                            <select name="gender" class="form-select">
                                                <option value="">{{ __('general.text_select') }}</option>
                                                <option value="1" @if (auth('admins')->user()->gender === 1) selected @endif>{{ __('general.text_male') }}</option>
                                                <option value="0" @if (auth('admins')->user()->gender === 0) selected @endif>{{ __('general.text_female') }}</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Employee ID</label>
                                            <input type="text" name="GUID" class="form-control" value="{{ auth('admins')->user()->GUID }}" readonly>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="card mb-3">
                            <div class="card-header">
                                <h5 class="card-title mb-0">{{ __('general.security_controls') }}</h5>
                            </div>
                            <div class="card-body">
                                <div class="settings-security-stack">
                                    <div class="settings-security-item">
                                        <div class="settings-security-info">
                                            <h6 class="settings-security-title">{{ __('general.text_password') }}</h6>
                                        </div>
                                        <button type="button" class="btn btn-outline-primary btn-sm" data-bs-toggle="collapse" data-bs-target="#changePassword">{{ __('general.change_password') }}</button>
                                    </div>
                                    <div class="collapse @if (count($errors)) show @endif" id="changePassword">
                                        <form id="passwordForm" method="POST" action="{{ route('profile.password') }}">
                                            @csrf
                                            <div class="settings-password-form">
                                                <div class="row g-3" style="max-width: 560px;">
                                                    <div class="col-12">
                                                        <label class="form-label">{{ __('general.current_password') }}</label>
                                                        <input type="password" name="current_password" class="form-control" placeholder="{{ __('general.current_password') }}">
                                                        @if ($errors->first('current_password'))
                                                            <div class="invalid-feedback" style="display: block">{{ $errors->first('current_password') }}</div>
                                                        @endif
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label">{{ __('general.new_password') }}</label>
                                                        <input type="password" name="password" class="form-control" placeholder="{{ __('general.new_password') }}">
                                                        @if ($errors->first('password'))
                                                            <div class="invalid-feedback" style="display: block">{{ $errors->first('password') }}</div>
                                                        @endif
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label">{{ __('general.confirm_password') }}</label>
                                                        <input type="password" name="password_confirmation" class="form-control" placeholder="{{ __('general.confirm_password') }}">
                                                        @if ($errors->first('password_confirmation'))
                                                            <div class="invalid-feedback" style="display: block">{{ $errors->first('password_confirmation') }}</div>
                                                        @endif
                                                    </div>
                                                    <button type="submit" form="passwordForm" class="btn btn-primary btn-sm"><i class="bi bi-check-lg me-1"></i> {{ __('general.save_changes') }}</button>
                                                </div>
                                            </div> 
                                        </form>
                                    </div>

                                    {{-- <div class="settings-security-item">
                                        <div class="settings-security-info">
                                            <h6 class="settings-security-title">Two-Factor Authentication</h6>
                                            <p class="settings-security-desc">Require verification code on sign-in</p>
                                        </div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="settings2fa" checked>
                                        </div>
                                    </div>

                                    <div class="settings-security-item">
                                        <div class="settings-security-info">
                                            <h6 class="settings-security-title">Trusted Devices</h6>
                                            <p class="settings-security-desc">Manage remembered devices</p>
                                        </div>
                                        <a href="activity.html" class="btn btn-outline-secondary btn-sm">Manage</a>
                                    </div> --}}
                                </div>
                            </div>
                        </div>

                        <div class="card settings-danger-card">
                            <div class="card-header">
                                <h5 class="card-title mb-0"><i class="bi bi-exclamation-triangle me-1"></i> {{ __('general.danger_zone') }}</h5>
                            </div>
                            <div class="card-body">
                                <div class="settings-danger-row">
                                    <div>
                                        <h6 class="settings-danger-title">{{ __('general.text_delete') }}</h6>
                                        <p class="settings-danger-desc">{{ __('general.delete_user_desc') }}</p>
                                    </div>
                                    <button type="button" class="btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteAccountModal">{{ __('general.text_delete') }}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="deleteAccountModal" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body text-center p-4">
                            <div class="ue-delete-icon">
                                <i class="bi bi-exclamation-triangle"></i>
                            </div>
                            <h5 class="mb-2">{{ __('general.text_delete') }}</h5>
                            <div class="d-flex justify-content-center gap-2">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('general.text_cancel') }}</button>
                                <a type="button" href="{{ route('delete.user', ['id' => auth('admins')->user()->id]) }}" class="btn btn-danger">{{ __('general.text_delete') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Success Modal -->
        <div class="modal fade @if (session('status') === 'password-updated') show @endif" id="successModal" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-body text-center py-4">
                <div class="mb-3">
                    <span class="bg-success-subtle text-success rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 64px; height: 64px;">
                    <i class="bi bi-check-lg fs-1"></i>
                    </span>
                </div>
                <h5>{{ __('general.text_success') }}</h5>
                <p class="text-muted mb-3">{{ __('general.changes_saved') }}</p>
                <button type="button" onclick="successClose();" class="btn btn-success">{{ __('general.text_continue') }}</button>
                </div>
            </div>
            </div>
        </div>

        <!-- Footer -->
        @include('partials.footer')
    </main>

    <!-- Back to Top -->
    <a href="#" class="back-to-top">
        <i class="bi bi-arrow-up"></i>
    </a>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/js/jquery.maskedinput.min.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js?v=').env("APP_VERSION") }}"></script>
    <script>
    function successClose()
    {
        var successElem = document.getElementById('successModal');
        successElem.classList.remove('show');
    }
    const avatars = document.querySelectorAll('.upload-avatar');
    avatars.forEach(function(avatar) {
        const input = avatar.querySelector('input[type="file"]');
        const img = avatar.querySelector('.upload-avatar-img');
        avatar.addEventListener('click', function() {
            input.click();
        });
        input.addEventListener('change', function() {
            if (this.files && this.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                img.src = e.target.result;
            };
            reader.readAsDataURL(this.files[0]);
            }
        });
    });
  </script>
@endsection