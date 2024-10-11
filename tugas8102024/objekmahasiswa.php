<?php
    require_once "mahasiswa.php";
    
    $mahasiswa1 = new mahasiswa("TANTRA","23.240.0072","3P41");

    $mahasiswa1->nama = "TANTRA";
    $mahasiswa1->nim = "23.240.0072";
    $mahasiswa1->kelas = "3P41";

    echo "NAMA : $mahasiswa1->nama <br>";
    echo "NIM : $mahasiswa1->nim <br>";
    echo "KELAS : $mahasiswa1->kelas <br>";
    echo $mahasiswa1->infomahasiswa();
    echo "<br>";
    var_dump($mahasiswa1);

    echo "<br>";
    
    $mahasiswa2 = new mahasiswa("CORINTHIAN","23.240.0072","3P41");

    $mahasiswa2->nama = "CORINTHIAN";
    $mahasiswa2->nim = "23.240.0072";
    $mahasiswa2->kelas = "3P41";

    echo "NAMA : $mahasiswa2->nama <br>";
    echo "NIM : $mahasiswa2->nim <br>";
    echo "KELAS : $mahasiswa2->kelas <br>";
    echo $mahasiswa2->infomahasiswa();
    echo "<br>";
    var_dump($mahasiswa2);
?>