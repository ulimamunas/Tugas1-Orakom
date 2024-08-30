<?php
include "function.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="stylebaru.css">
    <title>Rekap Sum Nyala</title>
</head>
<body>
	<center><h1>REKAP SUM NYALA</h1></center>

    <!-- <form action="recapsum.php" class="row" method="post">
        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-info" name="hari">Hari</button>
            <button type="submit" class="btn btn-info" name="bulan">Bulan</button>
            <button type="submit" class="btn btn-info" name="tahun">Tahun</button>
        </div>
    </form> -->

    <!-- <?php
    $recap = query("SELECT SUM(Teras) AS Teras, SUM(Ruang_Tengah) AS Ruang_Tengah, SUM(Ruang_Tamu) AS Ruang_Tamu, date FROM instb GROUP BY DATE (date)");

    if(isset($_POST['hari'])){
        $recap = query("SELECT SUM(Teras) AS Teras, SUM(Ruang_Tengah) AS Ruang_Tengah, SUM(Ruang_Tamu) AS Ruang_Tamu, date FROM instb GROUP BY DAY (date)");
    }
    if(isset($_POST['bulan'])){
        $recap = query("SELECT SUM(Teras) AS Teras, SUM(Ruang_Tengah) AS Ruang_Tengah, SUM(Ruang_Tamu) AS Ruang_Tamu, date FROM instb GROUP BY MONTH (date)");
    }
    if(isset($_POST['tahun'])){
        $recap = query("SELECT SUM(Teras) AS Teras, SUM(Ruang_Tengah) AS Ruang_Tengah, SUM(Ruang_Tamu) AS Ruang_Tamu, date FROM instb GROUP BY YEAR (date)");
    }
    ?> -->


<table align="center" cellspacing='0' style="margin-bottom: 50px; margin-top: 30px;">
    <thead>
        <tr>
            <th>Tanggal</th>
            <th>Teras</th>
            <th>Ruang Tengah</th>
            <th>Ruang Tamu</th>
        </tr>
    </thead>
    
    <tbody>
        <?php foreach ($recap as $rcp):?>
            <tr>
                <td><?= $rcp['date'];?></td>
                <td><?= $rcp['Teras'];?></td>
                <td><?= $rcp['Ruang_Tengah'];?></td>
                <td><?= $rcp['Ruang_Tamu'];?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <form action="recapsum.php" class="row" method="post">
        <div class="col-4"></div>
            <div class="col-2">
                <input type="date" name="tanggal" class="form-control mb-2">
            </div>
            <div class="col-2">
                <input type="date" name="tanggal2" class="form-control mb-2">
            </div>
        <div class="col-4"></div>
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-info mb-3">Sort</button>
            </div>
    </form>
    <?php
    // $qall = "SELECT *, SEC_TO_TIME(SUM(TIME_TO_SEC(TIMEDIFF(tgl_mati, tgl_hidup)))) AS durasi FROM rumah GROUP BY DATE (create_date)";
    $q1 = "SELECT *, SEC_TO_TIME(SUM(TIME_TO_SEC(TIMEDIFF(tgl_mati, tgl_hidup)))) AS durasi FROM rumah WHERE ruangan='Teras' GROUP BY DATE (create_date)";
    $q2 = "SELECT *, SEC_TO_TIME(SUM(TIME_TO_SEC(TIMEDIFF(tgl_mati, tgl_hidup)))) AS durasi FROM rumah WHERE ruangan='Ruang Tengah' GROUP BY DATE (create_date)";
    $q3 = "SELECT *, SEC_TO_TIME(SUM(TIME_TO_SEC(TIMEDIFF(tgl_mati, tgl_hidup)))) AS durasi FROM rumah WHERE ruangan='Ruang Tamu' GROUP BY DATE (create_date)";
    
    if(isset($_POST['tanggal'],$_POST['tanggal2'])){
        // $qall = "SELECT *, SEC_TO_TIME(SUM(TIME_TO_SEC(TIMEDIFF(tgl_mati, tgl_hidup)))) AS durasi FROM rumah GROUP BY DATE (create_date) BETWEEN '".$_POST['tanggal']."' AND '".$_POST['tanggal2']."' ";
        $q1 = "SELECT *, SEC_TO_TIME(SUM(TIME_TO_SEC(TIMEDIFF(tgl_mati, tgl_hidup)))) AS durasi FROM rumah WHERE ruangan='Teras' AND DATE (create_date) BETWEEN '".$_POST['tanggal']."' AND '".$_POST['tanggal2']."' GROUP BY DATE (create_date) BETWEEN '".$_POST['tanggal']."' AND '".$_POST['tanggal2']."' ";
        $q2 = "SELECT *, SEC_TO_TIME(SUM(TIME_TO_SEC(TIMEDIFF(tgl_mati, tgl_hidup)))) AS durasi FROM rumah WHERE ruangan='Ruang Tengah' AND DATE (create_date) BETWEEN '".$_POST['tanggal']."' AND '".$_POST['tanggal2']."' GROUP BY DATE (create_date) BETWEEN '".$_POST['tanggal']."' AND '".$_POST['tanggal2']."' ";
        $q3 = "SELECT *, SEC_TO_TIME(SUM(TIME_TO_SEC(TIMEDIFF(tgl_mati, tgl_hidup)))) AS durasi FROM rumah WHERE ruangan='Ruang Tamu' AND DATE (create_date) BETWEEN '".$_POST['tanggal']."' AND '".$_POST['tanggal2']."' GROUP BY DATE (create_date) BETWEEN '".$_POST['tanggal']."' AND '".$_POST['tanggal2']."' ";
    }

    // $hourall = query($qall);
    $hour1 = query($q1);
    $hour2 = query($q2);
    $hour3 = query($q3);

    ?>

    <!-- <table align="center" cellspacing='0' style="margin-bottom: 50px;">
        <thead>
            <tr>
                <td>ruangan</td
                <td>tanggal</td>
                <td>durasi</td>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($hourall as $h):?>
        <tr>
            <td><?= $h['ruangan'];?></td
            <td><?= $h['create_date'];?></td>
            <td><?= $h['durasi'];?></td>
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table> -->
    <table align="center" cellspacing='0' style="margin-bottom: 50px;">
        <thead>
            <tr>
                <td>tanggal</td>
                <td>ruangan</td>
                <td>durasi</td>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($hour1 as $h1):?>
        <tr>
            <td><?= $h1['create_date'];?></td>
            <td><?= $h1['ruangan'];?></td>
            <td><?= $h1['durasi'];?></td>
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <table align="center" cellspacing='0' style="margin-bottom: 50px;">
        <thead>
            <tr>
                <td>tanggal</td>
                <td>ruangan</td>
                <td>durasi</td>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($hour2 as $h2):?>
        <tr>
            <td><?= $h2['create_date'];?></td>
            <td><?= $h2['ruangan'];?></td>
            <td><?= $h2['durasi'];?></td>
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <table align="center" cellspacing='0' style="margin-bottom: 50px;">
        <thead>
            <tr>
                <td>tanggal</td>
                <td>ruangan</td>
                <td>durasi</td>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($hour3 as $h3):?>
        <tr>
            <td><?= $h3['create_date'];?></td>
            <td><?= $h3['ruangan'];?></td>
            <td><?= $h3['durasi'];?></td>
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    </center>
</body>
</html>