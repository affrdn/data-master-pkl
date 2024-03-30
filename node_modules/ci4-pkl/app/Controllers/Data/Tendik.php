<?php

namespace App\Controllers\Data;

use App\Controllers\BaseController;

class Tendik extends BaseController
{

    public function index()
    {
        $data = [
            'title' => 'FMIPA | Tenaga Pendidik'
        ];

        return view('fmipa/data/tendik/v-tendik', $data);
    }
}
