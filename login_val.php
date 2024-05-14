<?php
session_start(); 
if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $user_check_query = "SELECT * FROM users WHERE email='$email'";
    $user_check = $dbcon -> query($user_check_query);
    
    if($user_check->num_rows==0){

        // и-мэйл таарахгүй бол

        $email_not_matched = "Таны и-мэйл таарахгүй байна!";
    }else{

        // и-мэйл таарсан бол

        $row = $user_check->fetch_assoc();
        if(password_verify($password, $row['password'])){

            // нууц үг таарсан бол
            // байдал шалгах
            if($row['status']==1){
                $waiting = "Захиалга хүлээж байна";
            } else{
                // явж болно 
                $_SESSION['user_email'] = $email;
                $_SESSION['user_name']  = $row['fname'];
                $_SESSION['photo']      =$row['photo'];
                header('location: admin/index.php');
            }

            

        }else {
            // нууц үг таарахгүй бол

            $password_not_matched = "Таны нууц үг таарахгүй байна";
        }
    }
}


?>
