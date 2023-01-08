<?php
session_start();
include('includes/header.php'); 
include('includes/navbar.php'); 
?>
<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Edit Student Profile </h6>
  </div>
  <div class="card-body">
<?php

$connection = mysqli_connect("localhost", "root", "", "adminpanel");

if(isset($_POST['edit_btn']))
{
    $id= $_POST['edit_id'];

    $query = "SELECT * FROM student WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);
    foreach($query_run as $row)
    {
        ?>

            <form action="code.php" method="POST">

                <input type="hidden" name="edit_id" value="<?php echo $row["id"] ?>" > 
                <div class="form-group">
                    <label> Student Name </label>
                    <input type="text" name="edit_student_name" value="<?php echo $row["student_name"] ?>" class="form-control" placeholder="Enter Student name">
                </div>
                <div class="form-group">
                    <label> Roll Number </label>
                    <input type="text" name="edit_roll_num" value="<?php echo $row["roll_num"] ?>" class="form-control" placeholder="Enter Roll Number">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="edit_email" value="<?php echo $row["email"] ?>" class="form-control" placeholder="Enter Email">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="edit_password" value="<?php echo $row["password"] ?>" class="form-control" placeholder="Enter Password">
                </div>
                <button typr="submit" name="std_updatebtn"  class="btn btn-primary"> Update </button>
                <a href="student_reg.php" class="btn btn-danger"> Cancle </a>
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