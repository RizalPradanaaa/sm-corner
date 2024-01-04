<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SM - CORNER</title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url('public/assets') ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('public/assets') ?>/css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('public/css') ?>/style.css">

</head>

<body>

<div class="card">
  <div class="card-body">
    <div class="container mb-5 mt-3">
      <div class="row d-flex align-items-baseline">
        <div class="col-xl-9">
          <p style="color: #7e8d9f;font-size: 20px;"><strong><?php echo date("j F Y");?></strong></p>
        </div>
        <hr>
      </div>

      <div class="container">
        <div class="col-md-12">
          <div class="text-center">
            <img src="<?= base_url('public/assets') ?>/img/logo.png" alt="logo sm" width="30%">
          </div>

        </div>


        <div class="row">
          <div class="col-xl-8">
            <ul class="list-unstyled">
              <li class="text-muted">Dari: <span style="color:#5d9fc5 ;">Admin</span></li>
              <li class="text-muted">Jl. Pegadaian Mayong No.12,</li>
              <li class="text-muted">Kec. Mayong, Kabupaten Jepara,</li>
              <li class="text-muted">Jawa Tengah 59465</li>
              <li class="text-muted"><i class="fas fa-phone"></i> 123-456-789</li>
            </ul>
          </div>
          <div class="col-xl-4">
            <p class="text-muted">Nota</p>
            <ul class="list-unstyled">
              <li class="text-muted"><i class="fas fa-circle" style="color:#ff1ca3 ;"></i> <span
                  class="fw-bold">ID:</span>#123-456</li>
              <li class="text-muted"><i class="fas fa-circle" style="color:#ff1ca3 ;"></i> <span
                  class="fw-bold">Tanggal: </span><?php echo date("j F Y");?></li>
              <li class="text-muted"><i class="fas fa-circle" style="color:#ff1ca3 ;"></i> <span
                  class="me-1 fw-bold">Status:</span><span class="badge bg-warning text-black fw-bold">
                  Dibayar</span></li>
            </ul>
          </div>
        </div>

        <div class="row my-2 mx-1 justify-content-center">
          <table class="table table-striped table-borderless">
            <thead style="background-color:#ff1ca3 ;" class="text-white">
              <tr>
                <th scope="col">Kode</th>
                <th scope="col">Nama</th>
                <th scope="col">Jumlah</th>
                <th scope="col">Harga Satuan</th>
                <th scope="col">Total</th>
              </tr>
            </thead>
            <tbody>
            <?php foreach($kasir as $ksr) :?>
              <tr>
                <th scope="row"><?= $ksr['kode']; ?></th>
                <td><?= $ksr['nama']; ?></td>
                <td><?= $ksr['jumlah']; ?></td>
                <td>Rp. <?= $ksr['harga']; ?></td>
                <td>Rp. <?= $ksr['total']; ?></td>
              </tr>
            </tbody>
            <?php endforeach; ?>
          </table>
        </div>
        <div class="row">
          <div class="col-xl-9">
 
          </div>
          <div class="col-xl-2">
            <table>
            <?php foreach($bayar as $byr) :?>
                <tr>
                    <td class="text-black me-4">Diskon</td>
                    <td></td>
                    <td class="text-black me-4">Rp. <?= $byr['diskon_rupiah']; ?></td>
                </tr>
                <tr>
                <tr>
                    <td class="text-black me-4">Total</td>
                    <td></td>
                    <td class="text-black me-4">Rp. <?= $byr['total_semua']; ?></td>
                </tr>
                <tr>
                    <td class="text-black me-4">Bayar</td>
                    <td></td>
                    <td class="text-black me-4">Rp. <?= $byr['bayar']; ?></td>
                </tr>
                <tr>
                    <td class="text-black me-4">Kembali</td>
                    <td></td>
                    <td class="text-black me-4">Rp. <?= $byr['kembali']; ?></td>
                </tr>
            <?php endforeach; ?>
              </table>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-xl-10">
            <p>Terima Kasih Atas Pembeliannya</p>
          </div>
          <div class="col-xl-2">
          </div>
        </div>

      </div>
    </div>
  </div>
</div>

</body>
<script type="text/javascript">
    window.print();
</script>
</html>