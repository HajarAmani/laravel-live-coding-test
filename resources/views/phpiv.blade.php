<?php
$string="Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
";

?>

       
		
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Material Design for Bootstrap</title>
  <!-- MDB icon -->
  <link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <!-- Google Fonts Roboto -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <!-- Material Design Bootstrap -->
  <link rel="stylesheet" href="css/mdb.min.css">
  <!-- Your custom styles (optional) -->
  <link href="css/addons/datatables.min.css" rel="stylesheet">
</head>
<body>
  <h1 class="text-center">Events List</h1>
  <!-- Start your project here-->  
  <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th class="th-sm">Id</th>
      <th class="th-sm">Name</th>
      <th class="th-sm">Slug</th>
      <th></th>
      <th></th>
    </tr>
  </thead>
  <tbody>
  @foreach($events as $event)
  <php
    <tr>
      <td>{{$event->id}}</td>
      <td>{{$event->name}}</td>
      <td>{{$event->slug}}</td>
      <td>
		<a href="{{ URL::to('events/'.$event->id.'/update' ) }}" class="btn btn-xs btn-info">
		Update</a>
	  </td>
      <td>
	  	{{ Form::open(array('url' => 'events/delete/'.$event->id)) }}
		{{ Form::submit('Delete',['id'=>$event->name,'class' => "btn btn-xs btn-danger deletebutton"]); }}
		{{ Form::close() }}
	 </td>
    </tr>
  @endforeach
  </tbody>
</table>

  <!-- End your project here-->

  <!-- jQuery -->
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
  <!-- Your custom scripts (optional) -->
  <script type="text/javascript" src="js/addons/datatables.min.js"></script>
  
  <script>
  $(document).ready(function () {
	  
	  $('#dtBasicExample').DataTable();
	  $('.dataTables_length').addClass('bs-select');
	  
	  dialog_update = $("#update-event").dialog({
                autoOpen: false,
                height: 260,
                width: 530,
                modal: true,
                buttons: {
                    "Save": update_form,
                    Cancel: function() {
                        dialog_update.dialog( "close" );
                    }
                },
                close: function() {
                   //form[0].reset();
                }
            });
	});
	
	var modal_update = document.getElementById('update');
	
	function update_form() {
        form = dialog_update.find( "form" );
        form.submit();
    }
	
	function update(id,name) {

        modal_update.style.display = "block";
        $('#update_id').val(id);
        $('#update_name').val(name);
    }
	
	$('.deletebutton').on('click', function(){
		var value = $(this).attr("id");
		if(confirm('Are you sure to delete ['+value+'] ?')) {
			return true;
		} else {
			return false;
		}
	});
	
  </script>

</body>
</html>