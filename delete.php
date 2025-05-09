<?php # Deletar Tarefas
include 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    try {
        $statement = $pdo -> prepare("DELETE FROM tasks WHERE id = :id");
        $statement -> execute([':id' => $id]);
    } catch(PDOException $e) {
        die("Error: " . $e -> getMessage());
    }
}

header("Location: index.php");
exit;
?>