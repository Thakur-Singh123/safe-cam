@extends('admin.layouts.master')
@section('content')
<style>
.trash-contact {
    position: absolute;
    right: 0;
    top: 0;
    margin: -4px 2px 2px;
}

.trash-contact a {
    display: inline-block;
}

.trash-contact img {
    width: 18px;
    height: auto;
    cursor: pointer;
}
</style>
<div class="content-wrapper">
   <section class="content">
      <div class="container-fluid">
         <div class="row">
            <div class="col-md-6">
               <h2 class="mb-3">All Trash Contacts</h2>
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
                              <th>Email</th>
                              <th>Subject</th>
                              <th>Message</th>
                              <th>Create Date</th>
                              <th>Status</th>
                              <th>Action</th>
                           </tr>
                        </thead>
                        <tbody>
                           @if(count($all_contacts) >= 1)
                           @php $count = 1; @endphp
                           @foreach($all_contacts as $contact)
                            <tr>
                              <td>{{ $count }}.</td>
                              <td>{{ $contact->name }}</td>
                              <td>{{ $contact->email }}</td>
                              <td>{{ $contact->subject }}</td>
                              <td>{{ $contact->message }}</td>
                              <td>{{ \Carbon\Carbon::parse($contact->created_at)->format('M Y') }}</td>
                              @if($contact->status == 'Active')
                              <td class="lights-green-color"><span>Active</span></td>
                                 @elseif($contact->status == 'Pending')
                              <td class="lights-red-color"><span>Pending</span></td>
                                 @elseif($contact->status == 'Suspend')
                              <td class="lights-yellow-color"><span>Suspend</span></td>
                                 @elseif($contact->status == 'Approved')
                              <td class="lights-pink-color"><span>Approved</span></td>
                              @else
                              <td></td>
                              @endif
                                <td class="project-actions text-left">
                                    <a class="btn btn-info btn-sm" href="{{ url('admin/edit-contact',$contact->id) }}"><i class="fas fa-pencil-alt"></i>Edit</a>
                                    <a class="btn btn-danger btn-sm delete_parament_contact" data-contact_id="{{ $contact->id }}"><i class="fas fa-trash" aria-hidden="true"></i>Delete</a>
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