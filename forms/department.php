<?php
include 'database.php';

if (!isset($_GET['id'])) {
    echo "No department selected!";
    exit;
}

$dept_id = intval($_GET['id']);
$sql = "SELECT name, description FROM departments WHERE id = $dept_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $department = $result->fetch_assoc();
} else {
    echo "Department not found!";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?php echo htmlspecialchars($department['name']); ?></title>
</head>
<body>

<h1><?php echo htmlspecialchars($department['name']); ?></h1>
<p><?php echo nl2br(htmlspecialchars($department['description'])); ?></p>

<a href="index.php">← Back to Home</a>

</body>
</html>
