<?php include('dbcon.php'); ?>

<?php

    

    if(isset($_GET['ID'])){
        $ID=$_GET['ID'];


    $sql="DELETE FROM `student` WHERE `ID`='$ID'";
        $result=mysqli_query($conn,$sql);   
        if(!$result){
            die("something wroung".mysqli_error($conn));
        }
        else{
            header('location: curd.php');
        }

    }
?>