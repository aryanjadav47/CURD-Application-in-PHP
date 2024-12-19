<a?php 
    session_start();

    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"]!=true){
        header("location : login.php");
        exit;
    }
?>
<?php  include 'dbcon.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Home</title>
    <style>
        .btn{
            margin-left: 900px;
        }

    </style>
</head>
<body>
    <?php require 'nav.php' ?>


    <div class="bg-white p-8 overflow-auto mt-16 h-screen">
  <h2 class="text-2xl mb-4">Student List   <a href="create_student.php" class="btn"> <button class="bg-blue-500 text-white px-6 py-1 rounded-md text-xs md:text-sm">Add Student</button></a></h2>
  
  <!-- Classes Table -->
  <div class="relative overflow-auto">
    <div class="overflow-x-auto rounded-lg">
      <table class="min-w-full bg-white border mb-20">
        <thead>
          <tr class="bg-[#2B4DC994] text-center text-xs md:text-sm font-thin text-white">
            <th class="p-0">
              <span class="block py-2 px-3 border-r border-gray-300">ID</span>
            </th>
            <th class="p-0">
              <span class="block py-2 px-3 border-r border-gray-300">Student Name</span>
            </th>
            <th class="p-0">
              <span class="block py-2 px-3 border-r border-gray-300">Roll No.</span>
            </th>
            <th class="p-0">
              <span class="block py-2 px-3 border-r border-gray-300">Class</span>
            </th>
            <th class="p-4 text-xs md:text-sm">Actions</th>
          </tr>
        </thead>
        <tbody>
        <?php 
    

    $sql="SELECT * FROM `student`";
    $result=mysqli_query($conn,$sql);   
    if(!$result){
        die("Error".mysqli_error($conn));
    }
    else{
        while($row=mysqli_fetch_assoc($result)){
           
            ?>
            <tr class="border-b text-xs md:text-sm text-center text-gray-800">
            <td class="p-2 md:p-4"><?php echo $row['ID']; ?></td>
            <td class="p-2 md:p-4"><?php echo $row['studentName']; ?></td>
            <td class="p-2 md:p-4"><?php echo $row['studentRollNo']; ?></td>
            <td class="p-2 md:p-4"><?php echo $row['studentClass']; ?></td>
            <td class="relative p-2 md:p-4 flex justify-center space-x-2">
              <a href="edit_student.php?ID=<?php echo $row['ID']; ?>" class="bg-blue-500 text-white px-3 py-1 rounded-md text-xs md:text-sm"> Edit</a>
              <a href="delete_student.php?ID=<?php echo $row['ID']; ?>" class="bg-red-500 text-white px-3 py-1 rounded-md text-xs md:text-sm">Delete </a>
            </td>
          </tr>
          <?php
        }
    }

?>
        </tbody>
      </table>
    </div>
  </div>
</div>

</body>
</html>