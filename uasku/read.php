(BUAT FILE read.php)

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "universitas";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM mahasiswa";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["id"]. "</td>
                <td>" . $row["nama"]. "</td>
                <td>" . $row["nim"]. "</td>
                <td>" . $row["jurusan"]. "</td>
                <td>" . $row["email"]. "</td>
                <td>
                    <a href='update.php?id=" . $row["id"]. "' class='btn btn-info'>Edit</a>
                    <a href='delete.php?id=" . $row["id"]. "' class='btn btn-danger' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\")'>Delete</a>
                </td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='6'>No records found</td></tr>";
}

$conn->close();
?>