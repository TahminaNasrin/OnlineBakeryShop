<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InvoiceController extends Controller
{
    public function generateInvoice($orderId)
    {
        $order = Order::with(['user', 'orderDetails.product'])->find($orderId);

        if (!$order) {
            dd( 'Order not found');
        }

        return view('frontend.pages.invoices', compact('order'));
    }
}
