<?php

class Pages extends Controller
{
    public function __construct()
    {
        $this->userModel = $this->model('User');
    }

    public function index()
    {
        $users = $this->userModel->getUsers();

        $data = [
            'title' => 'Home page',
            'users' => 'user',
        ];

        $this->view('pages/index', $data);
        
        $other = $this->userModel->getOther();
       
    }

    public function about()
    {
        $this->view('pages/about');
    }
}
