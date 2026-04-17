@extends('admin.layouts.main')
@section('title', __('breadcrumbs.admin.roles'))
@section('content')

    @include('partials.header')

    @include('partials.menu')

    <main class="main">
        <div class="main-content page-roles">
            <div class="page-roles">
                <!-- Page Header -->
                <div class="page-header">
                    <div>
                        <h1 class="page-title">{{ __('breadcrumbs.admin.roles') }}</h1>
                        <nav class="breadcrumb">
                            <a href="{{ route('backend.dashboard') }}" class="breadcrumb-item">{{ __('breadcrumbs.admin.home') }}</a>
                            @if ($id)
                                <a href="{{ route('backend.roles') }}" class="breadcrumb-item">{{ __('breadcrumbs.admin.roles') }}</a>
                                <span class="breadcrumb-item active">{{ $role->name }}</span>
                            @else
                                <span class="breadcrumb-item active">{{ __('breadcrumbs.admin.roles') }}</span>
                            @endif
                        </nav>
                    </div>
                    @if (!$id)
                        <div class="page-header-actions">
                            <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addRoleModal">
                                <i class="bi bi-plus-lg me-1"></i> {{ __('general.add_role') }}
                            </button>
                        </div>
                    @endif
                </div>

                <div class="row g-4">
                    <!-- Roles List -->
                    <div class="col-xl-4 col-lg-5">
                        <div class="card mb-4">
                            <div class="card-header">
                                <h5 class="card-title">{{ __('general.text_roles') }}</h5>
                            </div>
                            <div class="card-body p-0">
                                <div class="roles-list">
                                    @foreach ($roles as $item)
                                        <div class="roles-item @if ($item->id == $id) active @endif">
                                            <div class="roles-item-icon" style="background: var(--{{ $item->color }}-color-light); color: var(--{{ $item->color }}-color);">
                                                <i class="bi bi-shield-fill"></i>
                                            </div>
                                            <div class="roles-item-info">
                                                <span class="roles-item-name">{{ $item->name }}</span>
                                                <span class="roles-item-count">{{ count($item->users) }} {{ __('general.text_users') }}</span>
                                            </div>
                                            <a href="{{ route('backend.roles', ['id' => $item->id]) }}" class="roles-item-edit" title="Edit"><i class="bi bi-pencil"></i></a>
                                            <a class="roles-item-edit text-danger" href="{{ route('backend.delete.role', ['id' => $item->id]) }}"><i class="bi bi-trash"></i></a>
                                        </div>
                                    @endforeach
                                    
                                    {{-- <div class="roles-item">
                                        <div class="roles-item-icon" style="background: var(--warning-color-light); color: var(--warning-color);">
                                        <i class="bi bi-person-badge"></i>
                                        </div>
                                        <div class="roles-item-info">
                                        <span class="roles-item-name">Manager</span>
                                        <span class="roles-item-count">8 users</span>
                                        </div>
                                        <button class="roles-item-edit" title="Edit"><i class="bi bi-pencil"></i></button>
                                    </div>

                                    <div class="roles-item">
                                        <div class="roles-item-icon" style="background: var(--info-color-light); color: var(--info-color);">
                                        <i class="bi bi-pencil-square"></i>
                                        </div>
                                        <div class="roles-item-info">
                                        <span class="roles-item-name">Editor</span>
                                        <span class="roles-item-count">12 users</span>
                                        </div>
                                        <button class="roles-item-edit" title="Edit"><i class="bi bi-pencil"></i></button>
                                    </div>

                                    <div class="roles-item">
                                        <div class="roles-item-icon" style="background: color-mix(in srgb, var(--accent-color), transparent 85%); color: var(--accent-color);">
                                        <i class="bi bi-person"></i>
                                        </div>
                                        <div class="roles-item-info">
                                        <span class="roles-item-name">User</span>
                                        <span class="roles-item-count">156 users</span>
                                        </div>
                                        <button class="roles-item-edit" title="Edit"><i class="bi bi-pencil"></i></button>
                                    </div>

                                    <div class="roles-item">
                                        <div class="roles-item-icon" style="background: var(--background-color); color: var(--muted-color);">
                                        <i class="bi bi-eye"></i>
                                        </div>
                                        <div class="roles-item-info">
                                        <span class="roles-item-name">Viewer</span>
                                        <span class="roles-item-count">45 users</span>
                                        </div>
                                        <button class="roles-item-edit" title="Edit"><i class="bi bi-pencil"></i></button>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                        @if ($id)
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title">{{ __('general.role_details') }}</h5>
                                </div>
                                <div class="card-body">
                                    <div class="roles-detail-list">
                                    <div class="roles-detail">
                                        <span class="roles-detail-label">{{ __('general.role_name') }}</span>
                                        <span class="roles-detail-value">{{ $role->name }}</span>
                                    </div>
                                    {{-- <div class="roles-detail">
                                        <span class="roles-detail-label">Description</span>
                                        <span class="roles-detail-value">Full system access with all permissions enabled. Can manage users, roles, and system settings.</span>
                                    </div> --}}
                                    <div class="roles-detail">
                                        <span class="roles-detail-label">{{ __('general.text_created') }}</span>
                                        <span class="roles-detail-value">{{ \Carbon\Carbon::parse($role->created_at)->translatedFormat('F j, Y') }}</span>
                                    </div>
                                    <div class="roles-detail">
                                        <span class="roles-detail-label">{{ __('general.text_modified') }}</span>
                                        <span class="roles-detail-value">{{ \Carbon\Carbon::parse($role->updated_at)->translatedFormat('F j, Y') }}</span>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                    @if ($id)
                        <!-- Permissions -->
                        <div class="col-xl-8 col-lg-7">
                            <!-- Permissions Matrix -->
                            <div class="card mb-4">
                                <div class="card-header d-flex align-items-center justify-content-between">
                                    <div>
                                        <h5 class="card-title mb-0">{{ __('general.permissions_matrix') }}</h5>
                                        <span class="roles-subtitle">{{ sprintf(__('general.configure_access'), $role->name) }}</span>
                                    </div>
                                    <button class="btn btn-primary btn-sm edit_permissions" data-id="{{ $id }}">
                                        <i class="bi bi-check-lg me-1"></i> {{ __('general.save_changes') }}
                                    </button>
                                </div>
                                <div class="card-body p-0">
                                    <div class="table-responsive">
                                        <table class="table roles-perm-table mb-0">
                                            <thead>
                                                <tr>
                                                    <th>{{ __('general.text_module') }}</th>
                                                    <th class="text-center">{{ __('general.text_view') }}</th>
                                                    <th class="text-center">{{ __('general.text_create') }}</th>
                                                    <th class="text-center">{{ __('general.text_edit') }}</th>
                                                    <th class="text-center">{{ __('general.text_delete') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- Dashboard -->
                                                {{-- <tr class="roles-perm-group">
                                                    <td colspan="6"><i class="bi bi-grid me-2"></i> Dashboard</td>
                                                </tr>
                                                <tr>
                                                    <td class="roles-perm-module">Analytics Dashboard</td>
                                                    <td class="text-center"><input type="checkbox" class="form-check-input" checked></td>
                                                    <td class="text-center"><span class="roles-perm-na">--</span></td>
                                                    <td class="text-center"><span class="roles-perm-na">--</span></td>
                                                    <td class="text-center"><span class="roles-perm-na">--</span></td>
                                                    <td class="text-center"><input type="checkbox" class="form-check-input" checked disabled></td>
                                                </tr>
                                                <tr>
                                                    <td class="roles-perm-module">Reports</td>
                                                    <td class="text-center"><input type="checkbox" class="form-check-input" checked></td>
                                                    <td class="text-center"><input type="checkbox" class="form-check-input" checked></td>
                                                    <td class="text-center"><input type="checkbox" class="form-check-input" checked></td>
                                                    <td class="text-center"><input type="checkbox" class="form-check-input" checked></td>
                                                    <td class="text-center"><input type="checkbox" class="form-check-input" checked></td>
                                                </tr> --}}

                                                <!-- Users -->
                                                <tr class="roles-perm-group">
                                                    <td colspan="6"><i class="bi bi-people me-2"></i> {{ __('general.user_managment') }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="roles-perm-module">{{ __('breadcrumbs.admin.users') }}</td>
                                                    <td class="text-center"><input type="checkbox" name="permissions" value="viewUsers" class="form-check-input" @if ($role->hasPermissionTo('viewUsers')) checked @endif></td>
                                                    <td class="text-center"><input type="checkbox" name="permissions" value="createUsers" class="form-check-input" @if ($role->hasPermissionTo('createUsers')) checked @endif></td>
                                                    <td class="text-center"><input type="checkbox" name="permissions" value="editUsers" class="form-check-input" @if ($role->hasPermissionTo('editUsers')) checked @endif></td>
                                                    <td class="text-center"><input type="checkbox" name="permissions" value="deleteUsers" class="form-check-input" @if ($role->hasPermissionTo('deleteUsers')) checked @endif></td>
                                                </tr>
                                                <tr>
                                                    <td class="roles-perm-module">{{ __('breadcrumbs.admin.roles') }}</td>
                                                    <td class="text-center"><input type="checkbox" name="permissions" value="viewRole" class="form-check-input" @if ($role->hasPermissionTo('viewRole')) checked @endif></td>
                                                    <td class="text-center"><input type="checkbox" name="permissions" value="createRole" class="form-check-input" @if ($role->hasPermissionTo('createRole')) checked @endif></td>
                                                    <td class="text-center"><input type="checkbox" name="permissions" value="editRole" class="form-check-input" @if ($role->hasPermissionTo('editRole')) checked @endif></td>
                                                    <td class="text-center"><input type="checkbox" name="permissions" value="deleteRole" class="form-check-input" @if ($role->hasPermissionTo('deleteRole')) checked @endif></td>
                                                </tr>
                                                <!-- Apps -->
                                                <tr class="roles-perm-group">
                                                    <td colspan="6"><i class="bi bi-file-earmark-text me-2"></i> {{ __('general.productivity_apps') }}</td>
                                                </tr>
                                                {{-- <tr>
                                                    <td class="roles-perm-module">{{ __('breadcrumbs.contract') }}</td>
                                                    <td class="text-center"><input type="checkbox" name="permissions" value="viewContract" class="form-check-input" @if ($role->hasPermissionTo('viewContract')) checked @endif></td>
                                                    <td class="text-center"><input type="checkbox" name="permissions" value="createContract" class="form-check-input" @if ($role->hasPermissionTo('createContract')) checked @endif></td>
                                                    <td class="text-center"><input type="checkbox" name="permissions" value="editContract" class="form-check-input" @if ($role->hasPermissionTo('editContract')) checked @endif></td>
                                                    <td class="text-center"><input type="checkbox" name="permissions" value="deleteContract" class="form-check-input" @if ($role->hasPermissionTo('deleteContract')) checked @endif></td>
                                                </tr>
                                                <tr>
                                                    <td class="roles-perm-module">{{ __('breadcrumbs.support') }}</td>
                                                    <td class="text-center"><input type="checkbox" name="permissions" value="viewTicket" class="form-check-input" @if ($role->hasPermissionTo('viewTicket')) checked @endif></td>
                                                    <td class="text-center"><input type="checkbox" name="permissions" value="createTicket" class="form-check-input" @if ($role->hasPermissionTo('createTicket')) checked @endif></td>
                                                    <td class="text-center"><input type="checkbox" name="permissions" value="editTicket" class="form-check-input" @if ($role->hasPermissionTo('editTicket')) checked @endif></td>
                                                    <td class="text-center"><input type="checkbox" name="permissions" value="deleteTicket" class="form-check-input" @if ($role->hasPermissionTo('deleteTicket')) checked @endif></td>
                                                </tr> --}}
                                                <!-- Api -->
                                                {{-- <tr class="roles-perm-group">
                                                    <td colspan="6"><i class="bi bi-file-earmark-text me-2"></i> Api Modullar</td>
                                                </tr>
                                                <tr>
                                                    <td class="roles-perm-module">{{ __('breadcrumbs.cities') }}</td>
                                                    <td class="text-center"><input type="checkbox" name="permissions" value="viewCity" class="form-check-input" @if ($role->hasPermissionTo('viewCity')) checked @endif></td>
                                                    <td class="text-center"><input type="checkbox" name="permissions" value="createCity" class="form-check-input" @if ($role->hasPermissionTo('createCity')) checked @endif></td>
                                                    <td class="text-center"><input type="checkbox" name="permissions" value="editCity" class="form-check-input" @if ($role->hasPermissionTo('editCity')) checked @endif></td>
                                                    <td class="text-center"><input type="checkbox" name="permissions" value="deleteCity" class="form-check-input" @if ($role->hasPermissionTo('deleteCity')) checked @endif></td>
                                                </tr>
                                                <tr>
                                                    <td class="roles-perm-module">{{ __('breadcrumbs.customers') }}</td>
                                                    <td class="text-center"><input type="checkbox" name="permissions" value="viewCustomer" class="form-check-input" @if ($role->hasPermissionTo('viewCustomer')) checked @endif></td>
                                                    <td class="text-center"><input type="checkbox" name="permissions" value="createCustomer" class="form-check-input" @if ($role->hasPermissionTo('createCustomer')) checked @endif></td>
                                                    <td class="text-center"><input type="checkbox" name="permissions" value="editCustomer" class="form-check-input" @if ($role->hasPermissionTo('editCustomer')) checked @endif></td>
                                                    <td class="text-center"><input type="checkbox" name="permissions" value="deleteCustomer" class="form-check-input" @if ($role->hasPermissionTo('deleteCustomer')) checked @endif></td>
                                                </tr> --}}

                                                <!-- Settings -->
                                                {{-- <tr class="roles-perm-group">
                                                    <td colspan="6"><i class="bi bi-gear me-2"></i> System Settings</td>
                                                </tr>
                                                <tr>
                                                    <td class="roles-perm-module">General Settings</td>
                                                    <td class="text-center"><input type="checkbox" class="form-check-input" checked></td>
                                                    <td class="text-center"><span class="roles-perm-na">--</span></td>
                                                    <td class="text-center"><input type="checkbox" class="form-check-input" checked></td>
                                                    <td class="text-center"><span class="roles-perm-na">--</span></td>
                                                    <td class="text-center"><input type="checkbox" class="form-check-input" checked></td>
                                                </tr> --}}
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            @if ($role->users->isNotEmpty())
                                <!-- Users with this role -->
                                <div class="card">
                                    <div class="card-header d-flex align-items-center justify-content-between">
                                        <h5 class="card-title mb-0">{{ sprintf(__('general.users_with_roles'), $role->name) }}</h5>
                                        <span class="roles-user-count">{{ count($role->users) }} {{ __('general.text_users') }}</span>
                                    </div>
                                    <div class="card-body p-0">
                                        <div class="roles-users-list">
                                            @foreach ($role->users as $user)
                                                <div class="roles-user">
                                                    <img src="{{ asset('assets/img/profile-img.webp') }}" alt="{{ $user->full_name }}" class="roles-user-avatar">
                                                    <div class="roles-user-info">
                                                        <span class="roles-user-name">{{ $user->full_name }}</span>
                                                        <span class="roles-user-email">{{ $user->email }}</span>
                                                    </div>
                                                    <span class="roles-user-status active">{{ $user->status_title }}</span>
                                                    <span class="roles-user-date">{{ \Carbon\Carbon::parse($user->created_at)->translatedFormat('F j, Y') }}</span>
                                                    <a href="{{ route('backend.role.remove', ['id' => $user->id]) }}" class="btn btn-outline-danger btn-sm roles-user-remove" title="Remove role">
                                                        <i class="bi bi-x-lg"></i>
                                                    </a>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    @endif
                </div>
            </div>

            <!-- Add Role Modal -->
            <div class="modal fade" id="addRoleModal" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">{{ __('general.new_role') }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" id="createRole" action="{{ route('backend.create.role') }}">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label required">{{ __('general.role_name') }}</label>
                                    <input type="text" name="name" value="" class="form-control" required placeholder="{{ __('general.role_name') }}">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">{{ __('general.role_color') }}</label>
                                    <div class="roles-color-options">
                                        <label class="roles-color-option">
                                            <input type="radio" name="roleColor" value="danger">
                                            <span class="roles-color-swatch" style="background: var(--danger-color);"></span>
                                        </label>
                                        <label class="roles-color-option">
                                            <input type="radio" name="roleColor" value="warning">
                                            <span class="roles-color-swatch" style="background: var(--warning-color);"></span>
                                        </label>
                                        <label class="roles-color-option">
                                            <input type="radio" name="roleColor" value="primary" checked="">
                                            <span class="roles-color-swatch" style="background: var(--accent-color);"></span>
                                        </label>
                                        <label class="roles-color-option">
                                            <input type="radio" name="roleColor" value="info">
                                            <span class="roles-color-swatch" style="background: var(--info-color);"></span>
                                        </label>
                                        <label class="roles-color-option">
                                            <input type="radio" name="roleColor" value="success">
                                            <span class="roles-color-swatch" style="background: var(--success-color);"></span>
                                        </label>
                                        <label class="roles-color-option">
                                            <input type="radio" name="roleColor" value="secondary">
                                            <span class="roles-color-swatch" style="background: var(--muted-color);"></span>
                                        </label>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('general.text_cancel') }}</button>
                            <button type="submit" form="createRole" class="btn btn-primary">{{ __('general.create_role') }}</button>
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