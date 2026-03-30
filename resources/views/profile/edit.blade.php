@extends('backend.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Edit Profile</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-6 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-3">Profile Information</h5>
                    <p class="text-muted mb-3">Update your account's profile information and email address.</p>

                    @if (session('status') === 'profile-updated')
                        <div class="alert alert-success">Profile updated successfully.</div>
                    @endif

                    <form method="POST" action="{{ route('profile.update') }}">
                        @csrf
                        @method('PATCH')

                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror"
                                value="{{ old('name', $user->name) }}" required autofocus autocomplete="name">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                value="{{ old('email', $user->email) }}" required autocomplete="username">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                            <div class="alert alert-warning">
                                Your email address is unverified.
                                <button type="submit" form="send-verification" class="btn btn-link p-0 ms-1 align-baseline">
                                    Click here to re-send the verification email.
                                </button>
                            </div>
                        @endif

                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </form>

                    <form id="send-verification" method="POST" action="{{ route('verification.send') }}" class="d-none">
                        @csrf
                    </form>

                    @if (session('status') === 'verification-link-sent')
                        <div class="alert alert-success mt-3">
                            A new verification link has been sent to your email address.
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-xl-6 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-3">Update Password</h5>
                    <p class="text-muted mb-3">Use a strong password to keep your account secure.</p>

                    @if (session('status') === 'password-updated')
                        <div class="alert alert-success">Password updated successfully.</div>
                    @endif

                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="current_password" class="form-label">Current Password</label>
                            <input type="password" id="current_password" name="current_password"
                                class="form-control @if($errors->updatePassword->has('current_password')) is-invalid @endif"
                                autocomplete="current-password">
                            @if ($errors->updatePassword->has('current_password'))
                                <div class="invalid-feedback">{{ $errors->updatePassword->first('current_password') }}</div>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">New Password</label>
                            <input type="password" id="password" name="password"
                                class="form-control @if($errors->updatePassword->has('password')) is-invalid @endif"
                                autocomplete="new-password">
                            @if ($errors->updatePassword->has('password'))
                                <div class="invalid-feedback">{{ $errors->updatePassword->first('password') }}</div>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                            <input type="password" id="password_confirmation" name="password_confirmation"
                                class="form-control @if($errors->updatePassword->has('password_confirmation')) is-invalid @endif"
                                autocomplete="new-password">
                            @if ($errors->updatePassword->has('password_confirmation'))
                                <div class="invalid-feedback">{{ $errors->updatePassword->first('password_confirmation') }}</div>
                            @endif
                        </div>

                        <button type="submit" class="btn btn-primary">Update Password</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card border-danger">
                <div class="card-body">
                    <h5 class="card-title text-danger mb-3">Delete Account</h5>
                    <p class="text-muted mb-3">
                        Once your account is deleted, all of its resources and data will be permanently deleted.
                        Please enter your password to confirm.
                    </p>

                    <form method="POST" action="{{ route('profile.destroy') }}" onsubmit="return confirm('Are you sure you want to delete your account? This action cannot be undone.');">
                        @csrf
                        @method('DELETE')

                        <div class="mb-3">
                            <label for="delete_password" class="form-label">Password</label>
                            <input type="password" id="delete_password" name="password"
                                class="form-control @if($errors->userDeletion->has('password')) is-invalid @endif"
                                autocomplete="current-password" placeholder="Enter your password">
                            @if ($errors->userDeletion->has('password'))
                                <div class="invalid-feedback">{{ $errors->userDeletion->first('password') }}</div>
                            @endif
                        </div>

                        <button type="submit" class="btn btn-danger">Delete Account</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
