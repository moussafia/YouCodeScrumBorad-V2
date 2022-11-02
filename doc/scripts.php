<?php
    //INCLUDE DATABASE FILE
    include('database.php');
    //SESSSION IS A WAY TO STORE DATA TO BE USED ACROSS MULTIPLE PAGES

    if(isset($_POST['save']))        saveTask();
    if(isset($_POST['delete']))      deleteTask();
    if(isset($_POST['deleteAll']))    deleteAll();
    if(isset($_POST['Update']))      updateTask();
    function getTasks($parametre)
    {   
        GLOBAL $conn;
        //affichage les tasks dans chaque case du status correspondantes.
        $sql="SELECT *,nameType,nameStatus,namePriority FROM tasks,type,status,priorities 
        WHERE $parametre=status_id AND 	type_id=idType AND status_id=idStatus AND priority_id=idPriorities ";
        $result=mysqli_query($conn, $sql);
        while($row =mysqli_fetch_assoc($result)){     
    ?>
        <button type ="button"  class="btn btn-outline-dark col-12 " 
        id="<?php echo $row['idTasks'] ?>" onclick="clickBtntasks(id)" data-bs-toggle="modal" data-bs-target="#add-task"
        title="<?php echo $row['title'] ?>"                typeForm="<?php echo $row['type_id'] ?>" 
        PriorityForm="<?php echo $row['priority_id']?>"    StatusForm="<?php echo $row['status_id']?>" 
        dateForm="<?php echo $row["task_datetime"]?>"      DescriptionForm="<?php echo $row["description"]?>">
                <div>
                    <div class="text-start fw-bolder">

                 <!-- condition sur les icones pour afficher selon le status -->
                <?php if ($parametre==1){?>  <i class="bi bi-question-circle-fill"></i> <?php } ?>
                <?php if ($parametre==2){?>  <i class="bi bi-arrow-right-square"></i> <?php } ?>
                <?php if ($parametre==3){?>  <i class="bi bi-shield-x"></i> <?php } ?>   
                              
                                <?php echo $row["title"] ?></div>
                    
                            <div>
                        <div class="fw-lighter"><?php echo $row["idTasks"]?>#created in <?php echo $row["task_datetime"]?></div>
                        <div class="fst-italic"> <?php echo $row["description"]?></div>
                    </div>
                    <div>
                        <span class="rounded-2 text-black bg-info"><?php echo $row['namePriority']?></span>
                        <span class="rounded-2 border border-white bg-secondary text-white"><?php echo $row['nameType']?></span>
                    </div>
                </div>
            </button><?php      
}
}

    function saveTask()
    {
        GLOBAL $conn;
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
        header('location: index.php');
    }

    function updateTask()
    {
        GLOBAL $conn;
        //SQL INSERT
        $id = $_POST['idHide'];
        $title=$_POST['title'];
        $type=$_POST['type'];
        $Priority=$_POST['Priority'];
        $status=$_POST['Status'];
        $date=$_POST['date'];
        $description=$_POST['Description'];
        $req="UPDATE `tasks` SET `title`='$title',`type_id`='$type',
        `priority_id`='$Priority',`status_id`='$status',`task_datetime`='$date',
        `description`='$description' WHERE `idTasks`=$id";
        $result=mysqli_query($conn, $req);
		header('location: index.php');
    }

    function deleteTask()
    {   //SQL DELETE
        GLOBAL $conn;
        $id = $_POST['idHide'];
        $req="DELETE FROM tasks WHERE idTasks= '$id'";
        $result=mysqli_query($conn, $req);
		header('location: index.php');
    }
function deleteAll(){
    GLOBAL $conn;
    $req="DELETE FROM tasks";
    $result=mysqli_query($conn, $req);
	header('location: index.php');
}
function compteTasks($parametre){
        GLOBAL $conn;
        $sql="SELECT COUNT(*) FROM tasks WHERE status_id=$parametre";
        $result=mysqli_query($conn, $sql);
        while($row =mysqli_fetch_assoc($result)){
            echo $row["COUNT(*)"];
}
}
?>