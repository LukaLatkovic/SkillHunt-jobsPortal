@if ($message = Session::get('success'))
<div class="alert alert-success alert-block text-center">
	{{-- <button type="button" class="close" data-dismiss="alert">×</button>	 --}}
        <strong>{{ $message }}</strong>
</div>
@endif


{{-- @if ($message = Session::get('error'))
<div class="alert alert-danger alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>{{ $message }}</strong>
</div>
@endif --}}


@if ($message = Session::get('warning'))
<div class="alert alert-warning alert-block text-center">
	{{-- <button type="button" class="close" data-dismiss="alert">×</button>	 --}}
	<strong>{{ $message }}</strong>
</div>
@endif


@if ($message = Session::get('info'))
<div class="alert alert-info alert-block text-center">
	{{-- <button type="button" class="close" data-dismiss="alert">×</button>	 --}}
	<strong>{{ $message }}</strong>
</div>
@endif


{{-- @if ($errors->any())
<div class="alert alert-danger">
	<button type="button" class="close" data-dismiss="alert">×</button>	
		{{$error}}
</div>
@endif --}}

@if(count($errors)>0)
	<div class="alert alert-danger w-100 mx-auto mt-3 text-center">
		<ul>
			@foreach($errors->all() as $error)
				<li style="list-style: none;">{{$error}}</li>
			@endforeach
		</ul>
	</div>
@endif





@if(session('error'))
	<div class="alert alert-danger w-100 mx-auto mt-3 text-center">
		{{session('error')}}
	</div>
@endif

<script>
//   $(document).ready(function(){
// $('.alert').delay(1500).fadeOut('fast');
//   });
$(function(){
        setTimeout(function() {
            $('.alert').slideUp();
		}, 5000);
		});
</script>
