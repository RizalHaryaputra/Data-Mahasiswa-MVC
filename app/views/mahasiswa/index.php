<div class="index-mhs" id="index-mhs">
    <div class="container mt-5">
        <!-- Flash Massage -->
        <div class="row">
            <div class="col-lg-6">
                <?php Flasher::flash(); ?>
            </div>
        </div>

        <div class="col-lg-3">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary modal-add" id="btn-add" data-bs-toggle="modal"
                data-bs-target="#formModal">
                Tambah Data
            </button>

            <form action="<?= BASEURL ?>/Mahasiswa/search" method="post">
                <div class="input-group mt-2">
                    <input type="text" class="form-control" placeholder="Cari mahasiswa..." name="keyword" id="keyword">
                    <button class="btn btn-outline-primary" type="submit" id="btn-search">Cari</button>
                </div>
            </form>
        </div>

        <!-- Content -->
        <div class="row">
            <div class="col-lg-6">
                <h2 class="mt-2">Daftar Mahasiswa</h2>
                <ul class="list-group">
                    <?php $i = 1 ?>
                    <?php foreach ($data['mhs'] as $row): ?>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <?= $i . ". " ?>     <?= $row["nama"]; ?>
                            <div>
                                <span class="badge text-bg-primary rounded-pill"><a class="text-link"
                                        href="<?= BASEURL ?>/Mahasiswa/detail/<?= $row['id'] ?>">Detail</a></span>
                                <span class="badge text-bg-success rounded-pill"><a class="text-link" id="btn-update"
                                        data-bs-toggle="modal" data-bs-target="#formModal"
                                        data-id="<?= $row['id'] ?>">Edit</a></span>
                                <span class=" badge text-bg-danger rounded-pill"><a
                                        onclick="return confirm('Yakin akan menghapus <?= $row['nama'] ?>?')"
                                        class="text-link"
                                        href="<?= BASEURL ?>/Mahasiswa/delete/<?= $row['id'] ?>">Hapus</a></span>
                            </div>
                        </li>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="formModalLabel">Tambah Data</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="mahasiswaForm" action="<?= BASEURL ?>/Mahasiswa/add" method="post">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" autocomplete="off" required>
                        </div>
                        <div class="mb-3">
                            <label for="nim" class="form-label">NIM</label>
                            <input type="number" class="form-control" id="nim" name="nim" autocomplete="off" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" autocomplete="off"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="jurusan" class="form-label">Jurusan</label>
                            <input type="text" class="form-control" id="jurusan" name="jurusan" autocomplete="off"
                                required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary" id="btn-modal">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>