<?php

use Illuminate\Database\Seeder;

class BookTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Book::class,10)->create()->each(function ($book){
//            dd($user);
            $book->user()->create(factory(\App\User::class)->make()->toArray());
            $book->categories()->attach([1,2]);
            $book->authors()->attach([1]);
        });
    }
}
