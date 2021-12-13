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
	  <!-- Email input -->
	  <div class="form-outline mb-4">
		<label class="form-label" for="form1Example1">Name: </label>
		{{ $events->name }}
	  </div>
	<div class="form-outline mb-4">
		<label class="form-label" for="form1Example1">Slug: </label>
		{{ $events->slug }}
	  </div>
	<div class="form-outline mb-4">
		<label class="form-label" for="form1Example1">Created At:</label>
		{{ $events->createdAt }}
	  </div>
	<div class="form-outline mb-4">
		<label class="form-label" for="form1Example1">Updated At:</label>
		{{ $events->updatedAt }}
	  </div>
	</body>

</html>