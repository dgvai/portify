<?php

use App\Models\System\Configuration;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDefaultConfigs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Configuration::insert([
            ['key' => 'enable_resume',  'value' => 1],
            ['key' => 'primary_color',  'value' => '#16464D'],
            ['key' => 'selected_bg',  'value' => 'bg-1.png'],
            ['key' => 'font_family',  'value' => 'Montserrat'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
