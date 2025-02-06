@extends('layouts.master')
@section('content')
<div class="content-wrapper">
   <section class="content">
      <div class="container-fluid">
         <div class="row">
            <div class="col-md-6">
               <h2 class="mb-3">All Products List</h2>
            </div>
         </div>
         <div class="row">
            <div class="col-12">
               <div class="card">
                  <div class="card-body">
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
                     <!--start table-->
                     <table class="table table-head-fixed text-nowrap" id="productsTable">
                        <thead>
                           <tr>
                              <th>ID</th>
                              <th>Product Name</th>
                              <th>Desciption</th>
                              <th>Category Name</th>
                              <th>Image</th>
                              <th>Action</th>
                           </tr>
                        </thead>
                        <tbody>
                           @if(count($all_products) >= 1)
                           @php $count = 1; @endphp
                           @foreach($all_products as $product)
                           <tr>
                              <td>{{ $count }}.</td>
                              <td>{{ $product->name }}</td>
                              <td>{{ $product->description }}</td>
                              <td>{{ $product['categories_detail']['0']['name'] ??'-' }}</td>
                              <td>
                                 @if($product->image)
                                 <img src="{{ asset('public/uploads/products/'. $product->image) }}" alt="product Image" width="100" height="100">
                                 @else
                                 -
                                 @endif
                              </td>
                              <td class="project-actions text-left">
                                 <a class="btn btn-info btn-sm" href="{{ url('admin/edit-product',$product->id) }}"><i class="fas fa-pencil-alt"></i>Edit</a>
                                 <a class="btn btn-danger btn-sm delete_product_record" data-product_id="{{ $product->id }}"><i class="fas fa-trash" aria-hidden="true"></i>Delete</a>                           
                              </td>
                           </tr>
                           @php $count++; @endphp
                           @endforeach
                           @endif
                        </tbody>
                     </table>
                     <!--end table-->
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
</div>
@endsection