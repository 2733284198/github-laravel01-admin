<?php

namespace App\Admin\Controllers;

use App\Models\ShopModel;
use Encore\Admin\Form;
use Encore\Admin\Http\Controllers\AdminController;
use Encore\Admin\Show;
use Encore\Admin\Table;

class ShopController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'ShopModel';

    /**
     * Make a table builder.
     *
     * @return Table
     */
    protected function table()
    {
        $table = new Table(new ShopModel());

        $table->column('name', __('name'));
        $table->column('desc', __('desc'));

        /* 快捷搜索 */
        $table->quickSearch(function ($model, $query) {
//            $model->where('name', $query)
            $model->where('name', 'like', "%{$query}%")
                ->orWhere('desc', 'like', "%{$query}%");
//            $model->whereIn('status', [0, 1, 2]);
        });

        $table->paginate(5);
        $table->enableHotKeys();
        $table->dblclick();

        $table->actions(function ($actions) {
            // 双击列表页的某一行，跳转进入编辑页面，删除和查看操作对应`delete`、`view`
            $actions->dblclick('edit');
        });

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
        $show = new Show(ShopModel::findOrFail($id));

        $show->field('name', __('name'));
        $show->divider();

        $show->field('desc', __('desc'))->badge();
        $show->field('created_at', __('created_at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new ShopModel());

        $form->text('name', __('name'))->rules('required|min:3');
//            ->creationRules(['required', "unique:users"]); // 唯一

        $form->text('desc', __('desc'))->rules('required|min:3');
        $form->datetime('created_at', __('created_at') );

//        $form->text('created_at', __('created_at'))->rules('required|min:3');

        return $form;
    }
}
