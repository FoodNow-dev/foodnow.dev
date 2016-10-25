<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        factory(App\User::class, 50)->create();
        factory(App\Models\Restaurant::class, 50)->create();
        factory(App\Models\Favorite::class, 50)->create();
        factory(App\Models\Friend::class, 50)->create();
        factory(App\Models\Review::class, 50)->create();

        Model::reguard();
    }
}
