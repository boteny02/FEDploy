@extends('auth.layouts.master')
@section('title', __('No Admission'))
@section('content')

<!-- Start Content-->
<div class="card">
    <div class="card-body text-center">
        <div class="mb-4">
            <i class="feather icon-alert-triangle auth-icon text-warning"></i>
        </div>
        <h3 class="mb-4">No Admission Ongoing</h3>

        <div class="alert alert-warning" role="alert">
            <p class="mb-0">Sorry! Currently there are no admission programs available.</p>
            <p class="mb-0">Please check back later or contact the administration for more information.</p>
        </div>

        @if (Route::has('student.login'))
        <p class="mb-0 text-muted mt-4">
            <a href="{{ route('student.login') }}" class="btn btn-outline-primary">
                {{ __('Back to Login') }}
            </a>
        </p>
        @endif
    </div>
</div>
<!-- End Content-->

@endsection
