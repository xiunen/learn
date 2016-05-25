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
```
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
```
    sudo php-fpm
```

### 修改sotrage目录权限
```
    chmod -R 777 storage/
```
如果不修改该权限，`http://localhost`访问时，只能知道是`500 Internal Server Error`，无法看到错误信息

### 打开开发环境
```
    cp .env.example .env
    php artisan key:generate #不执行这句的话，访问时会报错：`No supported encrypter found. The cipher and / or key length are invalid.`
```

至此， 项目应该可以正常访问了。







