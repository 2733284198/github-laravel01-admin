<?php

namespace App\Admin\Controllers;

//use Encore\Admin\Http\Controllers\AdminController;
use App\Http\Controllers\Controller;
use App\Models\News;
use Encore\Admin\Form;
use Encore\Admin\Http\Controllers\AdminController;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Column;
use Encore\Admin\Layout\Row;
use Encore\Admin\Show;
use Encore\Admin\Table;
use Illuminate\Database\Eloquent\Model;

//class ProductController extends Controller
class ProductController extends AdminController
{

    /*public function index(Content $content)
    {
        $content->title('产品');
        $content->description('产品描述');
        $content->breadcrumb(
            ['text' => '首页', 'url' => '/admin'],
            ['text' => '用户管理', 'url' => '/admin/users'],
            ['text' => '编辑用户']
        );

        $content->body('ProductController-index');

        // 直接渲染视图输出
        $content->view('test1', ['data' => 'foo']);

        $content->row(function(Row $row) {
            $row->column(4, 'foo');
            $row->column(8, 'bar');
        });

        return $content;
    }*/

    /*public function show(Content $content)
    {
        $content->body('hello world');

        // 直接渲染视图输出
        $content->view('test1', ['data' => 'foo']);

        return $content;
    }*/

   /* public function index(Content $content)
    {
        $table = new Table(new News());

        $table->column('id', __('Id'));
        $table->column('title', __('Title'));
        $table->column('content', __('Content'));

        return $table;
    }*/

    protected function table()
    {
        $table = new Table(new News());

        $table->column('id', __('Id'));
        $table->column('title', __('Title'));
        $table->column('content', __('Content'));

        return $table;
    }

    protected function detail($id)
    {
        $show = new Show(News::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('title', __('Title'));
        $show->field('content', __('Content'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new News());

        $form->text('title', __('Title'));
        $form->text('content', __('Content'));

        return $form;
    }
}
