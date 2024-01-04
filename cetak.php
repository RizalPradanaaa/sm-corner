<?php

require_once __DIR__ . '/vendor/autoload.php';

$html = '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak</title>
    <style>
    table {
        max-width: 100%;
        max-height: 100%;
    }
    body {
        padding: 5px;
        position: relative;
        width: 100%;
        height: 100%;
    }
    table th,
    table td {
        padding: .625em;
      text-align: center;
    }
    .left {
        text-align: left;
    }
    table #caption {
      font-size: 1.5em;
      margin: .5em 0 .75em;
    }
    table.border {
      width: 100%;
      border-collapse: collapse
    }
    
    table.border tbody th, table.border tbody td {
      border: thin solid #000;
      padding: 2px
    }
    .ttd td, .ttd th {
        padding-bottom: 4em;
    }
    </style>
</head>
<body>
    
<div id="printable" class="container">
<table border="0" cellpadding="0" cellspacing="0" width="485" class="border" style="overflow-x:auto;">
  <thead>
  <tr>
    <td colspan="6" width="485" id="caption">SM CORNER MAYONG</td>
  </tr>
  <tr>
    <td colspan="2">Nama Admin :</td>
    <td class="left kop">Suparman</td>
    <td></td>
    <td>Tanggal</td>
    <td class="left kop">Wonosobo, 22 Maret 2019</td>
  </tr>
  <tr>
    <td colspan="2"></td>
    <td class="left kop"></td>
    <td></td>
    <td>Perihal</td>
    <td class="left kop">Sewa Harian</td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  </thead>
  <tbody>
    <tr>
      <th>No</th>
      <th>HARSAT</th>
      <th>JUMLAH</th>
      <th>TOTAL</th>
      <th colspan="2">KETERANGAN</th>
    </tr>
    <tr>
      <td align="right">1</td>
      <td>Rp 400.000</td>
      <td align="right">1</td>
      <td>Rp 400.000</td>
      <td colspan="2"> Semayu</td>
    </tr>
    <tr>
      <th colspan="3"> TOTAL</th>
      <td>Rp 400.000</td>
      <td colspan="2"></td>
    </tr>
  </tbody>
  <tfoot>
    <tr>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
    </tr>
    <tr class="ttd">
      <th colspan="2">Customer</th>
      <th colspan="2">Diterima</th>
      <th colspan="2">Mengetahui</th>
    </tr>
    <tr>
      <td colspan="2">Cv Akarmas Curva</td>
      <td colspan="2">Saseh Sunifah</td>
      <td colspan="2">Bambang Widiyoko</td>
    </tr>
  </tfoot>
</table>
</div>

</body>
</html>';
$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML($html);
$mpdf->Output();