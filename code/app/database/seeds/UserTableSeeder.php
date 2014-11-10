<?php

class UserTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kb_users')->delete();

        DB::table('kb_users')->insert(
            array(
                array(
                    'username'  => 'testuser1',
                    'email'     => 'testuser1@gmail.com',
                    'password'  => Hash::make('beetlegeuse'),
                    'about'     => 'randomrandom',
                    'facebook'  => 'randomrandom',
                    'twitter'   => 'randomrandom',
                    'website'   => 'randomrandom.be',
                    'youtube'   => 'randomrandom'
                ),
                array(
                    'username'  => 'admin',
                    'email'     => 'ferre.lambert@student.kdg.be',
                    'password'  => Hash::make('admin'),
                    'about'     => 'randomrandom',
                    'facebook'  => 'randomrandom',
                    'twitter'   => 'randomrandom',
                    'website'   => 'randomrandom.be',
                    'youtube'   => 'randomrandom'
                )
            )
        );
    }
}
