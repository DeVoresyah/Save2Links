<?PHP
include("../konek.php");

if(isSet($_POST['email']))
{
$myemail = $_POST['email'];

$sql_check = mysql_query("SELECT email FROM users WHERE email='$myemail'");

if(mysql_num_rows($sql_check))
{
echo "<font class='text-error'>Email Already Used Other Users</font>";
}
else
{
echo "OK";
}}
?>