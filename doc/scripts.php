<?php
    //INCLUDE DATABASE FILE
    include('database.php');
    //SESSSION IS A WAY TO STORE DATA TO BE USED ACROSS MULTIPLE PAGES
    session_start();

    //ROUTING
    if(isset($_POST['save']))        saveTask();
    if(isset($_POST['update']))      updateTask();
    if(isset($_POST['delete']))      deleteTask();
    if(isset($_POST['deleteAll']))    deleteAll();
    
    function getTasks($parametre)
    {
        global $conn;
        //CODE HERE
        //SQL SELECT   
        $sql="SELECT * FROM tasks INNER JOIN type ON type_id=type.idType 
        INNER JOIN priorities ON priority_id=priorities.idPriorities 
        INNER JOIN  status ON status_id=status.idStatus";
        $result=mysqli_query($conn, $sql);
             
        while($row =mysqli_fetch_assoc($result)){
            if($parametre ==$row["idStatus"]) {
        echo ' <button class="btn btn-outline-dark col-12" data-bs-toggle="modal" data-bs-target="#add-task">
                        <div>
                            <div class="text-start fw-bolder"><i class="bi bi-question-circle-fill"></i>'.$row["title"] .'</div>
                            <div>
                                <div class="fw-lighter">'. $row["idTasks"].'#created in'.$row["task_datetime"].'</div>
                                <div class="fst-italic">'.$row["description"].'</div>
                            </div>
                            <div>
                                <span class="rounded-2 text-black bg-info">'.$row['namePriority'].'</span>
                                <span class="rounded-2 border border-white bg-secondary text-white">'.$row['nameType'].'</span>
                            </div>
                        </div>
                    </button>';
       
     }

    }
}


    function saveTask()
    {
        GLOBAL $conn;
        //CODE HERE
        //SQL INSERT
        $title=$_POST['title'];
        $type=$_POST['type'];
        $Priority=$_POST['Priority'];
        $status=$_POST['Status'];
        $date=$_POST['date'];
        $description=$_POST['Description'];

        $req="INSERT INTO tasks(title,type_id,priority_id,status_id,task_datetime,description)
        VALUES('$title','$type','$Priority','$status','$date','$description')";
        $query_run=mysqli_query($conn, $req);
       
       if($query_run){
        $_SESSION['message'] = "Task has been added successfully !";
		header('location: index.php');
    }
    }

    function updateTask()
    {
        //CODE HERE
        //SQL UPDATE
        $_SESSION['message'] = "Task has been updated successfully !";
		header('location: index.php');
    }

    function deleteTask()
    {
        //CODE HERE
        //SQL DELETE
        $_SESSION['message'] = "Task has been deleted successfully !";
		header('location: index.php');
    }
function deleteAll(){

}
?>