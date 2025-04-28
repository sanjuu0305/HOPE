<?php
include 'connection.php'; // ✅ Connect to DB

echo "<h2>Department Billing Information</h2>";

$sql = "SELECT * FROM departments";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<b>" . $row['name'] . ":</b> ";
        echo "Billing handled separately. (Example data)<br><br>";
    }
} else {
    echo "No departments found.";
}
?>
