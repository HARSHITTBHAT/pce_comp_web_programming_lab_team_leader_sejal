<?php
  if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])){
    $conn=mysqli_connect('localhost','root','','textx') or die ("Connection Failed:" .mysqli_connect_error());
    if(isset($_POST['email']) && isset($_POST['pass'])){
        $email=$_POST['email'];
        $password=$_POST['pass'];

        $sql="INSERT INTO 'users'('email','pass') VALUES ('$email','$password')";
        

        $query=mysqli_query($conn,$sql);
        if($query){
            echo 'Entry sucessful';
        }

        else{
            echo 'ERROR OCCURED';
        }
    }
  }