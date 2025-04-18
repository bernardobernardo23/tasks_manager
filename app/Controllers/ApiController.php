<?php

namespace App\Controllers;

use App\Models\TaskModel;
//importa funcionalidades prontas para API
use CodeIgniter\RESTful\ResourceController;

class ApiController extends ResourceController
{
    protected $modelName = 'App\Models\TaskModel';
    protected $format    = 'json';

    // listar todas as tarefas
    public function index()
    {
        $tasks = $this->model->findAll();
        return $this->respond($tasks);
    }

    // exibir uma específica
    public function show($id = null)
    {
        $task = $this->model->find($id);

        if ($task) {
            return $this->respond($task);
        } else {
            return $this->failNotFound('tarefa não encontrada');
        }
    }


    public function create()
    {
        $data = [
            'title'       => $this->request->getVar('title'),
            'description' => $this->request->getVar('description'),
            'status'      => $this->request->getVar('status'),
        ];

        $this->model->insert($data);
        return $this->respondCreated($data, 'tarefa criada ');
    }


    public function update($id = null)
    {
        $data = [
            'title'       => $this->request->getVar('title'),
            'description' => $this->request->getVar('description'),
            'status'      => $this->request->getVar('status'),
        ];

        $this->model->update($id, $data);
        return $this->respondUpdated($data, 'tarefa atualizada ');
    }


    public function delete($id = null)
    {
        $this->model->delete($id);
        return $this->respondDeleted('tarefa excluída ');
    }
}
