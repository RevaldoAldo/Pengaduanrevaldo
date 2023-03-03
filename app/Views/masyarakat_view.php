<?= $this->extend('layouts/admin') ?>

<?= $this->section('title') ?>
Masyarakat
<?= $this->endSection() ?>

<?= $this->Section('content') ?>
<div class="container">

    <div class="d-sm-flex align-items-center justify-content-center-between mb-4 mt-3">
        <h1 class="h1 mb-0 text-gray">Dashboard</h1>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card border-success">
                <div class="card-header bg-success">
                    <h3 class="fw-bold text-light">
                        MASYARAKAT
                    </h3>
                    <a href="" class="btn btn-primary" data-toggle="modal" data-target="#fmasyarakat" data-masyarakat="add"><i class="fas fa-plus"></i>&nbsp Tambah Data</a>
                </div>

                <div class="card-body">
                    <table class="table">
                        <thead class="text-center">
                            <tr>
                                <th>No</th>
                                <th>Nik</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>No Telpon</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <?php
                        $no = 0;
                        foreach ($masyarakat as $row) {
                            $data = $row['id_masyarakat'] . "," . $row['nik'] . "," . $row['nama'] . "," . $row['username'] . "," . $row['password'] . "," . $row['telp'] . "," . base_url('masyarakat/edit/' . $row['id_masyarakat']);
                            # code...
                            $no++;
                        ?>
                            <tr class="text-center">
                                <td><?= $no ?></td>
                                <td><?= $row['nik'] ?></td>
                                <td><?= $row['nama'] ?></td>
                                <td><?= $row['username'] ?></td>
                                <td><?= $row['telp'] ?></td>
                                <td>
                                    <a href="" class="btn text-light fw-bold bg-warning" data-toggle="modal" data-target="#fmasyarakat" data-masyarakat="<?= $data ?>">
                                        Edit</a>
                                    ||
                                    <a href="/masyarakat/delete/<?= $row['id_masyarakat'] ?>" onclick="return confirm('Yakin mau hapus data')" class="btn text-light fw-bold" style="background:red;">&nbsp Hapus</a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="fmasyarakat" tabindex="-1" aria-labelledby="#exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form masyarakat</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" data-bs-dismiss="modal">&times;</span>
                    </button>
                </div>

                <form action="" id="editmasyarakat" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nik">Nik</label>
                            <input type="number" name="nik" id="nik" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" id="nama" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" id="username" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="telp">Nomer Telpon</label>
                            <input type="number" name="telp" id="telp" class="form-control">
                        </div>

                        <div class="form-group" id="ubah_password">
                            <label for="ubah_password">Ubah Password</label>
                            <input type="checkbox" name="ubah_password" aria-label="Mau Ubah Password" class="form-control">
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary fw-bold"> Save
                            Change</button>
                        <button type="button" class="btn btn-secondary fw-bold" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <br>
    <?php if (!empty(session()->getFlashdata("message"))) : ?>
        <div class="alert alert-success text-center text-uppercase">
            <?= session()->getFlashdata("message") ?>
        </div>
    <?php endif ?>
</div>
<?= $this->endSection() ?>

<?= $this->Section('script') ?>
<script>
    $(document).ready(function() {
        $("#fmasyarakat").on('show.bs.modal', function(event) {
            // alert('asa');
            var button = $(event.relatedTarget);
            var data = button.data('masyarakat');

            if (data != "add") {
                const barisdata = data.split(",");
                $('#nik').val(barisdata[1]);
                $('#nama').val(barisdata[2]);
                $('#username').val(barisdata[3]);
                $('#telp').val(barisdata[5]);
                $('#editmasyarakat').attr('action', barisdata[6]);

                $('#ubah_password').show();
            } else {
                $('nik').val('');
                $('#nama').val('');
                $('#username').val('');
                $('#password').val('');
                $('#telp').val('');
                $('#editmasyarakat').attr('action', 'masyarakat');
                $('#ubah_password').hide();
            }
        });
    });
</script>
<?= $this->endSection() ?>