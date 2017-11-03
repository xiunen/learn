<?php

use Phinx\Migration\AbstractMigration;

class CompanyData extends AbstractMigration
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
            ['name'=>'yuneec'],
            ['name'=>'parrot'],
            ['name'=>'3dr'],
            ['name'=>'zerozero'],
            ['name'=>'zerotech'],
            ['name'=>'xiaomi'],
            ['name'=>'gopro'],
            ['name'=>'ehang']
        ];
        $table = $this->table('company');
        $table->insert($data)->save();      
    }

    public function down(){
        // $table = $this->table('companys');
         $this->execute('DELETE FROM di_company');
    }
}
