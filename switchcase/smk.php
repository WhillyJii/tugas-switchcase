<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Pendaftaran Ulang</title>
</head>
<body>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $nama = $_POST["nama"];
    $nisn = $_POST["nisn"];
    $kelas = $_POST["kelas"];
    $gedung = 0;
    $spp = 0;
    $seragam = 0;

    switch ($kelas) {
        case "X":
            $gedung = 500000;
            $spp = 300000;
            $seragam = 250000;
            break;
        case "XI":
            $gedung = 400000;
            $spp = 250000;
            $seragam = 200000;
            break;
        case "XII":
            $gedung = 300000;
            $spp = 200000;
            $seragam = 150000;
            break;
        default:
            $gedung = 0;
            $spp = 0;
            $seragam = 0;
            break;
    }

    $total = $gedung + $spp + $seragam;
}
?>

<?php if (isset($total)) { ?>
    <h2>Rincian Biaya Pendaftaran Ulang</h2>
    <p>Nama Lengkap : <?php echo htmlspecialchars($nama); ?></p>
    <p>NISN : <?php echo htmlspecialchars($nisn); ?></p>
    <p>Kelas : <?php echo htmlspecialchars($kelas); ?></p>
    <p>Biaya Gedung : Rp <?php echo number_format($gedung, 0, ',', '.'); ?></p>
    <p>Biaya SPP : Rp <?php echo number_format($spp, 0, ',', '.'); ?></p>
    <p>Biaya Seragam : Rp <?php echo number_format($seragam, 0, ',', '.'); ?></p>
    <h3>Total Biaya Pendaftaran Ulang : Rp <?php echo number_format($total, 0, ',', '.'); ?></h3>
    <a href="smk.php">Kembali</a>
<?php } else { ?>
    <h1>Pendaftaran Ulang</h1>
    <form action="smk.php" method="post">
        <label>Nama Lengkap :</label>
        <input type="text" name="nama" required><br><br>
        
        <label>NISN :</label>
        <input type="text" name="nisn" required><br><br>

        <label>Kelas :</label>
        <select name="kelas" required>
            <option value="X">X</option>
            <option value="XI">XI</option>
            <option value="XII">XII</option>
        </select><br><br>

        <button type="submit" name="submit">Submit</button>
    </form>
<?php } ?>

</body>
</html>