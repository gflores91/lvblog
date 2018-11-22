<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        // Crear los usuarios
        $users = factory(lvblog\Models\User::class)
                    ->times(50)
                    ->create();
        // Crear noticias asociadas a un usuario
        $users->each(function(lvblog\Models\User $user){
            factory(lvblog\Models\Noticia::class)
                    ->times(30)
                    ->create([
                        'user_id' => $user->id,
                    ]);
        });
    }
}
