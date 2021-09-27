<?php

namespace Database\Seeders\Data;

use Bsb\Foundation\Database\ResourceSeeder;
use App\Models\Auth\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends ResourceSeeder
{
    /**
     * @var array
     */
    protected $dataSources = [
        'users' => 'data/users.json',
    ];

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->insertData($this->data['users']);
    }

    /**
     * @param  array  $users
     * @return array
     */
    public function insertData($users)
    {
        $branches = \DB::table('branches')->get();

        foreach ($users as $userData)
        {
            $user = new User;
            $user->username = $userData['username'];
            $user->password = Hash::make($userData['password']);
            $user->full_name = $userData['full_name'];
            $user->role_id = $userData['role_id'];
            $user->all_branches = false;
            $user->active = true;
            $user->locked = false;
            $user->hidden = false;
            $user->description = '';
            $user->note = '';
            $user->user_create_id = 1;
            $user->save();

            $branchIds = with($branches)->whereIn('code', $userData['branch_codes'])
                ->pluck('id')
                ->all();

            $user->branches()->sync($branchIds);
        }
    }
}
