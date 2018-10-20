@if(Session::has('success'))
   <div class="alert alert-success">
     <strong>Success:</strong> {{Session::get('success')}}
   </div>
@endif
@if(Session::has('consuccess'))
   <div class="alert alert-success ">
     <strong>Success:</strong> {{Session::get('consuccess')}}
   </div>
@endif
@if(Session::has('loginsuccess'))
   <div class="alert alert-success">
     {{Session::get('loginsuccess')}}
   </div>
@endif
@if(Session::has('loginerror'))
   <div class="alert alert-danger">
      <strong>Error:</strong> {{Session::get('loginerror')}}

   </div>
@endif
@if(Session::has('profileerror'))
   <div class="alert alert-danger" style="width: 400px;">
      <strong>Error:</strong> {{Session::get('profileerror')}}

   </div>
@endif
@if(Session::has('adsuccess'))
   <div class="alert alert-success" style="width: 400px;">
     <strong>Success:</strong> {{Session::get('adsuccess')}}
   </div>
@endif
@if(count($errors)>0)
  <div class="alert alert-danger" style="max-width: 500px;">
     <strong>Error</strong> 
     <ul>
     	@foreach($errors->all() as $error)
     	 <li>{{ $error }}</li>
     	@endforeach
     </ul>
  </div>

@endif