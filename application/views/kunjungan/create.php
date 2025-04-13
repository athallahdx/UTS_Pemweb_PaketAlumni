<h1 class="mb-4">Tambah Kunjungan</h1>
<form action="<?= base_url('kunjungan/store') ?>" method="post">
    <div class="mb-3">
        <label for="id_pasien" class="form-label">ID Pasien</label>
        <select class="form-control" id="id_pasien" name="id_pasien" required>
            <option value="" disabled selected>Pilih ID Pasien</option>
            <?php foreach ($pasien as $row) : ?>
                <option value="<?= htmlspecialchars($row->id_pasien) ?>">
                    <?= htmlspecialchars($row->nama) ?> - <?= htmlspecialchars($row->tanggal_lahir) ?> - <?= htmlspecialchars($row->alamat) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="mb-3">
        <label for="id_dokter" class="form-label">ID Dokter</label>
        <select class="form-control" id="id_dokter" name="id_dokter" required>
            <option value="" disabled selected>Pilih ID Dokter</option>
            <?php foreach ($dokter as $row) : ?>
                <option value="<?= htmlspecialchars($row->id_dokter) ?>">
                    <?= htmlspecialchars($row->nama) ?> - <?= htmlspecialchars($row->spesialisasi) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="mb-3">
        <label for="tanggal_kunjungan" class="form-label">Tanggal Kunjungan Pasien</label>
        <input type="date" class="form-control" id="tanggal_kunjungan" name="tanggal_kunjungan" placeholder="Masukkan tanggal kunjungan pasien" required>
    </div>
    <div class="mb-3">
        <label for="keluhan" class="form-label">Keluhan</label>
        <input type="text" class="form-control" id="keluhan" name="keluhan" placeholder="Masukkan keluhan pasien" required>
    </div>
    <div class="mb-3">
        <label for="id_poli" class="form-label">ID Poli</label>
        <select class="form-control" id="id_poli" name="id_poli" required>
            <option value="" disabled selected>Pilih ID Poli</option>
            <?php foreach ($poli as $row) : ?>
                <option value="<?= htmlspecialchars($row->id_poli) ?>">
                    <?= htmlspecialchars($row->nama_poli) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="<?= base_url('pasien') ?>" class="btn btn-secondary">Kembali</a>
</form>