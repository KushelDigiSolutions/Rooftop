<!-- Add this inside the <head> tag -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

<style>
  
  
  .login-card {
    border-radius: 1rem;
    overflow: hidden;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
  }
  
  .login-img {
    height: 100%;
    object-fit: cover;
  }
  
  .brand-logo {
    color: #2a3d97;
  }
  
  .login-btn {
    background: #2a3d97;
    border: none;
    padding: 0.7rem 0;
    font-weight: 600;
  }
  
  .login-btn:hover {
    background: #2a3d97;
  }
</style>

<section class="vh-100 login-section">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-xl-10">
                <div class="card login-card">
                    <div class="row g-0">
                        <!-- Left Side Image -->
                        <div class="col-md-6 col-lg-5 d-none d-md-flex">
                            <img src="https://images.unsplash.com/photo-1516321318423-f06f85e504b3?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80"
                                alt="Login illustration" class="img-fluid login-img" />
                        </div>

                        <!-- Right Side Form -->
                        <div class="col-md-6 col-lg-7 d-flex align-items-center">
                            <div class="card-body p-4 p-lg-5">
                                <!-- Logo -->
                                <div class="text-center mb-5">
    <div class="mb-3">
        <img src="{{ asset('images/rooftop_logo.png') }}" alt="Rooftop Logo" class="brand-logo" style="height: 60px;">
    </div>
    
</div>

                                <!-- Login Form -->
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf

                                    <!-- Email Field -->
                                    <div class="mb-4">
                                        <label for="email" class="form-label">{{ __('Email Address') }}</label>
                                        <div class="input-group">
                                            <span class="input-group-text">
                                                <i class="fas fa-envelope"></i>
                                            </span>
                                            <input id="email" type="email"
                                                class="form-control @error('email') is-invalid @enderror"
                                                name="email" value="{{ old('email') }}" 
                                                required autocomplete="email" autofocus
                                                placeholder="Enter your email">
                                        </div>
                                        @error('email')
                                            <div class="invalid-feedback d-block">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <!-- Password Field -->
                                    <div class="mb-4">
                                        <label for="password" class="form-label">{{ __('Password') }}</label>
                                        <div class="input-group">
                                            <span class="input-group-text">
                                                <i class="fas fa-lock"></i>
                                            </span>
                                            <input id="password" type="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                name="password" required autocomplete="current-password"
                                                placeholder="Enter your password">
                                        </div>
                                        @error('password')
                                            <div class="invalid-feedback d-block">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <!-- Remember Me & Forgot Password -->
                                    <div class="d-flex justify-content-between mb-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                            <label class="form-check-label" for="remember">
                                                {{ __('Remember Me') }}
                                            </label>
                                        </div>
                                        @if (Route::has('password.request'))
                                            <a href="{{ route('password.request') }}" class="text-decoration-none">
                                                Forgot Password?
                                            </a>
                                        @endif
                                    </div>

                                    <!-- Submit Button -->
                                    <div class="d-grid gap-2">
                                        <button type="submit" class="btn login-btn btn-lg text-white">
                                            <i class="fas fa-sign-in-alt me-2"></i> {{ __('Login') }}
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Add this before the closing </body> tag -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>