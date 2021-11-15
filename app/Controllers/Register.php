<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;

class Register extends BaseController {

    public function index()    {

        // Include form helper
        helper(['form']);
        $data = [];
        echo view('register', $data);
    }

    public function save()    {

        // include form helper
        helper(['form']);

        // set form validation rules
        $rules = [
            'username' => 'required|min-length[6]|max-length[50]|is_unique[users.username]',
            'user_email' => 'required|min-length[6]|max-length[50]|is_unique[users.user_email]',
            'user_password' => 'required|min-length[4]|max-length[20]',
            // 'verify_password' => 'matches[password',
            'user_fname' => 'required|min-length[6]|max-length[20]',
            'user_lname' => 'required|min-length[6]|max-length[20]'
        ];

        // Validates input 
        if ($this->validate($rules)) {
            $model = new UserModel();
            $data = [
                'username' => $this->request->getVar('username'),
                'user_email' => $this->request->getVar('user_email'),
                'user_password' => $this->request->getVar('user_password'),
                // 'user_password_hash' => password_hash($this->request->getVar('user_password'), PASSWORD_DEFAULT),
                'user_fname' => $this->request->getVar('user_fname'),
                'user_lname' => $this->request->getVar('user_lname')
            ];
            $model -> save($data);
            return redirect()->to('/login');
        } else {
            $data['validation'] = $this->validator;

            //  sends data
            echo  view('register', $data);
        }


        
    }
    
}
