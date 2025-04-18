<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use Config\Database;

class TestDb extends Controller
{
    public function index()
    {
        try {
            $db = Database::connect();
            echo "conexao feita";
        } catch (\Throwable $e) {
            echo "erro " . $e->getMessage();
        }
    }
}
