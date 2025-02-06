@extends('admin.layouts.master')
@section('content')
<div class="content-wrapper">
   <section class="content">
      <div class="container-fluid">
         <div class="row">
            <div class="col-md-6">
               <h2 class="mb-3">All Testimonials</h2>
            </div>
            <!--start responses-->
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
            <!--start responses-->
         </div>
         <div class="row">
            <div class="col-12">
               <div class="card">
                  <div class="card-body">
                     <!--start table-->
                     <table class="table table-head-fixed text-nowrap" id="slider_id">
                        <thead>
                           <tr>
                              <th>Sr. No</th>
                              <th>Name</th>
                              <th>Title</th>
                              <th>Desc</th>
                              <th>Image</th>
                              <th>Status</th>
                              <th>Action</th>
                           </tr>
                        </thead>
                        <tbody>
                           @if(count($all_trash_testimonial) >= 1)
                           @php $count = 1; @endphp
                           @foreach($all_trash_testimonial as $testimonial)
                           <tr>
                              <td>{{ $count }}.</td>
                              <td>{{ $testimonial->name }}
                              <td>{{ $testimonial->title }}</td>
                              <td>{{ $testimonial->desc }}</td>
                              <td>
                                @if ($testimonial->image)
                                    <img src = "{{ asset('public/uploads/testimonials/' .$testimonial->image) }}" width="80" height="60">
                                @endif
                              </td>
                              @if($testimonial->status == 'Active')
                              <td class="lights-green-color"><span>Active</span></td>
                                 @elseif($testimonial->status == 'Pending')
                              <td class="lights-red-color"><span>Pending</span></td>
                                 @elseif($testimonial->status == 'Suspend')
                              <td class="lights-yellow-color"><span>Suspend</span></td>
                                 @elseif($testimonial->status == 'Approved')
                              <td class="lights-pink-color"><span>Approved</span></td>
                              @else
                              <td></td>
                              @endif
                              <td class="project-actions text-left">
                                 <a class="btn btn-info btn-sm" href="{{ url('admin/edit-testimonial',$testimonial->id) }}"><i class="fas fa-pencil-alt"></i>Edit</a>
                                 <a class="btn btn-danger btn-sm delete_parament_testimonial" data-testimonial_id="{{ $testimonial->id }}"><i class="fas fa-trash" aria-hidden="true"></i>Delete</a>
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