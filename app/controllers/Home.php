<?php
class Home extends Controller
{
    public function index()
    {
        $data['title'] = 'Home';
        $data['name'] = $this->model('User_model')->getName();
        $this->view('templates/header', $data);
        $this->view('home/index', $data);
        $this->view('templates/footer');
    }
}