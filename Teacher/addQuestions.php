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
    <script type="text/javascript" src="../JavaScript/inputAnswers.js"></script>
    <script type="text/javascript" src="../JavaScript/postQuestion.js"></script>
      
</head>
<body>
	<?php include(dirname(__DIR__).'/header.php'); ?>

	<div class="container" style="margin-top: 125px;"> 

			<div class="row card">
			<div class="card-header">
	            <div class=" row form-inline d-flex justify-content-around">
	                <label   for="chapter-filter">
	                  <span class="mr-2">Chapter:</span>
	                  <input type="number" id="chapter-filter" value="1" class="form-control col-3" name="chapter-filter"  >
	                </label>

	                <label  for="points-filter">
	                  <span class="mr-2">Points:</span>
	                  <input type="number" id="points-filter" class="form-control col-3" name="points-filter" >
	                </label>

	                <label class="custom-control custom-checkbox">
	                  <input type="checkbox" class="custom-control-input">
	                  <span class="custom-control-indicator"></span>
	                  <span class="custom-control-description">Display All</span>
	                </label>

	                <button id="addQuestionModal" type="button" class="btn btn-primary" data-toggle="modal" data-target="#questionForm" >Add Question</button>

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
      <div class="modal fade" id="questionForm" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document" style="border-style: ridge; border-width: 2px; border-color: #6237c4;" >
        <div class="modal-content container-fluid" >
          <div class="modal-header " style="border-bottom-style: solid; border-width: 2px; border-color: #6237c4;">
            <h4 class="col-12 modal-title text-center" >Add Question</h4>
          </div>
          <form id="newQuestionForm" action="">
          <div class="modal-body">

              <div id="chapter-points-input" class="row form-inline d-flex justify-content-around">

                <label for="chapter-input" >
                  <span class="mr-2">Chapter:</span>
                  <input type="number" id="chapter-input" value="0" class="form-control" name="chapter-input" style="width: 80px; ">
                </label>

                <label  for="points-input" class="">
                  <span class="mr-2">Points:</span>
                  <input type="number" id="points-input" value="5" class="form-control" name="points-input" style="width: 80px; ">
                </label>

                <label  for="part-input" class="">
                  <span class="mr-2">Part:</span>
                  <input type="number" id="part-input" value="1" class="form-control" name="part-input" style="width: 80px; ">
                </label>

              </div>


            <div id="question" class="row form-inline mt-3 ml-4 ">
              <label><span class=" " style="width: 50px;">Question: </span> <textarea  class="form-control offset-md-1" name="question-text" id="question-text" rows="3" cols="37"></textarea></label>
            </div>

            <div id='correctAnswer-input' class='row form-inline mt-2 ml-4 '>
              <label><span class='' style="width: 50px;">Answer:   </span> <textarea class='form-control offset-md-1' name='correctAnswer-text' id='correctAnswer-text' rows='3' cols='37'></textarea></label>
            </div>

            <div id='hint-input' class='row form-inline mt-2 ml-4 '>
              <label><span class='' style="display:block; min-width: 50px;">Hint:   </span> <textarea  class='form-control offset-md-1' name='hint-text' id='hint-text' rows='3' cols='37'></textarea></label>
            </div>

            <hr style="height: 1px;border:none;color:#6237c4;background-color:#6237c4;">

            <div id="answer-input" class="row mt-3 d-flex justify-content-center">
              <div class="form-inline">
              <label for="answer-dropdown" ><span class="mr-2">Number of wrong answers to input: </span>
                <select  class="form-control" id="answer-dropdown" name="numAnswers">
                  <option selected="selected">3</option>
                  <option>4</option>
                  <option>5</option>
                </select>
              </label>
              </div>
            </div>

            <div id="answerFields" class="">
            </div>

            <div class="modal-footer mt-2">
              <input class="form-control btn btn-primary " id="submitQuestion" type="submit" name="submitQuestion" value="Add Question" style="border-color:#6237c4; border-width: 2px; ">
            </div>

          </div>
          </form>
        </div>
      </div>
    </div>


	</div>
</body>
</html>