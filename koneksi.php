<?php
$koneksi = mysqli_connect("localhost", "root", "", "dbpolling" );
$sql = mysqli_query($koneksi, "SELECT * FROM tb_polling order by id desc");
$data = mysqli_fetch_array($sql);

?>