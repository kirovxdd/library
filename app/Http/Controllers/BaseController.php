<?php

namespace App\Http\Controllers;

use App\services\books\Service;

class BaseController extends Controller
{
    public $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }
}
