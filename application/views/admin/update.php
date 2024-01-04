<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Daftar Barang</h1>
    <div class="modal-body">
        
        <?= form_open_multipart();?>
            <input type="hidden" name="id" value="<?= $barang['id']; ?>">
            <div class="form-group row">
                <label for="kode" class="col-sm-1 col-form-label">Kode</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="kode" name="kode" value="<?= $barang['kode']?>">
                        <?= form_error('kode', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
            </div>
            <div class="form-group row">
                <label for="nama" class="col-sm-1 col-form-label">Nama</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="nama" name="nama" value="<?= $barang['nama']?>">
                        <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
            </div>
            <div class="form-group row">
                <label for="kategori" class="col-sm-1 col-form-label">Kategori</label>
                    <div class="col-sm-6">
                        <select class="form-control" id="kategori" name="kategori">
                        <?php foreach($kategori as $kt): ?>
                            <?php if ($kt == $barang['kategori']): ?>
                                <option selected value="<?= $kt; ?>"><?= $kt; ?></option>
                            <?php else : ?>
                                <option value="<?= $kt; ?>"><?= $kt; ?></option>
                            <?php endif; ?>                    
                        <?php endforeach; ?>
                        </select>
                    </div>
            </div>
            <div class="form-group row">
                <label for="stok" class="col-sm-1 col-form-label">Stok</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="stok" name="stok"
                        value="<?= $barang['stok']?>">
                        <?= form_error('stok', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
            </div>
            <div class="form-group row">
                <label for="harga" class="col-sm-1 col-form-label">Harga</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="harga" name="harga"
                        value="<?= $barang['harga']?>">
                        <?= form_error('harga', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
            </div>
            <div class="form-group row">
                <label for="diskon" class="col-sm-1 col-form-label">Diskon</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="diskon" name="diskon"
                        value="<?= $barang['diskon']?>">
                        <?= form_error('diskon', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-1">Gambar</div>
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-sm-3">
                                <img src="<?= base_url('public/assets/img/barang/') . $barang['gambar']?>" class="img-thumbnail">
                            </div>
                            <div class="col-sm-9">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="image" name="image" id="image">
                                    <label class="custom-file-label" for="image">Pilih Gambar</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <div class="form-group row">
                <label for="deskripsi" class="ml-3 col-sm-1 col-form-label">Deskripsi</label>
                <div class="col-sm-6">
                    <textarea class="form-control" id="deskripsi" name="deskripsi" rows="5">
                    <?= $barang['deskripsi']?>
                    </textarea>
                </div>
            </div>
        
            <div class="form-group row">
                <div class="col-sm-7">
                    <button type="submit" class="btn btn-danger btn-icon-split"  >
                        <span class="icon text-white-50">
                            <i class="fas fa-save"></i>
                        </span>
                        <span class="text">Edit</span>
                        </button>
                </div>
            </div>

      </form>
</div>
