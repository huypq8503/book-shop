<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Brand;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
  public function index()
  {
    $totalProducts = Product::count();
    $totalCategories = Category::count();
    $totalBrands = Brand::count();

    $totalAllUsers = User::count();
    $totalUser = User::where('role_as', '0')->count();
    $totalAdmin = User::where('role_as', '1')->count();

    $todayDate = Carbon::now()->format('Y-m-d');
    $thisMonth = Carbon::now()->format('m');
    $thisYear = Carbon::now()->format('Y');


    $totalOrder = Order::count();

    $todayOrder = Order::whereDate('created_at', $todayDate)->count();
    $thisMonthOrder = Order::whereMonth('created_at', $thisMonth)->count();
    $thisYearOrder = Order::whereYear('created_at', $thisYear)->count();


    // status complete-order table with id
    //order-detial orderId amount->sum
    $totalAmount = DB::table('orders')
      ->crossJoin('order_items')
      ->select('order_items.price',)
      ->where('orders.id', '=', DB::raw('order_items.order_id'))
      ->where('orders.status_message', '=', 'completed')
      ->sum('order_items.price');

      $totalAmountToday = DB::table('orders')
      ->crossJoin('order_items')->where('orders.id', '=', DB::raw('order_items.order_id'))
      ->select('order_items.price',)
      ->where('orders.status_message', '=', 'completed')
      ->whereDate('orders.created_at','=',$todayDate)
      ->sum('order_items.price');


      $totalAmountMonth = DB::table('orders')
      ->crossJoin('order_items')->where('orders.id', '=', DB::raw('order_items.order_id'))
      ->select('order_items.price',)
      ->where('orders.status_message', '=', 'completed')
      ->whereMonth('orders.created_at','=',$thisMonth)
      ->sum('order_items.price');

      $totalAmountYear = DB::table('orders')
      ->crossJoin('order_items')->where('orders.id', '=', DB::raw('order_items.order_id'))
      ->select('order_items.price',)
      ->where('orders.status_message', '=', 'completed')
      ->whereYear('orders.created_at','=',$thisYear)
      ->sum('order_items.price');
    // dd($totalAmount);


    $totalOrderCompleted= DB::table('orders')->where('orders.status_message', '=', 'completed')->count();
    $totalOrderInProgress= DB::table('orders')->where('orders.status_message', '=', 'in progress')->count();
    $totalOrderCancelled= DB::table('orders')->where('orders.status_message', '=', 'cancelled')->count();
    $totalOrderPending= DB::table('orders')->where('orders.status_message', '=', 'pending')->count();
    return view(
      'admin.dashboard',
      compact(
        'totalProducts',
        'totalCategories',
        'totalBrands',
        'totalAllUsers',
        'totalUser',
        'totalAdmin',
        'totalOrder',
        'todayOrder',
        'thisMonthOrder',
        'thisYearOrder',
        'totalAmount',
        'totalOrderCompleted',
        'totalOrderInProgress',
        'totalOrderCancelled',
        'totalOrderPending',
        'totalAmountToday',
        'totalAmountMonth',
        'totalAmountYear'
      )
    );
  }
}
