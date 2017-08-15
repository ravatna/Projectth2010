<?PHP
error_reporting(E_ALL ^ E_DEPRECATED);

date_default_timezone_set("Asia/Bangkok");
############ DATABASE CONNECTION #################

// local //
$host = "localhost";
$user = "root";
$pass = "12345678";
$dbname = "wfm";
$connect = mysql_connect($host,$user,$pass);

$data = mysql_query($dbname);
$objDB = mysql_select_db($dbname);
mysql_query("SET NAMES UTF8");
mysql_query("SET character_set_results=utf8");
mysql_query("SET character_set_client=utf8");
mysql_query("SET character_set_connection=utf8");
setlocale(LC_ALL, 'th_TH');

############ GENERAL SETTING ######################
$title = "library system";
$version = "?version=1.333";
?>