<?php

namespace App\Http\Controllers;

use App\Model\Divisiones;
use App\Model\DivisionesContent;
use App\Model\SubDivisionContent;
use Illuminate\Http\Request;

class DivisionesController extends Controller
{
    private function switchColumn($value) {
        switch ($value) {
            case 'division': {
                return "divisiones.div_nombre";
            }
            case 'divisionSup': {
                return "division_superior.div_sup_nombre";
            }
            case 'colaboradores': {
                return "divisiones.div_cantidad";
            }
            case 'nivel': {
                return "divisiones.div_nivel";
            }
            case 'subDivision': {
                return "divisiones.div_nombre";
            }
            case 'embajador': {
                return "divisiones.div_embajador";
            }
            default:
                return "divisiones.div_nombre";
        }
    }

    public function divisiones(Request $request){
        $pageSize = $request->pageSize;
        $column = $this->switchColumn($request->column);
        $search = '%'.$request->search.'%';

        $divisiones = DivisionesContent::where([
            ['divisiones_content.div_estado', 'ACTIVO'],
            [$column, 'like', $search]
        ])
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
        ->paginate($pageSize);

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

    public function deleteDivision(Request $request) {
        $divisionId = $request->divisionId;

        $division = Divisiones::find($divisionId);
        $division->div_estado = "ANULADO";
        $division->save();

        return response()->json([
            'success' => true,
            'message' => 'Request successfully',
        ]);
    }

    public function deleteDivisionParent(Request $request) {
        $divisionId = $request->divisionId;

        $division = DivisionesContent::find($divisionId);
        $division->div_estado = "ANULADO";
        $division->save();

        return response()->json([
            'success' => true,
            'message' => 'Request successfully',
        ]);
    }

    public function updateDivision(Request $request) {
        $idDivision = $request->idDivision;
        $nombre = $request->nombre;
        $nivel = $request->nivel;
        $cantidad = $request->cantidad;
        $embajador = $request->embajador;
        $estado = $request->estado;

        $divisiones = Divisiones::find($idDivision);
        $divisiones->div_nombre = $nombre;
        $divisiones->div_nivel = $nivel;
        $divisiones->div_cantidad = $cantidad;
        $divisiones->div_embajador = $embajador;
        $divisiones->div_estado = $estado;
        $divisiones->save();

        return response()->json([
            'success' => true,
            'message' => 'Request successfully',
        ]);
    }

    public function listSubDivision(Request $request) {
        $idDivision = $request->idDivision;

        $subDivision = SubDivisionContent::where([
            ['divisiones_id', $idDivision]
        ])
        ->join('subdivision', 'subdivision.id', 'subdivisiones_content.subdivision_id')
        ->select(
            'subdivision.id',
            'subdivision.subdiv_nombre as subdivision',
        )
        ->paginate(10);

        return response()->json([
            'success' => true,
            'message' => 'Request successfully',
            'subDivision' => $subDivision,
        ]);
    }
}
