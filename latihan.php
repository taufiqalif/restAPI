<?php

function http_request($url)
{
  // curl adalah library untuk mengambil dan mengirim data melalui URL
  // curl_init (Inisialisasi)
  $ch = curl_init();

  // curl_setopt (set Option)
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

  // curl_exec (eksekusi)
  $output = curl_exec($ch);

  // curl_close (tutup curl)
  curl_close($ch);
  return $output;
}

$api = http_request("https://api.steinhq.com/v1/storages/641cfd5beced9b09e9c59b22/sheet1");
$data = json_decode($api, TRUE);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <h1>DAftar Mahasiswa</h1>
  <table>
    <tr>
      <td>NO. </td>
      <td>NIM</td>
      <td>Nama</td>
    </tr>
    <?php foreach ($data as $dt) : ?>
    <tr>
      <td>
        <?= $dt["NO"]; ?>
      </td>
      <td><?= $dt["NIM"]; ?></td>
      <td><?= $dt["NAMA"]; ?></td>
    </tr>
    <?php endforeach; ?>
  </table>
</body>

</html>