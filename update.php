<?php  # Marcar Tarefas como Finalizadas
include 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    try {
        $statement = $pdo -> prepare("UPDATE tasks SET is_done = NOT is_done WHERE id = :id");
        $statement -> execute([':id' => $id]);
    } catch(PDOException $e) {
        die("Error: " . $e -> getMessage());
    }
}

header("Location: index.php");
exit;
?>