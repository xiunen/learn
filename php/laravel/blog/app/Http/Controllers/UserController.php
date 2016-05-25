<?php
namespace App\Http\Controllers;
use App\User as User;
class UserController extends Controller{
    public function index(){
        $obj = new \stdClass();
        $obj->name = 'I am object';
        return view('users/index',[
            'name'=>'This is for template',
            'user'=>[
                'name'=>'hello world'
            ],
            'obj'=>$obj
        ]);
    }
}