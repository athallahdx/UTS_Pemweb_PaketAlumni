<h1 class="mb-4">Tambah Pasien</h1>
<form action="<?= base_url('pasien/store') ?>" method="post">
    <div class="mb-3">
        <label for="nama" class="form-label">Nama Pasien</label>
        <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama pasien" required>
    </div>
    <div class="mb-3">
        <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" placeholder="Masukkan tanggal lahir pasien" required>
    </div>
    <div class="mb-3">
        <label for="alamat" class="form-label">Alamat</label>
        <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan alamat pasien" required>
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="<?= base_url('pasien') ?>" class="btn btn-secondary">Kembali</a>
</form>