<?php

namespace App\Controllers;

//model referente
use App\Models\TaskModel;

use CodeIgniter\Controller; //

class TaskController extends Controller
{
    public function index()
    {
        $db = \Config\Database::connect();
        $ordenar = $db->table('tasks');

        // ordem vinda da URL ou padrão
        $orderParam = $this->request->getGet('order'); 

        if ($orderParam) {
            $orderArray = explode(',', $orderParam); //explode quebra a string e transforma em um array separado por virgulas
            $clausulaSQL = "FIELD(status, " . implode(',', array_map( //implode - contrario de explode
                fn($s) => $db->escape($s),
                $orderArray
            )) . ")";
            $ordenar->orderBy($clausulaSQL, 'ASC', false); // aplica a ordenação
        } else {
            $ordenar->orderBy('id', 'ASC'); // se não existe, ordena pelo ID (ordem padrão)
        }
        // busca os dados
        $data['tasks'] = $ordenar->get()->getResultArray();
        $data['order'] = $orderParam;

        return view('tasks/index', $data);

        // $model = new TaskModel();
        // $data['tasks'] = $model->findAll();
        // return view('tasks/index', $data);
    }

    public function create()
    {
        return view('tasks/create');
    }

    public function store()
    {
        $validation = \Config\Services::validation();

        // regras de validação - descricao opcional
        $rules = [
            'title'       => 'required|min_length[3]|max_length[255]',
        ];

        // valida os dados com as regras
        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput() //seta valores
                ->with('errors', $this->validator->getErrors());
        }

        // salva caso esteja de acordo
        $model = new TaskModel();
        $data = [
            'title'       => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'status'      => $this->request->getPost('status'),
        ];

        $model->save($data);

        return redirect()->to('/tasks');
    }


    public function edit($id)
    {
        $model = new TaskModel();
        $data['task'] = $model->find($id);

        if (empty($data['task'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Tarefa não encontrada');
        }

        return view('tasks/edit', $data);
    }

    public function update($id)
    {
        $validation = \Config\Services::validation();

        $rules = [
            'title'  => 'required|min_length[3]|max_length[255]',
            'status' => 'required|in_list[pendente,em andamento,concluída]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $model = new TaskModel();

        $data = [
            'title'       => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'status'      => $this->request->getPost('status'),
        ];

        $model->update($id, $data);

        return redirect()->to('/tasks');
    }


    public function delete($id)
    {
        $model = new TaskModel();

        if (!$model->delete($id)) {
            return redirect()->back()->with('error', 'Erro ao excluir a tarefa.');
        }

        return redirect()->to('/tasks');
    }
}
