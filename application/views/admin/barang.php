<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Daftar Barang</h1>
<button type="button" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm mb-3" data-toggle="modal" data-target="#barangModal">Tambah Barang</button>
<?= $this->session->flashdata('message'); ?>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tabel Data Barang</h6>
    </div>
    <div class="card-body">
   <div class="table-responsive">
            
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Kode</th>
                        <th>Nama</th>
                        <th>Kategori</th>
                        <th>Stok</th>
                        <th>Harga</th>
                        <th>Diskon</th>
                        <th>Gambar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Kode</th>
                        <th>Nama</th>
                        <th>Kategori</th>
                        <th>Stok</th>
                        <th>Harga</th>
                        <th>Diskon</th>
                        <th>Gambar</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                <?php foreach($barangs as $barang) :?>
                    <tr>
                        <td><?= $barang['kode']; ?></td>
                        <td><?= $barang['nama']; ?></td>
                        <td><?= $barang['kategori']; ?></td>
                        <td><?= $barang['stok']; ?></td>
                        <td><?= $barang['harga']; ?></td>
                        <td><?= $barang['diskon']; ?></td>
                        <td>
                            <img src="<?= base_url('public/assets/img/barang/') . $barang['gambar']?>" alt="gambar" width="100">
                        </td>
                        <td class="text-center">
                            <a href="<?= base_url('admin/delete/') . $barang['id']; ?>" class="btn btn-danger btn-icon-split" data-toggle="modal" data-target="#hapusModal">
                                <span class="icon text-white-50">
                                    <i class="fas fa-trash"></i>
                                </span>
                            </a>
                            <br>
                            <a href="<?= base_url('admin/update/') . $barang['id']; ?>" class="btn btn-warning btn-icon-split mt-2">
                                <span class="icon text-white-50">
                                    <i class="fas fa-edit"></i>
                                </span>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>  
                </tbody>
            </table>
        </div>     
    </div>
</div>

</div>

<div class="modal fade" id="hapusModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Yakin Hapus?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Tekan "Hapus" bila anda yakin ingin menghapus data!.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <a class="btn btn-danger" href="<?= base_url('admin/delete/') . $barang['id']; ?>">Hapus</a>
                </div>
            </div>
        </div>
    </div>

<!-- Modal -->
<div class="modal fade" id="barangModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Barang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <?= form_open_multipart('admin/barang');?>
            <div class="form-group row">
                <label for="kode" class="col-sm-3 col-form-label">Kode</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="kode" name="kode">
                        <?= form_error('kode', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
            </div>
            <div class="form-group row">
                <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="nama" name="nama">
                        <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
            </div>
            <div class="form-group row">
                <label for="kategori" class="col-sm-3 col-form-label">Kategori</label>
                    <div class="col-sm-9">
                        <select class="form-control" id="kategori" name="kategori">
                            <option value="aksesoris">Aksesoris</option>
                            <option value="atribut">Atribut</option>
                            <option value="buku">Buku</option>
                            <option value="jaket">Jaket</option>
                            <option value="kain">Kain</option>
                            <option value="pakaian">Pakaian</option>
                        </select>
                    </div>
            </div>
            <div class="form-group row">
                <label for="stok" class="col-sm-3 col-form-label">Stok</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="stok" name="stok">
                        <?= form_error('stok', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
            </div>
            <div class="form-group row">
                <label for="harga" class="col-sm-3 col-form-label">Harga</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="harga" name="harga">
                        <?= form_error('harga', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
            </div>
            <div class="form-group row">
                <label for="diskon" class="col-sm-3 col-form-label">Diskon</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="diskon" name="diskon">
                        <?= form_error('diskon', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
            </div>
            <div class="form-group row">
                    <div class="col-sm-3">Gambar</div>
                        <div class="col-sm-9">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="gambar" name="gambar" id="gambar">
                                <label class="custom-file-label" for="gambar">Pilih Gambar</label>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="form-group row">
                <label for="deskripsi" class="ml-3 col-sm-3 col-form-label">Deskripsi</label>
                <div class="col-sm-8">
                    <textarea class="form-control" id="deskripsi" name="deskripsi" rows="5"></textarea>
                </div>
            </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
        <button type="submit" class="btn btn-danger">Simpan</button>
      </div>

      </form>
    </div>
  </div>
</div>
<!-- /.container-fluid -->