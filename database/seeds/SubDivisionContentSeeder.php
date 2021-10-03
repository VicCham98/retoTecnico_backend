<?php

use App\Model\SubDivisionContent;
use Illuminate\Database\Seeder;

class SubDivisionContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $content = new SubDivisionContent();
        $content->subdivision_id = 1;
        $content->divisiones_id = 1;
        $content->save();

        $content = new SubDivisionContent();
        $content->subdivision_id = 2;
        $content->divisiones_id = 1;
        $content->save();

        $content = new SubDivisionContent();
        $content->subdivision_id = 1;
        $content->divisiones_id = 2;
        $content->save();
    }
}
