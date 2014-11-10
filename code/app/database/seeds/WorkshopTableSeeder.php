<?php

class WorkshopTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kb_workshops')->delete();

        DB::table('kb_workshops')->insert(
            array(
                array(
                    'title' => 'hoe je koekjes nog lekkerder maakt',
                    'description' => 'Leer hoe je lekkere koekjes bakt. Ik maak gebruik van een aantalunieke ingrediënten.',
                    'category' => 'koken',
                    'location' => 'Laarstraat 65 2070 Zwijndrecht',
                    'date'     => '22/04/2015',
                    'time'      => '12:00:00',
                    'duration'  => '00:00:60',
                    'requirements'=>'kookmuts',
                    'foreknowledge'=>'',
                    'fk_user' => '1',
                    'subscribers_amount' => '15'
                ),
                array(
                    'title' => 'wat de voordelen van ASP.NET zijn',
                    'description' => 'Heb je het niet voor ASP.NET? Ik toon je wat de voordelen zijn en hoe je er op een goede manier gebruik van maakt.',
                    'category' => 'code',
                    'location' => 'Schooldreef 104 9170 De Klinge',
                    'date'     => '22/12/2014',
                    'time'      => '12:00:00',
                    'duration'  => '00:00:60',
                    'requirements'=>'laptop met visual studio geïnstalleerd',
                    'foreknowledge'=>'html, css',
                    'fk_user' => '1',
                    'subscribers_amount' => '3'
                ),
                array(
                    'title' => 'wat je nu weer op hoeveel graden wast',
                    'description' => 'Ik geef je een aantal handige tips. Wordt baas over je wasmachine!',
                    'category' => 'huishouden',
                    'location' => 'Sint-Katelijnevest 51, 2000 Antwerpen',
                    'date'     => '22/11/2014',
                    'time'      => '12:00:00',
                    'duration'  => '00:00:60',
                    'requirements'=>'3 kledingstukken',
                    'foreknowledge'=>'',
                    'fk_user' => '1',
                    'subscribers_amount' => '8'
                )
            )
        );
    }

}
