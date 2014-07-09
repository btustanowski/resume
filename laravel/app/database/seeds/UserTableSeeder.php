<?php

class UserTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
        User::create(['username'=>'admin1', 'password'=>Hash::make('admin1'), 'name'=>'Błażej Tustanowski', 'level'=>'admin']);
	}

}
