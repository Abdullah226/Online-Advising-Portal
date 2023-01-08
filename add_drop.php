<?php



include('security.php');
include('includes1/header.php'); 
include('includes1/navbar.php'); 
?>


<?php
      $connection = mysqli_connect("localhost", "root", "", "adminpanel");
      $query="SELECT * FROM faculty_n_course";
      $query_run = mysqli_query($connection, $query);
  ?>

<?php
        echo"<center>";
        echo "<select>";
        echo"<option>---Course Details---(instructor_name | course_code | Sec_n_schedule) </option>";
	        while($row=mysqli_fetch_array($query_run))
	            {
		            echo "<option>  $row[instructor_name] | $row[course_code] | $row[Sec_n_schedule] </option>";
	            }
                
        echo"</select>";
        echo"<center>";
    ?>
    
    <td>
                <form action="" method="post">
                    <input type="hidden" name="add" value="<?php echo $row['instructor_name']; ?>">
                    <button  type="Add" name="add_btn" class="btn btn-success"> ADD </button>
                </form>
    </td>


<?php
include('includes1/scripts.php');
include('includes1/footer.php');
?>