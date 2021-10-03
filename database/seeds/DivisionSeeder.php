<?php

use App\Model\Divisiones;
use Illuminate\Database\Seeder;

class DivisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $division = new Divisiones();
        $division->id = 1;
        $division->div_nombre = "CEO";
        $division->div_nivel = 1;
        $division->div_cantidad = 2;
        $division->div_embajador = 'Carla Siphron';
        $division->save();

        $division = new Divisiones();
        $division->id = 2;
        $division->div_nombre = "Strategy";
        $division->div_nivel = 2;
        $division->div_cantidad = 22;
        $division->div_embajador = '';
        $division->save();

        $division = new Divisiones();
        $division->id = 3;
        $division->div_nombre = "Growth";
        $division->div_nivel = 5;
        $division->div_cantidad = 5;
        $division->div_embajador = 'Kiarra Rosser';
        $division->save();
    }
}
