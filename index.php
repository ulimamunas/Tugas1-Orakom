<?php
include "function.php";

$lampquery = query("SELECT * FROM Lampu")

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

    <title>Kontrol Lampu</title>

 <script type="text/javascript" src="jquery/jquery.min.js"></script>
</head>

<body>
  <header>
    <h1 class="header" id="header">KONTROL LAMPU RUMAH</h1>
  </header>

  <table width="800px" height="500px" cellspacing="0" cellpadding="15" align="center">
    <tr>
      <td style="background-color: #b2ab65; color: #00000099;" rowspan="2">Dapur</td>
      <td style="background-color: #b2ab65;"></td>
      <td style="background-color: #3f6b3b; color: #ffffff99;" colspan="2">Taman</div></td>
      <td style="background-color: #7c899a;"></td>
      <td style="background-color: #7c899a; color: #00000099;">R. Cuci/Jemur</td>
      <td style="background-color: #c3c3aa;" rowspan="5">
      <?php //$i=0?>
      <?php foreach($lampquery as $lq) :?>
        <?php
          if($lq["Ruang_Tengah"]==1){
            echo
            '<div class="tengah nyala" >
              <a href="active.php?id='.$lq["id"].'&Ruang_Tengah=0"><button>R. Tengah</button></a>
            </div>';
          }
          else{
            echo
            '<div class="tengah mati" >
              <a href="active.php?id='.$lq["id"].'&Ruang_Tengah=1"><button>R. Tengah</button></a>
            </div>';
          }
        ?>
        <?php
          if($lq["Ruang_Tamu"]==1){
            echo
            '<div class="tamu nyala" >
              <a href="active.php?id='.$lq["id"].'&Ruang_Tamu=0"><button>R. Tamu</button></a>
            </div>';
          }
          else{
            echo
            '<div class="tamu mati" >
              <a href="active.php?id='.$lq["id"].'&Ruang_Tamu=1"><button>R. Tamu</button></a>
            </div>';
          }
        ?>
        <?php
          if($lq["Teras"]==1){
            echo
            '<div class="teras nyala" >
              <a href="active.php?id='.$lq["id"].'&Teras=0"><button>Teras</button></a>
            </div>';
          }
          else{
            echo
            '<div class="teras mati" >
              <a href="active.php?id='.$lq["id"].'&Teras=1"><button>Teras</button></a>
            </div>';
          }
        ?>
      

      <?php //$i++; ?>
      <?php endforeach; ?>
      </td>
    </tr>
    <tr>
      <td style="background-color: #212120;" rowspan="3"></td>
      <td style="background-color: #212120;" colspan="2"></td>
      <td style="background-color: #212120;" rowspan="3"></td>
      <td style="background-color: #b0833e; color: #00000099;" rowspan="2">Kamar Tidur</td>
    </tr>
    <tr>
      <td style="background-color: #41372b; color: #ffffff99;">Gudang</td>
      <td style="background-color: #212120; color: #ffffff99;" colspan="2">R. Tengah
        <div class="lampuluartengah"></div>
        <?php foreach($lampquery as $lq) :?>
        <?php
        if($lq["Ruang_Tengah"]==1){
          echo 
          '<div class="lampudalamtengah" style="display:flex;"></div>';
        }
        else{
          echo
          '<div class="lampudalamtengah" style="display:none;"></div>';
        }
        ?>
        <?php endforeach;?>
      </td>
    </tr>
    <tr>
      <td style="background-color: #505050; color: #ffffff99;" rowspan="2" height="80px">Carport</td>
      <td style="background-color: #212120; color: #ffffff99;" colspan="2">R. Tamu
        <div class="lampuluartamu"></div>
        <?php foreach($lampquery as $lq) :?>
        <?php
        if($lq["Ruang_Tamu"]==1){
          echo 
          '<div class="lampudalamtamu" style="display:flex;"></div>';
        }
        else{
          echo
          '<div class="lampudalamtamu" style="display:none;"></div>';
        }
        ?>
        <?php endforeach;?>
      </td>
      <td style="background-color: #85a070; color: #00000099;">Kamar Tidur</td>
    </tr>
    <tr>
      <td style="background-color: #303030; color: #ffffff99;" colspan="5">Teras
        <div class="lampuluarteras"></div>
        <?php foreach($lampquery as $lq) :?>
        <?php
        if($lq["Teras"]==1){
          echo 
          '<div class="lampudalamteras" style="display:flex;"></div>';
        }
        else{
          echo
          '<div class="lampudalamteras" style="display:none;"></div>';
        }
        ?>
        <?php endforeach;?>
        
      </td>
    </tr>
  </table>
  <div class="cek" id="cek"></div>
  <script type="text/javascript" src="script.js"></script>
  <script type="text/javascript" src="scriptcoding.js"></script>
  <!-- Optional JavaScript; choose one of the two! -->
  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  -->
</body>
</html>
