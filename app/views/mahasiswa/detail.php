<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card" style="width: 25rem;">
                <div class="card-body">
                    <h5 class="card-title"><?= $data['mhs']['nama'] ?></h5>
                    <h6 class="card-subtitle mb-2 text-body-secondary"><?= $data['mhs']['nim'] ?></h6>
                    <p class="card-text"><?= $data['mhs']['jurusan'] ?></p>
                    <p class="card-text"><?= $data['mhs']['email'] ?></p>
                    <button type="button" class="btn btn-primary"><a href="<?= BASEURL ?>/Mahasiswa" class="text-link">Kembali</a></button>
                    
                </div>
            </div>
        </div>
    </div>
</div>