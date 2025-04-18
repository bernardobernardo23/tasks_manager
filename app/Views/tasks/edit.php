<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Tarefa</title>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: white;
        }

        .form-container {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 100%;
            max-width: 500px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.22);
            padding: 20px;
        }
    </style>
</head>

<body>

    <div class="form-container">
        <!----------------- validação--------------------- -->
        <?php if (session()->getFlashdata('errors')): ?>
            <div class="alert alert-danger">
                <ul class="mb-0">
                    <?php foreach (session()->getFlashdata('errors') as $error): ?>
                        <li><?= esc($error) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <h4 class="mb-4 text-center">Editar Tarefa</h4>

        <form action="<?= site_url('/tasks/update/' . $task['id']) ?>" method="post">
            <?= csrf_field(); ?>

            <div class="mb-3">
                <label for="title" class="form-label">Título</label>
                <input type="text" name="title" id="title" class="form-control" value="<?= old('title', $task['title']) ?>" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Descrição</label>
                <textarea name="description" id="description" class="form-control" required><?= old('description', $task['description']) ?></textarea>
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select name="status" id="status" class="form-select">
                    <option value="pendente" <?= old('status', $task['status']) == 'pendente' ? 'selected' : '' ?>>Pendente</option>
                    <option value="em andamento" <?= old('status', $task['status']) == 'em andamento' ? 'selected' : '' ?>>Em andamento</option>
                    <option value="concluída" <?= old('status', $task['status']) == 'concluída' ? 'selected' : '' ?>>Concluída</option>
                </select>
            </div>

            <div>
                <button type="submit" class="btn btn-primary">Atualizar</button>
                <a href="<?= site_url('/tasks') ?>" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>

</body>

</html>