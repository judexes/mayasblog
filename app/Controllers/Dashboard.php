<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Dashboard extends Controller {
    
    public function index()    {
        $sesson = session();
        echo "Welcome back, ".$sesson->get('username');
    }
}
