<?php

session_start();


if(isset($_POST['submit'])){
    #$username = $_POST['fullname'];
    $email = $_POST['email'];//finish this line
    $password = $_POST['password'];//finish this

loginUser($email, $password);

}

function loginUser($email, $password){
    /*
        Finish this function to check if username and password 
    from file match that which is passed from the form
    */
    #open file in read mode
    $filename = '../storage/users.csv';
    $file = fopen($filename, 'r');
    $file_search = fgetcsv($file);

    #check if it exists in database
    if ($file_search[1] != $email || $file_search[2] != $password) {
      
        //header("Location: ../login.php");
        echo '<meta http-equiv="refresh" content="2; url=../forms/login.html">';
        echo "<center><h1><strong>Incorrect Email or Password</strong></h1></center>";
        exit;

    }else {
        $_SESSION["username"] = $file_search[0];
        header("Location: ../dashboard.php");
        exit;
    }

}

//     if ($file_search[1] == $email && $file_search[2] == $password) {
//         # code...
//         echo "<strong>Login Successful</strong>";
//         $_SESSION["username"] = $file_search[0];
        
//         header("Location: ../dashboard.php");

//     }else {
//         header("Location: ../login.php");
//         echo "<strong>Incorrect Email or Password</strong>";
//         exit;
//     }
//echo "HANDLE THIS PAGE";

