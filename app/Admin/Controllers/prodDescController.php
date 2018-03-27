<?php

namespace App\Admin\Controllers;

use App\ProductDesc;
use App\User;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class prodDescController extends Controller
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
        return Admin::grid(ProductDesc::class, function (Grid $grid) {

            $grid->id('ID')->sortable();
            $grid->descID('Description ID')->sortable();
            $grid->size('Size')->sortable();
            $grid->stock('Stock')->sortable();

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
        return Admin::form(ProductDesc::class, function (Form $form) {

            $form->display('id', 'ID');
            $form->select('size', 'Size')->options(['val1' => '28',
                                                                  'val2' => '29',
                                                                  'val3' => '30',
                                                                  'val4' => '31',
                                                                  'val5' => '32',
                                                                  'val6' => '33',
                                                                  'val7' => '34',
                                                                  'val8' => '36',
                                                                  'val9' => '38',
                                                                  'val10' => '40',
                                                                  'val11' => '41',
                                                                  'val12' => '42',
                                                                  'val13' => '43',
                                                                  'val14' => '44',
                                                                  'val15' => '45',]);
            $form->number('stock', 'Stock');

            $form->display('created_at', 'Created At');
            $form->display('updated_at', 'Updated At');
        });
    }
}
