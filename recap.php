<?php
include "function.php";
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
        <form action="recap.php" method="POST">
            <button type="submit" name="hari">hari</button>
            <button type="submit" name="bulan">bulan</button>
            <button type="submit" name="tahun">tahun</button>
        </form>
        
        <?php
        $recap  = query("SELECT SUM(Teras) AS Teras,SUM(Ruang_Tengah) AS Ruang_Tengah,SUM(Ruang_Tamu) AS Ruang_Tamu,date FROM instb GROUP BY DATE(date)");
        //filter hari untuk tabel atas
        if(isset($_POST['hari'])){
            $recap  = query("SELECT SUM(Teras) AS Teras,SUM(Ruang_Tengah) AS Ruang_Tengah,SUM(Ruang_Tamu) AS Ruang_Tamu,date FROM instb GROUP BY DAY(date)");
            
        }
        if(isset($_POST['bulan'])){
            $recap  = query("SELECT SUM(Teras) AS Teras,SUM(Ruang_Tengah) AS Ruang_Tengah,SUM(Ruang_Tamu) AS Ruang_Tamu,date FROM instb GROUP BY MONTH(date)");
            
        }
        if(isset($_POST['tahun'])){
            $recap  = query("SELECT SUM(Teras) AS Teras,SUM(Ruang_Tengah) AS Ruang_Tengah,SUM(Ruang_Tamu) AS Ruang_Tamu,date FROM instb GROUP BY YEAR(date)");
            
        }
        ?>

<table cellpadding="10px" border="1px">
    <tr>
        <td>DATE</td>
        <td>Teras</td>
        <td>Ruang_Tengah</td>
        <td>Ruang_tamu</td>
    </tr>
    <?php foreach($recap as $rcp):?>
    <tr>
        <td><?= $rcp['date'];?></td>
        <td><?= $rcp['Teras'];?></td>
        <td><?= $rcp['Ruang_Tengah'];?></td>
        <td><?= $rcp['Ruang_Tamu'];?></td>
    </tr>
    <?php endforeach;?>
</table>
<br>
<form class="row mt-2 mb-2" action="recap.php" method="POST">
    <input type="date" name="tanggal">
    <input type="date" name="tanggal2">
    <button type="submit" class="btn btn-success">Sort</button>
</from>
    <?php
        // query jumlah waktu keseluruhan
        $qall="SELECT *,SEC_TO_TIME(SUM(TIME_TO_SEC(TIMEDIFF(tgl_mati, tgl_hidup)))) AS durasi FROM rumah GROUP BY DATE(date)";
        //query jumlah waktu teras
        $q1="SELECT *,SEC_TO_TIME(SUM(TIME_TO_SEC(TIMEDIFF(tgl_mati, tgl_hidup)))) AS durasi FROM rumah WHERE ruangan='Teras' GROUP BY DATE(date) ";
        //query jumlah waktu ruang_tengah
        $q2="SELECT *,SEC_TO_TIME(SUM(TIME_TO_SEC(TIMEDIFF(tgl_mati, tgl_hidup)))) AS durasi FROM rumah WHERE ruangan='Ruang Tengah' GROUP BY DATE(date)";
        //query jumlah waktu ruang_tamu
        $q3="SELECT *,SEC_TO_TIME(SUM(TIME_TO_SEC(TIMEDIFF(tgl_mati, tgl_hidup)))) AS durasi FROM rumah WHERE ruangan='Ruang Tamu' GROUP BY DATE(date)";
        
        // Query INTERVAL
        if(isset($_POST['tanggal'],$_POST['tanggal2'])) {
            // query jumlah waktu keseluruhan
            $qall="SELECT *,SEC_TO_TIME(SUM(TIME_TO_SEC(TIMEDIFF(tgl_mati, tgl_hidup)))) AS durasi FROM rumah GROUP BY DATE(date) BETWEEN '".$_POST['tanggal']."' AND '".$_POST['tanggal2']."' ";
            //query jumlah waktu teras
        $q1="SELECT *,SEC_TO_TIME(SUM(TIME_TO_SEC(TIMEDIFF(tgl_mati, tgl_hidup)))) AS durasi FROM rumah WHERE ruangan='Teras' GROUP BY DATE(date) BETWEEN '".$_POST['tanggal']."' AND '".$_POST['tanggal2']."' ";
        //query jumlah waktu ruang_tengah
        $q2="SELECT *,SEC_TO_TIME(SUM(TIME_TO_SEC(TIMEDIFF(tgl_mati, tgl_hidup)))) AS durasi FROM rumah WHERE ruangan='Ruang Tengah' GROUP BY DATE(date)BETWEEN '".$_POST['tanggal']."' AND '".$_POST['tanggal2']."' ";
        //query jumlah waktu ruang_tamu
        $q3="SELECT *,SEC_TO_TIME(SUM(TIME_TO_SEC(TIMEDIFF(tgl_mati, tgl_hidup)))) AS durasi FROM rumah WHERE ruangan='Ruang Tamu' GROUP BY DATE(date)BETWEEN '".$_POST['tanggal']."' AND '".$_POST['tanggal2']."' ";
    }
    
    $hourall = query($qall);
    $hour1 = query($q1);
    $hour2 = query($q2);
    $hour3 = query($q3);

    ?>
    <table cellpadding="10px" border="1px">
        <tr>
            <td>ruangan</td>
            <td>durasi</td>
            <td>tanggal</td>
        </tr>
        <?php foreach($hourall as $h):?>
        <tr>
            <td><?= $h['ruangan'];?></td>
            <td><?= $h['durasi'];?></td>
            <td><?= $h['date']?></td>
        </tr>
        <?php endforeach;?>
    </table>
    <br>
    <table cellpadding="10px" border="1px">
        <tr>
            <td>ruangan</td>
            <td>durasi</td>
            <td>tanggal</td>
        </tr>
        <?php foreach($hour1 as $h1):?>
        <tr>
            <td><?= $h1['ruangan'];?></td>
            <td><?= $h1['durasi'];?></td>
            <td><?= $h1['date']?></td>
        </tr>
        <?php endforeach;?>
    </table>
    <br>
    <table cellpadding="10px" border="1px">
        <tr>
            <td>ruangan</td>
            <td>durasi</td>
            <td>tanggal</td>
        </tr>
        <?php foreach($hour2 as $h2):?>
        <tr>
            <td><?= $h2['ruangan'];?></td>
            <td><?= $h2['durasi'];?></td>
            <td><?= $h2['date']?></td>
        </tr>
        <?php endforeach;?>
    </table>
    <br>
    <table cellpadding="10px" border="1px">
        <tr>
            <td>ruangan</td>
            <td>durasi</td>
            <td>tanggal</td>
        </tr>
        <?php foreach($hour3 as $h3):?>
        <tr>
            <td><?= $h3['ruangan'];?></td>
            <td><?= $h3['durasi'];?></td>
            <td><?= $h3['date']?></td>
        </tr>
        <?php endforeach;?>
    </table>
</body>
</html>