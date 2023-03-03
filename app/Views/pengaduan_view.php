<?= $this->extend('layouts/admin') ?>

<?= $this->section('title') ?>
Pengaduan
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
                    <h3 class="fw-bold text-light"> PENGADUAN</h3>

                    <a href="" class="btn btn-primary" data-toggle="modal" data-target="#fpengaduan" data-pengaduan="add"><i class="fas fa-plus"></i>&nbsp Tambah Data</a>
                </div>

                <div class="card-body">
                    <table class="table">
                        <thead class="text-center">
                            <tr>
                                <th>No</th>
                                <th>Tanggal Pengaduan</th>
                                <th>Nik</th>
                                <th>isi laporan</th>
                                <th>foto</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <?php
                        $no = 0;
                        foreach ($pengaduan as $row) {
                            $data = $row['id_pengaduan'] . "," . $row['tgl_pengaduan'] . "," . $row['nik'] . "," . $row['isi_laporan'] . "," . $row['foto'] . "," . $row['status'] . "," . base_url('pengaduan/edit/' . $row['id_pengaduan']);
                            # code...
                            $no++;
                        ?>
                            <tr class="text-center">
                                <td><?= $no ?></td>
                                <td><?= $row['tgl_pengaduan'] ?></td>
                                <td><?= $row['nik'] ?></td>
                                <td><?= $row['isi_laporan'] ?></td>
                                <td><?= $row['status'] ?></td>
                                <td>
                                    <?php if ($row['foto']!="")
                                    {?>
                                    <img src="uploads/berkas/<?= $row['foto']?>" alt="" height="50" width="50">
                                    <?php } else
                                    {
                                        ?>
                                        RA NEK GAMBAR
                                        <?php
                                    }?>
                                </td>
                                <td><?= $row['status'] ?></td>
                                <td>    
                                    <a href="" class="btn text-light fw-bold bg-primary" data-bs-toggle="modal" data-bs-target="#fpengaduan" data-pengaduan="<?= $data ?>">
                                        tanggapi</a>
                                    ||
                                    <a href="/pengaduan/delete/<?= $row['id_pengaduan'] ?>" onclick="return confirm('Yakin mau hapus data')" class="btn text-light bg-warning fw-bold">&nbsp Hapus</a>
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

    <div class="modal fade" id="fpengaduan" tabindex="-1" aria-labelledby="#exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Pengaduan</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" data-bs-dismiss="modal">&times;</span>
                    </button>
                </div>

                <form action="" id="editmasyarakat" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="tgl_pengaduan">Tanggal Pengaduan</label>
                            <input type="date" name="tgl_pengaduan" id="tgl_pengaduan" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="nik">nik</label>
                            <input type="text" name="nik" id="nik" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="isi_laporan" class="form-label">Isi Laporan</label>
                            <textarea class="form-control" nama="isi_laporan" id="isi_laporan" rows="3"></textarea>
                        </div>
                            <label for="foto">Foto</label>
                            <input type="file" name="foto" id="foto" class="form-control">
                    </div>

                        <div class="form-group">
                            <label for="status" class="form-label">Status</label>

                            <select name="status" id="status" class="form-control">
                                <option value="">Pilih Status</option>
                                <option value="0">0</option>
                                <option value="Proses">Proses</option>
                                <option value="Selesai">Selesai</option>
                            </select>
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
        $("#fpengaduan").on('show.bs.modal', function(event) {
            // alert('asa');
            var button = $(event.relatedTarget);
            var data = button.data('pengaduan');

            if (data != "add") {
                const barisdata = data.split(",");
                $('#tgl_pengaduan').val(barisdata[1]);
                $('#nik').val(barisdata[2]);
                $('#isi_laporan').val(barisdata[3]);
                $('#foto').val(barisdata[4]);
                $('#status').val(barisdata[5]);
                $('#editpengaduan').attr('action', barisdata[6]);
                
            } else {
                $('tgl_pengaduan').val('');
                $('#nik').val('');
                $('#isi_laporan').val('');
                $('#foto').val('');
                $('#status').val('');
                $('#editpengaduan').attr('action', 'pengaduan');
            }
        });
    });
</script>
<?= $this->endSection() ?>