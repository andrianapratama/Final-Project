<?php

namespace App\Admin\Controllers;

use App\User;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class userController extends Controller
{
    use ModelForm;

    /**
     * Index interface.
     *
     * @return Content
     */
    public function index()
    {
        return Admin::content(function (Content $content) {

            $content->header('header');
            $content->description('description');

            $content->body($this->grid());
        });
    }

    /**
     * Edit interface.
     *
     * @param $id
     * @return Content
     */
    public function edit($id)
    {
        return Admin::content(function (Content $content) use ($id) {

            $content->header('header');
            $content->description('description');

            $content->body($this->form()->edit($id));
        });
    }

    /**
     * Create interface.
     *
     * @return Content
     */
    public function create()
    {
        return Admin::content(function (Content $content) {

            $content->header('header');
            $content->description('description');

            $content->body($this->form());
        });
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Admin::grid(User::class, function (Grid $grid) {

            $grid->id('ID')->sortable();
            $grid->name('Name')->sortable();
            $grid->email('Email')->sortable();
            $grid->password('Password')->sortable();
            $grid->province('Province')->sortable();
            $grid->city('City')->sortable();
            $grid->district('District')->sortable();
            $grid->zip('ZIP Code')->sortable();
            $grid->phone('Phone Number')->sortable();
            $grid->gender('Gender')->sortable();

            $grid->created_at();
            $grid->updated_at();
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(User::class, function (Form $form) {

            $form->display('id', 'ID');
            $form->text('name', 'Name')->rules('required');
            $form->email('email', 'Email')->rules('required');
            $form->password('password', 'Password')->rules('required');
            $form->text('province', 'Province')->rules('required');
            $form->text('city', 'City')->rules('required');
            $form->text('district', 'District')->rules('required');
            $form->number('zip', 'ZIP')->rules('required|min:5');;
            $form->mobile('phone', 'Phone Number')->rules('required|min:20');
            $form->text('gender', 'Gender')->rules('required');

            $form->display('created_at', 'Created At');
            $form->display('updated_at', 'Updated At');
        });
    }
}
