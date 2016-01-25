<?PHP
#script auto checking name include by register.php
$pass1 = $_POST['pswd'];
$pass2 = $_POST['pswd2'];
if ($pass1 !== $pass2){
echo "<font class='text-error'>Password And Retype Password must be same</font>";
}
else{
echo "OK";
}
?>