@extends('backend.layouts.app')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-12">
			<div class="page-title-box">
				<h4 class="page-title">{{ __('Edit Profile') }}</h4>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-xl-6 col-lg-12">
			<div class="card">
				<div class="card-body">
					<h5 class="card-title mb-3">{{ __('Profile Information') }}</h5>
					<p class="text-muted mb-3">
						{{ __("Update your account's profile information and email address.") }}
					</p>

					@if (session('status') === 'profile-updated')
					<div class="alert alert-success">
						{{ __('Profile updated successfully.') }}</div>
					@endif

					<form method="POST" action="{{ route('profile.update') }}">
						@csrf
						@method('PATCH')

						<div class="mb-3">
							<label for="name" class="form-label">{{ __('Name') }}</label>
							<input type="text" id="name" name="name"
								class="form-control @error('name') is-invalid @enderror"
								value="{{ old('name', $user->name) }}"
								required autofocus autocomplete="name">
							@error('name')
							<div class="invalid-feedback">{{ $message }}</div>
							@enderror
						</div>

						<div class="mb-3">
							<label for="email"
								class="form-label">{{ __('Email') }}</label>
							<input type="email" id="email" name="email"
								class="form-control @error('email') is-invalid @enderror"
								value="{{ old('email', $user->email) }}"
								required autocomplete="username">
							@error('email')
							<div class="invalid-feedback">{{ $message }}</div>
							@enderror
						</div>

						@if ($user instanceof
						\Illuminate\Contracts\Auth\MustVerifyEmail && !
						$user->hasVerifiedEmail())
						<div class="alert alert-warning">
							{{ __('Your email address is unverified.') }}
							<button type="submit" form="send-verification"
								class="btn btn-link p-0 ms-1 align-baseline">
								{{ __('Click here to re-send the verification email.') }}
							</button>
						</div>
						@endif

						<button type="submit"
							class="btn btn-primary">{{ __('Save Changes') }}</button>
					</form>

					<form id="send-verification" method="POST"
						action="{{ route('verification.send') }}" class="d-none">
						@csrf
					</form>

					@if (session('status') === 'verification-link-sent')
					<div class="alert alert-success mt-3">
						{{ __('A new verification link has been sent to your email address.') }}
					</div>
					@endif
				</div>
			</div>
		</div>

		<div class="col-xl-6 col-lg-12">
			<div class="card">
				<div class="card-body">
					<h5 class="card-title mb-3">{{ __('Update Password') }}</h5>
					<p class="text-muted mb-3">
						{{ __('Use a strong password to keep your account secure.') }}
					</p>

					@if (session('status') === 'password-updated')
					<div class="alert alert-success">
						{{ __('Password updated successfully.') }}</div>
					@endif

					<form method="POST" action="{{ route('password.update') }}">
						@csrf
						@method('PUT')

						<div class="mb-3">
							<label for="current_password"
								class="form-label">{{ __('Current Password') }}</label>
							<input type="password" id="current_password"
								name="current_password"
								class="form-control @if($errors->updatePassword->has('current_password')) is-invalid @endif"
								autocomplete="current-password">
							@if($errors->updatePassword->has('current_password'))
							<div class="invalid-feedback">
								{{ $errors->updatePassword->first('current_password') }}
							</div>
							@endif
						</div>

						<div class="mb-3">
							<label for="password" class="form-label">{{ __('New Password') }}</label>
							<input type="password" id="password"
								name="password"
								class="form-control @if($errors->updatePassword->has('password')) is-invalid @endif"
								autocomplete="new-password">
							@if ($errors->updatePassword->has('password'))
							<div class="invalid-feedback">
								{{ $errors->updatePassword->first('password') }}
							</div>
							@endif
						</div>

						<div class="mb-3">
							<label for="password_confirmation"
								class="form-label">{{ __('Confirm Password') }}</label>
							<input type="password" id="password_confirmation"
								name="password_confirmation"
								class="form-control @if($errors->updatePassword->has('password_confirmation')) is-invalid @endif"
								autocomplete="new-password">
							@if($errors->updatePassword->has('password_confirmation'))
							<div class="invalid-feedback">
								{{ $errors->updatePassword->first('password_confirmation') }}
							</div>
							@endif
						</div>

						<button type="submit"
							class="btn btn-primary">{{ __('Update Password') }}</button>
					</form>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-12">
			<div class="card border-danger">
				<div class="card-body">
					<h5 class="card-title text-danger mb-3">{{ __('Delete Account') }}</h5>
					<p class="text-muted mb-3">
						{{ __('Once your account is deleted, all of its resources and data will be permanently deleted.') }}
						{{ __('Please enter your password to confirm.') }}
					</p>

					<form method="POST" action="{{ route('profile.destroy') }}">
						@csrf
						@method('DELETE')

						<div class="mb-3">
							<label for="delete_password"
								class="form-label">{{ __('Password') }}</label>
							<input type="password" id="delete_password"
								name="password"
								class="form-control @if($errors->userDeletion->has('password')) is-invalid @endif"
								autocomplete="current-password"
								placeholder="{{ __('Enter your password') }}">
							@if ($errors->userDeletion->has('password'))
							<div class="invalid-feedback">
								{{ $errors->userDeletion->first('password') }}
							</div>
							@endif
						</div>

						<button type="submit"
							class="btn btn-danger">{{ __('Delete Account') }}</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection