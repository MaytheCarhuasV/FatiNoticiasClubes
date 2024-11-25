<?php

namespace Database\Seeders;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //creamos el permiso para usarlo en el rol
        Permission::create(['name' => 'administrar']);
        $role = Role::create(['name' => 'admin']);
        $role->syncPermissions("administrar");
        // create user
        $user1 = User::create([
            'name' => 'Anthony Robert',
            'password' => Hash::make('123456'),
            'email' => 'logicainformatica18@gmail.com',
        ]);
        //asignar rol
        $user1->assignRole('admin');
        ///////////////////////////////////////////////////////////////////////
        Permission::create(['name' => 'listar']);
        $role = Role::create(['name' => 'student']);
        $role->syncPermissions("listar");
        // create user
        $user2 = User::create([
            'name' => 'roberto',
            'password' => Hash::make('123456'),
            'email' => 'estudiante18@gmail.com',
        ]);
          //asignar rol
        $user2->assignRole('student');

    }
}
