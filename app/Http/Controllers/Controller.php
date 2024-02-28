<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function callAction($method, $parameters)
    {
        if (isset($parameters['domain'])) {
            unset($parameters['domain']);
        }
        return $this->{$method}(...array_values($parameters));
    }
}
