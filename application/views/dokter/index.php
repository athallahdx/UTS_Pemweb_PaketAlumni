<h1 class="mb-4">Data Dokter</h1>
<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Nama Dokter</th>
            <th>Spesialisasi</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($dokter)) : ?>
            <?php foreach ($dokter as $row) : ?>
                <tr>
                    <td><?= htmlspecialchars($row->id_dokter) ?></td>
                    <td><?= htmlspecialchars($row->nama) ?></td>
                    <td><?= htmlspecialchars($row->spesialisasi) ?></td>
                    <td>
                        <a href="<?= base_url('dokter/edit/' . $row->id_dokter) ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="<?= base_url('dokter/delete/' . $row->id_dokter) ?>" class="delete btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else : ?>
            <tr>
                <td colspan="4" class="text-center">Tidak ada data dokter.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>
<a href="<?= base_url('dokter/create') ?>" class="btn btn-primary">Tambah dokter</a>
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