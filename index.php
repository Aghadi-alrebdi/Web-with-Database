<?php require 'db.php'; ?>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['name']) && isset($_POST['age'])) {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $conn->query("INSERT INTO users (name, age) VALUES ('$name', $age)");
}


$users = $conn->query("SELECT * FROM users");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>User Form</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

<form method="post">
  <input type="text" name="name" placeholder="Name" required>
  <input type="number" name="age" placeholder="Age" required>
  <button type="submit" class="toggle">Submit</button>
</form>

<table>
  <thead>
    <tr>
      <th>ID</th><th>Name</th><th>Age</th><th>Status</th><th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php while ($row = $users->fetch_assoc()): ?>
      <tr>
        <td><?= $row['id'] ?></td>
        <td><?= htmlspecialchars($row['name']) ?></td>
        <td><?= $row['age'] ?></td>
        <td><?= $row['status'] ?></td>
        <td>
          <a href="toggle.php?id=<?= $row['id'] ?>">
            <button class="toggle">Toggle</button>
          </a>
        </td>
      </tr>
    <?php endwhile; ?>
  </tbody>
</table>

</body>
</html>
