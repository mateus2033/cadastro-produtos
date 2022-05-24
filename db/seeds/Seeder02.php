<?php


use Phinx\Seed\AbstractSeed;

class Seeder02 extends AbstractSeed
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
                'price' => 19.10,
                'description' => "tsteste",
                'amount' => 200,
                'category_id'=> 1
            ], [
                'name' => "Ferramentas N1",
                'code' => 1010101010,
                'price' => 19.10,
                'description' => "tsteste",
                'amount' => 200,
                'category_id'=> 2
            ]
        ];

        $posts = $this->table('products');
        $posts->insert($data)->saveData();
    }
}
