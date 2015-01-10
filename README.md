## 说明
* 暂时 readme 会写的比较乱，想到啥会记录啥，后期会整理
* 项目的分支管理会采用 git flow 。关于 git flow 可以参考：<http://www.ituring.com.cn/article/56870>
* 尽量不要直接在 master 上直接提交代码，详情请参考 git glow.



## 安装过程
* 安装包

``` 
composer install --prefer-dist --no-dev --no-scripts  
```

* 执行用户数据库migrate

* 用户系统的 migrate


```
php artisan migrate --package=cartalyst/sentry
```



