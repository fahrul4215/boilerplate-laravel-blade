<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\TransactionProduct;
use Illuminate\Http\Request;

class CheckOutController extends Controller
{
    public function index()
    {
        $data = [];

        // Get the checkout data from session or flash data
        $data['cart'] = session()->get('cart');

        if (request()->isMethod('post')) {
            $validated = request()->validate([
                'buyer_name' => 'required',
                'buyer_wa' => 'required',
                'buyer_address' => 'required',
            ]);

            if ($validated) {
                $trx = Transaction::create([
                    'trx_number' => uniqid('TRX-', true),
                    'total' => array_sum(array_column($data['cart'], 'sub_total')),
                    'buyer_name' => $validated['buyer_name'],
                    'buyer_wa' => $validated['buyer_wa'],
                    'buyer_address' => $validated['buyer_address']
                ]);

                $textCart = '';
                foreach ($data['cart'] as $key => $value) {
                    TransactionProduct::create([
                        'transaction_id' => $trx->id,
                        'product_id' => $value['product_id'],
                        'price' => $value['price'],
                        'discount' => $value['discount'],
                        'discounted_price' => $value['discounted_price'],
                        'quantity' => $value['quantity'],
                    ]);
                    $textCart .= ($key + 1) . '. ' . $value['name'] . '
    Jumlah: ' . number_format($value['quantity'], 0, ',', '.') . '
    Harga Satuan: ' . config('app.currency', '$') . ' ' . number_format($value['price'], 0, ',', '.') . '
    Diskon: ' . $value['discount'] . '%25
    Harga Satuan setelah Diskon: ' . config('app.currency', '$') . ' ' . number_format($value['discounted_price'], 0, ',', '.') . '
    Harga Total: ' . config('app.currency', '$') . ' *' . number_format($value['quantity'] * $value['discounted_price'], 0, ',', '.') . '*

';
                    $p = Product::find($value['product_id']);
                    $p->stock -= $value['quantity'];
                    $p->update();
                }

                session()->put('cart', []);

                $text = "\nHi kak, saya mau order:\n\n$textCart\n----------------------------\nTotal: " . config('app.currency', '$') . " " . number_format($trx->total, 0, ',', '.') . "\n----------------------------\nNama\n{$trx->buyer_name} ({$trx->buyer_wa})\n\nAlamat\n{$trx->buyer_address}\n\nThank you!";

                return redirect('https://api.whatsapp.com/send/?phone=' . str_replace('+', '', config('app.wa_number')) . '&text=' . urlencode($text));
            }
        }

        return view("front-end.checkout", $data);
    }
}
