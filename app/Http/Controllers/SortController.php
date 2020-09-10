<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SortController extends Controller
{
    /**
     *
     */
    public function index():void {
        $text = "lemon orange banana apple дгвбаывпвапв  ereryrtyr     edfjaurgeqaooirhejboirjoghki";
        $sorted = $this->sortAlphabeticalOrder($text);

        echo "<h3>Input text:</h3>". $text . "<hr>";
        echo "<h3>Output text:</h3>". $sorted;
    }

    /**
     * @param string $text
     * @return string
     */
    private function sortAlphabeticalOrder(string $text): string {

        $stringToArray = preg_split("#\s+#", $text);

        $sorted = array();
        foreach ($stringToArray as $key => $toString){
            $arr = array();
            while ($strlen = mb_strlen($toString)) {
                $arr[] = mb_substr($toString, 0, 1);
                $toString = mb_substr($toString, 1, $strlen);
            }
            sort($arr);
            $uniteToArray =  implode('', $arr);
            $sorted[$key] = $uniteToArray;
        }

        $arrayToString = implode(" ", $sorted);
        return $arrayToString;
    }
}
