<?php

namespace App\Http\Controllers;

use App\Model\Divisiones;
use Illuminate\Http\Request;

class DivisionesController extends Controller
{
    public function divisiones(){
        $divisiones = Divisiones::get();

        return response()->json([
            'success' => true,
            'message' => 'Request successfully',
            'divisiones' => $divisiones,
        ]);
    }
}
