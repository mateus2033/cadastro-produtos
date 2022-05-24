<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class Products extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change(): void
    {
        $table = $this->table('products');
        $table->addColumn('name', 'string', ['limit' => 100])
            ->addColumn('code', 'integer')
            ->addColumn('price', 'decimal')
            ->addColumn('description', 'string')
            ->addColumn('amount', 'integer')
            ->addColumn('category_id', 'integer', ['null' => true])
            ->create();
            $table->addForeignKey('category_id', 'category', 'id', ['delete' => 'SET_NULL', 'update' => 'NO_ACTION'])
            ->save();
    }
}
