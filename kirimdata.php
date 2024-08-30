<?php 
$conn = mysqli_connect("localhost", "root", "", "db_Lampu" );
$Teras = $_GET['Teras'];
$Ruang_Tengah = $_GET['Ruang_Tengah'];
$Ruang_tamu = $_GET['Ruang_tamu'];

mysqli_query($conn, "ALTER TABLE lampu AUTO_INCREMENT=1");
$simpan = mysqli_query($koneksi, "INSERT INTO lampu(Teras, Ruang_Tengah, Ruang_tamu) VALUES('$Teras', '$Ruang_Tengah', '$Ruang_Tamu')");
if($simpan)
echo "berhasil tersimpan" ;
else
echo "tidak tersimpan" ;

 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
 </head>
 <body>
    <a href="index.php">balik</a>
 </body>
 </html>