<?php

use Illuminate\Database\Seeder;

class SectoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sectores')->insert(
            
            [

                [
                    'nombre' => 'C',
                    'piso' => 0,
                ],
                [
                    'nombre' => 'C',
                    'piso' => 1,
                ],
                [
                    'nombre' => 'B',
                    'piso' => 0,
                ],
                [
                    'nombre' => 'B',
                    'piso' => 1,
                ],
                [
                    'nombre' => 'A',
                    'piso' => 0,
                ],
                [
                'nombre' => 'A',
                'piso' => 1,
                ],
                [
                    'nombre' => 'A',
                    'piso' => 2,
                ],
                [
                    'nombre' => 'E',
                    'piso' => 0,
                ],
                [
                    'nombre' => 'F',
                    'piso' => 0,
                ],
                [
                    'nombre' => 'G',
                    'piso' => 0,
                ],
                [
                    'nombre' => 'D',
                    'piso' => 1,
                ],
                [
                    'nombre' => 'G',
                    'piso' => 1,
                ],
                [
                    'nombre' => 'F',
                    'piso' => 1,
                ],
                [
                    'nombre' => 'G',
                    'piso' => 2,
                ]

            ]

        );
    }
}
