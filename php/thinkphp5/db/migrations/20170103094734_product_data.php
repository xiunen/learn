<?php

use Phinx\Migration\AbstractMigration;

class ProductData extends AbstractMigration
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

        $data_map = [
            'yuneec'=>[
                'breeze',
                'typhoon-h',
                'typhoon-q500-4k',
                'typhoon-g',
                'typhoon-tornado-h920',
            ],
            'gopro'=>['karma'],
            'parrot'=>[
                'bebop',
                'bebop-2',
                'ar-drone',
                'mambo',
                'swing'
            ],
            '3dr'=>['solo'],
            'xiaomi'=>[
                'mi-drone'
            ],
            'zerozero'=>['hover-camera-passport'],
            'zerotech'=>['dobby','ghost-2-0','xplorer']
        ];
        $company = $this->table('company');
        $table = $this->table('product');
        $rows = $this->fetchAll('select id,name from di_company');
        $row_map = [];
        foreach ($rows as $row) {
            $row_map[$row['name']] = $row['id'];
        }
        $data = [];
        foreach($data_map as $key=>$arr){
            $id = $row_map[$key];
            foreach($arr as $one){
                $data[] = ['name'=>$one,'company_id'=>$id];
            }
        }
        var_dump($data);
        $table->insert($data)->save();
    }

    public function down(){
        // $table = $this->table('products');
        $this->execute('delete from di_product');
    }
}
