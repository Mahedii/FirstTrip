<?php
  
namespace Database\Seeders;
  
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

  
class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'is-super-admin',
            'is-admin',
            'is-administrator',
            'is-employee',
            'is-viewer',
            'see-user',
            'user-list',
            'create-user',
            'edit-user',
            'delete-user',
            'manage-role',
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'see-po',
            'create-po',
            'edit-po',
            'delete-po',
            'print-po',
            'see-bills',
            'create-bills',
            'edit-bills',
            'delete-bills',
            'manage-quotation',
            'quotation-list',
            'create-quotation',
            'edit-quotation',
            'delete-quotation',
            'print-quotation',
            'see-tender',
            'create-tender',
            'edit-tender',
            'delete-tender',
            'see-customer',
            'create-customer',
            'edit-customer',
            'delete-customer',
            'backup-database',
            'see-todo',
            'create-projects',
            'edit-projects',
            'delete-projects',
            'create-task',
            'edit-task',
            'delete-task',
            'see-activity-log'
        ];
     
        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
        }
    }
}