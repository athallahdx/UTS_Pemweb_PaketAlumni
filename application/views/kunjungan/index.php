<h1 class="mb-4">Data Kunjungan</h1>
<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>ID Pasien</th>
            <th>ID Dokter</th>
            <th>Tanggal Kunjungan</th>
            <th>Keluhan</th>
            <th>ID Poli</th>
            <th>ID User</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($kunjungan)) : ?>
            <?php foreach ($kunjungan as $row) : ?>
                <tr>
                    <td><?= htmlspecialchars($row->id_kunjungan) ?></td>
                    <td><?= htmlspecialchars($row->id_pasien) ?></td>
                    <td><?= htmlspecialchars($row->id_dokter) ?></td>
                    <td><?= htmlspecialchars($row->tanggal_kunjungan) ?></td>
                    <td><?= htmlspecialchars($row->keluhan) ?></td>
                    <td><?= htmlspecialchars($row->id_poli) ?></td>
                    <td><?= htmlspecialchars($row->id_user) ?></td>
                    <td>
                        <a href="<?= base_url('pasien/edit/' . $row->id_pasien) ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="<?= base_url('pasien/delete/' . $row->id_pasien) ?>" class="delete btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else : ?>
            <tr>
                <td colspan="8" class="text-center">Tidak ada data kunjungan.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>
<a href="<?= base_url('kunjungan/create') ?>" class="btn btn-primary">Tambah kunjungan</a>
<a href="<?= base_url('dashboard') ?>" class="btn btn-danger">Kembali</a>

<script>
    const deleteButton = document.querySelector('.delete');
    deleteButton.addEventListener('click', function(e) {
        e.preventDefault();
        const url = this.getAttribute('href');
        if (confirm('Apakah Anda yakin ingin menghapus data ini? Sekalinya dihapus, data Anda tidak dapat dipulihkan!')) {
            window.location = url;
        }
    });
</script>