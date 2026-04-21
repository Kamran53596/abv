@extends('admin.layouts.main')
@section('title', $user->full_name)
@section('content')

    @include('admin.partials.header')

    @include('admin.partials.menu')

    <main class="main">
        <div class="main-content page-users-edit">
            <div class="page-users-edit">
                <!-- Page Header -->
                <div class="page-header">
                    <div>
                        <h1 class="page-title">{{ __('admin.edit_user') }}</h1>
                        <nav class="breadcrumb">
                            <a href="{{ route('backend.dashboard') }}" class="breadcrumb-item">{{ __('breadcrumbs.admin.home') }}</a>
                            <a href="{{ route('backend.admins') }}" class="breadcrumb-item">{{ __('breadcrumbs.admin.admins') }}</a>
                            <span class="breadcrumb-item active">Edit {{ $user->full_name }}</span>
                        </nav>
                    </div>
                    <div class="page-header-actions">
                        <a href="{{ route('backend.view.admin', ['id' => $user->id]) }}" class="btn btn-outline-secondary btn-sm"><i class="bi bi-eye me-1"></i> {{ __('admin.view_profile') }}</a>
                        <button type="submit" form="userEditForm" class="btn btn-primary btn-sm"><i class="bi bi-check-lg me-1"></i> {{ __('admin.save_changes') }}</button>
                    </div>
                </div>

                <div class="ue-summary-row mb-3">
                    {{-- <div class="ue-summary-item">
                        <span class="ue-summary-icon"><i class="bi bi-person-vcard"></i></span>
                        <span class="ue-summary-label">User ID</span>
                        <strong class="ue-summary-value">{{ $user->GUID }}</strong>
                    </div> --}}
                    <div class="ue-summary-item">
                        <span class="ue-summary-icon"><i class="bi bi-shield-check"></i></span>
                        <span class="ue-summary-label">{{ __('admin.role_name') }}</span>
                        <strong class="ue-summary-value">{{ $user->role_name }}</strong>
                    </div>
                    <div class="ue-summary-item">
                        <span class="ue-summary-icon"><i class="bi bi-clock-history"></i></span>
                        <span class="ue-summary-label">{{ __('admin.last_active') }}</span>
                        <strong class="ue-summary-value">{{ \Carbon\Carbon::parse($user->last_activity)->translatedFormat('F j, Y H:i') }}</strong>
                    </div>
                    {{-- <div class="ue-summary-item">
                        <span class="ue-summary-icon"><i class="bi bi-graph-up-arrow"></i></span>
                        <span class="ue-summary-label">Profile Score</span>
                        <strong class="ue-summary-value">92%</strong>
                    </div> --}}
                </div>

                <form id="userEditForm" method="POST" action="{{ route('backend.update.admin', ['id' => $user->id]) }}" data-validate>
                    @csrf
                    <div class="row g-4">
                        <!-- Left Column -->
                        <div class="col-xl-4">
                            <!-- Profile Image Card -->
                            {{-- <div class="card mb-4">
                                <div class="card-header">
                                    <h5 class="card-title">Profile Image</h5>
                                </div>
                                <div class="card-body">
                                    <div class="ue-avatar-upload">
                                        <img src="assets/img/profile-img.webp" alt="John Doe" class="ue-avatar-preview">
                                        <div class="ue-avatar-overlay">
                                            <i class="bi bi-camera"></i>
                                            <span>Change Photo</span>
                                        </div>
                                        <input type="file" class="ue-avatar-input" accept="image/*">
                                    </div>
                                    <p class="ue-avatar-hint">JPG, PNG or WEBP. Max 2MB.</p>
                                </div>
                            </div> --}}

                            <!-- Account Status Card -->
                            <div class="card mb-4">
                                <div class="card-header">
                                    <h5 class="card-title">{{ __('admin.account_status') }}</h5>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label class="form-label">{{ __('admin.text_status') }}</label>
                                        <select class="form-select">
                                            <option value="1" @if ($user->status) selected @endif>{{ __('admin.text_active') }}</option>
                                            <option value="0" @if (!$user->status) selected @endif>{{ __('admin.text_passive') }}</option>
                                        </select>
                                    </div>
                                    {{-- <div class="ue-toggles">
                                        <div class="ue-toggle-item">
                                            <div class="ue-toggle-info">
                                                <span class="ue-toggle-label">Email Verified</span>
                                                <span class="ue-toggle-desc">User has verified their email address</span>
                                            </div>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="emailVerified" checked>
                                            </div>
                                        </div>
                                        <div class="ue-toggle-item">
                                            <div class="ue-toggle-info">
                                                <span class="ue-toggle-label">Two-Factor Auth</span>
                                                <span class="ue-toggle-desc">Require 2FA on login</span>
                                            </div>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="twoFactor" checked>
                                            </div>
                                        </div>
                                        <div class="ue-toggle-item">
                                            <div class="ue-toggle-info">
                                                <span class="ue-toggle-label">Force Password Change</span>
                                                <span class="ue-toggle-desc">Require new password on next login</span>
                                            </div>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="forcePasswordChange">
                                            </div>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>

                            <!-- Danger Zone -->
                            <div class="card ue-danger-card">
                                <div class="card-header">
                                    <h5 class="card-title"><i class="bi bi-exclamation-triangle me-1"></i> {{ __('admin.danger_zone') }}</h5>
                                </div>
                                <div class="card-body">
                                    <p class="ue-danger-text">{{ __('admin.delete_user_desc') }}</p>
                                    <button type="button" class="btn btn-outline-danger w-100" data-bs-toggle="modal" data-bs-target="#deleteUserModal">
                                        <i class="bi bi-trash me-1"></i> {{ __('admin.text_delete') }}
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Right Column -->
                        <div class="col-xl-8">
                            <!-- Personal Information -->
                            <div class="card mb-4">
                                <div class="card-header">
                                    <h5 class="card-title">{{ __('admin.personal_information') }}</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label class="form-label required">{{ __('admin.first_name') }}</label>
                                            <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
                                            @if ($errors->first('name'))
                                                <div class="invalid-feedback" style="display: block">{{ $errors->first('name') }}</div>
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label required">{{ __('admin.last_name') }}</label>
                                            <input type="text" name="surname" class="form-control" value="{{ $user->surname }}" required>
                                            @if ($errors->first('surname'))
                                                <div class="invalid-feedback" style="display: block">{{ $errors->first('surname') }}</div>
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label required">{{ __('admin.text_email') }}</label>
                                            <input type="email" name="email" class="form-control" value="{{ $user->email }}" readonly>
                                            @if ($errors->first('email'))
                                                <div class="invalid-feedback" style="display: block">{{ $errors->first('email') }}</div>
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">{{ __('admin.text_phone') }}</label>
                                            <input type="tel" name="phone" class="form-control" value="{{ $user->phone }}">
                                        </div>
                                        {{-- <div class="col-md-6">
                                            <label class="form-label">Date of Birth</label>
                                            <input type="date" class="form-control" value="1990-03-15">
                                        </div> --}}
                                        <div class="col-md-6">
                                            <label class="form-label">{{ __('admin.text_gender') }}</label>
                                            <select name="gender" class="form-select">
                                                <option value="">{{ __('admin.text_select') }}</option>
                                                <option value="1" @if ($user->gender === 1) selected @endif>{{ __('admin.text_male') }}</option>
                                                <option value="0" @if ($user->gender === 0) selected @endif>{{ __('admin.text_female') }}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Role & Permissions -->
                            <div class="card mb-4">
                                <div class="card-header">
                                    <h5 class="card-title">{{ __('breadcrumbs.roles') }}</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label class="form-label required">{{ __('admin.role_name') }}</label>
                                            <select class="form-select" name="role" required>
                                                <option value="">{{ __('admin.select_role') }}</option>
                                                @foreach ($roles as $role)
                                                    <option value="{{ $role->name }}" @if ($role->name == 'super-admin' && !auth('admins')->user()->isSuperAdmin()) disabled @endif @if ($role->id == $user->roles->first()?->id) selected @endif>{{ $role->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        {{-- <div class="col-md-6">
                                            <label class="form-label">Teams</label>
                                            <select class="form-select" multiple size="4">
                                                <option value="engineering" selected>Engineering</option>
                                                <option value="product" selected>Product</option>
                                                <option value="design" selected>Design</option>
                                                <option value="leadership" selected>Leadership</option>
                                                <option value="marketing">Marketing</option>
                                                <option value="sales">Sales</option>
                                            </select>
                                            <div class="form-text">Hold Ctrl/Cmd to select multiple.</div>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>

                            <!-- Password -->
                            {{-- <div class="card mb-4">
                                <div class="card-header">
                                    <h5 class="card-title">{{ __('admin.change_password') }}</h5>
                                </div>
                                <div class="card-body">
                                    <div class="ue-password-note">
                                        <i class="bi bi-info-circle"></i>
                                        <span>{{ __('admin.keep_password') }}</span>
                                    </div>
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label class="form-label">{{ __('admin.new_password') }}</label>
                                            <input type="password" name="password" class="form-control" placeholder="{{ __('admin.entry_password') }}">
                                            @if ($errors->first('password'))
                                                <div class="invalid-feedback" style="display: block">{{ $errors->first('password') }}</div>
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">{{ __('admin.confirm_password') }}</label>
                                            <input type="password" name="password_confirmation" class="form-control" placeholder="{{ __('admin.confirm_password') }}">
                                        </div>
                                    </div>
                                </div>
                            </div> --}}

                            <!-- Form Actions -->
                            <div class="ue-form-actions">
                                <a href="{{ route('backend.admins') }}" class="btn btn-secondary">{{ __('admin.text_cancel') }}</a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-check-lg me-1"></i> {{ __('admin.save_changes') }}
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
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
        </div>
        <!-- Success Modal -->
        <div class="modal fade @if (session('status') === 'user-updated') show @endif" id="successModal" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-body text-center py-4">
                <div class="mb-3">
                    <span class="bg-success-subtle text-success rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 64px; height: 64px;">
                    <i class="bi bi-check-lg fs-1"></i>
                    </span>
                </div>
                <h5>{{ __('admin.text_success') }}</h5>
                <p class="text-muted mb-3">{{ __('admin.changes_saved') }}</p>
                <button type="button" onclick="successClose();" class="btn btn-success">{{ __('admin.text_continue') }}</button>
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
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/js/jquery.maskedinput.min.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js?v=').env("APP_VERSION") }}"></script>
  <script>
    function successClose()
    {
        var successElem = document.getElementById('successModal');
        successElem.classList.remove('show');
    }
  </script>
@endsection