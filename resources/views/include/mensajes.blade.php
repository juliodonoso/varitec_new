@if (session('msg-success'))
<div class="alert alert-success alert-dismissible text-center" role="alert">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close" >
		<span aria-hidden="true">&times;</span>
	</button>
	{{ session('msg-success') }}
</div>
@endif

@if (session('msg-error'))
<div class="alert alert-danger alert-dismissible text-center" role="alert">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
	{{ session('msg-error') }}
</div>
@endif
