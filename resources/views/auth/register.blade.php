<!DOCTYPE HTML>
<html lang="en-US">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Registration</title>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
      <style>
        /* General Reset */
        * {
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
        .container {
        max-width: 500px;
        margin: 0 auto;
        padding: 20px;
        background-color: #ffffff;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: space-between;
        background: #0b4e119e;
        height: 480px;
        }
        /* Left Column */
        .left-colum-for-instragram-growth {
        text-align: center;
        }
        .left-colum-for-instragram-growth img {
        max-width: 80%;
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
        /* Button */
        .div-for-contact-button {
        margin-top: 10px;
        }
        .btn-primary {
        background: linear-gradient(90deg, #fd267d, #081b66c7);
        color: #ffffff;
        font-size: 14px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
        width: 100%;
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
            <form method="POST" action="{{ route('register') }}">
               @csrf
               <div class="row">
                  <div class="col-md-4 left-colum-for-instragram-growth">
                     <div class="main-div-for-intragram-image">
                        <h5>Registration</h5>
                        <!-- <img src="{{ url('public/admin/images/register.png') }}" alt="instagram-logo"> -->
                     </div>
                  </div>
                  <div class="col-md-8 right-colum-for-instragram-growth">
                     <div class="instragram-growth-form-div-1">
                        <div class="left">
                           <div class="form-group cusat">
                              <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Enter Your Name">
                              @error('name')
                              <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                           </div>
                           <div class="form-group cusat">
                              <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Enter Email Address">
                              @error('email')
                              <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                           </div>
                           <div class="form-group cusat">
                              <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address" autofocus placeholder="Enter Address">
                              @error('address')
                              <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                           </div>
                           <div class="form-group cusat">
                              <input id="mobile" type="text" class="form-control @error('mobile') is-invalid @enderror" name="mobile" value="{{ old('mobile') }}" required autocomplete="address" autofocus placeholder="Enter Mobile">
                              @error('mobile')
                              <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                           </div>
                           <div class="form-group">
                              <label for="gender">Gender</label>
                              <select id="gender" class="form-control @error('gender') is-invalid @enderror" name="gender" required>
                                 <option value="" disabled selected>Select Gender</option>
                                 <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                                 <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                                 <option value="other" {{ old('gender') == 'other' ? 'selected' : '' }}>Other</option>
                              </select>
                              @error('gender')
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
                           <div class="form-group cusat">
                              <div class="input-group">
                                 <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Enter Confirm Password">
                                 <div class="input-group-append" id="toggle-confirm-password">
                                    <span class="input-group-text">
                                    <i class="fas fa-eye" id="confirm-eye-icon"></i>
                                    </span>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="instragram-growth-form-div-2 top">
                        <div class="right">
                           <div class="div-for-contact-button">
                              <button type="submit" class="btn btn-primary">
                              {{ __('Create Account') }}
                              </button>
                           </div><br>
                           <p class="text-center">
                                Already have an account? <a href="{{ route('login') }}">Login here</a>
                            </p>
                        </div>
                     </div>                     
                  </div>
               </div>
            </form>
         </div>
        </section>
        <script>
            //toggle password visibility
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
            //toggle confirm password visibility
            document.getElementById('toggle-confirm-password').addEventListener('click', function () {
                const confirmPasswordInput = document.getElementById('password-confirm');
                const confirmEyeIcon = document.getElementById('confirm-eye-icon');
                
                if (confirmPasswordInput.type === 'password') {
                    confirmPasswordInput.type = 'text';
                    confirmEyeIcon.classList.remove('fa-eye');
                    confirmEyeIcon.classList.add('fa-eye-slash');
                } else {
                    confirmPasswordInput.type = 'password';
                    confirmEyeIcon.classList.remove('fa-eye-slash');
                    confirmEyeIcon.classList.add('fa-eye');
                }
            });
        </script>
    </body>
</html>
