<!DOCTYPE html>
<html>
<head>
    <title>Data Pengguna</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }
        
        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        
        h2 {
            text-align: center;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
        }
        
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        
        th {
            background-color: #f2f2f2;
        }
        
        tr:hover {
            background-color: #f5f5f5;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Data Pengguna</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Nama Lengkap</th>
                <th>Email</th>
                <th>Nomor Telepon</th>
            </tr>
            <?php
            // Koneksi ke database
            $conn = new mysqli('localhost', 'username', 'password', 'db_pengguna');

            // Cek koneksi
            if ($conn->connect_error) {
                die('Koneksi gagal: ' . $conn->connect_error);
            }

            // Query untuk mengambil data pengguna
            $sql = "SELECT id, nama_lengkap, email, no_telepon FROM pengguna";
            $result = $conn->query($sql);

            // Menampilkan data pengguna dalam tabel
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["nama_lengkap"] . "</td>";
                    echo "<td>" . $row["email"] . "</td>";
                    echo "<td>" . $row["no_telepon"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>Tidak ada data pengguna</td></tr>";
            }

            // Menutup koneksi database
            $conn->close();
            ?>
        </table>
    </div>
</body>
</html>