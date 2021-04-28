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

//        $table->column('id', __('Id'));
        $table->column('id', __('Id'))->sortable();
//        $table->column('title', __('Title'));

//        $table->column('title', __('标题'));
//        $table->column('title')->setAttributes(['style' => 'color:red;']);
//        $table->column('title')->width(50);
//        $table->column('title')->help('这一列是...');
        $table->column('title')->color('#a0a0a0')->sortable();


//        $table->column('content', __('Content'));
//        $table->column('content', __('内容'));
        // 修改显示输出
        $table->column('content',__('内容'))->display(function($text) {
            if (strlen($text) > 5) {
                return "<font color=red >".mb_substr($text, 0, 5). '...' ."</font>";
            }else{
//                return "<font color=red >$text</font>";
                return "<font color=blue >$text</font>";
            }

//            return "<font color=red >$content</font>";
//            return column('content');
        });

//        $table->column('content')->limit(10)->help('这一列是...');;
//        $table->column('content')->copyable();
        $table->column('url')->qrcode();
//        $table->column('content')->downloadable();

        // 不存的字段列
        $table->column('完整内容')->display(function () {
            return $this->title .'-' .$this->content;
        });

//        $table->column('content')->display(function($userId) {
//            return User::find($userId)->name;
//        });

        /*// filter($callback)方法用来设置表格的简单搜索框
        $table->filter(function ($filter) {
            // 设置created_at字段的范围查询
            $filter->between('created_at', 'Created Time')->datetime();
        });*/

        /* 禁用功能 */
//        $table->disableRowSelector();
//        $table->disableExport();
//        $table->disableFilter();
        // 禁用：操作，只显示列表，不可以查看，也不可以编辑的。

        // 结合权限来：现在用户的查询权限，
//        $table->disableActions();

        // 隐藏列
//        $table->hideColumns('name', 'title', 'desc');
//        $table->hideColumns('title', 'desc');

        $table->modalForm();


        // 默认为每页20条
        $table->paginate(5);

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
