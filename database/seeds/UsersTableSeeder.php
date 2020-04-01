<?php

	use Illuminate\Database\Seeder;
	use App\User;
	use Illuminate\Support\Facades\Hash;

	class UsersTableSeeder extends Seeder
	{
		/**
		 * Run the database seeds.
		 *
		 * @return void
		 */
		public function run()
		{
			for ($i=0; $i < 3; $i++) {
				$newUser = new User;
				$newUser->name = 'admin' . $i;
				$newUser->email = $newUser->name . '@admin.it';
				$newUser->password = Hash::make('adminadmin');
				$newUser->save();
			}
		}
	}
