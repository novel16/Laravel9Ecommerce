<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\InvoiceOrderMailable;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf; // Ensure you have this package installed for PDF generation
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        // $todayDate = Carbon::now();
        // $orders = Order::whereDate("created_at",$todayDate)->paginate(10);

        $todayDate = Carbon::now()->format('Y-m-d');
        $orders = Order::when($request->date != null, function ($query) use ($request) {
            return $query->whereDate("created_at",$request->date);
        }, function ($query) use ($todayDate) {
            $query->whereDate("created_at",$todayDate);
        })->when($request->status != null, function ($query) use ($request) {
            return $query->where("status_message",$request->status);
        })->paginate(10);
        return view('admin.orders.index', compact('orders'));
    }

    public function show(int $orderId)
    {
        $order = Order::where('id', $orderId)->first();
        if (!$order) {
            return redirect()->back()->with('message','Order not found');
        }
        return view('admin.orders.view', compact('order'));
    }

    public function updateOrderStatus(Request $request, int $orderId)
    {
        $order = Order::where('id', $orderId)->first();
        if (!$order) {
            return redirect('admin/orders/'. $orderId)->with('message','Order not found');
        }

        $order->update([
            'status_message' => $request->order_status,
        ]);
        return redirect('admin/orders/'. $orderId)->with('message', 'Order status updated successfully');
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

        $todayDate = Carbon::now()->format('d-m-Y');

         $pdf = Pdf::loadView('admin.invoice.generate-invoice',$data);
         return $pdf->download('invoice-'.$order->id.'-'.$todayDate.'.pdf');
    }

    public function mailInvoice(int $orderId)
    {
        try {
            $order = Order::findOrFail($orderId);

            Mail::to($order->email)->send(new InvoiceOrderMailable($order));
            return redirect('admin/orders/'.$orderId)->with('message', 'Invoice sent successfully to ' . $order->email);
        } catch (\Throwable $th) {

            return redirect('admin/orders/'.$orderId)->with('message', 'Something went wrong while sending the invoice'. $th->getMessage());

        }

        
    }
}
