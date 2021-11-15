<?php namespace App\Filters;

use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\Filters\FilterInterface;

class Auth extends FilterInterface {

    public function before(RequestInterface $request, $argument = null)    {
        
        // if user is not logged in
        if (!session()->get('logged_in')) {
            
            // redirect to login page
            return redirect()->to('/login');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $argument = null)    {
        // 
    }

}
