<?php

use Phinx\Migration\AbstractMigration;

class CompanyMetaData extends AbstractMigration
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
            ['name'=>'Company Name','owner_type'=>'company','key'=>'company-name'],
            ['name'=>'Set Up Time','owner_type'=>'company','key'=>'set-up-time'],
            ['name'=>'Founder Name','owner_type'=>'company','key'=>'founder-name'],
            ['name'=>'Description','owner_type'=>'company','key'=>'description'],
            ['name'=>'Country','owner_type'=>'company','key'=>'country'],
            ['name'=>'Province/State','owner_type'=>'company','key'=>'province'],
            ['name'=>'City','owner_type'=>'company','key'=>'city'],
            ['name'=>'Ranking','owner_type'=>'company','key'=>'ranking']
        ];
        $table = $this->table('meta');
        $table->insert($data)->save();      
    }
    public function down()
    {
        $this->execute('DELETE FROM di_meta where owner_type="company"');
    }
}
