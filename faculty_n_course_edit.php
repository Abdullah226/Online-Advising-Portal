<?php
session_start();
include('includes/header.php'); 
include('includes/navbar.php'); 
?>
<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Edit Faculty & Course Profile </h6>
  </div>
  <div class="card-body">
<?php

$connection = mysqli_connect("localhost", "root", "", "adminpanel");

if(isset($_POST['edit_btn']))
{
    $id= $_POST['edit_id'];

    $query = "SELECT * FROM faculty_n_course WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);
    foreach($query_run as $row)
    {
        ?>

            <form action="code.php" method="POST">

                <input type="hidden" name="edit_id" value="<?php echo $row["id"] ?>" > 
                <div class="form-group">
                    <label> Instructor Name </label>
                    <input type="text" name="edit_instructor_name" value="<?php echo $row["instructor_name"] ?>" class="form-control" placeholder="Enter Username">
                </div>
                <div class="form-group">
                    <label>Course Code</label>
                    <input type="text" name="edit_course_code" value="<?php echo $row["course_code"] ?>" class="form-control" placeholder="Enter Email">
                </div>
                <div class="form-group">
                    <label>Section And Schedule</label>
                    <input type="text" name="edit_Sec_n_schedule" value="<?php echo $row["Sec_n_schedule"] ?>" class="form-control" placeholder="Enter Password">
                </div>
                <button typr="submit" name="faculty_n_course_updatebtn"  class="btn btn-primary"> Update </button>
                <a href="faculty_n_course.php" class="btn btn-danger"> Cancle </a>
            </form>

     <?php
    }
}
?>                     

  </div>
  </div>
</div>



<?php
include('includes/scripts.php');
include('includes/footer.php');
?>