#Laravel应用blog搭建过程

> 参考 [安装教程](http://laravel-china.org/docs/5.1/installation) 安装laravel

### 新建项目
```shell
    laravel new blog
```

### 安装依赖
```shell
    cd blog
    ../composer.phar install
```

### nginx配置
在我的机器上，该项目安装位于`/Users/abotchen/workspace/learn/php/laravel/blog`,所以nginx配置如下：
```shell
    upstream backendevents{
        server 127.0.0.1:9000;
    }
    server {
        listen 80;
        root /Users/abotchen/workspace/learn/php/laravel/blog/public;
        index index.htm index.html index.shtml index.php;

        client_max_body_size 3m;

        location ~ /\.git {
            deny all;
        }
        
        location / {
            try_files $uri $uri/ /index.php?$query_string;
            fastcgi_pass backendevents;
            fastcgi_index index.php;
            fastcgi_split_path_info ^(.+\.php)(.*)$;   
            fastcgi_param PATH_INFO $fastcgi_path_info;
            fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
            include fastcgi_params;
            access_log        on;
        }

        location ~* ^.+.(jpg|jpeg|gif|css|png|js|ico|html|xml|txt)$ {
            access_log        off;
            expires           max;
        }
    }
```

### 启动php-fpm
```shell
    sudo php-fpm
```

### 修改sotrage目录权限
```shell
    chmod -R 777 storage/
```
如果不修改该权限，`http://localhost`访问时，只能知道是`500 Internal Server Error`，无法看到错误信息

### 打开开发环境
```shell
    cp .env.example .env
    php artisan key:generate
    #不执行这句的话，访问时会报错：`No supported encrypter found. The cipher and / or key length are invalid.`
```

至此， 项目应该可以正常访问了。

### 定义路由规则
路由规则定义在`app/Http/routes.php`文件中。路由规则的定义可以[http://laravel-china.org/docs/5.1/routing](http://laravel-china.org/docs/5.1/routing)。
在大型项目中，建议使用`resource`方法，例如在`blog/app/Httproutes.php`添加如下代码：
```php
    Route::resource('users', 'UserController');
```
模板中使用路由，参考`blog/resoureces/views/users/create.blade.php`
```html
    {{route('user.store')}}
```
路由名称可以使用`php artisan route:list`在控制台中查看。

### 渲染模板以及变量
假设我们现在访问的是`http://localhost/users/`，则在`blog/app/Http/Controllers/UserController.php`中增加如下代码：
```php
namespace App\Http\Controllers;
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
```
渲染模板的位置位于`blog/resources/views/users/index.blade.php`, 使用变量方式如下：
```html
    使用name变量 {{$name}} 
    使用user变量 {{$user['name']}}
    使用obj变量 {{$obj->name}}
```
模板中使用控制循环结构参考[Control Structures](https://laravel.com/docs/5.1/blade#control-structures)

# 模板继承和引用
模板是正常的html文件，需要替换的地方用`@yield('content')`这样的占位符。可以参考`blog/resources/views/layout/app.blade.php`
引用模板使用`@extends('layout.app')`，对于其中的占位符可以使用`@section('content')`和`@endsection`包裹起来。
参考`blog/resoureces/views/users/create.blade.php`
```html
    @extends('layout.app')
    @section('content')
        <form action='{{route("users.store")}}' method="post">
            {{csrf_field()}}
            <input type="text" name="name" placeholder="姓名">
            <input type="password" name="password" placeholder="密码">
            <input type="email" name="email" placeholder="邮箱">
            <input type="submit">
        </form>
    @endsection
```
模板对资源(如图片，css文件，js文件)的引用做得比较烂，不能生成唯一的md5码，如果使用到cdn的话，会导致资源更新不及时，或者需要手动更新。

# 获取请求参数
```php
    namespace App\Http\Controllers;
    use Illuminate\Http\Request;
    class UserController extends Controller{
        public function index(Request $req){
            $input_name = $req->input('name');//获取名字为name的请求的参数，不管是何种请求
            $req->getContent(); //获得raw input， 这在和angular配合或者传过来的参数时json时很有用
        }

    }
```

# 文件上传
html代码参考`blog/resources/views/users/avatar.blade.php`
获取上传文件的代码参考`blog/app/Http/Controllers/UserController.php`中`upload_avatar`方法
```php
    public function upload_avatar(Request $req){
        if($req->hasFile('name')){
            $req->file('name')->move(__DIR__.'/../../../log','xxxxx');
        }
    }
```

# session和cookie
```php
    Session::put('key','value');    //设置session
    Session::get('key');            //从session获得指定key的值
    Session::forget('key');         //删除session中某个key

    Cookie::get('key');             //获得cookie的值
    Cookie::queue(Cookie::make('name', 'value', $minutes));    //设置cookie
```

# 数据库


# model
创建模型并插入数据库,如`blog/app/Http/Controllers/UserController.php`
```php
    public function store(Request $req){
        try{
            $user = User::create($req->all());
        }catch(\Exception $e){  //这里必须写成\Exception，不能用Exception
            echo $e->getMessage();
        }
    }
```

# migration
# I18n
# Task

# 控制台




