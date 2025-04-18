<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciador de Tarefas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- icones -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background-color: white;
        }

        .links {
            position: fixed;
            bottom: 3%;
            right: 0%;
        }

        .imagens img {


            height: 40px;
            margin: 0 10px;
            border-radius: 100px;
        }

        .lista_tarefas {
            position: relative;
            background: white;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.11);
            padding: 20px;
        }

        .botao_ordenar {
            position: absolute;
            right: 0%;
            top: 15%;
            padding: 10px;
        }
    </style>
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <nav class="navbar navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand">
                Gerenciador de Tarefas
            </a>
        </div>
    </nav>

    <div class="container mt-5 lista_tarefas">
        <h2 class="mb-4">Lista de Tarefas</h2>
        <a href="<?= site_url('criar') ?>" class="btn btn-primary  mb-3" title="Adicionar nova tarefa">
            <i class="bi bi-plus-circle"></i>
        </a>

        <!-- mensagem de erro | flash - temporaria | abre a classe alert danger do bootstrap-->
        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
        <?php endif; ?>

        <div class="mb-3 botao_ordenar">
            <button class="btn btn-primary btn-sm" type="button" id="ordenarBtn" data-bs-toggle="dropdown" aria-expanded="false">Ordenar</button>
            <ul class="dropdown-menu" aria-labelledby="ordenarBtn">
                <li><a class="dropdown-item" href="<?= site_url('/tasks?order=em andamento,pendente,concluída') ?>">Em andamento primeiro</a></li>
                <li><a class="dropdown-item" href="<?= site_url('/tasks?order=pendente,em andamento,concluída') ?>">Pendente primeiro</a></li>
                <li><a class="dropdown-item" href="<?= site_url('/tasks?order=concluída,pendente,em andamento') ?>">Concluída primeiro</a></li>
            </ul>
        </div>

        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Título</th>
                    <th>Descrição</th>
                    <th>Status</th>
                    <th>Criado em</th>
                    <th>Editado em</th>
                    <th>Ações</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($tasks as $task): ?>
                    <tr>
                        <!-- esc = protege dados do usuario, evita ataques-->
                        <td><?= $task['id'] ?></td>
                        <td><?= esc($task['title']) ?></td>
                        <td><?= esc($task['description']) ?></td>
                        <td><?= esc($task['status']) ?></td>
                        <td><?= date('d/m/Y H:i', strtotime($task['created_at'])) ?></td>
                        <td><?= date('d/m/Y H:i', strtotime($task['updated_at'])) ?></td>

                        <td>
                            <!-- btn sm - buton small / large-->
                            <a href="<?= site_url('editar-tarefa/' . $task['id']) ?>"
                                class="btn btn-primary  mb-3 btn-sm"
                                title="Editar tarefa">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <a href="<?= site_url('/tasks/delete/' . $task['id']) ?>"
                                class="btn btn-danger btn-sm mb-3"
                                onclick="return confirm('Tem certeza que deseja excluir?')"
                                title="Excluir tarefa">
                                <i class="bi bi-trash"></i>
                            </a>
                        </td>

                    </tr>
                <?php endforeach; ?>
            </tbody>

        </table>
    </div>

    <!-- icones de baixo -->
    <div class="links">
        <div class="container text-center mt-4 imagens"> <!-- mt 4 =margin top 4 - de 0 a 5 -->
            <a href="https://wa.me/42998017390" target="_blank">
                <img src="https://cdn-icons-png.flaticon.com/512/124/124034.png" alt="WhatsApp">
            </a>
            <a href="https://github.com/bernardobernardo23" target="_blank">
                <img src="https://cdn-icons-png.flaticon.com/512/25/25231.png" alt="GitHub">
            </a>
        </div>
    </div>

</body>

</html>