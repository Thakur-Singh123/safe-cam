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
                  <h3 class="card-title">Edit Profile</h3>
               </div>
               <div class="card-body">
                  <form action="{{ route('admin.update.profile', $user_profile->id) }}" method="POST" enctype="multipart/form-data">
                     @csrf
                     <div class="avatar-upload">
                        <div class="avatar-edit">
                           <input type="file" name="admin_profile_pic" id="imageUpload" accept=".png, .jpg, .jpeg">
                           <label for="imageUpload"><i class="fas fa-pencil-alt"></i></label>
                        </div>
                        <div class="add-new-student-pic">
                           <div class="avatar-preview">
                              @if($user_profile->avatar)
                              <img id="imagePreview" src="{{ url('public/uploads/users/' .$user_profile->avatar) }}" alt="User Avatar">
                              @else
                              <img id="imagePreview" src="{{ url('public/uploads/users/default.png') }}" alt="Default Avatar">
                              @endif
                           </div>
                        </div>
                     </div>
                     <br>
                     <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" class="form-control" value="{{ $user_profile->name }}"
                           placeholder="Enter Name">
                     </div>
                     <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" class="form-control" value="{{ $user_profile->email }}" disabled="email"
                           placeholder="Enter Email Address"></textarea>
                     </div>
                     <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" id="address" name="address" class="form-control" value="{{ $user_profile->address }}"
                           placeholder="Enter Address">
                     </div>
                     <div class="form-group">
                        <label for="mobile">Mobile</label>
                        <input type="text" id="mobile" name="mobile" class="form-control" value="{{ $user_profile->mobile }}"
                           placeholder="Enter mobile">
                     </div>
                     <div class="form-group">
                        <label for="gender">Gender</label>
                        <select id="gender" name="gender" class="form-control">
                           <option value="" disabled selected>Select Gender</option>
                           <option value="male" @if($user_profile->gender == 'male') selected @endif>Male</option>
                           <option value="female" @if($user_profile->gender == 'female') selected @endif>Female</option>
                           <option value="other" @if($user_profile->gender == 'other') selected @endif>Other</option>
                        </select>
                     </div>
                     <div class="form-group">
                        <button class="btn btn-success" type="submit">Update</button>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </section>
</div>
@endsection