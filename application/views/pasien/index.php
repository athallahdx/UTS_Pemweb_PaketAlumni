<h1 class="mb-4">Data Pasien</h1>
<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Nama Pasien</th>
            <th>Tanggal Lahir</th>
            <th>Alamat</th>
            <th>ID User</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($pasien)) : ?>
            <?php foreach ($pasien as $row) : ?>
                <tr>
                    <td><?= htmlspecialchars($row->id_pasien) ?></td>
                    <td><?= htmlspecialchars($row->nama) ?></td>
                    <td><?= htmlspecialchars($row->tanggal_lahir) ?></td>
                    <td><?= htmlspecialchars($row->alamat) ?></td>
                    <td><?= htmlspecialchars($row->id_user) ?></td>
                    <td>
                        <a href="<?= base_url('pasien/edit/' . $row->id_pasien) ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="<?= base_url('pasien/delete/' . $row->id_pasien) ?>" class="delete btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else : ?>
            <tr>
                <td colspan="6" class="text-center">Tidak ada data pasien.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>
<a href="<?= base_url('pasien/create') ?>" class="btn btn-primary">Tambah pasien</a>
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
