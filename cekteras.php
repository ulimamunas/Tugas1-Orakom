<?php 
$koneksi = mysqli_connect("localhost", "root", "", "db_Lampu" );
$sql = mysqli_query($koneksi, "SELECT * FROM lampu order by id desc");
$data = mysqli_fetch_array($sql);
$Teras = $data['Teras'];

if($Teras == "") $Teras = 0;
echo $Teras ;

 ?>