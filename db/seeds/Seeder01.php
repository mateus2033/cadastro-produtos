<?php


use Phinx\Seed\AbstractSeed;

class Seeder01 extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     */
    public function run()
    {
        $data = [
            [
                'name' => "Ferramentas N1",
                'code' => 1010101010,

            ], [
                'name' => "Alimentos",
                'code' => 50123123,

            ],
            [
                'name' => "Tecnologia",
                'code' => 50123123,

            ],
            [
                'name' => "Higiene",
                'code' => 50123123,          
            ]
        ];

        $posts = $this->table('category');
        $posts->insert($data)->saveData();
    }
}
