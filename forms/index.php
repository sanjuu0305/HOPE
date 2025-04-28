<?php include 'database.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Hospital Dropdown</title>
  <style>
    ul { list-style: none; margin: 0; padding: 0; }
    li { position: relative; }
    li ul { display: none; position: absolute; background: #fff; box-shadow: 0 4px 8px rgba(0,0,0,0.1); }
    li:hover > ul { display: block; }
    a { text-decoration: none; display: block; padding: 8px; color: #333; }
    a:hover { background: #eee; }
  </style>
</head>
<body>

<nav>
  <ul>
    <li><a href="#">Departments</a>
      <ul>
        <?php
        $sql = "SELECT id, name FROM departments";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo '<li><a href="department.php?id=' . $row["id"] . '">' . htmlspecialchars($row["name"]) . '</a></li>';
            }
        } else {
            echo '<li>No Departments</li>';
        }
        ?>
      </ul>
    </li>
  </ul>
</nav>

</body>
</html>
