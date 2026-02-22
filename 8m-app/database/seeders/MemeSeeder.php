<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Meme; 
use App\Models\User;

class MemeSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::firstOrCreate(
            ['email' => 'abel@gmail.com'],
            [
                'name' => 'Abel',
                'password' => bcrypt('abel1234'),
            ]
        );

        $datos = [
            [
                'url' => 'https://ieslacampina.es/wp-content/uploads/2023/03/09.-Cobano-Sanchez-Lucia.png',
                'text' => 'Este meme ironiza sobre quienes preguntan "¿y el Día del Hombre?" cada 8M. El 8M no es una fiesta, es una jornada de lucha contra la desigualdad.'
            ],
            [
                'url' => 'https://gcdn.emol.cl/hombres/files/2015/07/machismo-1.jpg',
                'text' => 'Este meme parodia el machismo cotidiano. Frases como "no soy machista, pero..." reproducen violencia simbólica.'
            ],
            [
                'url' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTI-6lyRKh6HrAhXj4PGfhkHFcNCJp9eiKpnw&s',
                'text' => 'España, 2023 — INE. Las mujeres siguen asumiendo la mayor parte del trabajo doméstico y de cuidados.'
            ],
            [
                'url' => 'https://www.boredpanda.es/blog/wp-content/uploads/2018/12/memefemi-16-5c18d2c85860c__700.jpg',
                'text' => 'Estudios muestran que el trato recibido a menudo depende de cánones estéticos, afectando al respeto y la escucha.'
            ],
            [
                'url' => 'https://vidauniversitaria.uanl.mx/wp-content/uploads/2022/03/machismo-4.jpeg',
                'text' => 'Los memes de "la cocina" perpetúan estereotipos de subordinación. El 8M busca romper estos roles históricos.'
            ],
            [
                'url' => 'https://images7.memedroid.com/images/UPLOADED962/5e3137c261037.jpeg',
                'text' => 'Datos 2024: La violencia de género disminuyó un 5,2%, pero sigue afectando a miles de mujeres.'
            ],
            [
                'url' => 'https://images7.memedroid.com/images/UPLOADED158/5611273753dc5.jpeg',
                'text' => 'Dato DGT: Solo el 10% de las retiradas de carnet son a mujeres. Desmontando el mito de "mujer al volante, peligro constante".'
            ],
        ];

        foreach ($datos as $item) {
            Meme::create([
                'user_id'      => $user->id,
                'meme_url'     => $item['url'],
                'explicacion'  => $item['text'],
                'fecha_subida' => now(),
            ]);
        }
    }
}