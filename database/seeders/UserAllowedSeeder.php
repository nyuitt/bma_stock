<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserAllowedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userId = 1;
        
        $user = User::find($userId);
        if ($user) {
            $user->is_allowed = 1;
            $user->save();
        }
    }
}
