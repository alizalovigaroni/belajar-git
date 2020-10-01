<table width="400" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>Langkah 1. <br>
    Pilih Menu Konsultasi.<img src="img/IMG/img/konsultasi.png" width="900" height="300"></td>
  </tr>
  <tr>
    <td>Langkah 2.<br>
      Masukkan Identitas Pewaris.<img src="img/IMG/img/langkah1.sispakwarisan.png" width="900" height="300"></td>
  </tr>
  <tr>
    <td>Langkah 3.<br>
      Identifikasi Jumlah Harta Kekayaan Pewaris.<img src="img/IMG/img/langkah2.sispakwarisan.png" width="900" height="300"></td>
  </tr>
  <tr>
    <td>Langkah 4.<br>
      Pilih, Apakah Pewaris Sudah Menikah atau Belum.<img src="img/IMG/img/langkah3.sispakwarisan.png" width="900" height="300"></td>
  </tr>
  <tr>
    <td>Langkah 5.<br>
      Jika Sudah Selesai, Tekan Tombol &quot;Masukkan Data Pewaris&quot;, untuk Melanjutkan ketahap Selanjutnya.<img src="img/IMG/img/langkah.sispakwarisan.bmasukkandatapewaris1.png" width="900" height="300"></td>
  </tr>
  <tr>
    <td>Langkah 6.<br>
      Pilih Ahli Waris yang masih dimiliki oleh pewaris,<img src="img/IMG/img/langkah4.sispakwarisan1.png" width="900" height="300"></td>
  </tr>
  <tr>
    <td><div align="justify"><strong><u>perhatian!!!</u></strong><br>
      Sebagian tombol tidak akan bisa di pilih jika anda sudah menekan tombol yang lain, hal ini merupakan bagian dari sistem untuk mengidentifikasi siapa saja ahli waris yang berhak menerima harta waris.<br>
      contoh: jika anda memilih tombol anak, maka tombol cucu tidak aka bisa di klik, hal ini berarti cucu tidak berhak mendapatkan bagian harta warisan jika pewaris masih memiliki anak.<br>
    contoh: jika anda memilih tombol cucu, maka tombol anak tidak aka bisa di klik, hal ini berarti jika cucu sudah dipilih, maka dianggap pewaris sudah tidak memiliki anak lagi, untuk membatalkannya, silahkan pilih kembali tombol cucu untuk mengembalikan seperti semula, agar bisa memilih ahli waris yang lain.</div></td>
  </tr>
  <tr>
    <td>Langkah 7.<br>
      isi jumlah ahli waris yang masih hidup dikolom ahli waris, setelah menekan tombol ahli waris disebelahnya.<br>
    <img src="img/IMG/img/langkah4.sispakwarisan2.png" width="900" height="300"></td>
  </tr>
  <tr>
    <td>Langkah 8.<br>
      Tekan Tombol &quot;Masukkan Data Ahli Waris&quot; untuk melanjutkan ketahap selanjutnya.<img src="img/IMG/img/langkah4.sispakwarisan3.png" width="900" height="300"></td>
  </tr>
  <tr>
    <td>Langkah 9.<br>
      Masukkan Kembali data Pewaris yang masih hidup yang dimiliki oleh pewaris.<br>
      <img src="img/IMG/img/langkah5.sispakwarisan.png" width="900" height="300"></td>
  </tr>
  <tr>
    <td>Langkah 10.<br>
isi jumlah ahli waris yang masih hidup dikolom ahli waris, setelah menekan tombol ahli waris disebelahnya.<br>
    <img src="img/IMG/img/langkah5.sispakwarisan1.png" width="900" height="300"></td>
  </tr>
  <tr>
    <td>Langkah 11.<br>
      Tekan Tombol &quot;Masukkan Data Ahli Waris&quot; untuk melanjutkan ketahap selanjutnya.<br>
    <img src="img/IMG/img/langkah5.sispakwarisan2.png" width="900" height="300"></td>
  </tr>
  <tr>
    <td>Langkah 12.<br>
    Muncul Hasil konsultasi, jika anda ingi menyimpan hasil konsultasi tersebut kedalam komputer anda, silahkan tombol &quot;Simpan&quot;.<br>
    <img src="img/IMG/img/langkahhasil.sispakwarisan.png" width="900" height="300"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
<?php
if (!isset($_SESSION)) {
  session_start();
}
$MM_authorizedUsers = "";
$MM_donotCheckaccess = "true";

// *** Restrict Access To Page: Grant or deny access to this page
function isAuthorized2($strUsers, $strGroups, $UserName, $UserGroup) { 
  // For security, start by assuming the visitor is NOT authorized. 
  $isValid = False; 

  // When a visitor has logged into this site, the Session variable MM_Username set equal to their username. 
  // Therefore, we know that a user is NOT logged in if that Session variable is blank. 
  if (!empty($UserName)) { 
    // Besides being logged in, you may restrict access to only certain users based on an ID established when they login. 
    // Parse the strings into arrays. 
    $arrUsers = Explode(",", $strUsers); 
    $arrGroups = Explode(",", $strGroups); 
    if (in_array($UserName, $arrUsers)) { 
      $isValid = true; 
    } 
    // Or, you may restrict access to only certain users based on their username. 
    if (in_array($UserGroup, $arrGroups)) { 
      $isValid = true; 
    } 
    if (($strUsers == "") && true) { 
      $isValid = true; 
    } 
  } 
  return $isValid; 
}

$MM_restrictGoTo = "index.php";
if (!((isset($_SESSION['MM_Username'])) && (isAuthorized2("",$MM_authorizedUsers, $_SESSION['MM_Username'], $_SESSION['MM_UserGroup'])))) {   
  $MM_qsChar = "?";
  $MM_referrer = $_SERVER['PHP_SELF'];
  if (strpos($MM_restrictGoTo, "?")) $MM_qsChar = "&";
  if (isset($QUERY_STRING) && strlen($QUERY_STRING) > 0) 
  $MM_referrer .= "?" . $QUERY_STRING;
  $MM_restrictGoTo = $MM_restrictGoTo. $MM_qsChar . "accesscheck=" . urlencode($MM_referrer);
  header("Location: ". $MM_restrictGoTo); 
  exit;
}
?>
