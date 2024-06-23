<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/stylestyle.css') }}">
    <title>KnoWell Register Page</title>
</head>
<body>
    <div class="container" id="container">
        <div class="form-container sign-in ">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <h1>Create Account</h1>
                <br>
                <span>Enter your details for registration</span>
                <input type="text" placeholder="Name" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" >
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                <input type="email" placeholder="Email" name="email" value="{{ old('email') }}" required required autocomplete="username">
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                <input type="password" placeholder="Password" name="password" required autocomplete="new-password">
                <x-input-error :messages="$errors->get('password')" class="mt-2" />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                <input type="password" placeholder="Confirm Password" name="password_confirmation" required autocomplete="new-password">
                 
                    
                <input type="text" placeholder="Age" name="age" value="{{ old('age') }}" required>
                <input type="text" placeholder="Phone Number" name="mobile" value="{{ old('mobile') }}" required>
                <input type="text" placeholder="Country" name="country" value="{{ old('country') }}" required>
                <button type="submit">Sign Up</button>
            </form>
        </div>

        <div class="form-container sign-up">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <h1>Sign In</h1>
                <br>
                <span>Enter your email and password</span>
                <input type="email" placeholder="Email" name="email" value="{{ old('email') }}" required>
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                <input type="password" placeholder="Password" name="password" required>
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                <a href="{{ route('password.request') }}">Forget Your Password?</a>
                <button type="submit">Sign In</button>
            </form>
        </div>

        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Hello, Friend!</h1>
                    <p>Register with your personal details to use all of site features</p>
                    
                    <button class="hidden" id="login">Sign Up</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Welcome Back!</h1>
                    <p>Enter your personal details to use all of site features</p>
                    <button class="hidden" id="register">Sign In</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const container = document.getElementById('container');
            const signUpButton = document.getElementById('register');
            const signInButton = document.getElementById('login');

            signUpButton.addEventListener('click', () => {
                container.classList.add('right-panel-active');
            });

            signInButton.addEventListener('click', () => {
                container.classList.remove('right-panel-active');
            });
        });
    </script>
    <script src="{{ asset('assets/js/script1.js') }}"></script>
</body>
</html>
