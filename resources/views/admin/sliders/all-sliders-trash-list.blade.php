@extends('admin.layouts.master')
@section('content')
<div class="content-wrapper">
   <section class="content">
      <div class="container-fluid">
         <div class="row">
            <div class="col-md-6">
               <h2 class="mb-3">All Trash sliders</h2>
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
                              <th>Title</th>
                              <th>Desc</th>
                              <th>Image</th>
                              <th>Status</th>
                              <th>Action</th>
                           </tr>
                        </thead>
                        <tbody>
                           @if(count($all_sliders_trash) >= 1)
                           @php $count = 1; @endphp
                           @foreach($all_sliders_trash as $trash)
                           <tr>
                              <td>{{ $count }}.</td>
                              <td>{{ $trash->title }}</td>
                              <td>{{ $trash->desc }}</td>
                              <td>
                                @if ($trash->image)
                                    <img src = "{{ asset('public/uploads/sliders/' .$trash->image) }}" width="80" height="60">
                                @endif
                              </td>
                              @if($trash->status == 'Active')
                              <td class="lights-green-color"><span>Active</span></td>
                                 @elseif($trash->status == 'Pending')
                              <td class="lights-red-color"><span>Pending</span></td>
                                 @elseif($trash->status == 'Suspend')
                              <td class="lights-yellow-color"><span>Suspend</span></td>
                                 @elseif($trash->status == 'Approved')
                              <td class="lights-pink-color"><span>Approved</span></td>
                              @else
                              <td></td>
                              @endif
                              <td class="project-actions text-left">
                                 <a class="btn btn-info btn-sm" href="{{ url('admin/edit-slider',$trash->id) }}"><i class="fas fa-pencil-alt"></i>Edit</a>
                                 <a class="btn btn-danger btn-sm delete_parament_slider" data-slider_id="{{ $trash->id }}"><i class="fas fa-trash" aria-hidden="true"></i>Delete</a>
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