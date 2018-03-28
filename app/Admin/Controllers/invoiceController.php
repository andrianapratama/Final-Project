<?php

namespace App\Admin\Controllers;

use App\Cart;
use App\Invoice;

use App\User;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class invoiceController extends Controller
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
        return Admin::grid(Invoice::class, function (Grid $grid) {

            $grid->id('ID')->sortable();
            $grid->userID('User ID')->sortable();
            $grid->orderID('Order ID')->sortable();
            $grid->totalPrice('Total Price')->sortable();
            $grid->orderDate('Order Date')->sortable();
            $grid->paymentType('Payment Type')->sortable();
            $grid->paymentStatus('Payment Status')->sortable();
            $grid->orderStatus('Order Status')->sortable();

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
        return Admin::form(Invoice::class, function (Form $form) { //form itu adalah saat lu mengisi survey maka di survery nya pasti ada form (exp: form nama, form tanggal, form age,dsb)

            $form->display('id', 'ID');
            $form->select('userID')->options(User::all()->pluck('name', 'id'));
            $form->select('orderID')->options(Cart::all()->pluck('id', 'id'));
            $form->number('totalPrice', 'Total Price');
            $form->datetime('orderDate', 'Order Date');
            $form->select('paymentType', 'Payment Type')->options(['Bank Transfer' => 'Bank Transfer', 'Credit Card' => 'Credit Card']);
            $form->select('paymentStatus', 'Payment Status')->options(['Paid' => 'Paid', 'Not Paid' => 'Not Paid']);
            $form->select('orderStatus', 'Order Status')->options(['Shipped' => 'Shipped', 'Not Shipped' => 'Not Shipped']);;

            $form->display('created_at', 'Created At');
            $form->display('updated_at', 'Updated At');
        });
    }
}
