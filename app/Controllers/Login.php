<?php 

namespace App\Controllers;

use CodeIgniter\Controllers;
use App\Models\UserModel;

class Login extends BaseController {

    public function index()    {

        // inport helper form
        helper(['form']);
        echo view('Login');
    }

    // Login Authentication function
    public function auth()    {
        $session = session();
        $model = new UserModel();

        // "email" is used for the form
        // "user_email" is used for the db
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        $data = $model->where('user_email', $email)->first();
        if ($data) {

            // currently using my hash password column
            // change later to 'user_password
            $pass = $data['user_password_hash'];
            $verify_pass = password_verify($password, $pass);

            if ($verify_pass) {

                // Create session data
                $session_data = [
                    'user_id'   => $data['user_id'],
                    'username'   => $data['username'],
                    'user_email'   => $data['user_email'],
                    'logged_in'   => true
                ];

                // Set session data
                // redirect tp dashboard
                $session->save($session_data);
                return redirect()->to('/dashboard');

            } else {

                // Wrong Password error message
                $session->setFlashdata('message', 'wrong password!');
                return redirect()->to('/login');
                
            }
        } else {

            // Wrong Email errror message
            $session->setFlashdata('message', 'Email not found!');
            return redirect()->to('/login');

        }

    }

    // Logout function
    public function logout()    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }


}
