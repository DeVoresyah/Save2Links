<?PHP
include("../konek.php");

if(isSet($_POST['uname']))
{
$username = $_POST['uname'];

$sql_check = mysql_query("SELECT username FROM users WHERE username='$username'");

if(mysql_num_rows($sql_check))
{
echo "<font class='text-error'>Username Unavailable</font>";
}
else
{
echo "OK";
}}
?>