<?php 
    if(isset($_GET['user_id'])){
        // a few lines of code here to check if that particular user has any unread message.
        // In such case a variable name $newMessage is set to 1. Now ... :
        $newMessage = 1;

        if($newMessage>0){
        $data='
            <i class="bi bi-envelope-exclamation-fill"></i>
        ';
        }else{
        $data='
            <i class="bi bi-envelope"></i>
        ';
        }
        echo $data;
    }
?>