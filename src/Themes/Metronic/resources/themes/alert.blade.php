@if($errors)
	<div class="alert alert-danger alert-dismissible" role="alert">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<ul>
		@foreach($errors as $error)
			<li>{{ $error }}</li>
		@endforeach
		</ul>
	</div>
@endif