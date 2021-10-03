<?php

namespace App\Http\Controllers;

use App\Model\DivisionesContent;
use App\Model\SubDivisionContent;
use Illuminate\Http\Request;

class DivisionesController extends Controller
{
    public function divisiones(){
        $divisiones = DivisionesContent::where([])
        ->join('divisiones', 'divisiones.id', 'divisiones_content.divisiones_id')
        ->join('division_superior', 'division_superior.id', 'divisiones_content.division_superior_id')
        ->select(
            'divisiones_content.id as divisionContentId',
            'divisiones.id as divisionId',
            'divisiones.div_nombre as division',
            'divisiones.div_nivel as nivel',
            'divisiones.div_cantidad as colaboradores',
            'divisiones.div_embajador as embajador',
            'division_superior.div_sup_nombre as divisionSup',
            'division_superior.id as divisionSupId',
        )
        ->get();

        foreach ($divisiones as $key => $value) {
            $divisiones[$key]['subDivision'] = SubDivisionContent::where([
                ['divisiones_id', $value['divisionId']]
            ])
            ->count();
            $divisiones[$key]['key'] = $value['divisionId'];
        }

        return response()->json([
            'success' => true,
            'message' => 'Request successfully',
            'divisiones' => $divisiones,
        ]);
    }
}
