<?php

use App\Models\Auth\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class AddDefaultUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $user = User::create([
            'email' => 'user@user.com',
            'password' => Hash::make('123456')
        ]);

        $user->data()->create([
            'first_name' => 'Sarah',
            'last_name' => 'Dylen',
            'current_work' => 'Senior Graphics Designer, at Twitter, Newfoundland, Canada',
            'graduated' => 'University of Liberal Arts, with Bachelors or Arts Degree in Design',
            'bio' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.'
        ]);

        $user->photo()->create([
            'cover' => 'default-user.jpg'
        ]);

        $user->projects()->create([
            'title' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit.',
            'image' => 'default-project.jpg',
            'description' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.',
            'link' => '#'
        ]);

        $user->resume()->create([
            'file' => 'demo-pdf.pdf'
        ]);

        $user->services()->createMany([
            [
                'title' => 'Web Development',
                'icon' => 'fas fa-star',
                'description' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.'
            ],
            [
                'title' => 'Web Design',
                'icon' => 'fas fa-star',
                'description' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.'
            ],
            [
                'title' => 'UI Design',
                'icon' => 'fas fa-star',
                'description' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.'
            ]
        ]);

        $user->titles()->createMany([
            ['title' => 'Web Developer'],
            ['title' => 'Web Designer'],
            ['title' => 'UI Designer'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $user = User::all();
        foreach($user as $u){
            $u->delete();
        }
    }
}
