<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'view-role',
            'create-role',
            'edit-role',
            'delete-role',
            'view-blog',
            'create-blog',
            'edit-blog',
            'delete-blog',
        ];

        foreach ($permissions as $permission) {
            // Check if the permission already exists in the database
            if (!Permission::where('name', $permission)->exists()) {
                // If it doesn't exist, create the permission
                Permission::create(['name' => $permission]);
            }
        }
    }
}
