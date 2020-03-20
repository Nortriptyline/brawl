<?php

use Illuminate\Database\Seeder;
use App\Group;
use App\User;

class GroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Group::class, 5)->create();

        $groups = Group::all();
        $users = User::all();

        $groups->each(function ($group, $key) use ($users) {
            $roles = ['admin', 'handler ', 'servant'];
            $nb_users = random_int(1, 10);
            for ($i = 0; $i < $nb_users; $i++) {
                $user = $users->random();
                $role = $i == 0 ? 'admin' : $roles[random_int(0, 2)];

                $group->users()->attach($user, ['role' => $role]);
            }
        });

    }
}
