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
use Illuminate\Support\Facades\DB;
use Encore\Admin\Widgets\InfoBox;

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

        /* 头部 */

        /*$table->header(function ($query) {
            echo '<hr>';
            echo '--header--';
            echo '<hr>';
            return 'header';
        });*/

        $table->header(function ($query) {
//            $gender = $query->select(DB::raw('count(gender) as count, gender'))
//                ->groupBy('gender')->get()->pluck('count', 'gender')->toArray();

            $gender = $query->select(DB::raw('count, gender'))->get()->pluck('count', 'gender')->toArray();

//            $doughnut = view('admin.chart.gender', compact('gender'));

            $doughnut = view('admin.chart.test', compact('gender'));
//            return new Box('性别比例', $doughnut);
//            return new Card('性别比例', $doughnut);
//            return new InfoBox('性别比例', $doughnut);

            $infoCard = new InfoBox('New Users', 'users', 'aqua', '/admin/users', '1024');
            echo $infoCard->render();

//            return $infoCard->render();

//            return $content
//                ->header('Chartjs')
//                ->body(new Box('Bar chart', view('admin.chartjs')));
        });

        $table->footer(function ($query) {
            echo '<hr>';
            echo '--footer--';
            echo '<hr>';
            return 'footer';
        });

//        $table->column('id', __('Id'));
        $table->column('id', __('Id'))->sortable();
//        $table->column('title', __('Title'));

//        $table->column('title', __('标题'));
//        $table->column('title')->setAttributes(['style' => 'color:red;']);
//        $table->column('title')->width(50);
//        $table->column('title')->help('这一列是...');
        $table->column('title')->color('#a0a0a0')->sortable();
//        $table->column('title')->label('info');
//        $table->column('title')->label('success');

//        $table->column('title')->link('http://www.163.com');
        $table->column('title');

//        $table->column('title')->loading(['t1', 't2', 't3']);
//        $table->column('title')->table(['key' => 'k1', 'val' => 'v1']);

        // 时间
        $table->column('create_at')->date('Y-m-d');

        $table->column('status')->using([
            0 => '0未知',
            1 => '1通过',
            2 => '2未通过',
        ]);

//        $table->column('status')->display(function () {
//            return $this->status;
//        });

//        $table->column('create_at')->year();


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

        /* 过滤 */
        $table->filter(function($filter) {
            // 去掉默认的id过滤器
//            $filter->disableIdFilter();
            // 展开
            $filter->expand();
            // 在这里添加字段过滤器
            $filter->like('title', 'title');
            $filter->like('content', 'content');
            $filter->like('create_at', 'Created Time')->date();
            /* 列过滤器 */
            $filter->equal('status')->radio([
                0 => '0未知',
                1 => '1通过',
                2 => '2未通过',
            ]);


        });

        $table->actions(function ($actions) {

            // 双击列表页的某一行，跳转进入编辑页面，删除和查看操作对应`delete`、`view`
            $actions->dblclick('edit');

        });

        // 去掉批量操作
        $table->batchActions(function ($batch) {
            $batch->disableDelete();
        });

//        $table->disableBatchActions();


        /* 列过滤器 */
        $table->column('title')->filter('like');
//        $table->column('status', '状态')->filter([
//            0 => '0未知',
//            1 => '1通过',
//            2 => '2未通过',
//        ]);

        /* 快捷搜索 */
        /*$table->quickSearch(function ($model, $query) {
            $model->where('title', $query)->orWhere('content', 'like', "%{$query}%");
//            $model->whereIn('status', [0, 1, 2]);
        });*/

        /* 筛选 */
        $table->selector(function (Table\Tools\Selector $selector) {
//            $selector->selectOne('gender', '性别', [
            $selector->select('gender', '性别', [
                '' => '0未知',
                'm' => '1女性',
                'f' => '2男性',
            ]);



            /*$selector->selectOne('gender', '性别', [
                0 => '0未知',
                1 => '1通过',
                2 => '2未通过',
            ]);*/
        });

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

//        $type = [
//            1 => '广告',
//            2 => '违法',
//            3 => '钓鱼',
//        ];
//
//        $this->checkbox('type', '类型')->options($type);
//        $this->textarea('reason', '原因')->rules('required');

        return $form;
    }
}
