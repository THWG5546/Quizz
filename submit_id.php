<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'connect_db.php';
    $name = htmlspecialchars($_REQUEST['name']);
    if (empty($name)) {
        echo "Name is required";
    } else {
        $sql = "INSERT INTO users (name) VALUES (?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $name);

        if ($stmt->execute()) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
        $conn->close();
    }
}
?>