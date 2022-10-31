
<?php include('scripts.php');
?>
<!DOCTYPE html>
<html lang="en" >
<head>
	<meta charset="utf-8" />
	<title>YouCode | Scrum Board</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	
	<!-- ================== BEGIN core-css ================== -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
	<link href="./assets/css/vendor.min.css" rel="stylesheet" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
	<link href="./assets/css/vendor.min.css" rel="stylesheet" />
	<link href="./assets/css/default/app.min.css" rel="stylesheet" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
	<link href="./assets/css/style.css" rel="stylesheet" />
	<!-- ================== END core-css ================== -->
</head>
<body>

	<!-- BEGIN #app -->
	<div id="app" class="app-without-sidebar">
		<!-- BEGIN #content -->
		<div id="content" class="app-content main-style">
			<div class="">
				<div>
					<div class="navbar1">
						<ol class="liste">
							<li class="home"><a href="javascript:;">Home</a></li>
							<li class="flech"></li>
							<li class="">Scrum Board </li>
						</ol>
						<div class="">
							<button class="btn text-white bg-red add-task" id="deleteALL" type="button" name="deleteAll">
								Delete All
							</button>
							<button class="btn text-white bg-green add-task" id="add-btn" type="button" data-bs-toggle="modal" data-bs-target="#add-task" >
								+ Add Task
							</button>
						</div>
					</div>
					<!-- BEGIN page-header -->
					<h1 class="page-header">
						Scrum Board 
					</h1>
					<!-- END page-header -->
				</div>
				
			</div>
			
			<div class="row">
				<div class="col-xl-4 col-md-6 col-sm-12">
					<div class="">
						<div class="col-12 To-do">
							<h4 class="">To do(<?php compteTasks(1); ?>) <span id="to-do-tasks-count"></span></h4>

						</div>
						<div class="" id="to-do-tasks">
							<!-- TO DO TASKS HERE -->
							<?php 
								getTasks(1);
							?>

						</div>
					</div>
				</div>
				<div class="col-xl-4 col-md-6 col-sm-12">
					<div class="">
						<div class="col-12 In-Progress">
							<h4 class="">In Progress(<?php compteTasks(2); ?>) <span id="in-progress-tasks-count"></span></h4>

						</div>
						<div class="" id="in-progress-tasks">
							<!-- IN PROGRESS TASKS HERE -->
							<?php 
								getTasks(2);
							?>
							
						</div>
					</div>
				</div>
				<div class="col-xl-4 col-md-6 col-sm-12">
					<div class="">
						<div class="col-12 Done">
							<h4 class="">Done(<?php compteTasks(3); ?>) <span id="done-tasks-count"></span></h4>

						</div>
						<div class="" id="done-tasks">
						<?php 
								getTasks(3);
							?>
						</div>
					</div>
				</div>
			
		</div>
	</div>
  <form name="task" action="scripts.php" method="POST" >
  <div class="modal fade" id="add-task" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
	  <div class="modal-content">
		<div class="modal-header">
		  <h1 class="modal-title fs-5" id="form-title">add Task</h1>
		  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		</div>
		<div class="modal-body">
		  <label for="title">Title</label><br>
		  <input class="form-control" type="text" name="title" aria-label="default input example" id="title"><br>
		  <label for="title">Type</label><br>
		  <div class="form-check">
			<input class="form-check-input" type="radio" name="type" value="23">
			<label class="form-check-label" for="flexRadioDefault1">
			  Feature
			</label>
		  </div>
		  <div class="form-check">
			<input class="form-check-input" type="radio" name="type" value="24" >
			<label class="form-check-label" for="flexRadioDefault2">
			  Bug
			</label>
		  </div>
		  <div>
		  <label for="priority">Priority</label><br>
		  <select class="form-select" aria-label="Default select example" id="Priority" name="Priority">
			<option value="1">Low</option>
			<option value="2">Medium</option>
			<option value="3">High</option>
			<option value="4">Critical</option>
		</select>
		</div>
		<div>
			<label for="priority" name="status">Status</label><br>
			<select class="form-select" aria-label="Default select example" name="Status" id="Status">
			  <option value="1">To do</option>
			  <option value="2">In progress</option>
			  <option value="3">Done</option>
			  </select>
		  </div>
		  <div>
			<label for="date">Date:</label><br>
			<input type="datetime-local" class="form-control" id="date" name="date">
		  </div>
		  <div class="mb-3">
			<label for="Description" class="col-form-label">Description:</label>
			<textarea class="form-control" name="Description" id="Description"></textarea>
		  </div>
			


		
		<div class="modal-footer">
		  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
		  <button type="submit" class="btn btn-primary" id="save" name="save">Save</button>
		  <button type="submit" class="btn btn-success"  id="Update" name="Update">Update</button>
		  <button type="submit" class="btn btn-danger" id="delete" name="delete">delete</button>
		</div>
	  </div>
	</div>
  </div>
</div>
</form>
	
	<!-- ================== BEGIN core-js ================== -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
	<script src="./assets/js/app.min.js"></script>
	<script src="./assets/js/vendor.min.js"></script>
	<!-- ================== END core-js ================== -->
	<script src="scripts.js"></script>

	<script>
		//reloadTasks();
	</script>
</body>
</html>