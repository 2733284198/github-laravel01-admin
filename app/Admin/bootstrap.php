<?php

/**
 * Laravel-admin - admin builder based on Laravel.
 * @author z-song <https://github.com/z-song>
 *
 * Bootstraper for Admin.
 *
 * Here you can remove builtin form field:
 * Encore\Admin\Form::forget(['map', 'editor']);
 *
 * Or extend custom form field:
 * Encore\Admin\Form::extend('php', PHPEditor::class);
 *
 * Or require js and css assets:
 * Admin::css('/packages/prettydocs/css/styles.css');
 * Admin::js('/packages/prettydocs/js/main.js');
 *
 */

/* 表格初始化 */

use Encore\Admin\Table;

/*
Table::init(function (Table $table) {

    $table->disableActions();

    $table->disablePagination();

    $table->disableCreateButton();

    $table->disableFilter();

    $table->disableRowSelector();

    $table->disableColumnSelector();

    $table->disableTools();

    $table->disableExport();

    $table->actions(function (Table\Displayers\Actions $actions) {
        $actions->disableView();
        $actions->disableEdit();
        $actions->disableDelete();
    });
});*/

\Encore\Admin\Assets::define('vuejs', [
    'js'     => ['https://cdn.jsdelivr.net/npm/vue@2.6.12/dist/vue.min.js',],
    'export' => 'Vue',
]);
