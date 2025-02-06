<!DOCTYPE HTML>
<html lang="en-US">
    <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Admin Login</title>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
      <style>
        /* General Reset */
        *,
        *::before,
        *::after {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
        }
        body {
        font-family: Arial, sans-serif;
        background-color: #f0f2f5;
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 100vh;
        }
        /* Container */
        .main-div-for-intragram-image {
            text-align: center;
         }
        .container {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            background-color: #4a769c57;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: space-between;
            height: 350px;
        }
        /* Left Column */
        .left-colum-for-instragram-growth {
            align: center;
        }
        .left-colum-for-instragram-growth img {
            max-width: 40%;
            height: auto;
            margin-top: 20px;
        }
        /* Right Column */
        .right-colum-for-instragram-growth {
        padding: 30px;
        flex: 1;
        }
        .form-group {
        margin-bottom: 20px;
        }
        .form-group input {
        width: 100%;
        padding: 10px;
        font-size: 14px;
        border: 1px solid #ddd;
        border-radius: 5px;
        transition: border-color 0.3s;
        }
        .form-group input:focus {
        border-color: #6c63ff;
        outline: none;
        }
        .invalid-feedback {
        color: red;
        font-size: 0.875em;
        margin-top: 5px;
        }
        /* Recaptcha */
        .for-contact-form-captcha {
        margin-top: 15px;
        display: flex;
        justify-content: center;
        }
        /* Button */
        .div-for-contact-button {
        margin-top: 10px;
        }
        .btn-primary {
        background: linear-gradient(90deg, #fd267d, #081b66c7);
        color: #ffffff;
        /* padding: 10px 20px; */
        font-size: 16px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
        width: 400px;
        height: 42px;
        }
        .btn-primary:hover {
        background: linear-gradient(90deg, #ff6036, #fd267d);
        }
        /* Responsive Design */
        @media (max-width: 768px) {
        .container {
        flex-direction: column;
        padding: 20px;
        }
        .left-colum-for-instragram-growth {
        margin-bottom: 20px;
        }
        }
        .form-group {
        position: relative; 
        }
        .input-group {
        display: flex; 
        }
        .input-group input {
        flex: 1; 
        padding-right: 40px; 
        }
        .input-group-append {
        position: absolute;
        right: 10px; 
        top: 50%; 
        transform: translateY(-50%); 
        cursor: pointer; 
        background: transparent; 
        border: none; 
        }
        .input-group-text {
        background: none; 
        border: none; 
        }
        strong {
        font-size: 12px;
        }
        .text-center {
        text-align: center;
        }
      </style>
    </head>
    <body>
      <section>
         <div class="container">
            <form method="POST" action="{{ route('login') }}">
               @csrf
               <div class="row">
                  <div class="col-md-4 left-colum-for-instragram-growth">
                     <div class="main-div-for-intragram-image logoin">
                        <h5>Admin Login</h5>
                        <!--<img src="{{ url('public/admin/images/login.png') }}" alt="instagram-logo">-->
                     </div>
                  </div>
                  <div class="col-md-8 right-colum-for-instragram-growth">
                     <div class="instragram-growth-form-div-1">
                        <div class="left">
                           <div class="form-group cusat">
                              <input id="login" type="text" class="form-control @error('login') is-invalid @enderror" name="login" value="{{ old('login') }}" required autocomplete="login" autofocus placeholder="Enter UserName Or Email Address">
                              @error('login')
                              <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                           </div>
                           <div class="form-group cusat">
                              <div class="input-group">
                                 <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Enter Password">
                                 <div class="input-group-append" id="toggle-password">
                                    <span class="input-group-text">
                                    <i class="fas fa-eye" id="eye-icon"></i>
                                    </span>
                                 </div>
                              </div>
                              @error('password')
                              <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                           </div>
                        </div>
                     </div>
                     <div class="instragram-growth-form-div-2 top">
                        <div class="right">
                           <div class="div-for-contact-button">
                              <button type="submit" class="btn btn-primary">
                              {{ __('Login') }}
                              <i class="fas fa-arrow-right" style="margin-left: 5px;"></i>
                              </button>
                           </div><br>

                                    <!-- <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a> -->
                        </div>
                     </div>
                  </div>
               </div>
            </form>
         </div>
      </section>
      <script>
         // JavaScript to toggle password visibility
         document.getElementById('toggle-password').addEventListener('click', function () {
           const passwordInput = document.getElementById('password');
           const eyeIcon = document.getElementById('eye-icon');
           
           if (passwordInput.type === 'password') {
             passwordInput.type = 'text';
             eyeIcon.classList.remove('fa-eye');
             eyeIcon.classList.add('fa-eye-slash');
           } else {
             passwordInput.type = 'password';
             eyeIcon.classList.remove('fa-eye-slash');
             eyeIcon.classList.add('fa-eye');
           }
         });
      </script>
    </body>
</html>
