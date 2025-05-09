<!-- Script Central -->

<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="pt-BR">

<!--
TODO: 
    - Adicionar categorias de tarefas

        (CREATE TABLE categories (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(50)
        );
        ALTER TABLE tasks ADD category_id INT;)
   
    - Melhor retorno visual (<button class="btn btn-success hover:shadow-lg">✓</button>)
    - Modo escuro (<div class="list-group-item dark:bg-gray-800">)
    - Transições suaves (<button class="btn transition-all duration-200">...</button>)
-->

<head>
    <title>Lista de Tarefas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body class="container mt-5">
    <h1>Minha Lista de Tarefas</h1>

    <!-- Formulário de Nova Tarefa -->
    <form action="create.php" method="POST" class="mb-4">
        <div class="input-group">
            <input type="text" name="task" class="form-control" placeholder="Nova tarefa" required>
            <button type="submit" class="btn btn-primary">Adicionar Tarefa</button>
        </div>
    </form>

    <!-- Exibir Tarefas -->
    <ul class="list-group">
        <?php
        $statement = $pdo -> query("SELECT * FROM tasks ORDER BY creation_date DESC");

        while ($row = $statement -> fetch(PDO::FETCH_ASSOC)) {
            $taskClass = $row['is_completed'] ? 'text-decoration-line-through' : '';
            echo "
            <li class='list-group-item d-flex justify-content-between align-items-center'>
                <span class='$taskClass'>{$row['task']}</span>
                <div>
                    <a href='update.php?id={$row['id']}' class='btn btn-sm btn-success'>✓</>
                    <a href='delete.php?id={$row['id']}' class='btn btn-sm btn-danger'>✕</>
                </div>
            </li>";
        }
        ?>
    </ul>

</body>
</html>