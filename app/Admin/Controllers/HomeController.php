<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use Encore\Admin\Http\Controllers\Dashboard;
use Encore\Admin\Layout\Column;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Row;

class HomeController extends Controller
{
    public function index(Content $content)
    {
        // 添加面包屑导航
        /*$content->breadcrumb(
            ['text' => '首页', 'url' => '/admin'],
            ['text' => '用户管理', 'url' => '/admin/users'],
            ['text' => '编辑用户']
        );*/

        // 填充页面body部分，这里可以填入任何可被渲染的对象
        $content->body('hello world');

        // 直接渲染视图输出
        $content->view('test1', ['data' => 'foo']);

        /* 原始内容 */
        return $content
            ->title('Dashboard-标题1')
            ->description('Description...')
            ->row(Dashboard::title().'-t1')
            ->row(function (Row $row) {

                $row->column(4, function (Column $column) {
                    $column->append(Dashboard::environment());
                });

                $row->column(4, function (Column $column) {
                    $column->append(Dashboard::extensions());
                });

                $row->column(4, function (Column $column) {
                    $column->append(Dashboard::dependencies());
                });
            });
    }
}
