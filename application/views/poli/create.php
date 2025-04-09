<h1 class="mb-4">Tambah Poli</h1>
<form action="<?= base_url('poli/store') ?>" method="post">
    <div class="mb-3">
        <label for="nama_poli" class="form-label">Nama Poli</label>
        <input type="text" class="form-control" id="nama_poli" name="nama_poli" placeholder="Masukkan nama poli" required>
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="<?= base_url('poli') ?>" class="btn btn-secondary">Kembali</a>
</form>