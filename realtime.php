<?php

  function realtime($host, $port, $pesan){

    $socket = socket_create(AF_INET, SOC_DGRAM, SOL_UDP);
    $result = socket_connect($socket, $host, $port);
    if($result==false) return false;

    socket_write($socket, $pesan, strlen($pesan));

    $data_diterima = socket_read($socket, $port);
    $socket_close($socket);

    return $data_diterima;
  }

  $hasil = realtime('192.168.1.12', '80', '1');
  echo $hasil;

?>