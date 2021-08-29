<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolSeeder extends Seeder{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        //

        $role1 = Role::create(['name'=>'Admin']);
        $role2 = Role::create(['name'=>'Jefe Area']);
        $role3 = Role::create(['name'=>'Finanzas']);
        $role4 = Role::create(['name'=>'Direccion']);
        $role5 = Role::create(['name'=>'Normal']);

        $permission = Permission::create(['name' => 'home'])->syncRoles([$role1,$role2,$role3,$role4]);

        $permission = Permission::create(['name' => 'proyectos.index'])->syncRoles([$role1]);
        $permission = Permission::create(['name' => 'proyectos.show'])->syncRoles([$role1]);
        $permission = Permission::create(['name' => 'proyectos.edit'])->syncRoles([$role1]);
        $permission = Permission::create(['name' => 'proyectos.create'])->syncRoles([$role1]);
        $permission = Permission::create(['name' => 'proyectos.update'])->syncRoles([$role1]);

        $permission = Permission::create(['name' => 'proyectos.aprueba.jefearea'])->syncRoles([$role1, $role2]);
        $permission = Permission::create(['name' => 'proyectos.aprueba.finanza'])->syncRoles([$role1, $role3]);
        $permission = Permission::create(['name' => 'proyectos.aprueba.director'])->syncRoles([$role1, $role4]);



        $permission = Permission::create(['name' => 'areas.index'])->syncRoles([$role1]);
        $permission = Permission::create(['name' => 'areas.show'])->syncRoles([$role1]);
        $permission = Permission::create(['name' => 'areas.edit'])->syncRoles([$role1]);
        $permission = Permission::create(['name' => 'areas.create'])->syncRoles([$role1]);
        $permission = Permission::create(['name' => 'areas.update'])->syncRoles([$role1]);

        $permission = Permission::create(['name' => 'status.index'])->syncRoles([$role1]);
        $permission = Permission::create(['name' => 'status.show'])->syncRoles([$role1]);
        $permission = Permission::create(['name' => 'status.edit'])->syncRoles([$role1]);
        $permission = Permission::create(['name' => 'status.create'])->syncRoles([$role1]);
        $permission = Permission::create(['name' => 'status.update'])->syncRoles([$role1]);

        $permission = Permission::create(['name' => 'rubros.index'])->syncRoles([$role1]);
        $permission = Permission::create(['name' => 'rubros.show'])->syncRoles([$role1]);
        $permission = Permission::create(['name' => 'rubros.edit'])->syncRoles([$role1]);
        $permission = Permission::create(['name' => 'rubros.create'])->syncRoles([$role1]);
        $permission = Permission::create(['name' => 'rubros.update'])->syncRoles([$role1]);


    }
}
