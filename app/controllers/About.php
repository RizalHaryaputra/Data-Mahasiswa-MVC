<?php
class About extends Controller{
    public function index($nama = 'nama', $umur = 'umur') {
        $data['nama'] = $nama;
        $data['umur'] = $umur;
        $data['title'] = 'About me';
        $this->view('templates/header', $data);
        $this->view('about/index', $data);
        $this->view('templates/footer');
    }

    public function page() {
        $data['title'] = 'Pages';
        $this->view('templates/header', $data);
        $this->view('about/page');
        $this->view('templates/footer');
    }
}