<?php var_dump($user); ?>

<h1 class="text-center mb-4">Dashboard</h1>
<div class="row">
            <div class="col-md-3">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Manajemen Poli</h5>
                        <a href="<?= site_url('poli') ?>" class="btn btn-primary">Kelola</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Manajemen Dokter</h5>
                        <a href="<?= site_url('dokter') ?>" class="btn btn-primary">Kelola</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Manajemen Pasien</h5>
                        <a href="<?= site_url('pasien') ?>" class="btn btn-primary">Kelola</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Manajemen Kunjungan</h5>
                        <a href="<?= site_url('kunjungan') ?>" class="btn btn-primary">Kelola</a>
                    </div>
                </div>
            </div>
        </div>
<a href=<?= base_url('auth/logout') ?> class="text-danger">Log Out</a>