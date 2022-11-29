<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form by Colorlib</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="assets/Signup/colorlib-regform-9/fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="assets/Signup/colorlib-regform-9/css/style.css">
</head>
<body>

    <div class="main"> <!-- sign up -->

        <div class="container">
            
            <div class="signup-content">
                @if ($errors ->any())
            <div class="alert alert-danger">Invalid data entered. Please double check the data!</div>
        @endif
                <form action="" method="POST" id="signup-form" class="signup-form">
                    @csrf
                    <h2>Sign up </h2>
                    <p class="desc"> <span>“Batman Beyond”</span></p>
                    <div class="form-group">
                        <input type="text" class="form-input" name="user_name" id="user_name" placeholder="Your Name" value="{{old('user_name')}}"/>
                        @error('user_name')
                            <span style="color: red">{{$message}} </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-input" name="user_email" id="user_email " placeholder="Email" value="{{old('user_email')}}"/>
                        @error('user_email')
                            <span style="color: red">{{$message}} </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-input" name="user_phoneNumber" id="user_phoneNumber" placeholder="phone" value="{{old('user_phoneNumber')}}"/>
                        @error('user_phoneNumber')
                            <span style="color: red">{{$message}} </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-input" name="user_address" id="user_address" placeholder="address" value="{{old('user_address')}}"/>
                        @error('user_address')
                            <span style="color: red">{{$message}} </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-input" name="user_password" id="password" placeholder="Password" value="{{old('user_password')}}"/>
                        @error('user_password')
                            <span style="color: red">{{$message}} </span>
                        @enderror
                        <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                        <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" id="submit" class="form-submit submit" value="Sign up"/>
                        <a href="" class="submit-link submit">Sign in</a>
                    </div>
                </form>
            </div>
        </div>

    </div>

    <!-- JS -->
    <script src="assets/Signup/colorlib-regform-9/vendor/jquery/jquery.min.js"></script>
    <script src="assets/Signup/colorlib-regform-9/js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>