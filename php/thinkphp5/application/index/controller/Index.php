<?php
namespace app\index\controller;

use app\common\model\Company as CompanyModel;

class Index
{
    public function index()
    {
        $companies = CompanyModel::all();
        return 'hello world';
    }
}
