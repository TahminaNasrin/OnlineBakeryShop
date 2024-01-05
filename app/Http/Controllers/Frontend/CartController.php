<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    public function cartView()
    {
        return view('frontend.pages.cart');
    }

    public function addToCart(Request $request, $pId)
    {
        //dd($pId);


        $product = Product::find($pId);
        $cart = session()->get('vcart');


        // Validate quantity between 1 and 10
        $quantity = $request->input('quantity', 1);

        if ($quantity < 1 || $quantity > 10) {
            notify()->error('Quantity must be between 1 and 10.');
            return redirect()->back();
        }

        if ($cart) //not empty
        {
            if (array_key_exists($pId, $cart)) { //yes
                //quantity update
                $cart[$pId]['quantity'] = $cart[$pId]['quantity'] + 1;
                $cart[$pId]['subtotal'] = $cart[$pId]['quantity'] * $cart[$pId]['price'];

                session()->put('vcart', $cart);
                notify()->success('Quantity updated.');
                return redirect()->back();
            } else { //add to cart
                $cart[$pId] = [
                    'id' => $pId,
                    'image' => $product->image,
                    'name' => $product->name,
                    'price' => $product->price,
                    'quantity' => 1,
                    'subtotal' => 1 * $product->price,

                ];

                session()->put('vcart', $cart);
                notify()->success('Product added to cart successfully.');
                return redirect()->back();
            }

            return redirect()->back();
        } else { //empty hoile
            $newCart[$pId] = [
                'id' => $pId,
                'image' => $product->image,
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 1,
                'subtotal' => 1 * $product->price,


            ];
            session()->put('vcart', $newCart);
            notify()->success('Product added to cart successfully.');
            return redirect()->back();
        }

        //stock changes er jonno
        // $order=Order::where('status','confirm')->get();
        // if($order)
        // {
        //     $order->update([
        //         'stock'=>'stock'-1
        //     ]);
        // }






        return view('frontend.pages.cart', compact('products'));
    }


    public function checkout()
    {
        return view('frontend.pages.checkout');
    }



    public function delete($id)
    {
        // dd($id);
        $cart = session()->get('vcart');
        unset($cart[$id]);
        session()->put('vcart', $cart);
        notify()->success('Single cart deleted successfully.');

        return redirect()->back();
    }

    public function quantityDecrease($product_id)
    {
        // $product = Product::find($product_id);
        $cart = session()->get('vcart');
        if (array_key_exists($product_id, $cart)) {
            //quantity decrease range
            $cart[$product_id]['quantity'] = max(1, $cart[$product_id]['quantity'] - 1);
            $cart[$product_id]['subtotal'] = $cart[$product_id]['price'] * $cart[$product_id]['quantity'];
        }
        session()->put('vcart', $cart);
        return redirect()->back();
    }

    public function quantityIncrease($product_id)
    {
        //$product = Product::find($product_id);
        $cart = session()->get('vcart');
        if (array_key_exists($product_id, $cart)) {
            //quantity increase
            $cart[$product_id]['quantity'] = min(10, $cart[$product_id]['quantity'] + 1);
            $cart[$product_id]['subtotal'] = $cart[$product_id]['price'] * $cart[$product_id]['quantity'];
        }
        session()->put('vcart', $cart);
        return redirect()->back();
    }

    public function removeWholeCart()
    {
        session()->forget('vcart');
        notify()->success('Removed Whole Cart.');
        return redirect()->back();
    }
}
