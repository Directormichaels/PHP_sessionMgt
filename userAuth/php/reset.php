<?php

session_start();

if(isset($_POST['submit'])){
    $email = $_POST['email']; //complete this;
    $password = $_POST['password'];//complete this;

    resetPassword($email, $password);
}

function resetPassword($email, $password){
    //open file and check if the username exist inside
    //if it does, replace the password
    $filename = '../storage/users.csv';
    $file = fopen($filename, 'r');
    
    while (!feof($file)) {
        $file_search = fgetcsv($file);
    
    #verify email existense in database
    if ($file_search[1] = $email) {

        #assign new password to password
        $file_search[2] = $password;

        $file = fopen($filename, 'w');
        fputcsv($file, $file_search);
        fclose($file);
       echo "<center><h1><strong>Password Reset Successful</strong></h1></center>";
       echo '<meta http-equiv="refresh" content="5; url=../forms/login.html">';
    } else {
            echo "<center><h1><strong>User does not exist</strong></h1></center>";
        }
    }    
    
    #fclose($file);

}
//echo "HANDLE THIS PAGE";


