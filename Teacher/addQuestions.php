<?php session_start(); 

$query = "SELECT * FROM questions where";

//Logout 
	if(isset($_POST['logout'])){
        if(isset($_SESSION['user'])){
            session_destroy();
            echo "You have been logged out";
            header ("location: /project_indigo/Login.php");
        }
    }

?>
<!DOCTYPE html>
<html>
<head>
	<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Droid+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <!-- Bootstrap CSS -->
      <title>Add Questions</title>

      <link href="../css/Header.css" rel="stylesheet">
       <!-- jQuery first, then Tether, then Bootstrap JS. -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
<script
  src="https://code.jquery.com/jquery-3.2.1.js"
  integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
  crossorigin="anonymous"></script>	  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../JavaScript/loadQuestions.js"></script>

      
</head>
<body>
	<?php include(dirname(__DIR__).'/header.php'); ?>

	<div class="container" style="margin-top: 125px;"> 
		<div class="modal fade" id="questionForm" tabindex="-1" role="dialog">
			
		</div>
			<div class="row card">
			<div class="card-header">
	            <div class=" row form-inline d-flex justify-content-around">
	                <label   for="chapter-input">
	                  <span class="mr-2">Chapter:</span>
	                  <input type="number" id="chapter-input" value="1" class="form-control col-3" name="chapter"  >
	                </label>

	                <label  for="Points-input">
	                  <span class="mr-2">Points:</span>
	                  <input type="number" id="Points-input" class="form-control col-3" name="chapter">
	                </label>

	                <label class="custom-control custom-checkbox">
	                  <input type="checkbox" class="custom-control-input">
	                  <span class="custom-control-indicator"></span>
	                  <span class="custom-control-description">Display All</span>
	                </label>

	                <button class="btn btn-primary" data-toggle="modal" data-toggle="questionForm" role="button">Add Question</button>

	            </div>

            </div>
        <div class="card-block table-responsive">
          <table id="questionsTable" class="table table-hover table-bordered mb-0">

            <thead class="thead-dark">
              <tr>
                <th>Chapter</th>
                <th>#</th>
                <th>Question</th>
                <th>Hint</th>
                <th>Part Number</th>
                <th>Points</th>
              </tr>
            </thead>

            <tbody id="tableBody">
            
            </tbody>
          </table>
        </div>
          <div id="loading" class="text-center" style="width:100%; height:100%; z-index: +100; visibility: hidden; position: absolute; background-color: rgba(255,255,255,0.7);">
              <img src="../JavaScript/Eclipse.gif" class=" " style="margin-left: auto; margin-right: auto;" />
          </div>
		  </div>
      <div id="test" class="row">


        
      </div>
	</div>

</body>
</html>