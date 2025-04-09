<h1 class="mb-4">Data Poli</h1>
<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Nama Poli</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($poli)) : ?>
            <?php foreach ($poli as $row) : ?>
                <tr>
                    <td><?= htmlspecialchars($row->id_poli) ?></td>
                    <td><?= htmlspecialchars($row->nama_poli) ?></td>
                    <td>
                        <a href="<?= base_url('poli/edit/' . $row->id_poli) ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="<?= base_url('poli/delete/' . $row->id_poli) ?>" class="delete btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else : ?>
            <tr>
                <td colspan="3" class="text-center">Tidak ada data poli.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>
<a href="<?= base_url('poli/create') ?>" class="btn btn-primary">Tambah Poli</a>
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