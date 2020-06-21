<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateUserGalleriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_galleries', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('image')->nullable();
            $table->string('caption',10000)->nullable();
            $table->timestamps();
        });

        DB::table('user_galleries')->insert([
            [
                'user_id' => 1,
                'image' => 'gallery-1.jpg',
                'caption' => 'Demo Caption Lorem Ipsum',
            ],
            [
                'user_id' => 1,
                'image' => 'gallery-2.jpg',
                'caption' => 'Demo Caption Lorem Ipsum',
            ],
            [
                'user_id' => 1,
                'image' => 'gallery-3.jpg',
                'caption' => 'Demo Caption Lorem Ipsum',
            ],
            [
                'user_id' => 1,
                'image' => 'gallery-4.jpg',
                'caption' => 'Demo Caption Lorem Ipsum',
            ],
            [
                'user_id' => 1,
                'image' => 'gallery-5.jpg',
                'caption' => 'Demo Caption Lorem Ipsum',
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
        Schema::dropIfExists('user_galleries');
    }
}
