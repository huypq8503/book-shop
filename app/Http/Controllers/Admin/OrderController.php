<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Order;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Mail\InvoiceOrderMailable;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        // dd($request);   
        $todayDate = Carbon::now();
        if ($request->date) {
            $orders = Order::when(
                $request->date != null,
                function ($q) use ($request) {
                    return $q->whereDate('created_at', $request->date);
                },
                function ($q) use ($todayDate) {
                    $q->whereDate('created_at', $todayDate);
                }
            )->paginate(10);
        } else if ($request->status) {
            $orders = Order::when(
                $request->status != null,
                function ($q) use ($request) {
                    return $q->where('status_message', $request->status);
                }
            )->paginate(10);
        } else {
            $orders = Order::when(
                $request->date != null,
                function ($q) use ($request) {
                    return $q->whereDate('created_at', $request->date);
                },
                function ($q) use ($todayDate) {
                    $q->whereDate('created_at', $todayDate);
                }
            )
                ->when(
                    $request->status != null,
                    function ($q) use ($request) {
                        return $q->where('status_message', $request->status);
                    }
                )->paginate(10);
        }

        return view('admin.order.index', compact('orders'));
    }
    public function show($orderId)
    {
        $orders = Order::where('id', $orderId)->first();
        if ($orders) {
            return view('admin.order.view', compact('orders'));
        } else {
            return redirect()->back()->with('message', 'no order found');
        }
    }
    public function updateOrderStatus(int $orderId, Request $request)
    {
        $orders = Order::where('id', $orderId)->first();
        if ($orders) {
            $orders->update([
                'status_message' => $request->order_status
            ]);
            return redirect('admin/orders/' . $orders->id)->with('message', 'Order Status Updated');
        } else {
            return redirect()->back()->with('message', 'no order found');
        }
    }

    public function viewInvoice(int $orderId)
    {
        $order = Order::findOrFail($orderId);
        return view('admin.invoice.generate-invoice', compact('order'));
    }
    public function generateInvoice(int $orderId)
    {
        $order = Order::findOrFail($orderId);
        $data = ['order' => $order];
        $pdf = Pdf::loadView('admin.invoice.generate-invoice', $data);
        $todayDate = Carbon::now()->format('d-m-Y');
        return $pdf->download('invoice' . $order->id . '-' . $todayDate . '.pdf');
    }
    public function mailInvoice(int $orderId)
    {
        $order = Order::findOrFail($orderId);
        try {
            Mail::to("$order->email")->send(new InvoiceOrderMailable($order));
            return redirect('admin/orders/' . $orderId)->with('message', 'Invoice Mail Has Been Sent To ' . $order->email);
        } catch (\Exception $e) {
            // dd($e);
            return redirect('admin/orders/' . $orderId)->with('message', 'Something Went Worng ');
        }
    }
}
