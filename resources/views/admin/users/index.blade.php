@extends('layouts.main')
@section('title', __('breadcrumbs.users'))
@section('content')

    @include('partials.header')

    @include('partials.menu')
    <main class="main">
        <div class="main-content page-users">
            <div class="page-users">
                <div class="page-header users-page-header">
                {{-- <div>
                    <h1 class="page-title">People Directory</h1>
                    <p class="users-page-subtitle">Centralized user operations, access status, and lifecycle management.</p>
                </div> --}}
                <div class="page-header-actions">
                    {{-- <button class="btn btn-outline-secondary btn-sm"><i class="bi bi-download me-1"></i> Export</button> --}}
                    <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addUserModal">
                        <i class="bi bi-plus-lg me-1"></i> {{ __('general.add_user') }}
                    </button>
                </div>
                </div>

                {{-- <div class="users-insight-row mb-3">
                    <div class="users-insight users-insight-total">
                        <span class="users-insight-icon"><i class="bi bi-people"></i></span>
                        <span class="users-insight-label">Total Users</span>
                        <span class="users-insight-value">248</span>
                        <span class="users-insight-meta">+18 this month</span>
                    </div>
                    <div class="users-insight users-insight-active">
                        <span class="users-insight-icon"><i class="bi bi-person-check"></i></span>
                        <span class="users-insight-label">Active</span>
                        <span class="users-insight-value">186</span>
                        <span class="users-insight-meta">75% engagement</span>
                    </div>
                    <div class="users-insight users-insight-pending">
                        <span class="users-insight-icon"><i class="bi bi-hourglass-split"></i></span>
                        <span class="users-insight-label">Pending</span>
                        <span class="users-insight-value">24</span>
                        <span class="users-insight-meta">Needs onboarding</span>
                    </div>
                    <div class="users-insight users-insight-inactive">
                        <span class="users-insight-icon"><i class="bi bi-person-x"></i></span>
                        <span class="users-insight-label">Inactive</span>
                        <span class="users-insight-value">38</span>
                        <span class="users-insight-meta">Follow-up required</span>
                    </div>
                </div> --}}

                <div class="card users-list-card">
                    <div class="users-toolbar">
                        {{-- <div class="users-toolbar-left">
                            <div class="users-filter-tabs">
                                <button class="users-filter-tab active" data-filter="all">All <span class="users-filter-count">248</span></button>
                                <button class="users-filter-tab" data-filter="active">Active <span class="users-filter-count">186</span></button>
                                <button class="users-filter-tab" data-filter="pending">Pending <span class="users-filter-count">24</span></button>
                                <button class="users-filter-tab" data-filter="inactive">Inactive <span class="users-filter-count">38</span></button>
                            </div>
                        </div> --}}
                        <div class="users-toolbar-right">
                            <div class="users-search">
                                <i class="bi bi-search"></i>
                                <input type="text" name="q" id="searchInput" value="" placeholder="Axtarış" autocomplete="off">
                            </div>

                            <div class="dropdown">
                                <button class="users-toolbar-btn dropdown-toggle" data-bs-toggle="dropdown">
                                    <i class="bi bi-sliders"></i> {{ Request::get('role') ?? __('general.text_roles') }}
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li><a class="dropdown-item" href="{{ route('users') }}">{{ __('general.text_all_roles') }}</a></li>
                                    @foreach ($roles as $role)
                                        <li><a class="dropdown-item" href="?role={{ $role->name }}">{{ $role->name }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive users-table-wrap">
                        <table class="table table-hover align-middle mb-0" id="table">
                            <thead>
                                <tr>
                                    <th class="users-th-check">
                                        <div class="form-check"><input class="form-check-input" type="checkbox" id="selectAll"></div>
                                    </th>
                                    <th>{{ __('general.text_user') }}</th>
                                    <th>{{ __('general.role_name') }}</th>
                                    <th>{{ __('general.text_status') }}</th>
                                    <th>{{ __('general.last_active') }}</th>
                                    <th>{{ __('general.text_joined') }}</th>
                                    <th class="users-th-actions">{{ __('general.text_actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>
                                            <div class="form-check"><input class="form-check-input" type="checkbox"></div>
                                        </td>
                                        <td>
                                            <div class="users-user">
                                                <div class="users-avatar-wrap"><img src="{{ asset('assets/img/profile-img.webp') }}" alt="" class="users-avatar"><span class="users-avatar-status online"></span></div>
                                                <div class="users-user-info"><a href="{{ route('view.user', ['id' => $user->id]) }}" class="users-user-name">{{ $user->full_name }}</a><span class="users-user-email">{{ $user->email }}</span></div>
                                            </div>
                                        </td>
                                        <td><span class="users-role admin"><i class="bi bi-shield-check"></i> {{ $user->role_name }}</span></td>
                                        <td><span class="users-status active"><span class="users-status-dot"></span> {{ $user->status_title }}</span></td>
                                        <td class="users-meta">{{ $user->online }}</td>
                                        <td class="users-meta">{{ \Carbon\Carbon::parse($user->created_at)->translatedFormat('F j, Y') }}</td>
                                        <td>
                                            <div class="users-actions">
                                                <a href="{{ route('view.user', ['id' => $user->id]) }}" class="users-action-btn" title="View"><i class="bi bi-eye"></i></a>
                                                <a href="{{ route('edit.user', ['id' => $user->id]) }}" class="users-action-btn" title="Edit"><i class="bi bi-pencil"></i></a>
                                                <div class="dropdown">
                                                    <button class="users-action-btn dropdown-toggle" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></button>
                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                        {{-- <li><a class="dropdown-item" href="#"><i class="bi bi-envelope me-2"></i> Send Email</a></li> --}}
                                                        {{-- <li><a class="dropdown-item" href="#"><i class="bi bi-key me-2"></i> Reset Password</a></li> --}}
                                                        {{-- <li>
                                                            <hr class="dropdown-divider">
                                                        </li> --}}
                                                        @can('deleteUsers')
                                                            <li><a class="dropdown-item text-danger" href="{{ route('delete.user', ['id' => $user->id]) }}"><i class="bi bi-trash me-2"></i> {{ __('general.text_delete') }}</a></li>
                                                        @endcan
                                                    </ul>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="users-pagination">
                        <div class="users-pagination-info">Showing <strong>{{ $users->firstItem() }}-{{ $users->lastItem() }}</strong> of <strong>{{ $users->total() }}</strong></div>
                        {{ $users->onEachSide(0)->links() }}
                    </div>
                </div>

                <div class="modal fade" id="addUserModal" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">{{ __('general.add_user') }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('create.user') }}" id="createUser" method="POST">
                                    <div class="row g-3">
                                        <div class="col-sm-6">
                                            <label class="form-label">{{ __('general.first_name') }}</label>
                                            <input type="text" name="name" id="register-name" class="form-control" required placeholder="{{ __('general.entry_first_name') }}">
                                            <div class="invalid-feedback error_name" style="display: block"></div>
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="form-label">{{ __('general.last_name') }}</label>
                                            <input type="text" name="surname" id="register-surname" class="form-control" required placeholder="{{ __('general.entry_last_name') }}">
                                            <div class="invalid-feedback error_surname" style="display: block"></div>
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label">{{ __('general.text_email') }}</label>
                                            <input type="email" name="email" id="register-email" class="form-control" required placeholder="{{ __('general.entry_email') }}">
                                            <div class="invalid-feedback error_email" style="display: block"></div>
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label">{{ __('general.text_roles') }}</label>
                                            <select class="form-select" id="register-role" name="role" required>
                                                <option value="">{{ __('general.select_role') }}</option>
                                                @foreach ($roles as $role)
                                                    <option value="{{ $role->name }}" @if ($role->name == 'super-admin' && !auth('admins')->user()->isSuperAdmin()) disabled @endif>{{ $role->name }}</option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback error_role" style="display: block"></div>
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="form-label">{{ __('general.text_password') }}</label>
                                            <input type="password" name="password" id="register-password" class="form-control" required placeholder="{{ __('general.entry_password') }}">
                                            <div class="invalid-feedback error_password" style="display: block"></div>
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="form-label">{{ __('general.confirm_password') }}</label>
                                            <input type="password" name="password_confirmation" id="register-password-confirm" class="form-control" required placeholder="{{ __('general.confirm_password') }}">
                                            <div class="invalid-feedback error_password_confirmation" style="display: block"></div>
                                        </div>
                                        {{-- <div class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="sendInvite" checked>
                                                <label class="form-check-label" for="sendInvite">Send welcome email with login details</label>
                                            </div>
                                        </div> --}}
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('general.text_cancel') }}</button>
                                <button type="button" class="btn btn-primary" id="register_btn">{{ __('general.add_user') }}</a>
                            </div>
                        </div>
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
    <script src="{{ asset('assets/js/custom.js?v=').env("APP_VERSION") }}"></script>
@endsection