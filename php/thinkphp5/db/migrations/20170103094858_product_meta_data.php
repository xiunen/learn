<?php

use Phinx\Migration\AbstractMigration;

class ProductMetaData extends AbstractMigration
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
    public function up()
    {
        $data = [
            ['name'=>'Product Name','owner_type'=>'product','key'=>'product-name'],
            ['name'=>'Propellers','owner_type'=>'product','key'=>'propellers'],
            ['name'=>'Release Date','owner_type'=>'product','key'=>'release-date'],
            ['name'=>'Weight','owner_type'=>'product','key'=>'weight'],
            ['name'=>'Primary Color','owner_type'=>'product','key'=>'primary-color'],
            ['name'=>'Price','owner_type'=>'product','key'=>'price']
        ];
        $table = $this->table('meta');
        $table->insert($data)->save();      
    }
    public function down()
    {
        $this->execute('DELETE FROM di_meta where owner_type="product"');
    }
}
