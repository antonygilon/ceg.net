<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html lang="en">
<head>
  <title>File Update</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script>
		function startUpload()
		{
			var id = setInterval(frame, 50);
			var percent = 1;
			$('.btnprogress').text('Continue')
			function frame() {
			if (percent >= 100) {
			  clearInterval(id);
			  $('.btnprogress').text('Close')
			} else {
			  percent++; 
			  $('.progress-bar').css('width', percent+'%').attr('aria-valuenow', percent); 
			}
		  }
		}
		
		function clickProgress()
		{
			var progress = $('.btnprogress').text();
			
			if(progress =='Continue')
			{
				window.open(window.location.href);
			}
			else	
			{
				 $('#myModal').modal('toggle');
			}			
		}
		
  </script>
</head>
<body>

<div class="container well">
   <form>
    <div class="form-group">
      <label for="usr">Topic</label>
      <input type="text" class="form-control" id="usr">
    </div>
    <div class="form-group">
      <label for="pwd">Description</label>
      <input type="text" class="form-control" id="pwd">
    </div>
	
	<div class="pull-right">
		 <button type="button" class="btn btn-primary" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#myModal" onclick="startUpload()" >Update</button>
	</div>
	
  </form>
</div>

<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">          
          <h4 class="modal-title">Update initiated</h4>
        </div>
        <div class="modal-body">
          <p>File update in progress.....</p>
		  
		  <div class="progress">
		  <div class="progress-bar" role="progressbar" aria-valuenow="70"
		  aria-valuemin="0" aria-valuemax="100" style="width:70%">
			<span class="sr-only">70% Complete</span>
		  </div>
		</div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-info btnprogress" onclick="clickProgress()">			
			Continue
		  </button>
        </div>
      </div>
      
    </div>
  </div>

</body>
</html>
