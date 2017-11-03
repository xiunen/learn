<?php

use Phinx\Migration\AbstractMigration;

class Meta extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change()
    {

        $table = $this->table('meta');
        $table
            ->addColumn('name','string')
            ->addColumn('key','string')
            ->addColumn('owner_type','string')    //company or product
            ->addColumn('disabled','boolean',['default'=>false])
            ->addColumn('order_no','integer',['default'=>0])   //排序编号
            ->addTimestamps()
            ->addIndex(['key','owner_type'],['unique'=>true])
            ->create();
    }
}
