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
        try{
            $user = User::create($req->all());
        }catch(\Exception $e){
            echo $e->getMessage();
        }
    }

    public function create(){
        return view('users/create');
    }

    public function avatar(){
        return view('users/avatar');
    }
    public function upload_avatar(Request $req){
        if($req->hasFile('name')){
            $req->file('name')->move(__DIR__.'/../../../log','xxxxx');
        }else{
            echo 12;
        }
    }

}