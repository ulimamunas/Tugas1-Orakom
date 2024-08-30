<?php 
$koneksi = mysqli_connect("localhost", "root", "", "db_Lampu" );
$sql = mysqli_query($koneksi, "SELECT * FROM lampu order by id desc");
$data = mysqli_fetch_array($sql);
$Ruang_Tengah = $data['Ruang_Tengah'];

if($Ruang_Tengah == "") $Ruang_Tengah = 0;
echo $Ruang_Tengah ;

 ?>