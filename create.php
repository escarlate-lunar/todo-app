<?php # Adicionar Novas Tarefas
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $task = htmlspecialchars($_POST['task']);

    try {
        $statement = $pdo -> prepare("INSERT INTO tasks (task) VALUES (:task)");
        $statement -> execute([':task' => $task]);
    } catch(PDOException $e) {
        die("Error: " . $e -> getMessage());
    }
}

header("Location: index.php");
exit;
?>