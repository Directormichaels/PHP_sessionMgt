<?php
if(isset($_POST['submit'])){
    $username = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

registerUser($username, $email, $password);

}

function registerUser($username, $email, $password){
    //save data into the file
    $filename = '../storage/users.csv';

    $user_data = [$username, $email, $password];
    
    $file = fopen($filename, 'a');
    fputcsv($file, $user_data);
    fclose($file);
    
    // echo "OKAY";
    echo '<meta http-equiv="refresh" content="1; url=../forms/login.html">';
    echo "<center><h1><strong>User Successfully registered</strong></h1></center>";    
    #header("Location: login.php");
}
#echo "HANDLE THIS PAGE";


