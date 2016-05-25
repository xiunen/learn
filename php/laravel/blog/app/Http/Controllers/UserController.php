<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User as User;
class UserController extends Controller{
    public function index(Request $req){
        $obj = new \stdClass();
        $obj->name = 'I am object';
        $input_name = $req->input('name');
        echo $input_name;
        return view('users/index',[
            'name'=>'This is for template',
            'user'=>[
                'name'=>'hello world'
            ],
            'obj'=>$obj
        ]);
    }
    public function store(Request $req){
        echo $req->input('name');
        var_dump($req->getContent());
    }
}