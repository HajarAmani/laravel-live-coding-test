<?php ?>
<!DOCTYPE html>
<html lang="en">
<head>
  
</head>
<body>
	
	<a href="{{ URL::to('/' ) }}" title="Update">
		<button type="submit" class="btn btn-primary btn-block">Index Page</button>
	</a>
	<br><br>
	<h1>Create Event</h1>
	{{ Form::open(["url" =>"events/store", 
	"method" => "post", "enctype" => "multipart/form-data", "class" => "container"]) }}
	  <!-- Email input -->
	  <div class="form-outline mb-4">
		<label class="form-label" for="form1Example1">Name</label>
		{{ Form::text('name', null,['size'=>'30','class' => 'form-control']); }}

	  </div>
	<br>  
	
	  <!-- Submit button -->
		{{ Form::submit('Store', ['class' => "btn btn-sm btn-pure btn-success "]); }}

	{{ Form::close(); }}
	</body>

</html>