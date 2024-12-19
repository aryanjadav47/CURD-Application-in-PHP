<?php
  include "dbcon.php";
  $ID="";
  $studentname="";
  $studentRollNo="";
  $studentClass="";

  $error="";
  $success="";

  if($_SERVER["REQUEST_METHOD"]=='GET'){
    if(!isset($_GET['ID'])){
      header("location: curd.php");
      exit;
    }
    $ID = $_GET['ID'];
    $sql = "select * from student where ID=$ID";
    $result = mysqli_query($conn,$sql);
    $row =mysqli_fetch_assoc( $result );
    while(!$row){
      header("location: curd.php");
      exit;
    }
    $studenName=$row["studentName"];
    $studentRollNo=$row["studentRollNo"];
    $studentClass=$row["studentClass"];

  }
  if($_SERVER["REQUEST_METHOD"]=='POST'){

    if(isset($_GET['new_id'])){
        $idnew = $_GET['new_id'];
    }

    $studenName=$_POST['studentName'];
    $studentRollNo=$_POST['studentRollNo'];
    $studentClass=$_POST['studentClass'];

    $sql = "UPDATE `student` SET `studentName`='$studenName', `studentRollNo`='$studentRollNo', `studentClass`='$studentClass' WHERE `ID`='$idnew'";
    $result=mysqli_query($conn,$sql);
    if($result){
        header("location: curd.php");
    }
  }
  
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <?php require('nav.php'); ?>

    <div class="min-h-screen bg-gray-50 flex flex-col justify-center py-12 sm:px-6 lg:px-8 px-6">
    <div class="sm:mx-auto sm:w-full sm:max-w-md">
        
        <h2 class="mt-6 text-center text-3xl leading-9 font-extrabold text-gray-900">
            Edit student 
        </h2>
       
    </div>


    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
        <div class="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10">
            <form action="/curdphp/edit_student.php?new_id=<?php echo $ID ?>" method="POST">
                <div>
                    <label for="email" class="block text-sm font-medium leading-5  text-gray-700">Student Name</label>
                    <div class="mt-1 relative rounded-md shadow-sm">
                        <input id="name" name="studentName" placeholder="enter student name" type="text" required="" value="<?php echo $studenName; ?>" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                        <div class="hidden absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="mt-6">
                    <label for="password" class="block text-sm font-medium leading-5 text-gray-700">Student Roll No</label>
                    <div class="mt-1 rounded-md shadow-sm">
                        <input id="password" name="studentRollNo" type="number" required="" value="<?php echo $studentRollNo; ?>" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                    </div>
                </div>
                <div class="mt-6">
                    <label for="password" class="block text-sm font-medium leading-5 text-gray-700">Student Class</label>
                    <div class="mt-1 rounded-md shadow-sm">
                        <input id="password" name="studentClass" type="text" required="" value="<?php echo $studentClass; ?>" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                    </div>
                </div>
                <div class="mt-6">
                    <span class="block w-full rounded-md shadow-sm">
            <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-blue-500 hover:bg-blue-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out">
              Update
            </button><br>
           
          </span>
                </div>
            </form>
            <a href="curd.php"> <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-green-500 hover:bg-green-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out">
              BACK
            </button></a>
        </div>
    </div>
</div>
</body>
</html>