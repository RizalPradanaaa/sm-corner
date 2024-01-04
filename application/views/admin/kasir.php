<div class="container-fluid">

<h1 class="h3 text-gray-800">Keranjang Penjualan</h1>
	<br>
	<div class="row">
		<div class="col-sm-4">
			<div class="card card-primary mb-3">
				<div class="card-header bg-danger text-white">
					<h5><i class="fa fa-search"></i> Cari Barang</h5>
				</div>
				<div class="card-body">
                    <form method="post" action="">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Cari Barang Nama / Kode" name="keyword">
                            <button class="btn btn-outline-danger" type="submit" id="button-addon2">Cari</button>
                        </div>
                    </form>
				</div>
			</div>
		</div>
		<div class="col-sm-8">
			<div class="card card-primary mb-3">
				<div class="card-header bg-danger text-white">
					<h5><i class="fa fa-list"></i> Hasil Pencarian</h5>
				</div>
				<div class="card-body">
					<div class="table-responsive">
                    <?php if( empty($barang) ): ?>
                        <div class="alert alert-danger" role="alert">
                            Silahkan Cari!
                        </div>
                    </div>
                    <?php else : ?>
						<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <tr>
                            <th>Kode</th>
                            <th>Nama</th>
                            <th>Stok</th>
                            <th>Harga</th>
                            <th>Diskon</th>
                            <th>Aksi</th>
                        </tr>
                        <?php foreach($barang as $br) :?>
                        <tr>
                            <td><?= $br['kode']; ?></td>
                            <td><?= $br['nama']; ?></td>
                            <td><?= $br['stok']; ?></td>
                            <td><?= $br['harga']; ?></td>
                            <td><?= $br['diskon']; ?></td>
                            <td class="text-center">
                                <form method="post">
                                <input type="hidden" name="id_barang" value="<?= $br['id']; ?>" readonly>
                                <input type="hidden" name="kode" value="<?= $br['kode']; ?>" readonly>
                                <input type="hidden" name="nama" value="<?= $br['nama']; ?>" readonly>
								<input type="hidden" name="stok" value="<?= $br['stok']; ?>" readonly>
                                <input type="hidden" name="jumlah" value="1" readonly>
                                <input type="hidden" name="harga" value="<?= $br['harga']; ?>" readonly>
                                <button type="submit" class="btn btn-success">
					            <i class="fa fa-shopping-cart"></i></button>
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        </table>
                        <?php endif; ?>
					</div>
				</div>
			</div>
		</div>
		
        <div class="col-sm-12">
			<div class="card card-primary">
				<div class="card-header bg-danger text-white">
					<h5><i class="fa fa-shopping-cart"></i> KASIR
					<a class="btn btn-secondary float-right" 
						onclick="javascript:return confirm('Apakah anda ingin reset keranjang ?');" href="<?= base_url('admin/deletekeranjangall/') ?>">
						<b>RESET KERANJANG</b></a>
					</h5>
				</div>
				<div class="card-body">
					<div id="keranjang" class="table-responsive">
						<table class="table table-bordered">
							<tr>
								<td><b>Tanggal</b></td>
								<td><input type="text" readonly="readonly" class="form-control" value="<?php echo date("j F Y");?>" name="tgl"></td>
							</tr>
						</table>
						<table class="table table-bordered w-100" id="example1">
							<thead>
								<tr>
									<td> Kode</td>
									<td> Nama Barang</td>
									<td style="width:10%;"> Jumlah</td>
                                    <td> Harga</td>
									<td style="width:20%;"> Total</td>
									<td> Aksi</td>
								</tr>
							</thead>
							<tbody>
							<p class="d-none"><?= $total_bayar = 0; ?></p>
                            <?php foreach($kasir as $ksr) :?>
								<tr>
									<td><?= $ksr['kode']; ?></td>
									<td><?= $ksr['nama']; ?></td>
									<form method="post">
									<td>
										<input type="number" name="jumlah" value="<?= $ksr['jumlah']; ?>" class="form-control">
									</td>
									<td>Rp. <?= $ksr['harga']; ?></td>
									<td>Rp. <?= $ksr['total']; ?></td>

									<td class="text-center">
										<!-- aksi ke table penjualan -->
										
										<input type="hidden" name="id" value="<?= $ksr['id']; ?>">
										<input type="hidden" name="harga" value="<?= $ksr['harga']; ?>">
										<button type="submit" class="btn btn-warning"><i class="fa fa-save"></i>
										</button>
										</form>

										<a href="<?= base_url('admin/deletekeranjang/') . $ksr['id']; ?>"  class="btn btn-danger"><i class="fa fa-times"></i>
										</a>
									</td>
								</tr>
                                <p class="d-none"><?= $total_bayar += $ksr['total']; ?></p>
                                <?php endforeach; ?>
							</tbody>
					</table>
					<br/>
					<div id="kasirnya">
						<table class="table table-stripped">
							<form method="post">
								<tr>
									<?php foreach($pemasukan as $p) :?>
										<input type="hidden" name="pemasukan" value="<?= $p['total']; ?>">
									<?php endforeach; ?>
									
									<td>Total Semua  </td>
									<td>
										<input type="text" class="form-control" name="total" value="<?= $total_bayar;?>" id="total">
									</td>
								
									<td>Bayar  </td>
									<td>
									<?php if( empty($bayar) ): ?>
                                    	<input type="text" class="form-control" name="bayar">
									<?php else : ?>
										<?php foreach($bayar as $byr) :?>
											<input type="text" class="form-control" name="bayar" value="<?= $byr['bayar']; ?>">
										<?php endforeach; ?>
									<?php endif; ?>
                                    </td>
									<td><button class="btn btn-success" type="submit"><i class="fa fa-shopping-cart" id="buttonBayar"></i> Bayar</button>
									</td>
								</tr>
								<tr>
									<td>Diskon Rupiah</td>
									<td>
									<?php if( empty($bayar) ): ?>
										<input type="text" class="form-control" name="diskon_rupiah" id="diskon_rupiah">
									<?php else : ?>
										<?php foreach($bayar as $byr) :?>
											<input type="text" class="form-control" name="diskon_rupiah" value="<?= $byr['diskon_rupiah']; ?>" id="diskon_rupiah">
										<?php endforeach; ?>
									<?php endif; ?>
									</td>

									<td>Kembali</td>
									<td>
										<?php if( empty($bayar) ): ?>
                                    		<input type="text" class="form-control" name="kembali">
										<?php else : ?>
											<?php foreach($bayar as $byr) :?>
											<input type="text" class="form-control" name="kembali" value="<?= $byr['kembali']; ?>">
											<?php endforeach; ?>
										<?php endif; ?>
                               		</td>
								</tr>
							</form>
							<!-- aksi ke table nota -->
							<tr>
								<td>
									<a href="<?= base_url('admin/print/'); ?>" target="_blank">
									<button class="btn btn-secondary">
										<i class="fa fa-print"></i>Print
									</button></a>
								</td>
								<td>
									<a href="<?= base_url('admin/deleteall/'); ?>">
										<button class="btn btn-dark">
											<i class="fa fa-trash"></i> Reset
										</button>
									</a>
								</td>
							</tr>
						</table>
						<br/>
						<br/>
					</div>
				</div>
			</div>
		</div>



</div>


