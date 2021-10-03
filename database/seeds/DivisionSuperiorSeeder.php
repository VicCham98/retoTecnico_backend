<?php

use App\Model\DivisionSuperior;
use Illuminate\Database\Seeder;

class DivisionSuperiorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superior = new DivisionSuperior();
        $superior->id = 1;
        $superior->div_sup_nombre = "Direccion general";
        $superior->save();

        $superior = new DivisionSuperior();
        $superior->id = 2;
        $superior->div_sup_nombre = "Operaciones";
        $superior->save();

        $superior = new DivisionSuperior();
        $superior->id = 3;
        $superior->div_sup_nombre = "Producto";
        $superior->save();
    }
}
