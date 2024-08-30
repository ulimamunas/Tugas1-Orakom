<?php
include "function.php";
$id = $_GET['id'];
$Teras = $_GET['Teras'];
$Ruang_Tengah = $_GET['Ruang_Tengah'];
$Ruang_Tamu = $_GET['Ruang_Tamu'];
if(isset($Teras)){
    $updatequery = "UPDATE lampu SET Teras=$Teras WHERE id=$id";
    if($Teras==1){
        mysqli_query($conn,"INSERT INTO rumah(ruangan,status_lampu) VALUES (\"teras\",$Teras)");
    }<?php
    include "function.php";
    //Ruang_Tengah=$Ruang_Tengah,Ruang_tamu=$Ruang_tamu,
    $id = $_GET['id'];
    $Teras = $_GET['Teras'];
    $Ruang_Tengah = $_GET['Ruang_Tengah'];
    $Ruang_Tamu = $_GET['Ruang_Tamu'];
    if(isset($Teras)){
        $updatequery = "UPDATE lampu SET Teras=$Teras WHERE id=$id";
        if($Teras==1){
            mysqli_query($conn,"INSERT INTO rumah(ruangan,status_lampu) VALUES ('Teras',$Teras)");
        }
        if($Teras==0){
            mysqli_query($conn,"UPDATE rumah SET tgl_mati=NOW()  WHERE id = (SELECT MAX(id) FROM rumah) ");
        }
        mysqli_query($conn,"INSERT INTO instb(Teras,Ruang_Tengah,Ruang_Tamu) VALUES ($Teras,0,0)");
    }
    if(isset($Ruang_Tengah)){
        $updatequery = "UPDATE lampu SET Ruang_Tengah=$Ruang_Tengah WHERE id=$id";
        if($Ruang_Tengah==1){
            mysqli_query($conn,"INSERT INTO rumah(ruangan,status_lampu) VALUES ('Ruang_Tengah',$Ruang_Tengah)");
        }
        if($Ruang_Tengah==0){
            mysqli_query($conn,"UPDATE rumah SET tgl_mati=NOW()  WHERE id = (SELECT MAX(id) FROM rumah) ");
        }
        mysqli_query($conn,"INSERT INTO instb(Teras,Ruang_Tengah,Ruang_Tamu) VALUES (0,$Ruang_Tengah,0)");
    }
    if(isset($Ruang_Tamu)){
        $updatequery = "UPDATE lampu SET Ruang_Tamu=$Ruang_Tamu WHERE id=$id";
        if($Ruang_Tamu==1){
            mysqli_query($conn,"INSERT INTO rumah(ruangan,status_lampu) VALUES ('Ruang_Tamu',$Ruang_Tamu)");
        }
        if($Ruang_Tamu==0){
            mysqli_query($conn,"UPDATE rumah SET tgl_mati=NOW()  WHERE id = (SELECT MAX(id) FROM rumah) ");
        }
        mysqli_query($conn,"INSERT INTO instb(Teras,Ruang_Tengah,Ruang_Tamu) VALUES (0,0,$Ruang_Tamu)");
    }
    mysqli_query($conn,$updatequery);
    
    header('location:index.php');
    ?>
    if($Teras==0){
        mysqli_query($conn,"UPDATE rumah SET tgl_mati=NOW()");
    }
    mysqli_query($conn,"INSERT INTO instb(Teras, Ruang_Tengah, Ruang_Tamu) VALUES ($Teras,0,0)");
}
if(isset($Ruang_Tengah)){
    $updatequery = "UPDATE lampu SET Ruang_Tengah=$Ruang_Tengah WHERE id=$id";
    mysqli_query($conn,"INSERT INTO instb(Teras, Ruang_Tengah, Ruang_Tamu) VALUES (0,$Ruang_Tengah,0)");
}
if(isset($Ruang_Tamu)){
    $updatequery = "UPDATE lampu SET Ruang_Tamu=$Ruang_Tamu WHERE id=$id";
    mysqli_query($conn,"INSERT INTO instb(Teras, Ruang_Tengah, Ruang_Tamu) VALUES (0,0,$Ruang_Tamu)");
}
mysqli_query($conn,$updatequery);

header('location:index.php');
?>