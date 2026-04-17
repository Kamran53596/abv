@extends('admin.layouts.main')
@section('title', __('breadcrumbs.admin.500'))
@section('content')
    <div class="fx-error-page fx-error-500">
        <div class="fx-error-bg-shape shape-a"></div>
        <div class="fx-error-bg-shape shape-b"></div>

        <div class="fx-error-card">
            <a href="{{ route('backend.dashboard') }}" class="fx-error-logo"><img src="{{ asset('assets/img/logo.png') }}" alt="ABV"></a>
            <span class="fx-error-kicker">{{ __('breadcrumbs.500') }}</span>
            <span class="fx-error-icon danger"><i class="bi bi-exclamation-octagon"></i></span>
            <h2 class="fx-error-title">Internal server issue</h2>
            <p class="fx-error-text">A temporary server error interrupted your request. Our monitoring system has already captured this incident.</p>
            <div class="fx-error-actions">
                <button class="btn btn-primary" onclick="location.reload()"><i class="bi bi-arrow-clockwise me-1"></i> Try Again</button>
                <a href="{{ route('backend.dashboard') }}" class="btn btn-outline-secondary"><i class="bi bi-house me-1"></i> {{ __('general.back_home') }}</a>
            </div>
        </div>
    </div>
@endsection