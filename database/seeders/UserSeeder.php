<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@role.test',
            'password' => bcrypt('admin'),
        ]);

        $admin->assignRole('admin');

        $kasir = User::create([
            'name' => 'kasir',
            'email' => 'kasir@role.test',
            'password' => bcrypt('kasir'),
        ]);

        $kasir->assignRole('kasir');

        $supplier = User::create([
            'name' => 'supplier',
            'email' => 'supplier@role.test',
            'password' => bcrypt('supplier'),
        ]);

        $supplier->assignRole('supplier');
    }
}
