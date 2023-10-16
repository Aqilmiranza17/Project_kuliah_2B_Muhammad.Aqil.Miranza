<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Praktikum pemrograman web kelas 2.5</h1>
    <h2>Membuat program menghitung nilai secara dinamis</h2>
    <form action="no5hasil.php" method="GET">
        <table cellpadding="8">
            <tr>
                <td>
                    <input type="text" name="angka1" id="angka1" placeholder="nilai 1">
                </td>
            </tr>

            <tr>
                <td>
                    <select name="operator" id="operator">
                        <option value="penjumlahan">+</option>
                        <option value="pengurangan">-</option>
                        <option value="perkalian">x</option>
                        <option value="pembagian">/</option>
                    </select>
                </td>
            </tr>
            
            <tr>
                <td>
                    <input type="text" name="angka2" id="angka2" placeholder="nilai 2">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" value="hasil"> 
                    <input type="reset" value="reset">
                </td>
            </tr>
        </table>
    </form>
    
    
</body>
</html>
