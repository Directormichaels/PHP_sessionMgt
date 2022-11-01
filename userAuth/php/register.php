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
    
    $file = fopen($filename, 'ra+');
    while (!feof($file)) {
        $data = fgetcsv($file);
        if ($data[0] == $username || $data[1] == $email) {
            echo "User Already Exists";
            exit;
        } else {
            fputcsv($file, $user_data);
            echo '<meta http-equiv="refresh" content="1; url=../forms/login.html">';
            echo "<center><h1><strong>User Successfully registered</strong></h1></center>";

        }
        
    }
   
    fclose($file);
    
    // echo "OKAY";
}
#echo "HANDLE THIS PAGE";


