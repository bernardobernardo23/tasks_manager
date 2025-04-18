<?php

namespace App\Models;

use CodeIgniter\Model;

class TaskModel extends Model
{
    protected $table      = 'tasks';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['title', 'description', 'status'];
    //para lidar com create e update_at
    protected $useTimestamps = true;

    protected $validationRules = [
        'title'       => 'required|min_length[3]|max_length[255]',
        'description' => 'permit_empty|string',
        'status'      => 'required|in_list[pendente,em andamento,concluída]', //nao necessario por conta do formulario
    ];

    protected $validationMessages = [
        'title' => [
            'required' => 'O título da tarefa é obrigatório.',
            'min_length' => 'O título deve ter no mínimo 3 caracteres.',
            'max_length' => 'O título pode ter no máximo 255 caracteres.'
        ],
        'status' => [
            'required' => 'O status da tarefa é obrigatório.',
            'in_list' => 'O status precisa ser um dos seguintes: pendente, em andamento, concluída.'
        ]
    ];
}
