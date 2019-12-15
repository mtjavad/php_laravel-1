<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\User::class,10)->create()->each(function ($user){
//            dd($user);
            $book=$user->books()->create(factory(\App\Book::class)->make()->toArray());
                $book->categories()->attach([1,2]);
                $book->authors()->attach([1]);
        });
    }
}
