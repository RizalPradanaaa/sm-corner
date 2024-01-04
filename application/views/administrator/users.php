<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Daftar Admin</h1>
<button type="button" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm mb-3" data-toggle="modal" data-target="#userModal">Tambah Admin</button>
<?= $this->session->flashdata('message'); ?>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tabel Data Admin</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Tanggal Dibuat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Tanggal Dibuat</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                <?php foreach($users as $user) :?>
                    <tr>
                        <td><?= $user['name']; ?></td>
                        <td><?= $user['email']; ?></td>
                        <td>
                        <?php if($user['role_id'] == 2) : ?>
                            Admin
                        <?php endif; ?>
                        </td>
                        <td><?= date('d F Y', $user['date_created']); ?></td>
                        <td class="text-center">
                            <a href="<?= base_url('administrator/delete/') . $user['id']; ?>" class="btn btn-danger btn-icon-split" data-toggle="modal" data-target="#userhapusModal">
                                <span class="icon text-white-50">
                                    <i class="fas fa-trash"></i>
                                </span>
                                <span class="text">Hapus</span>
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

<div class="modal fade" id="userhapusModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Yakin Hapus?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Tekan "Hapus" bila anda yakin ingin menghapus Admin!.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <a class="btn btn-danger" href="<?= base_url('administrator/delete/') . $user['id']; ?>">Hapus</a>
                </div>
            </div>
        </div>
    </div>

<!-- Modal -->
<div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Admin</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
      <form class="user" method="post" action="<?= base_url('administrator/users'); ?>">
            <div class="form-group row">
                <label for="name" class="col-sm-3 col-form-label">Nama</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="name" name="name">
                        <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-9">
                        <input type="email" class="form-control" id="email" name="email">
                        <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
            </div>
            <div class="form-group row">
                <label for="password" class="col-sm-3 col-form-label">Password</label>
                    <div class="col-sm-9">
                        <input type="password" class="form-control" id="password" name="password">
                        <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
            </div>
            <div class="form-group row">
                <label for="role" class="col-sm-3 col-form-label">Role</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="role" name="role" value="Admin" readonly>
                    </div>
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