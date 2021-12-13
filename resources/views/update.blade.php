<?php ?>
<!DOCTYPE html>
<html lang="en">
<head>
  
</head>
<body>
	<a href="{{ URL::to('/' ) }}" title="List">
		<button type="submit" class="btn btn-primary btn-block">Back To List</button>
	</a>
	<br><br>
	{{ Form::open(["url" =>"events/update", 
	"method" => "post", "enctype" => "multipart/form-data", "class" => "container"]) }}
	{{ Form::hidden('id', $events->id) }} 
	  <!-- Email input -->
	  <div class="form-outline mb-4">
		<label class="form-label" for="form1Example1">Name</label>
		{{ Form::text('name', $events->name,['size'=>'30','class' => 'form-control']); }}

	  </div>
	<br>  

	<div class="form-outline mb-4">
		<label class="form-label" for="form1Example1">Slug</label>
		{{ Form::text('slug', $events->slug,['size'=>'30','class' => 'form-control']); }}
	  </div>
	<br>

	  <!-- Submit button -->
		{{ Form::submit('Update', ['class' => "btn btn-sm btn-pure btn-success "]); }}

	{{ Form::close(); }}
	</body>

</html>