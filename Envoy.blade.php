@servers(['web' => 'root@123.56.107.73'])

@task('deploy')
    cd /data/website/xiaowei
	git fetch && git checkout $1 && git reset --hard && git pull origin {{ isset($branch) ? $branch : "master" }}
@endtask

@task('migrate')
	echo "migrate task ================="
	cd /data/website/xiaowei
    php artisan migrate
@endtask

@task('composer')
	echo "master task ================="
    cd /data/website/xiaowei
    composer install --prefer-dist --no-dev --no-scripts
@endtask