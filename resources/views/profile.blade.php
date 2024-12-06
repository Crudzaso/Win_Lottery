@extends('layouts.app') <!-- Extiende el layout base -->

@section('content') <!-- Sección de contenido -->
<div class="card">
    <div class="card-header">
        <h2 class="card-title fw-bold">User  Profile</h2>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-4">
                <div class="text-center">
                    <div class="symbol symbol-150px symbol-circle mb-3">
                        <img src="{{ asset('assets/media/avatars/300-13.jpg') }}" alt="Profile Picture" />
                    </div>
                    <h4 class="fw-bold">Max Smith</h4>
                    <div class="text-muted">Web Developer</div>
                </div>
            </div>
            <div class="col-md-8">
                <h5 class="fw-bold">Personal Information</h5>
                <div class="mb-4">
                    <span class="fw-semibold">Email:</span>
                    <span class="text-muted">max@kt.com</span>
                </div>
                <div class="mb-4">
                    <span class="fw-semibold">Phone:</span>
                    <span class="text-muted">(123) 456-7890</span>
                </div>
                <div class="mb-4">
                    <span class="fw-semibold">Address:</span>
                    <span class="text-muted">123 Main St, City, Country</span>
                </div>
                <h5 class="fw-bold">Account Settings</h5>
                <div class="mb-4">
                    <span class="fw-semibold">Subscription:</span>
                    <span class="text-muted">Pro</span>
                </div>
                <div class="mb-4">
                    <span class="fw-semibold">Status:</span>
                    <span class="text-muted">Active</span>
                </div>
            </div>
        </