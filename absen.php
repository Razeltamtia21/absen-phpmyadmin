<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Absen Project</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="absen.php" method="post">
        <input type="text" name="username" placeholder="username" required>
            <div class="box-group">
                <div class="checkbox-item">
                    <input type="checkbox" name="hadir" id="hadir">
                <label for="hadir">Hadir</label>
            </div>
            <div class="checkbox-item">
                <input type="checkbox" name="tidak" id="tidak">
                    <label for="tidak">Tidak Hadir</label>
            </div>
</div>

        <button type="submit" name="submit">Submit</button>
    </form>
</body>
</html>

<?php 

$conn = mysqli_connect("localhost", "root", "", "mysql");

if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $hadir = isset($_POST["hadir"]);
    $tidak = isset($_POST["tidak"]);

    if ($hadir xor $tidak) {
        $keterangan = $hadir ? "Hadir" : "Tidak Hadir";

        $query = "INSERT INTO absen (username, keterangan) VALUES ('$username', '$keterangan')";
        mysqli_query($conn, $query);

        echo "<script>alert('Berhasil Absen')</script>";
        echo "<script>window.location.href = '';</script>";
    } else {
        echo "<script>alert('Pilih salah satu: Hadir atau Tidak Hadir.')</script>";
    }
}

?>
