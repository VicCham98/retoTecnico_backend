<?php

use App\Model\SubDivisiones;
use Illuminate\Database\Seeder;

class SubDivisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subDivision = new SubDivisiones();
        $subDivision->id = 1;
        $subDivision->subdiv_nombre = "subDivision 1";
        $subDivision->save();

        $subDivision = new SubDivisiones();
        $subDivision->id = 2;
        $subDivision->subdiv_nombre = "subDivision 2";
        $subDivision->save();
    }
}
