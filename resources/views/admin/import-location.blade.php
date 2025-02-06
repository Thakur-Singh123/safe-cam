<style>
   .notification-green {
   color: green;
   padding: 1.5px;
   }
   .notification-red {
   color:red;
   padding: 1.5px;
   }
</style>
@if (Session::has('success')) 
<div class="notification-green">
   <p>{{ Session::get('success') }}</p>
</div>
@endif 
@if (Session::has('unsuccess')) 
<div class="notification-red">
   <p>{{ Session::get('unsuccess') }}</p>
</div>
@endif 
<form action="{{ route('admin.import.location') }}" method="POST" enctype="multipart/form-data">
   @csrf
   <input type="file" name="file">
   <button type="submit">Import Location</button>
</form>