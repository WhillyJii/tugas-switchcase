<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Penyewaan Mobil</title>
</head>
<body>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $nama = $_POST["nama"];
    $nomor = $_POST["nomor"];
    $mobil = $_POST["mobil"];
    $lama = $_POST["lama"];
    $biayaSewa = 0;
    $biayaAsuransi = 0;

    switch ($mobil) {
        case "Avanza":
            $biayaSewa = 300000;
            $biayaAsuransi = 15000;
            break;
        case "Xenia":
            $biayaSewa = 300000;
            $biayaAsuransi = 15000;
            break;
        case "Innova":
            $biayaSewa = 500000;
            $biayaAsuransi = 25000;
            break;
        case "Alphard":
            $biayaSewa = 750000;
            $biayaAsuransi = 30000;
            break;
        case "Fortuner":
            $biayaSewa = 700000;
            $biayaAsuransi = 25000;
            break;
        default:
            $biayaSewa = 0;
            $biayaAsuransi = 0;
            break;
    }

    $total = ($biayaSewa + $biayaAsuransi) * $lama;
}
?>

<?php if (isset($total)) { ?>
    <h2>Rincian Penyewaan Mobil</h2>
    <p>Nama Penyewa : <?php echo htmlspecialchars($nama); ?></p>
    <p>Nomor Penyewa : <?php echo htmlspecialchars($nomor); ?></p>
    <p>Jenis Mobil : <?php echo htmlspecialchars($mobil); ?></p>
    <p>Lama Sewa : <?php echo htmlspecialchars($lama); ?> hari</p>
    <p>Biaya Sewa per Hari : Rp <?php echo number_format($biayaSewa, 0, ',', '.'); ?></p>
    <p>Biaya Asuransi per Hari : Rp <?php echo number_format($biayaAsuransi, 0, ',', '.'); ?></p>
    <h3>Total Biaya Sewa : Rp <?php echo number_format($total, 0, ',', '.'); ?></h3>
    <a href="mobil.php">Kembali</a>
<?php } else { ?>
    <h1>Form Penyewaan Mobil</h1>
    <form action="mobil.php" method="post">
        <label>Nama Penyewa    :</label>
        <input type="text" name="nama" required><br><br>

        <label>Nomor Penyewa  :</label>
        <input type="text" name="nomor" required><br><br>

        <label>Jenis Mobil  :</label>
        <select name="mobil" required>
            <option value="Avanza">Avanza</option>
            <option value="Xenia">Xenia</option>
            <option value="Innova">Innova</option>
            <option value="Alphard">Alphard</option>
            <option value="Fortuner">Fortuner</option>
        </select><br><br>

        <label>Lama Sewa    :</label>
        <input type="number" name="lama" required min="1"><br><br>

        <button type="submit" name="submit">Hitung Biaya</button>
    </form>
<?php } ?>

</body>
</html>