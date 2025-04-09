<h1 class="mb-4">Tambah Dokter</h1>
<form action="<?= base_url('dokter/store') ?>" method="post">
    <div class="mb-3">
        <label for="nama" class="form-label">Nama Dokter</label>
        <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama dokter" required>
    </div>
    <div class="mb-3">
        <label for="spesialisasi" class="form-label">Spesialisasi</label>
        <input type="text" class="form-control" id="spesialisasi" name="spesialisasi" placeholder="Masukkan spesialisasi dokter" required>
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="<?= base_url('dokter') ?>" class="btn btn-secondary">Kembali</a>
</form>