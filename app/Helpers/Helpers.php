<?php

namespace App\Helpers;

class Helpers
{
    static function getFileName($clientFileName)
    {
        $extension = pathinfo($clientFileName, PATHINFO_EXTENSION);
        $basename = bin2hex(random_bytes(8)); // see http://php.net/manual/en/function.random-bytes.php
        $filename = sprintf('%s.%0.8s', $basename, $extension);
        $filename = date("d-m-y") . "_" . $filename;
        return $filename;
    }
}
