<html>
<head>
    <title>Contoh Form dengan POST</title>
</head>
<body>
    <h1>Buku tamu</h1>
    Komentar dan saran sangat kami butuhkan untuk meningkatkan kualitas situs kami
    <hr>
    <form action="proses_bukutamu.php" method="POST">
    <pre>
        Nama anda : <input type="text" name="nama" size="25" maxlength="50">
        Email addres : <input type="email" name="email" size="25" maxlength="50">
        Komentar : <textarea name="komentar" id="" cols="40" rows="5"></textarea>
        <input type="submit" value="kirim">
        <input type="reset" value="ulangi">
    </pre>
    </form>
</body>
</html>