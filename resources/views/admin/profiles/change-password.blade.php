@extends('admin.layouts.master')
@section('content')
<div class="content-wrapper">
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
            </div>
            <div class="col-sm-6">
            </div>
         </div>
      </div>
   </section>
   <section class="content">
      <div class="row">
         <div class="col-md-12">
            <!--start response-->
            @if (Session::has('success')) 
            <div class="notifaction-green">
               <p>{{ Session::get('success') }}</p>
            </div>
            @endif 
            @if (Session::has('unsuccess')) 
            <div class="notifaction-red">
               <p> {{ Session::get('unsuccess') }}</p>
            </div>
            @endif 
            <!--end response-->
            <div class="card card-secondary add-new-employee">
               <div class="card-header">
                  <h3 class="card-title">Changed Password</h3>
               </div>
               <div class="card-body">
                  <form action="{{ route('admin.submit.change.password', $user_profile->id) }}" method="POST" enctype="multipart/form-data">
                     @csrf 
                     <div class="card-body">
                        <div class="form-group">
                           <label for="email">Email</label>
                           <input type="email" name="email" value="{{ $user_profile->email }}" class="form-control email-disabled" id="email" readonly>
                        </div>
                        <div class="form-group">
                           <label for="current_password">Current Password</label>
                           <div class="input-group">
                              <input type="password" name="current_password" id="current_password" class="form-control" placeholder="Enter Current Password" required>
                              <div class="input-group-append">
                                 <span class="input-group-text field-icon toggle-password" toggle="#current_password"><i class="fas fa-eye"></i></span>
                              </div>
                           </div>
                        </div>
                        <div class="form-group">
                           <label for="password">New Password</label>
                           <div class="input-group">
                              <input type="password" name="password" id="password" class="form-control" placeholder="Create New Password" required>
                              <div class="input-group-append">
                                 <span class="input-group-text field-icon toggle-password" toggle="#password"><i class="fas fa-eye"></i></span>
                              </div>
                           </div>
                        </div>
                        <div class="form-group">
                           <label for="confirm_password">Confirm Password</label>
                           <div class="input-group">
                              <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Enter Confirm Password" required>
                              <div class="input-group-append">
                                 <span class="input-group-text field-icon toggle-password" toggle="#confirm_password"><i class="fas fa-eye"></i></span>
                              </div>
                           </div>
                        </div>
                        <div class="form-group full-button-row">
                           <button class="btn btn-success" type="submit">Update</button>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </section>
</div>
<script>
   //JavaScript to toggle password visibility 
   document.addEventListener('DOMContentLoaded', function() {
      document.querySelectorAll('.toggle-password').forEach(function(element) {
          element.addEventListener('click', function() {
              var input = document.querySelector(this.getAttribute('toggle'));
              if (input.type === 'password') {
                  input.type = 'text';
              } else {
                  input.type = 'password';
              }
              this.querySelector('i').classList.toggle('fa-eye');
              this.querySelector('i').classList.toggle('fa-eye-slash');
          });
      });
   });
</script>
@endsection