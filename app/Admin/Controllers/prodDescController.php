<?php

namespace App\Admin\Controllers;

use App\ProductDesc;
use App\ProductDetail;
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
            $form->select('descID','Description ID')->options(ProductDetail::all()->pluck('name', 'id'));
            $form->select('size', 'Size')->options(['28' => '28',
                                                                  '29' => '29',
                                                                  '30' => '30',
                                                                  '31' => '31',
                                                                  '32' => '32',
                                                                  '33' => '33',
                                                                  '34' => '34',
                                                                  '36' => '36',
                                                                  '38' => '38',
                                                                  '40' => '40',
                                                                  '41' => '41',
                                                                  '42' => '42',
                                                                  '43' => '43',
                                                                  '44' => '44',
                                                                  '45' => '45',]);
            $form->number('stock', 'Stock');

            $form->display('created_at', 'Created At');
            $form->display('updated_at', 'Updated At');
        });
    }
}
