<?php 
$koneksi = mysqli_connect("localhost", "root", "", "dblampu" );
$sql = mysqli_query($koneksi, "SELECT * FROM lampu order by id desc");
$data = mysqli_fetch_array($sql);
$Ruang_Tamu = $data['Ruang_Tamu'];

if($Ruang_Tamu == "") $Ruang_Tamu = 0;
echo $Ruang_Tamu ;

 ?>