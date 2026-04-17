@extends('admin.layouts.main')
@section('title', __('breadcrumbs.admin.login'))
@section('content')
    <div class="fauth fauth-split">
        <aside class="fauth-visual">
          <a href="{{ route('backend.dashboard') }}" class="fauth-logo">
            <img src="{{ asset('assets/img/logo.png') }}" alt="ABV">
            <span>ABV Admin</span>
          </a>
          {{-- <h2 class="fauth-visual-title">Command your operations from one modern control center.</h2>
          <p class="fauth-visual-text">Track growth, team activity, and operational risk with a dashboard built for fast decisions.</p> --}}
        </aside>

        <main class="fauth-main">
          <div class="fauth-main-inner">
            <div class="fauth-card">
              <div class="fauth-card-head">
                <h1 class="fauth-title">{{ __('general.welcome_back') }}</h1>
                <p class="fauth-subtitle">{{ __('general.auth_subtitle') }}</p>
              </div>

              <form class="fauth-form" method="POST" action="{{ route('backend.login') }}">
                @csrf
                <div class="fauth-field">
                  <label for="email" class="form-label">{{ __('general.text_email') }}</label>
                  <input type="email" class="form-control" id="email" value="{{ old('email') }}" name="email" placeholder="name@example.com" required>
                  @if ($errors->first('email'))
                      <div class="invalid-feedback" style="display: block">{{ $errors->first('email') }}</div>
                  @endif
                </div>

                <div class="fauth-field">
                  <div class="fauth-row-between">
                    <label for="password" class="form-label">{{ __('general.text_password') }}</label>
                    {{-- <a href="auth-forgot-password.html" class="fauth-link">Forgot password?</a> --}}
                  </div>
                  <div class="input-group">
                    <input type="password" class="form-control" id="password" name="password" placeholder="{{ __('general.entry_password') }}" required>
                    <button class="btn btn-outline-secondary password-toggle" type="button" data-toggle-password>
                      <i class="bi bi-eye"></i>
                    </button>
                  </div>
                </div>

                {{-- <div class="fauth-row-between mb-3">
                  <div class="form-check mb-0">
                    <input class="form-check-input" type="checkbox" id="remember" name="remember">
                    <label class="form-check-label" for="remember">Remember me</label>
                  </div>
                </div> --}}

                <button type="submit" class="btn btn-primary w-100">{{ __('general.text_login') }}</button>
              </form>
            </div>

            <footer class="footer-centered">
              <div class="footer-copyright">&copy; {{ date('Y') }} ABV. All Rights Reserved.</div>
            </footer>
          </div>
        </main>
    </div>
@endsection