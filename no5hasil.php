<?php
        $angka1 = $_GET['angka1'];
        $angka2 = $_GET['angka2'];
        $operator = $_GET['operator'];

        switch ($operator) {
            case "penjumlahan":
                $hasil = $angka1 + $angka2;
                break;
            case "pengurangan":
                $hasil = $angka1 - $angka2;
                break;
            case "perkalian":
                $hasil = $angka1 * $angka2;
                break;
            case "pembagian":
                if ($angka2 != 0) {
                    $hasil = $angka1 / $angka2;
                } else {
                    $hasil = "Tidak bisa membagi dengan nol.";
                }
                break;
            default:
                $hasil = "Operasi tidak valid.";
                break;
        }
        echo "Hasil perhitungan $angka1 $operator $angka2 = $hasil"; 
    ?>