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
            echo "✅ Conexão com o banco de dados bem-sucedida!";
        } catch (\Throwable $e) {
            echo "❌ Erro ao conectar com o banco: " . $e->getMessage();
        }
    }
}
