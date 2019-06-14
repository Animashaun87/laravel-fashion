	<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function clean_numbers($dirty) {
    	$unwanted = [",", " ", "N", "NGN", "$", "#", "USD", "GBP"];
    	$clean = str_replace($unwanted, " ", $dirty);
    	return $clean;
    }
}
