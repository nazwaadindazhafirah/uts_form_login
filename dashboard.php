<?php
session_start();
include 'koneksi.php';
if (!isset($_SESSION['login'])) {
    header("Location: index.php");
    exit();
}

$page = $_GET['page'] ?? 'dashboard';

if ($page === 'dashboard' || $page === 'data_jurusan') {
    $query = "SELECT * FROM jurusan";
    $result = $conn->query($query);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard STITEK</title>
    <style>
        body {
            background-color: #e0f0ff;
            font-family: Arial, sans-serif;
            margin: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .navbar {
            background-color: #0077cc;
            padding: 15px 30px;
            display: flex;
            justify-content: center;
            gap: 15px;
            flex-wrap: wrap;
        }

        .nav-btn {
            background-color: white;
            border: 2px solid #0077cc;
            color: #0077cc;
            padding: 10px 22px;
            font-weight: bold;
            border-radius: 30px;
            cursor: pointer;
            text-decoration: none;
            transition: all 0.3s ease;
            font-size: 16px;
            user-select: none;
        }

        .nav-btn.active, .nav-btn:hover {
            background-color: #005fa3;
            color: white;
        }

        .container {
            background: white;
            margin: 30px auto;
            padding: 30px;
            width: 90%;
            max-width: 900px;
            border-radius: 15px;
            box-shadow: 0 0 15px rgba(0,0,0,0.2);
            flex: 1;
        }

        h2 {
            color: #005fa3;
            text-align: center;
            margin-bottom: 30px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 40px;
        }

        th, td {
            border: 1px solid #0077cc;
            padding: 12px;
            text-align: left;
            font-size: 16px;
        }

        th {
            background-color: #0077cc;
            color: white;
        }

        ul {
            font-size: 16px;
        }

        footer {
            text-align: center;
            padding: 20px;
            background-color: #b3daff;
        }

        .logout-btn {
            background-color: #003d66;
            color: white;
            padding: 10px 25px;
            text-decoration: none;
            border-radius: 12px;
            font-size: 16px;
            transition: background-color 0.3s ease;
            display: inline-block;
        }

        .logout-btn:hover {
            background-color: #002b4d;
        }
    </style>
</head>
<body>

<div class="navbar">
    <a href="?page=dashboard" class="nav-btn <?= $page=='dashboard' ? 'active' : '' ?>">Dashboard</a>
    <a href="?page=data_jurusan" class="nav-btn <?= $page=='data_jurusan' ? 'active' : '' ?>">Data Jurusan</a>
    <a href="?page=tentang" class="nav-btn <?= $page=='tentang' ? 'active' : '' ?>">Tentang STITEK</a>
</div>

<div class="container">
    <?php if ($page == 'dashboard'): ?>
        <h2>Selamat Datang di Sistem Informasi STITEK Bontang</h2>
        <p style="text-align:center; font-size:18px; color:#333;">
            Aplikasi ini menampilkan data jurusan yang ada di STITEK Bontang, seperti Teknik Informatika, Teknik Elektro, Sistem Informasi, dan Bisnis Digital.  
            Silakan gunakan menu di atas untuk menjelajahi fitur-fitur sistem.
        </p>

    <?php elseif ($page == 'data_jurusan'): ?>
        <h2>Data Jurusan STITEK</h2>
        <?php if ($result && $result->num_rows > 0): ?>
            <table>
                <tr>
                    <th>No</th>
                    <th>Nama Jurusan</th>
                    <th>Keterangan</th>
                </tr>
                <?php $no = 1; while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= htmlspecialchars($row['nama_jurusan']) ?></td>
                    <td><?= htmlspecialchars($row['keterangan']) ?></td>
                </tr>
                <?php } ?>
            </table>
        <?php else: ?>
            <p>Tidak ada data jurusan.</p>
        <?php endif; ?>

    <?php elseif ($page == 'tentang'): ?>
        <h2>Tentang STITEK</h2>
        <p><strong>STITEK Bontang</strong> adalah Sekolah Tinggi Teknologi yang berfokus pada pengembangan teknologi informasi dan rekayasa.</p>
        <ul>
            <li><strong>Lokasi:</strong> Bontang, Kalimantan Timur</li>
            <li><strong>Program Studi:</strong> Teknik Informatika, Sistem Informasi, Teknik Elektro, Bisnis Digital</li>
            <li><strong>Visi:</strong> Menjadi perguruan tinggi unggul di bidang teknologi</li>
            <li><strong>Misi:</strong> Pendidikan, penelitian, dan pengabdian masyarakat</li>
        </ul>

    <?php else: ?>
        <h2>Halaman Tidak Ditemukan</h2>
    <?php endif; ?>
</div>

<footer>
    <a class="logout-btn" href="logout.php">Logout</a>
</footer>

</body>
</html>
