<?php  # Marcar Tarefas como Finalizadas
include 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    try {
        $statement = $pdo -> prepare("UPDATE tasks SET is_completed = NOT is_completed WHERE id = :id");
        $statement -> execute([':id' => $id]);
    } catch(PDOException $e) {
        die("Error: " . $e -> getMessage());
    }
}

header("Location: index.php");
exit;
?>