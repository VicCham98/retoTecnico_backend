<?php

use App\Model\DivisionesContent;
use Illuminate\Database\Seeder;

class DivisionContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $content = new DivisionesContent();
        $content->divisiones_id = 1;
        $content->division_superior_id = 1;
        $content->save();

        $content = new DivisionesContent();
        $content->divisiones_id = 2;
        $content->division_superior_id = 1;
        $content->save();

        $content = new DivisionesContent();
        $content->divisiones_id = 3;
        $content->division_superior_id = 1;
        $content->save();
    }
}
