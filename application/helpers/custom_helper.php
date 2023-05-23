<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('getNumberFromRupiah')) {
    function getNumberFromRupiah($rupiah)
    {
        $regex = '/-?Rp\s?([\d.,]+)/';
        if (preg_match($regex, $rupiah, $matches)) {
            $formattedNumber = str_replace(['.', ','], '', $matches[1]);
            return (float) $formattedNumber;
        }
        return null;
    }
}
if (!function_exists('formatRupiah')) {
    function formatRupiah($number)
    {

        return 'Rp ' . number_format($number, 0, ',', '.');
    }
}
if (!function_exists('formatRibuan')) {
    function formatRibuan($number)
    {
        // Memformat angka dengan tanda ribuan (koma atau titik) setiap tiga digit
        $formattedNumber = number_format($number, 0, ',', '.');

        return $formattedNumber;
    }
}
if (!function_exists('unformatRibuan')) {
    function unformatRibuan($formattedNumber)
    {
        // Menghapus tanda ribuan (koma atau titik)
        $number = str_replace('.', '', $formattedNumber);

        // Mengubah string menjadi integer
        $integerNumber = intval($number);

        return $integerNumber;
    }
}
