<?php
session_start();
?>
<?php
error_reporting(0);
$servername   = "localhost";
$username     = "root";
$password     = "";
$dbname       = "employee";
$userprofile=$_SESSION['user_name'];
if($userprofile== true){

}else{
    header('location:http://localhost/User%20Login%20and%20Logout%20System%20using%20Session/login.php');
}
$conn = mysqli_connect($servername,$username,$password,$dbname);
if($conn){
    echo "Connection Ok";
}
else{
    echo "Connection Failed".mysqli_connect_error();
}

?>