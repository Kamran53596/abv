@extends('admin.layouts.main')
@section('title', __('breadcrumbs.admin.404'))
@section('content')
    <div class="fx-error-page fx-error-404">
        <div class="fx-error-bg-shape shape-a"></div>
        <div class="fx-error-bg-shape shape-b"></div>

        <div class="fx-error-card">
            <a href="{{ route('bakcend.dashboard') }}" class="fx-error-logo"><img src="{{ asset('assets/img/logo.png') }}" alt="ABV"></a>
            <span class="fx-error-kicker">{{ __('breadcrumbs.admin.404') }}</span>
            <h1 class="fx-error-code">404</h1>
            <h2 class="fx-error-title">{{ __('general.not_found') }}</h2>
            <p class="fx-error-text">{{ __('general.404_desc') }}</p>
            <div class="fx-error-actions">
            <a href="{{ route('bakcend.dashboard') }}" class="btn btn-primary"><i class="bi bi-house me-1"></i> {{ __('general.back_home') }}</a>
            <a href="#" class="btn btn-outline-secondary" onclick="history.back(); return false;"><i class="bi bi-arrow-left me-1"></i> {{ __('general.go_back') }}</a>
            </div>
        </div>
    </div>
@endsection