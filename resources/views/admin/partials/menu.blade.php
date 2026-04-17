<!-- Sidebar -->
  <aside class="sidebar">
    <!-- Sidebar Navigation -->
    <nav class="sidebar-nav">
      <ul class="nav-menu">

        <!-- Main Dashboard -->
        <li class="nav-item">
          <a class="nav-link @if (Route::currentRouteName() == 'backend.home') active @endif" href="{{ route('backend.home') }}">
            <span class="nav-icon"><i class="ph-light ph-squares-four"></i></span>
            <span class="nav-text">{{ __('breadcrumbs.home') }}</span>
            <span class="nav-badge nav-badge-soft">{{ __('general.text_main') }}</span>
          </a>
        </li>

        <!-- Dashboards Submenu -->
        {{-- <li class="nav-item has-submenu ">
          <a class="nav-link" href="#" aria-expanded="false">
            <span class="nav-icon"><i class="ph-light ph-gauge"></i></span>
            <span class="nav-text">Dashboards</span>
            <span class="nav-arrow"><i class="bi bi-chevron-right"></i></span>
          </a>
          <ul class="nav-submenu ">
            <li><a class="nav-link " href="dashboard-sales.html"><span class="nav-dot"></span>Sales</a></li>
            <li><a class="nav-link " href="dashboard-analytics.html"><span class="nav-dot"></span>Analytics</a></li>
            <li><a class="nav-link " href="dashboard-crm.html"><span class="nav-dot"></span>CRM</a></li>
            <li><a class="nav-link " href="dashboard-marketing.html"><span class="nav-dot"></span>Marketing</a></li>
            <li><a class="nav-link " href="dashboard-projects.html"><span class="nav-dot"></span>Projects</a></li>
            <li><a class="nav-link " href="dashboard-finance.html"><span class="nav-dot"></span>Finance</a></li>
          </ul>
        </li> --}}

        <!-- Users -->
        @canany(['viewAdmin', 'viewRole'])
          <li class="nav-item has-submenu @if (in_array(Route::currentRouteName(), ['backend.admins', 'backend.roles'])) open @endif">
            <a class="nav-link" href="#" aria-expanded="false">
              <span class="nav-icon"><i class="ph-light ph-users-three"></i></span>
              <span class="nav-text">{{ __('breadcrumbs.users') }}</span>
              <span class="nav-arrow"><i class="bi bi-chevron-right"></i></span>
            </a>
            <ul class="nav-submenu ">
              @can('viewAdmin')
                <li><a class="nav-link @if (Route::currentRouteName() == 'backend.admins') active @endif" href="{{ route('backend.admins') }}"><span class="nav-dot"></span>{{ __('breadcrumbs.admin.admins') }}</a></li>
              @endcan
              {{-- <li><a class="nav-link " href="profile.html"><span class="nav-dot"></span>Profile</a></li> --}}
              <!-- 3rd Level - Settings submenu -->
              {{-- <li class="has-submenu ">
                <a class="nav-link" href="#" aria-expanded="false">
                  <span class="nav-dot"></span>Settings
                  <span class="nav-arrow"><i class="bi bi-chevron-right"></i></span>
                </a>
                <ul class="nav-submenu ">
                  <li><a class="nav-link " href="settings.html"><span class="nav-dot"></span>Account</a></li>
                  <li><a class="nav-link " href="notifications.html"><span class="nav-dot"></span>Notifications</a></li>
                  <li><a class="nav-link " href="activity.html"><span class="nav-dot"></span>Activity</a></li>
                </ul>
              </li> --}}
              @can('viewRole')
                <li><a class="nav-link @if (Route::currentRouteName() == 'backend.roles') active @endif" href="{{ route('backend.roles') }}"><span class="nav-dot"></span>{{ __('breadcrumbs.admin.roles') }}</a></li>
              @endcan
            </ul>
          </li>
        @endcanany

        <!-- Authentication -->
        {{-- <li class="nav-item has-submenu ">
          <a class="nav-link" href="#" aria-expanded="false">
            <span class="nav-icon"><i class="ph-light ph-shield-check"></i></span>
            <span class="nav-text">Authentication</span>
            <span class="nav-badge">7</span>
            <span class="nav-arrow"><i class="bi bi-chevron-right"></i></span>
          </a>
          <ul class="nav-submenu ">
            <li><a class="nav-link " href="auth-login.html"><span class="nav-dot"></span>Login</a></li>
            <li><a class="nav-link " href="auth-register.html"><span class="nav-dot"></span>Register</a></li>
            <li><a class="nav-link " href="auth-forgot-password.html"><span class="nav-dot"></span>Forgot Password</a></li>
            <li><a class="nav-link " href="auth-reset-password.html"><span class="nav-dot"></span>Reset Password</a></li>
            <li><a class="nav-link " href="auth-verify-email.html"><span class="nav-dot"></span>Email Verification</a></li>
            <li><a class="nav-link " href="auth-two-factor.html"><span class="nav-dot"></span>Two Factor Auth</a></li>
            <li><a class="nav-link " href="auth-lock-screen.html"><span class="nav-dot"></span>Lock Screen</a></li>
          </ul>
        </li> --}}

        <!-- Apps Section -->
        <li class="nav-heading"><span>{{ __('general.productivity_apps') }}</span></li>

        {{-- <li class="nav-item">
          <a class="nav-link " href="apps-calendar.html">
            <span class="nav-icon"><i class="ph-light ph-calendar-blank"></i></span>
            <span class="nav-text">Calendar</span>
          </a>
        </li> --}}
        {{-- @can('viewContract')
          <li class="nav-item">
            <a class="nav-link @if (Route::currentRouteName() == 'contracts') active @endif" href="{{ route('contracts') }}">
              <span class="nav-icon"><i class="ph-light ph-files"></i></span>
              <span class="nav-text">{{ __('breadcrumbs.contract') }}</span>
            </a>
          </li>
        @endcan --}}

        {{-- <li class="nav-item">
          <a class="nav-link " href="apps-chat.html">
            <span class="nav-icon"><i class="ph-light ph-chat-circle-dots"></i></span>
            <span class="nav-text">Chat</span>
          </a>
        </li> --}}

        {{-- <li class="nav-item">
          <a class="nav-link " href="apps-contacts.html">
            <span class="nav-icon"><i class="ph-light ph-address-book"></i></span>
            <span class="nav-text">Contacts</span>
          </a>
        </li> --}}

        {{-- <li class="nav-item">
          <a class="nav-link " href="apps-file-manager.html">
            <span class="nav-icon"><i class="ph-light ph-folder-open"></i></span>
            <span class="nav-text">File Manager</span>
          </a>
        </li> --}}

        {{-- <li class="nav-item">
          <a class="nav-link " href="apps-email.html">
            <span class="nav-icon"><i class="ph-light ph-envelope-simple"></i></span>
            <span class="nav-text">Email</span>
          </a>
        </li> --}}

        {{-- <li class="nav-item">
          <a class="nav-link " href="apps-todo.html">
            <span class="nav-icon"><i class="ph-light ph-checks"></i></span>
            <span class="nav-text">Todo List</span>
          </a>
        </li> --}}
        {{-- @can('viewTicket')
          <li class="nav-item">
            <a class="nav-link @if (Route::currentRouteName() == 'support') active @endif" href="{{ route('support') }}">
              <span class="nav-icon"><i class="ph-light ph-headset"></i></span>
              <span class="nav-text">{{ __('breadcrumbs.support') }}</span>
            </a>
          </li>
        @endcan --}}

        <!-- UI Elements Section -->
        {{-- <li class="nav-heading"><span>Interface</span></li>

        <li class="nav-item has-submenu ">
          <a class="nav-link" href="#" aria-expanded="false">
            <span class="nav-icon"><i class="ph-light ph-puzzle-piece"></i></span>
            <span class="nav-text">Components</span>
            <span class="nav-arrow"><i class="bi bi-chevron-right"></i></span>
          </a>
          <ul class="nav-submenu ">
            <li><a class="nav-link " href="components-alerts.html"><span class="nav-dot"></span>Alerts</a></li>
            <li><a class="nav-link " href="components-accordion.html"><span class="nav-dot"></span>Accordion</a></li>
            <li><a class="nav-link " href="components-badges.html"><span class="nav-dot"></span>Badges</a></li>
            <li><a class="nav-link " href="components-breadcrumbs.html"><span class="nav-dot"></span>Breadcrumbs</a></li>
            <li><a class="nav-link " href="components-buttons.html"><span class="nav-dot"></span>Buttons</a></li>
            <li><a class="nav-link " href="components-cards.html"><span class="nav-dot"></span>Cards</a></li>
            <li><a class="nav-link " href="components-carousel.html"><span class="nav-dot"></span>Carousel</a></li>
            <li><a class="nav-link " href="components-dropdowns.html"><span class="nav-dot"></span>Dropdowns</a></li>
            <li><a class="nav-link " href="components-list-group.html"><span class="nav-dot"></span>List Group</a></li>
            <li><a class="nav-link " href="components-modal.html"><span class="nav-dot"></span>Modal</a></li>
            <li><a class="nav-link " href="components-nav-tabs.html"><span class="nav-dot"></span>Navs & Tabs</a></li>
            <li><a class="nav-link " href="components-offcanvas.html"><span class="nav-dot"></span>Offcanvas</a></li>
            <li><a class="nav-link " href="components-pagination.html"><span class="nav-dot"></span>Pagination</a></li>
            <li><a class="nav-link " href="components-popovers.html"><span class="nav-dot"></span>Popovers</a></li>
            <li><a class="nav-link " href="components-progress.html"><span class="nav-dot"></span>Progress</a></li>
            <li><a class="nav-link " href="components-spinners.html"><span class="nav-dot"></span>Spinners</a></li>
            <li><a class="nav-link " href="components-toasts.html"><span class="nav-dot"></span>Toasts</a></li>
            <li><a class="nav-link " href="components-tooltips.html"><span class="nav-dot"></span>Tooltips</a></li>
          </ul>
        </li> --}}

        <!-- Widgets -->
        {{-- <li class="nav-item has-submenu ">
          <a class="nav-link" href="#" aria-expanded="false">
            <span class="nav-icon"><i class="ph-light ph-stack"></i></span>
            <span class="nav-text">Widgets</span>
            <span class="nav-arrow"><i class="bi bi-chevron-right"></i></span>
          </a>
          <ul class="nav-submenu ">
            <li><a class="nav-link " href="widgets-cards.html"><span class="nav-dot"></span>Cards</a></li>
            <li><a class="nav-link " href="widgets-banners.html"><span class="nav-dot"></span>Banners</a></li>
            <li><a class="nav-link " href="widgets-charts.html"><span class="nav-dot"></span>Charts</a></li>
            <li><a class="nav-link " href="widgets-apps.html"><span class="nav-dot"></span>Apps</a></li>
            <li><a class="nav-link " href="widgets-data.html"><span class="nav-dot"></span>Data</a></li>
          </ul>
        </li> --}}

        <!-- Forms Section -->
        {{-- <li class="nav-item has-submenu ">
          <a class="nav-link" href="#" aria-expanded="false">
            <span class="nav-icon"><i class="ph-light ph-textbox"></i></span>
            <span class="nav-text">Forms</span>
            <span class="nav-arrow"><i class="bi bi-chevron-right"></i></span>
          </a>
          <ul class="nav-submenu ">
            <li><a class="nav-link " href="forms-elements.html"><span class="nav-dot"></span>Form Elements</a></li>
            <li><a class="nav-link " href="forms-layouts.html"><span class="nav-dot"></span>Form Layouts</a></li>
            <li><a class="nav-link " href="forms-validation.html"><span class="nav-dot"></span>Validation</a></li>
            <li><a class="nav-link " href="forms-wizard.html"><span class="nav-dot"></span>Wizard</a></li>
            <li><a class="nav-link " href="forms-editors.html"><span class="nav-dot"></span>Rich Editors</a></li>
            <li><a class="nav-link " href="forms-pickers.html"><span class="nav-dot"></span>Date/Time Pickers</a></li>
            <li><a class="nav-link " href="forms-select.html"><span class="nav-dot"></span>Advanced Select</a></li>
            <li><a class="nav-link " href="forms-upload.html"><span class="nav-dot"></span>File Upload</a></li>
          </ul>
        </li> --}}

        <!-- Tables Section -->
        {{-- <li class="nav-item has-submenu ">
          <a class="nav-link" href="#" aria-expanded="false">
            <span class="nav-icon"><i class="ph-light ph-table"></i></span>
            <span class="nav-text">Tables</span>
            <span class="nav-arrow"><i class="bi bi-chevron-right"></i></span>
          </a>
          <ul class="nav-submenu ">
            <li><a class="nav-link " href="tables-basic.html"><span class="nav-dot"></span>Basic Tables</a></li>
            <li><a class="nav-link " href="tables-datatables.html"><span class="nav-dot"></span>DataTables</a></li>
            <li><a class="nav-link " href="tables-responsive.html"><span class="nav-dot"></span>Responsive Tables</a></li>
          </ul>
        </li> --}}

        <!-- Charts Section -->
        {{-- <li class="nav-item has-submenu ">
          <a class="nav-link" href="#" aria-expanded="false">
            <span class="nav-icon"><i class="ph-light ph-chart-line-up"></i></span>
            <span class="nav-text">Charts</span>
            <span class="nav-arrow"><i class="bi bi-chevron-right"></i></span>
          </a>
          <ul class="nav-submenu ">
            <li><a class="nav-link " href="charts-apexcharts.html"><span class="nav-dot"></span>ApexCharts</a></li>
            <li><a class="nav-link " href="charts-chartjs.html"><span class="nav-dot"></span>Chart.js</a></li>
            <li><a class="nav-link " href="charts-echarts.html"><span class="nav-dot"></span>ECharts</a></li>
          </ul>
        </li> --}}

        <!-- Icons Section -->
        {{-- <li class="nav-item has-submenu ">
          <a class="nav-link" href="#" aria-expanded="false">
            <span class="nav-icon"><i class="ph-light ph-diamond"></i></span>
            <span class="nav-text">Icons</span>
            <span class="nav-arrow"><i class="bi bi-chevron-right"></i></span>
          </a>
          <ul class="nav-submenu ">
            <li><a class="nav-link " href="icons-bootstrap.html"><span class="nav-dot"></span>Bootstrap Icons</a></li>
            <li><a class="nav-link " href="icons-remixicon.html"><span class="nav-dot"></span>Remix Icons</a></li>
            <li><a class="nav-link " href="icons-fontawesome.html"><span class="nav-dot"></span>Font Awesome</a></li>
            <li><a class="nav-link " href="icons-phosphor.html"><span class="nav-dot"></span>Phosphor Icons</a></li>
            <li><a class="nav-link " href="icons-lucide.html"><span class="nav-dot"></span>Lucide Icons</a></li>
          </ul>
        </li> --}}

        <!-- Pages Section -->
        {{-- @canany(['viewCity', 'viewCustomer'])
          <li class="nav-heading"><span>Api Pages</span></li>
          @can('viewCity')
            <li class="nav-item">
              <a class="nav-link @if (Route::currentRouteName() == 'cities') active @endif" href="{{ route('cities') }}">
                <span class="nav-icon"><i class="ph-light ph ph-city"></i></span>
                <span class="nav-text">{{ __('breadcrumbs.cities') }}</span>
              </a>
            </li>
          @endcan
          @can('viewCustomer')
            <li class="nav-item">
              <a class="nav-link @if (Route::currentRouteName() == 'customers') active @endif" href="{{ route('customers') }}">
                <span class="nav-icon"><i class="ph-light ph ph-users-four"></i></span>
                <span class="nav-text">{{ __('breadcrumbs.customers') }}</span>
              </a>
            </li>
          @endcan
        @endcanany --}}
        <!-- Invoices -->
        {{-- <li class="nav-item has-submenu ">
          <a class="nav-link" href="#" aria-expanded="false">
            <span class="nav-icon"><i class="ph-light ph-receipt"></i></span>
            <span class="nav-text">Invoices</span>
            <span class="nav-arrow"><i class="bi bi-chevron-right"></i></span>
          </a>
          <ul class="nav-submenu ">
            <li><a class="nav-link " href="invoice-list.html"><span class="nav-dot"></span>Invoice List</a></li>
            <li><a class="nav-link " href="invoice.html"><span class="nav-dot"></span>Invoice View</a></li>
          </ul>
        </li> --}}

        {{-- <li class="nav-item">
          <a class="nav-link " href="pricing.html">
            <span class="nav-icon"><i class="ph-light ph-tag"></i></span>
            <span class="nav-text">Pricing</span>
          </a>
        </li> --}}

        {{-- <li class="nav-item">
          <a class="nav-link " href="faq.html">
            <span class="nav-icon"><i class="ph-light ph-question"></i></span>
            <span class="nav-text">FAQ</span>
          </a>
        </li> --}}

        <!-- Error Pages -->
        {{-- <li class="nav-item has-submenu ">
          <a class="nav-link" href="#" aria-expanded="false">
            <span class="nav-icon"><i class="ph-light ph-warning"></i></span>
            <span class="nav-text">Error Pages</span>
            <span class="nav-arrow"><i class="bi bi-chevron-right"></i></span>
          </a>
          <ul class="nav-submenu ">
            <li><a class="nav-link " href="error-404.html"><span class="nav-dot"></span>404 Not Found</a></li>
            <li><a class="nav-link " href="error-403.html"><span class="nav-dot"></span>403 Forbidden</a></li>
            <li><a class="nav-link " href="error-500.html"><span class="nav-dot"></span>500 Server Error</a></li>
            <li><a class="nav-link " href="error-maintenance.html"><span class="nav-dot"></span>Maintenance</a></li>
            <li><a class="nav-link " href="error-coming-soon.html"><span class="nav-dot"></span>Coming Soon</a></li>
          </ul>
        </li> --}}

        {{-- <li class="nav-item">
          <a class="nav-link " href="timeline.html">
            <span class="nav-icon"><i class="ph-light ph-clock-counter-clockwise"></i></span>
            <span class="nav-text">Timeline</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link " href="search-results.html">
            <span class="nav-icon"><i class="ph-light ph-magnifying-glass"></i></span>
            <span class="nav-text">Search Results</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link " href="blank.html">
            <span class="nav-icon"><i class="ph-light ph-file"></i></span>
            <span class="nav-text">Blank Page</span>
          </a>
        </li> --}}

      </ul>
    </nav>

    <!-- Sidebar Footer -->
    <div class="sidebar-footer">
      <div class="sidebar-footer-user">
        <a href="{{ route('backend.profile') }}" class="sidebar-footer-profile">
          <img src="{{ asset('assets/img/profile-img.webp') }}" alt="{{ auth('admins')->user()->full_name }}" class="sidebar-footer-avatar">
          <div class="sidebar-footer-info">
            <div class="sidebar-footer-name">{{ auth('admins')->user()->full_name }}</div>
            <div class="sidebar-footer-role">{{ auth('admins')->user()->role_name }}</div>
          </div>
        </a>
        <div class="sidebar-footer-actions">
          {{-- <a href="settings.html" class="sidebar-footer-action" title="Settings">
            <i class="bi bi-gear"></i>
          </a> --}}
          <a href="{{ route('backend.logout') }}" class="sidebar-footer-action sidebar-footer-logout" title="Logout">
            <i class="bi bi-box-arrow-right"></i>
          </a>
        </div>
      </div>
      {{-- <a href="apps-support.html" class="sidebar-help-card">
        <span class="sidebar-help-icon"><i class="bi bi-headset"></i></span>
        <span class="sidebar-help-text">Need help? Open support desk</span>
        <i class="bi bi-arrow-up-right"></i>
      </a> --}}
    </div>
  </aside>

  <!-- Sidebar Overlay (Mobile) -->
  <div class="sidebar-overlay"></div>