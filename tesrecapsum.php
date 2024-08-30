<?php
    include 'function.php';
    
    $query = mysqli_query($conn, 'SELECT sum(Teras) as Teras, sum(Ruang_Tengah) as Ruang_Tengah, sum(Ruang_Tamu) as Ruang_Tamu, create_date FROM instb')
    // $datas = mysqli_fetch_array($datas);
    // var_dump($datas);
?>

<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <title>INDEKS KEPUASAN...</title>
    </head>
    <body style="background: rgb(242, 242, 242);">
        <div class="jumbotron jumbotron-fluid bg-info text-white">
            <div class="container text-center">
              <h1 class="display-4">Rekap Laporan Penilaian</h1>
              
            </div>
        </div>

        <style type="text/css">
            .box{
                padding: 30px 40px;
                border-radius: 5px;
            }
        </style>

    <!--awal container-->
        <div class="container">
            <table class="table">
                <thead>
                    <tr class="table-secondary">
                    <th scope="col">No.</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Teras</th>
                    <th scope="col">Ruang Tengah</th>
                    <th scope="col">Ruang Tamu</th>
                  </tr>
                </thead>
                <tbody>
                    <?php 
                        $i = 0;
                        while($data = mysqli_fetch_array($query)) {  
                        $i++;
                    ?>
                  <tr>
                    <th scope="row"><?= $i ?></th>
                    <td><?= $data['create_date']?></td>
                    <td><?= $data['Teras'] ?></td>
                    <td><?= $data['Ruang_Tengah'] ?></td>
                    <td><?= $data['Ruang_Tamu'] ?></td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            <div class="alert alert-info" role="alert">
                <a href="index.php">Kembali ke Halaman Utama</a>
            </div>

        </div>

        
    <!--akhir container-->
        <footer class="bg-info text-center text-white mt-3 bt-2 pb-2">
            © COPYRIGHT | 14495_TALISTA | 14500_SAFAIRA | 14506_ERNA 
        </footer>



    </body>
</html>