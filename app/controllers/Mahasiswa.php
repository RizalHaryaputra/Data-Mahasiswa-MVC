<?php

class Mahasiswa extends Controller
{
    public function index()
    {
        $data['title'] = 'Mahasiswa';
        $data['mhs'] = $this->model('Mahasiswa_model')->getAllMahasiswa();
        $this->view('templates/header', $data);
        $this->view('mahasiswa/index', $data);
        $this->view('templates/footer');
    }

    public function detail($id)
    {
        $data['title'] = 'Detail Mahasiswa';
        $data['mhs'] = $this->model('Mahasiswa_model')->getMahasiswa($id);
        $this->view('templates/header', $data);
        $this->view('mahasiswa/detail', $data);
        $this->view('templates/footer');
    }

    public function add()
    {
        $result = $this->model('Mahasiswa_model')->addMahasiswa($_POST);
        if (is_array($result) && $result['status'] == 'error') {
            // Jika ada kesalahan pada addMahasiswa
            Flasher::setFlash('gagal ditambahkan', $result['message'], 'danger');
            header('location: ' . BASEURL . '/Mahasiswa');
            exit;
        } elseif ($result > 0) {
            // Jika tambah berhasil
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('location: ' . BASEURL . '/Mahasiswa');
            exit;
        }
    }

    public function delete($id)
    {
        $result = $this->model('Mahasiswa_model')->delMahasiswa($id);
        if ($result > 0) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('location: ' . BASEURL . '/Mahasiswa');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('location: ' . BASEURL . '/Mahasiswa');
            exit;
        }
    }

    public function getUpdate($id)
    {
        $result = $this->model('Mahasiswa_model')->getUpdateMahasiswa($id);
        echo json_encode($result);
    }

    public function update($id)
    {
        $result = $this->model('Mahasiswa_model')->updateMahasiswa($id, $_POST);

        if (is_array($result) && $result['status'] == 'error') {
            // Jika ada kesalahan pada updateMahasiswa
            Flasher::setFlash('gagal diubah', $result['message'], 'danger');
            header('location: ' . BASEURL . '/Mahasiswa');
            exit;
        } elseif ($result > 0) {
            // Jika update berhasil
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('location: ' . BASEURL . '/Mahasiswa');
            exit;
        } else {
            // Jika tidak ada perubahan data
            Flasher::setFlash('gagal diubah', 'tidak ada perubahan data', 'warning');
            header('location: ' . BASEURL . '/Mahasiswa');
            exit;
        }
    }

    public function search() {  
        $data['title'] = 'Mahasiswa';
        $data['mhs'] = $this->model('Mahasiswa_model')->searchMahasiswa($_POST['keyword']);
        $this->view('templates/header', $data);
        $this->view('mahasiswa/index', $data);
        $this->view('templates/footer');
    
        // echo json_encode($this->view('mahasiswa/index', $data));
    }

}