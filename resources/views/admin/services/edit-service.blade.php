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
                  <h3 class="card-title">Edit Service</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.update.service', $service_detail->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" id="title" name="title" class="form-control" value="{{ $service_detail->title }}" placeholder="Enter Title">
                        </div>
                        <div class="form-group">
                            <label for="sub_title">Sub Title</label>
                            <input type="text" id="sub_title" name="sub_title" class="form-control" value="{{ $service_detail->sub_title }}" placeholder="Enter Sub Title">
                        </div>
                        <div class="form-group">
                            <label for="desc">Description</label>
                            <input type="text" id="desc" name="desc" value="{{ $service_detail->desc }}" class="form-control"
                            placeholder="Enter Description"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">File input</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="image" id="exampleInputFile" onchange="previewImage(event)">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Upload</span>
                                </div>
                            </div>
                        </div>
                            <div id="imagePreviewContainer" style="margin-top: 20px;">
                                <img id="imagePreview" src="" alt="Selected Image" style="display: none; max-width: 150px; height: auto; border: 1px solid #ddd; padding: 5px;"/>
                            </div>
                        @if ($service_detail->image)
                            <img id="dynamicImage" src = "{{ asset('public/uploads/services/' .$service_detail->image) }}" width="80" height="60">
                        @endif<br>
                        <div class="form-group">
                            <label>Status</label>
                            <select class="custom-select" name="status">
                            <option value="" disabled selected>Select Status</option>
                            <option value="Active" @if($service_detail->status == 'Active') selected @endif>Active</option>
                            <option value="Pending" @if($service_detail->status == 'Pending') selected @endif>Pending</option>
                            <option value="Suspend" @if($service_detail->status == 'Suspend') selected @endif>Suspend</option>
                            <option value="Approved" @if($service_detail->status == 'Approved') selected @endif>Approved</option>
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