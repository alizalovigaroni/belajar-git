<?php require_once('Connections/pakarwarisanislam.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}
?>
<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['username'])) {
  $loginUsername=$_POST['username'];
  $password=$_POST['password'];
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "menu.pengguna.php";
  $MM_redirectLoginFailed = "index.php";
  $MM_redirecttoReferrer = true;
  mysql_select_db($database_pakarwarisanislam, $pakarwarisanislam);
  
  $LoginRS__query=sprintf("SELECT username_pengguna, password FROM login_pengguna WHERE username_pengguna=%s AND password=%s",
    GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "text")); 
   
  $LoginRS = mysql_query($LoginRS__query, $pakarwarisanislam) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
     $loginStrGroup = "";
    
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;	      

    if (isset($_SESSION['PrevUrl']) && true) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Selamat Datang</title>
<script src="SpryAssets/SpryTabbedPanels.js" type="text/javascript"></script>
<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="SpryAssets/SpryTabbedPanels.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryMenuBarVertical.css" rel="stylesheet" type="text/css" />
</head>

<body>
<form ACTION="<?php echo $loginFormAction; ?>" id="form1" name="form1" method="POST">
  <table width="835" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td colspan="2" align="center" valign="top">
	  </td>
    </tr>
    <tr>
      <td colspan="2" align="center" valign="top"><?php include('header.php'); ?>
      </td>
</tr>
    <tr>
      <td colspan="2" align="center" valign="top">
      <div align="center"><font face="georgia" color="white"><strong>
        <marquee behavior="alternate" bgcolor="red" width="98%" scrollamount="7" class="gf">
          SELAMAT DATANG DI SISTEM PAKAR PEMBAGIAN HARTA WARIS MENURUT HUKUM ISLAM
          </marquee>
      </strong></font></div>          
      
      </td>
    </tr>
    <tr>
      <td width="200" align="left" valign="top"><table width="200" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td height="356" valign="top"><p>Masuk Sebagai:</p>
            <ul id="MenuBar1" class="MenuBarHorizontal">
              <li><a href="#" class="MenuBarItemSubmenu">Pengguna</a>
                <ul>
                  <li><a href="login.admin.php">Admin</a></li>
                  </ul>
                </li>
              </ul>
            <p><br />
              <br />
              Nama Pengguna:
              <br />
              <label>
                <input type="text" name="username" id="username" />
              </label>
              <br />
              Kata Sandi:<br />
<label>
  <input type="password" name="password" id="textfield4" />
              </label>
<br />
<label>
  <input type="submit" name="button" id="button" value="Masuk" />
</label>
            </p>
<p>Belum Memiliki Akses??<br />
  Daftar <a href="daftar.pengguna.php">Disini</a>
              <script type="text/javascript">
<!--
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
//-->
              </script>
            </p></td>
        </tr>
        </table></td>
      <td width="634" align="center" valign="top"><div id="TabbedPanels1" class="TabbedPanels">
        <ul class="TabbedPanelsTabGroup">
          <li class="TabbedPanelsTab" tabindex="0">Apa itu  Warisan?<br /> </li>
		  <li class="TabbedPanelsTab" tabindex="0">Kenapa Perlu Belajar tentang Warisan?</li>
          <li class="TabbedPanelsTab" tabindex="0">Dasar Hukum Warisan</li>
          <li class="TabbedPanelsTab" tabindex="0">Buku Tamu</li>
          <li class="TabbedPanelsTab" tabindex="0">About</li>
</ul>
        <div class="TabbedPanelsContentGroup">
          
          <div class="TabbedPanelsContent">  <?php include('apa.itu.warisan.php'); ?> </div>
		  <div class="TabbedPanelsContent">  <?php include('kenapa.belajar.warisan.php'); ?> </div>
          <div class="TabbedPanelsContent">  <?php include('dasar.hukum.warisan.php'); ?> </div>
          <div class="TabbedPanelsContent">  <?php include('buku.tamu.php'); ?>  </div>
          <div class="TabbedPanelsContent">  <?php include('about.index.php'); ?> </div>
</div>
      </div></td>
    </tr>
    <tr>
      <td colspan="2" align="center" valign="top"
      
      bgcolor="#0000FF">
         <div align="center"><font face="georgia" color="white"><strong>
        <marquee behavior="alternate" bgcolor="red" width="49%" scrollamount="7" class="dhdh">
          ver. 1.0 aliza.loviga.roni@gmail.com (c) 2015
          </marquee>
      </strong></font></div>
      
      </td>
    </tr>
  </table>
</form>
<script type="text/javascript">
<!--
var TabbedPanels1 = new Spry.Widget.TabbedPanels("TabbedPanels1");
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
//-->
</script>
</body>
</html>