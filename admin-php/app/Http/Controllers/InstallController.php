<?php

namespace App\Http\Controllers;

use Artisan;
use Illuminate\Http\Request;

class InstallController extends Controller
{
    public function __construct()
    {
        if (is_file(base_path('install_lock.html'))) {
            abort(403, '请删除install_lock.html后再安装');
        }
    }

    public function testLink(Request $request)
    {
        $config = $request->input('database') + [
            'host' =>  '127.0.0.1',
            'port' =>  '3306',
            'database' => 'php',
            'username' =>  'root',
            'password' => 'admin88a8'
        ];

        try {
            $dsn = sprintf('mysql:host=%s;dbname=%s;charset=utf8', $config['host'], $config['database'] ?? '@@', 'utf8');
            new \PDO($dsn, $config['username'], $config['password']);
            file_put_contents(base_path('config.php'), '<?php return ' . var_export($request->input(), true) . ';');
        } catch (\PDOException $e) {
            abort(403, '数据库连接失败');
        }
    }

    public function migrate()
    {
        Artisan::call('migrate:refresh --seed');
        file_put_contents(base_path('install_lock.html'), 'install lock');
        return $this->success('数据导入成功');
    }
}
