<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateUserSkillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_skills', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('name')->nullable();
            $table->integer('percent')->nullable();
            $table->timestamps();
        });

        DB::table('user_skills')->insert([
            [
                'user_id' => 1,
                'name' => 'PHP',
                'percent' => 95
            ],
            [
                'user_id' => 1,
                'name' => 'HTML',
                'percent' => 100
            ],
            [
                'user_id' => 1,
                'name' => 'CSS',
                'percent' => 50
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_skills');
    }
}
