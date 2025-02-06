@extends('layouts.master')
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
            <div class="card card-secondary add-new-employee">
               <div class="card-header">
                  <h3 class="card-title">Add New product</h3>
               </div>
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
               <div class="card-body">
                  <form action="{{ route('submit.product') }}" method="POST" enctype="multipart/form-data">
                     @csrf
                     <div class="form-group">
                        <label for="first_name">Product Name</label>
                        <input type="text" id="product_name" name="product_name" class="form-control"
                           placeholder="Enter Prdouct Name" required>
                     </div>
                     <div class="form-group">
                        <label for="name">Description</label>
                        <textarea type="text" id="description" name="description" class="form-control"
                           placeholder="Enter Description" required></textarea>
                     </div>
                     <div class="form-group">
                        <label for="name">Categories</label>
                        <select name="category_name" id="category_name" class="form-control custom-select" required>
                           <option value="" disabled selected>Please Select</option>
                           @foreach($all_categories as $category)
                           <option value="{{ $category->id }}">{{ $category->name }}</option>
                           @endforeach
                        </select>
                     </div>
                     <div class="form-group">
                        <label for="name">Image</label>
                        <input type="file" id="image" name="image" class="form-control" >
                     </div>
                     <div class="form-group">
                        <button class="btn btn-success" type="submit">Submit</button>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </section>
</div>
@endsection