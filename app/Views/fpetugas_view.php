<?= $this->extend('layouts/admin') ?>
<?= $this->section('title') ?>
Form Input Petugas
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="card">
    <div class="card-header">
        <h3>Form Input Petugas</h3>
    </div>
    <form action="addPetugas" method="post">
        <div class="card-body">
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" name="nama_petugas" id="nama_petugas" class="form-control">
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" class="form-control">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="text" name="password" id="password" class="form-control">
            </div>
            <div class="form-group">
                <label for="telp">Telp</label>
                <input type="number" name="telp" id="telp" class="form-control">
            </div>
            <div class="form-group">
                <label for="level">Level</label>
                <select name="level" class="form-control" id="username">
                    <option value="">Pilih Level</option>
                    <option value="admin">Admin</option>
                    <option value="petugas">Petugas</option>
                </select>
            </div>
        </div>

        <div class="card-header">
            <input type="submit" value="simpan" class="btn btn-primary">||<input type="reset" vlaue="cancel" class="btn btn-secondary">
        </div>
    </form>
</div>
<?= $this->endSection() ?>