<?php
include('security.php');

// admin insert;
if(isset($_POST['registerbtn']))
{
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['confirmpassword'];
    $usertype=$_POST['usertype'];


    $email_query = "SELECT * FROM register WHERE email='$email' ";
    $email_query_run = mysqli_query($connection, $email_query);
    if(mysqli_num_rows($email_query_run) > 0)
    {
        $_SESSION['status'] = "Email Already Taken. Please Try Another one.";
        $_SESSION['status_code'] = "error";
        header('Location: register.php');  
    }
    else
    {
        if($password === $cpassword)
        {
            $query = "INSERT INTO register (username,email,password,usertype) VALUES ('$username','$email','$password','$usertype')";
            $query_run = mysqli_query($connection, $query);
            
            if($query_run)
            {
                // echo "Saved";
                $_SESSION['success'] = "Admin Profile Added";
                $_SESSION['success_code'] = "success";
                header('Location: register.php');
            }
            else 
            {
                $_SESSION['status'] = "Admin Profile Not Added";
                $_SESSION['status_code'] = "error";
                header('Location: register.php');  
            }
        }
        else 
        {
            $_SESSION['status'] = "Password and Confirm Password Does Not Match";
            $_SESSION['status_code'] = "warning";
            header('Location: register.php');  
        }
    }

}

//admin update code;
if(isset($_POST['updatebtn']))
{
    $id = $_POST['edit_id'];
    $username = $_POST['edit_username'];
    $email = $_POST['edit_email'];
    $password = $_POST['edit_password'];

    $query = "UPDATE register SET username='$username', email='$email', password='$password' WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Your Data is Updated";
        $_SESSION['status_code'] = "success";
        header('Location: register.php'); 
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT Updated";
        $_SESSION['status_code'] = "error";
        header('Location: register.php'); 
    }
}


//admin delete code;
if(isset($_POST['delete_btn']))
{
    $id = $_POST['delete_id'];

    $query = "DELETE FROM register WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Your Data is Deleted";
        $_SESSION['status_code'] = "success";
        header('Location: register.php'); 
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT DELETED";       
        $_SESSION['status_code'] = "error";
        header('Location: register.php'); 
    }    
}



//student login page;
if(isset($_POST['login_btn']))
{
    $email_login = $_POST['emaill']; 
    $password_login = $_POST['passwordd']; 

    $query = "SELECT * FROM register  WHERE email='$email_login' AND password='$password_login' LIMIT 1";
    $query1 = "SELECT * FROM student  WHERE email='$email_login' AND password='$password_login' LIMIT 1";
    $query_run = mysqli_query($connection, $query);
    $query_run1 = mysqli_query($connection, $query1);
    $usertype = mysqli_fetch_array($query_run);
    $usertype1 = mysqli_fetch_array($query_run1);

   if($usertype['usertype']== "admin")
   {
        $_SESSION['username'] = $email_login;
        header('Location: index.php');
   } 
   else if($usertype1['usertype'] == "student")
   {
        $_SESSION['student_name'] = $email_login;
        header('Location: student_info.php');
   }
   else
   {
        $_SESSION['status'] = "Email / Password is Invalid";
        header('Location: login.php');
   }
    
}

// faculty_n_course insert;
if(isset($_POST['faculty_n_course_btn']))
{
    $instructor_name = $_POST['instructor_name'];
    $course_code = $_POST['course_code'];
    $Sec_n_schedule = $_POST['Sec_n_schedule'];

    $query = "INSERT INTO faculty_n_course (instructor_name,course_code,Sec_n_schedule) VALUES ('$instructor_name','$course_code','$Sec_n_schedule')";
    $query_run = mysqli_query($connection, $query);
    
    if($query_run)
    {
        $_SESSION['success'] = "Faculty & course Profile Added ";
        header('Location: faculty_n_course.php'); 
    }
    else
    {
        $_SESSION['status'] = "Faculty & course Profile NOT Added";
        header('Location: faculty_n_course.php'); 
    }

}

//faculty and course delete code;
if(isset($_POST['faculty_n_course_delete_btn']))
{
    $id = $_POST['delete_id'];

    $query = "DELETE FROM faculty_n_course WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Faculty & Course Data is Deleted";
        $_SESSION['status_code'] = "success";
        header('Location: faculty_n_course.php'); 
    }
    else
    {
        $_SESSION['status'] = "Faculty & Course Data is NOT DELETED";       
        $_SESSION['status_code'] = "error";
        header('Location: faculty_n_course.php'); 
    }    
}


//Faculty & course update code;
if(isset($_POST['faculty_n_course_updatebtn']))
{
    $id = $_POST['edit_id'];
    $instructor_name = $_POST['edit_instructor_name'];
    $course_code = $_POST['edit_course_code'];
    $Sec_n_schedule = $_POST['edit_Sec_n_schedule'];

    $query = "UPDATE faculty_n_course SET instructor_name='$instructor_name', course_code='$course_code', Sec_n_schedule='$Sec_n_schedule' WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Your Data is Updated";
        $_SESSION['status_code'] = "success";
        header('Location: faculty_n_course.php'); 
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT Updated";
        $_SESSION['status_code'] = "error";
        header('Location: faculty_n_course.php'); 
    }
}


// student insert;
if(isset($_POST['std_registerbtn']))
{
    $student_name = $_POST['student_name'];
    $roll_num = $_POST['roll_num'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['confirmpassword'];
    $usertype=$_POST['usertype'];

    $email_query = "SELECT * FROM student WHERE email='$email' ";

    $email_query_run = mysqli_query($connection, $email_query,);
    if(mysqli_num_rows($email_query_run ) > 0)
    {
        $_SESSION['status'] = "Email Already Taken. Please Try Another one.";
        $_SESSION['status_code'] = "error";
        header('Location: student_reg.php');  
    }
    else
    {
        if($password === $cpassword)
        {
            $query = "INSERT INTO student (student_name,roll_num,email,password,usertype) VALUES ('$student_name','$roll_num','$email','$password','$usertype')";
            $query_run = mysqli_query($connection, $query);
            
            if($query_run)
            {
                // echo "Saved";
                $_SESSION['success'] = "student Profile Added";
                $_SESSION['success_code'] = "success";
                header('Location: student_reg.php');
            }
            else 
            {
                $_SESSION['status'] = "student Profile Not Added";
                $_SESSION['status_code'] = "error";
                header('Location: student_reg.php');  
            }
        }
        else 
        {
            $_SESSION['status'] = "Password and Confirm Password Does Not Match";
            $_SESSION['status_code'] = "warning";
            header('Location: student_reg.php');  
        }
    }

}

//Student update code;
if(isset($_POST['std_updatebtn']))
{
    $id = $_POST['edit_id'];
    $student_name = $_POST['edit_student_name'];
    $roll_num = $_POST['edit_roll_num'];
    $email = $_POST['edit_email'];
    $password = $_POST['edit_password'];

    $query = "UPDATE student SET student_name='$student_name',roll_num='$roll_num', email='$email', password='$password' WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Your Data is Updated";
        $_SESSION['status_code'] = "success";
        header('Location: student_reg.php'); 
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT Updated";
        $_SESSION['status_code'] = "error";
        header('Location: student_reg.php'); 
    }
}


//student delete code;
if(isset($_POST['std_delete_btn']))
{
    $id = $_POST['delete_id'];

    $query = "DELETE FROM student WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Your Data is Deleted";
        $_SESSION['status_code'] = "success";
        header('Location: student_reg.php'); 
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT DELETED";       
        $_SESSION['status_code'] = "error";
        header('Location: student_reg.php'); 
    }    
}



?>
