<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function unixTime($time)
    {
        $convertedTime = date('Y-M-d H:i:s', $time);
        return $convertedTime;
    }

    public function percentagePrint(int $number)
    {
        $arr = array();
        $hCounter = 0;
        $tCounter = 0;

        for ($i = 0; $i < $number; $i++) {
            $rand = rand(0, 1);
            // Supposing 0 is head, 1 is tail

            if ($rand == 0) {
                $hCounter += 1;
            }

            if ($rand == 1) {
                $tCounter += 1;
            }
        }

        // $arr[0] = ($hCounter / $number) * 100;
        // $arr[1] = ($tCounter / $number) * 100;

        return array(($hCounter / $number) * 100, ($tCounter / $number) * 100);
    }

    function validateEmail($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return "True";
        } else {
            return "False";
        }
    }
}
