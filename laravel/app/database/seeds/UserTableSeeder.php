<?php

class UserTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
        User::create(['username'=>'admin1', 'password'=>'$2y$10$voHaLdFkssYk41PoCWtIGeSaVpCwNzO45mklj5k0O1BWN.Jbc//5q', 'name'=>'Błażej Tustanowski', 'level'=>'admin']);
	}

}
