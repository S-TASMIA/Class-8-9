<?php
//$_REQUEST
session_start();

include "../database/env.php";


$title = $_REQUEST['title'];
$detail = $_REQUEST['detail'];
$author = $_REQUEST['author'];
$errors = [];
//
////validation rules
//
if(empty($title)){
    $errors['title_error'] = 'Enter post tilte';
}else if(strlen($author) > 50){
    $errors['title_error'] = 'Invalid title';
}
if(empty($detail)){
    $errors["detail_error"]= "Please write something and try again";
}
//
if (count($errors)>0){

    $_SESSION['old']= $_REQUEST;
    $_SESSION['form_errors'] = $errors;
    header ("Location: ../index.php");
}
else{
    $query = "INSERT INTO posts( title,detail,author) VALUES ('$title','$detail','$author')";
    $result = mysqli_query($conn, $query);
    //print_r( $query);

    if($result){
        $_SESSION['msg'] = 'Your post has been inserted';
        header ("Location: ../index.php");
    }  
    
}
