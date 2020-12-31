<?php

namespace App\Admin\Controllers;

use App\Models\User;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class UserController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'User';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new User());
//        禁用创建按钮
//        $grid->disableCreateButton();
//        禁用分页
        $grid->disablePagination();
//        禁用数据过滤器
        $grid->disableFilter();
//        禁用导出按钮
        $grid->disableExport();
//        禁用行选择器
        $grid->disableRowSelector();
//        禁用行操作
        $grid->disableActions();
//        禁用列选择器
        $grid->disableColumnSelector();
//        设置perPage选择器的选项
        $grid->perPages([10, 20, 30, 40, 50]);

        $grid->column('id', __('Id'))->sortable();;
        $grid->name()->display(function($name) {
            return $name.'<span style="color:red">(Yeah)</span>';
        });
        $grid->column('email','邮箱')->display(function() {
            return $this->email.'+'.$this->name;
        });
        $grid->column('email', __('Email'));
        $grid->column('email_verified_at', __('Email verified at'))->help('邮箱验证时间...');
        $grid->column('password', __('Password'));
        $grid->column('remember_token', __('Remember token'));

        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));
        $grid->paginate(15);


        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(User::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('email', __('Email'));
        $show->field('email_verified_at', __('Email verified at'));
        $show->field('password', __('Password'));
        $show->field('remember_token', __('Remember token'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new User());

        $form->text('name', __('Name'));
        $form->email('email', __('Email'));
        $form->datetime('email_verified_at', __('Email verified at'))->default(date('Y-m-d H:i:s'));
        $form->password('password', __('Password'));
        $form->text('remember_token', __('Remember token'));

        return $form;
    }
}
