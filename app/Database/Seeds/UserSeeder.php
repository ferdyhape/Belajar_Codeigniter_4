<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        // create dummy data
        $data = [
            [
                'username' => 'admin',
                'password' => password_hash('admin', PASSWORD_DEFAULT),
            ],
            [
                'username' => 'user',
                'password' => password_hash('user', PASSWORD_DEFAULT),
            ],
        ];

        // insert to database
        $this->db->table('users')->insertBatch($data);
    }
}
