<?php
include("connection.php");
?>
<?php
if(isset($_POST['search']))
{
$search= $_POST['id'];
$query="select * from form where id='$search'";
$data=mysqli_query($conn,$query);
//data are store in the form of array
$result=mysqli_fetch_assoc($data);
//$name=$result['emp_name'];
//echo $name;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Software Development</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="center">
        <form method="POST" action="#" autocomplete="off">
        <h1>Employee Data Entry Automation Software</h1>
        <div class="form">
            <input type="text" class="textfield" placeholder="Search ID" name="id" value="<?php if(isset($_POST['search'])){echo $result['id'];} ?>">
            <input type="text" class="textfield" placeholder="Employee Name" name="name" value="<?php if(isset($_POST['search'])){echo $result['emp_name'];}?>">
            <select class="textfield" name="gender">
                <option value="Not Selected">Select Gender</option>
                <option value="Male"<?php if($result['emp_gender']=="Male"){
                    echo "Selected";
                } ?>>Male</option>
                <option value="Female" <?php if($result['emp_gender']=="Female"){
                    echo "Selected";
                } ?>>Female</option>
                <option value="Others" <?php if($result['emp_gender']=="Others"){
                    echo "Selected";
                } ?>>Others</option>
            </select>
            <input type="text" class="textfield" placeholder="Email Address" name="email" value="<?php if(isset($_POST['search'])){echo $result['emp_email'];}?>">
            <select class="textfield" name="department">
                <option value="Not Selected">Select Department</option>
                <option value="IT"  <?php if($result['emp_department']=="IT"){
                    echo "Selected";
                } ?>>IT</option>
                <option value="Accounts"  <?php if($result['emp_department']=="Accounts"){
                    echo "Selected";
                } ?>>Accounts</option>
                <option value="Sales"  <?php if($result['emp_department']=="Sales"){
                    echo "Selected";
                } ?>>Sales</option>
                <option value="HR"  <?php if($result['emp_department']=="HR"){
                    echo "Selected";
                } ?>>HR</option>
                <option value="Marketing"  <?php if($result['emp_gender']=="Marketing"){
                    echo "Selected";
                } ?>>Marketing</option>
            </select>
            <textarea placeholder="Address" name="address"><?php if(isset($_POST['search'])){echo $result['emp_address'];} ?></textarea> 
            <input type="submit" value="Search"  class="btn" name="search">
            <input type="submit" value="Save"  class="btn" name="save" style="background-color: green;">
            <input type="submit" value="Modify"  class="btn" name="update" style="background-color: orange;">
            <input type="submit" value="Delete"  class="btn" name="delete" style="background-color: red;" onclick=" return checkdelete()">
            <input type="submit" value="Clear"  class="btn" name="" style="background-color: blue;">
        </div>
        </form>
    </div>
    
</body>
</html>
<script>
    function checkdelete(){
       return confirm('Are you wanted to delete this record ?');

        }
</script>
<?php
 $id         =$_POST['id'];
 $name       =$_POST['name'];
 $gender     =$_POST['gender'];
 $email      =$_POST['email'];
 $department =$_POST['department'];
 $address    =$_POST['address'];
if(isset($_POST['save']) and !empty($name) and !empty($email) and !empty($address)){
    $query= "insert into form(id,emp_name,emp_gender,emp_email,emp_department,emp_address)
    values('$id','$name','$gender','$email','$department','$address')";
    $data=mysqli_query($conn,$query);
    if($data){
        echo "<script>alert('Data Saved into Database');</script>";
    }else{
        echo "Failed to save Data";
    }
}
?>
<?php

if(isset($_POST['delete'])){
    $id=$_POST['id'];
 // echo $id;
    $query = "delete from form where id= '$id'";
    $data=mysqli_query($conn,$query);
    if($data){
        echo "<script>alert('Record Deleted');</script>";
    }else{
        echo "Failed to Delete";
    }

}
?>
<?php
if(isset($_POST['update'])){
    $id         =$_POST['id'];
    $name       =$_POST['name'];
    $gender     =$_POST['gender'];
    $email      =$_POST['email'];
    $department =$_POST['department'];
    $address    =$_POST['address'];
$query="update form set emp_name='$name',emp_gender='$gender',emp_email='$email',emp_department='$department',emp_address='$address' where id='$id'";
$data=mysqli_query($conn,$query);
if($data){
    echo "<script>alert('Record Updated');</script>";
}else{
    echo "<script>alert('Failed to Update');</script>";
    
}
}
?>
