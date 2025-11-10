<?php
function terbilang($number) {
    $number = (float)$number;
    $units = [
        '', 'ribu', 'juta', 'miliar', 'triliun'
    ];
    
    if ($number < 12) {
        return satuan($number);
    } elseif ($number < 20) {
        return satuan($number - 10) . ' belas';
    } elseif ($number < 100) {
        return satuan((int)($number / 10)) . ' puluh ' . satuan($number % 10);
    } elseif ($number < 200) {
        return 'seratus ' . terbilang($number - 100);
    } elseif ($number < 1000) {
        return satuan((int)($number / 100)) . ' ratus ' . terbilang($number % 100);
    } else {
        for ($i = 1; $i < count($units); $i++) {
            $unitValue = pow(1000, $i);
            if ($number < pow(1000, $i + 1)) {
                return terbilang((int)($number / $unitValue)) . ' ' . $units[$i] . ' ' . terbilang($number % $unitValue);
            }
        }
    }
}

function satuan($number) {
    switch ($number) {
        case 1:
            return 'satu';
        case 2:
            return 'dua';
        case 3:
            return 'tiga';
        case 4:
            return 'empat';
        case 5:
            return 'lima';
        case 6:
            return 'enam';
        case 7:
            return 'tujuh';
        case 8:
            return 'delapan';
        case 9:
            return 'sembilan';
        case 10:
            return 'sepuluh';        
        case 11:
            return 'sebelas';
        default:
            return '';
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $number = $_POST['number'];
    $number = str_replace(',', '', $number); // Mengubah format angka
    if (is_numeric($number) && $number >= 0 && $number <= pow(10, 18)) { // Batas hingga Puluhan Triliun
        echo '(' . terbilang($number) . ' rupiah)';
    } else {
        echo "Masukkan angka yang valid antara 0 dan 10^18.";
    }
}
?>
