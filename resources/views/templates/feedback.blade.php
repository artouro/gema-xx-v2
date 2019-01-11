@if(session('success'))
	<div class="col-lg-10 col-md-12 offset-lg-1" style="padding-left:0; padding-right:0">
		<div class="alert alert-success">
		  <button type="button" style="transform:translateY(-3px);" class="close pull-right" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		  {!! session('success') !!}
		</div>
	</div>
@endif

@if(session('error'))
	<div class="col-lg-10 col-md-12 offset-lg-1">
		<div class="alert alert-danger">
		  <button type="button" style="transform:translateY(-3px);" class="close pull-right" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		  {!! session('error') !!}
		</div>
	</div>
@endif
@if ($errors->any())
     @foreach ($errors->all() as $error)
		 <div class="col-lg-10 col-md-12 offset-lg-1">
			<div class="alert alert-danger">
				<button type="button" style="transform:translateY(-3px);" class="close pull-right" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				{!! $error !!}
			</div>
		</div>
     @endforeach
 @endif