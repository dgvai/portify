<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateUserSocialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_socials', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('icon')->nullable();
            $table->string('name')->nullable();
            $table->string('url')->nullable();
            $table->timestamps();
        });

        DB::table('user_socials')->insert([
            [
                'user_id' => 1,
                'icon' => 'fab fa-facebook-messenger',
                'name' => 'Messenger',
                'url' => '#'
            ],
            [
                'user_id' => 1,
                'icon' => 'fab fa-facebook-f',
                'name' => 'Facebook',
                'url' => '#'
            ],
            [
                'user_id' => 1,
                'icon' => 'fab fa-twitter',
                'name' => 'Twitter',
                'url' => '#'
            ],
            [
                'user_id' => 1,
                'icon' => 'fab fa-github',
                'name' => 'Github',
                'url' => '#'
            ],
            [
                'user_id' => 1,
                'icon' => 'fab fa-linkedin',
                'name' => 'Linked In',
                'url' => '#'
            ],
            [
                'user_id' => 1,
                'icon' => 'fab fa-instagram',
                'name' => 'Instagram',
                'url' => '#'
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
        Schema::dropIfExists('user_socials');
    }
}
