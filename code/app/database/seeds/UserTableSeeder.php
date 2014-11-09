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

        User::create(array('username' => 'testuser1',
            'email' => 'testuser1@gmail.com',
            'password' => 'beetlegeuse',
            'over' => 'randomrandom',
            'facebook' => 'https://facebook.com/randomrandom',
            'twitter' => 'https://twitter.com/randomrandom',
            'website' => 'https://randomrandom.be'
            ));
    }
}
