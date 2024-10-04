<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>0072-CorinthianTantraprimaSaputra</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: #fff;
            border: 1px solid #ddd;
            padding: 20px;
            width: 300px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input,
        .form-group select {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }
        .btn-submit {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 15px;
            width: 100%;
            cursor: pointer;
        }
        .btn-submit:hover {
            background-color: #45a049;
        }
        .result {
            margin-top: 20px;
            padding: 15px;
            background-color: #f8f8f8;
            border: 1px solid #ddd;
            border-radius: 5px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>TERIMA KASIH TELAH BERBELANJA</h2>
        <form method="POST">
            <div class="form-group">
                <label for="totalPembelian">Nominal Belanja (Rp):</label>
                <input type="number" id="totalPembelian" name="totalPembelian" min="0" step="100" required>
            </div>
            <div class="form-group">
                <label for="statusMember">Status Pembeli:</label>
                <select id="statusMember" name="statusMember" required>
                    <option value="member">Member</option>
                    <option value="non-member">Bukan Member</option>
                </select>
            </div>
            <button type="submit" class="btn-submit">Hitung</button>
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $totalPembelian = isset($_POST['totalPembelian']) ? (int)$_POST['totalPembelian'] : 0;
            $statusMember = isset($_POST['statusMember']) ? $_POST['statusMember'] : '';

            function hitungTotalPembelian($totalPembelian, $isMember) {
                $diskon = 0;
                
                //menghitung diskon
                if ($isMember) {
                    if ($totalPembelian >= 500000) {
                        $diskon = 0.20; // Diskon 20% (diskon member + diskon belanja >= 500000)
                    } elseif ($totalPembelian >= 300000) {
                        $diskon = 0.15; // Diskon 15% (diskon member + diskon belanja >= 300000)
                    } else {
                        $diskon = 0.10; // diskon 10% (hanya dapat diskon member)
                    }
                } else {
                    if ($totalPembelian >= 500000) {
                        $diskon = 0.10; // Diskon 10% (diskon belanja >= 500000)
                    }
                }

                $totalDiskon = $totalPembelian * $diskon;
                $totalAkhir = $totalPembelian - $totalDiskon;

                return array(
                    'totalAkhir' => $totalAkhir,
                    'totalDiskon' => $totalDiskon,
                    'diskonPersentase' => $diskon * 100
                );
            }

            // untuk mengecek member atau bukan member
            $isMember = ($statusMember === 'member');
            $hasil = hitungTotalPembelian($totalPembelian, $isMember);

            // menampilkan hasil perhitungan
            echo "<br>";
            echo "<strong>Status Pembeli : " . ($isMember ? "Member" : "Bukan Member") . "</strong><br>";
            echo "Total Pembelian : Rp " . number_format($totalPembelian, 0, ',', '.') . "<br>";
            echo "Diskon : " . $hasil['diskonPersentase'] . "%<br>";
            echo "Jumlah Diskon: Rp " . number_format($hasil['totalDiskon'], 0, ',', '.') . "<br>";
            echo "<strong>Total Setelah Diskon : Rp " . number_format($hasil['totalAkhir'], 0, ',', '.') . "</strong>";
            
        }
        ?>
    </div>
</body>
</html>
