<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class GejalaSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'kode_gejala' => 'G001',
                'nama_gejala'    => 'Sulit tidur',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
            [
                'kode_gejala' => 'G002',
                'nama_gejala'    => 'Mendengar suara aneh',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
            [
                'kode_gejala' => 'G003',
                'nama_gejala'    => 'Sering atau mudah menangis',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
            [
                'kode_gejala' => 'G004',
                'nama_gejala'    => 'Kehilangan minat untuk melakukan aktivitas',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
            [
                'kode_gejala' => 'G005',
                'nama_gejala'    => 'Emosi menjadi datar',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
            [
                'kode_gejala' => 'G006',
                'nama_gejala'    => 'Ingatan terganggu',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
            [
                'kode_gejala' => 'G007',
                'nama_gejala'    => 'Menjauh dari lingkungan sosial',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
            [
                'kode_gejala' => 'G008',
                'nama_gejala'    => 'Pikiran dan berbicara kacau',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
            [
                'kode_gejala' => 'G009',
                'nama_gejala'    => 'Rasa Takut dan khawatir berlebihan',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
            [
                'kode_gejala' => 'G010',
                'nama_gejala'    => 'Mimpi buruk',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
            [
                'kode_gejala' => 'G011',
                'nama_gejala'    => 'Sering merasa sedih',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
            [
                'kode_gejala' => 'G012',
                'nama_gejala'    => 'Mempercayai sesuatu yang tidak nyata',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
            [
                'kode_gejala' => 'G013',
                'nama_gejala'    => 'Sulit mengendalikan emosi',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
            [
                'kode_gejala' => 'G014',
                'nama_gejala'    => 'Diliputi perasaan bersalah berlebihan',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
            [
                'kode_gejala' => 'G015',
                'nama_gejala'    => 'Perasaan bermusuhan',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
            [
                'kode_gejala' => 'G016',
                'nama_gejala'    => 'Menghindari sebuah tempat atau objek',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
            [
                'kode_gejala' => 'G017',
                'nama_gejala'    => 'Kehilangan Motivasi',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
            [
                'kode_gejala' => 'G018',
                'nama_gejala'    => 'Sering cemas',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
            [
                'kode_gejala' => 'G019',
                'nama_gejala'    => 'Moody',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
            [
                'kode_gejala' => 'G020',
                'nama_gejala'    => 'Perasaan putus asa',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
            [
                'kode_gejala' => 'G021',
                'nama_gejala'    => 'Kurangnya daya ingat',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
            [
                'kode_gejala' => 'G022',
                'nama_gejala'    => 'Bicara terlalu cepat',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
            [
                'kode_gejala' => 'G023',
                'nama_gejala'    => 'Gangguan pernafasan',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
            [
                'kode_gejala' => 'G024',
                'nama_gejala'    => 'Gerakan tubuh dan pikiran yang lambat',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
        ];

        // Simple Queries
        // $this->db->query('INSERT INTO users (username, email) VALUES(:username:, :email:)', $data);

        // Using Query Builder
        $this->db->table('tbl_gejala')->insertBatch($data);
    }
}
