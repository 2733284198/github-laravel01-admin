<?php

namespace App\Admin\Controllers;

use App\Models\News;
use Encore\Admin\Form;
use Encore\Admin\Http\Controllers\AdminController;
use Encore\Admin\Show;
use Encore\Admin\Table;

class NewsController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'News';

    /**
     * Make a table builder.
     *
     * @return Table
     */
    protected function table()
    {
        $table = new Table(new News());

        $table->column('id', __('Id'));

        $table->column('title', __('Title'));
        $table->column('content', __('Content'));

        $table->column('status')->using([
            0 => '0未知',
            1 => '1通过',
            2 => '2未通过',
        ]);

//        $table->column('status', __('状态'));
        $table->column('status', '状态')->filter([
            0 => '0未知',
            1 => '1通过',
            2 => '2未通过',
        ]);

        /* 快捷键 */
        $table->enableHotKeys();
        $table->modalForm();

        /* 快捷搜索 */
        $table->quickSearch(function ($model, $query) {
            $model->where('title', $query)->orWhere('content', 'like', "%{$query}%");
//            $model->whereIn('status', [0, 1, 2]);
        });

        $table->paginate(5);
        $table->enableHotKeys();
        $table->dblclick();

        $table->actions(function ($actions) {
            // 双击列表页的某一行，跳转进入编辑页面，删除和查看操作对应`delete`、`view`
            $actions->dblclick('edit');
        });

        /* table组件 */

        return $table;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(News::findOrFail($id));

        $show->field('id', __('Id'));
        $show->divider();

        $show->field('title', __('Title'));
        $show->field('content', __('Content'));
//        $show->field('status', __('status'));

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

//        $form->text('status', __('status'));
        $form->select('status', __('status'))->options([0 => '0未知', 1 => '1通过', '2' => '2未通过']);


        return $form;
    }
}
