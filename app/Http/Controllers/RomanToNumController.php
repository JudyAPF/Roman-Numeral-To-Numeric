<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RomanToNumController extends Controller
{
    public function convert($romanNum)
    {
        $num = $this->romanToNum($romanNum);
        if (!($num >= 1 && $num <= 999999)) {
            abort(400, 'Input must be a valid Roman numeral between I and MMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMCMXCIX');
        }
        $words = ucfirst($this->numToWords($num));
        $arr = array('num' => $num, 'romanNum' => $romanNum, 'words' => $words);
        return view('romantonum', $arr);
    }

    public function romanToNum($romanNum)
    {
        $map = [
            'M' => 1000,
            'CM' => 900,
            'D' => 500,
            'CD' => 400,
            'C' => 100,
            'XC' => 90,
            'L' => 50,
            'XL' => 40,
            'X' => 10,
            'IX' => 9,
            'V' => 5,
            'IV' => 4,
            'I' => 1,
        ];

        $result = 0;

        foreach ($map as $romanDigit => $value) {
            while (strpos($romanNum, $romanDigit) === 0) {
                $result += $value;
                $romanNum = substr($romanNum, strlen($romanDigit));
            }
        }

        return $result;
    }

    public function numToWords($num)
    {
        $words = [
            '', 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine',
            'ten', 'eleven', 'twelve', 'thirteen', 'fourteen', 'fifteen', 'sixteen', 'seventeen', 'eighteen', 'nineteen',
        ];

        $tens = [
            '', '', 'twenty', 'thirty', 'forty', 'fifty', 'sixty', 'seventy', 'eighty', 'ninety'
        ];

        if ($num < 20) {
            return $words[$num];
        }

        if ($num < 100) {
            return $tens[floor($num / 10)] . (($num % 10 != 0) ? ' ' . $words[$num % 10] : '');
        }

        if ($num < 1000) {
            return $words[floor($num / 100)] . ' hundred' . (($num % 100 != 0) ? ' ' . $this->numToWords($num % 100) : '');
        }

        if ($num < 1000000) {
            return $this->numToWords(floor($num / 1000)) . ' thousand' . (($num % 1000 != 0) ? ' ' . $this->numToWords($num % 1000) : '');
        }

        return 'Number out of range';
    }
}
