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
        $this->truncateTablas([
            'users',
        ]);

        $this->call([
            UsersTableSeeder::class
        ]);

    }

    protected function truncateTablas(array $tablas)
    {
        Schema::disableForeignKeyConstraints();
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;'); //SÓLO EN DESARROLLO, EVITAR EN PRODUCIÓN YA QUE CAUSA PROBLEMAS EN DB
        foreach ($tablas as $tabla)
        {
            DB::table($tabla)->truncate();
        }
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
        Schema::enableForeignKeyConstraints();
    }
}