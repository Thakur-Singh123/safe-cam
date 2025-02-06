
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
                  <h3 class="card-title">Edit Contact</h3>
               </div>
                <div class="card-body">
                    <form action="{{ route('admin.update.contact', $contact_detail->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name" class="form-control" value="{{ $contact_detail->name }}" placeholder="Enter Name">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" class="form-control" value="{{ $contact_detail->email }}" placeholder="Enter Email">
                        </div>
                        <div class="form-group">
                            <label for="subject">Subject</label>
                            <input type="text" id="subject" name="subject" class="form-control" value="{{ $contact_detail->subject }}" placeholder="Enter Subject">
                        </div>
                        <div class="form-group">
                            <label for="message">Message</label>
                            <input type="text" id="message" name="message" class="form-control" value="{{ $contact_detail->message }}" placeholder="Enter Message">
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <select class="custom-select" name="status">
                            <option value="" disabled selected>Select Status</option>
                            <option value="Active" @if($contact_detail->status == 'Active') selected @endif>Active</option>
                            <option value="Pending" @if($contact_detail->status == 'Pending') selected @endif>Pending</option>
                            <option value="Suspend" @if($contact_detail->status == 'Suspend') selected @endif>Suspend</option>
                            <option value="Approved" @if($contact_detail->status == 'Approved') selected @endif>Approved</option>
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