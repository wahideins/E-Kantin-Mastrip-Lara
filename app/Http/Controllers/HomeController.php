<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

use function Pest\Laravel\get;

class HomeController extends Controller
{
    public function index()
    {
        $user = User::where('usertype','user')->get()->count();
        $product = Product::all()->count();
        $orderComplete = Order::where('status','Selesai')->count();
        $orderInProggress = Order::where('status','Dalam Proses')->count();
        $cart = Cart::all()->count();
        return view('admin.index',compact('user','product','orderComplete','cart','orderInProggress'));
    }


    public function home()
    {
        $product = Product::where('quantity','>=',1)->get();
        $spesial = Product::where('category', 'Spesial')
        ->where('quantity', '>=', 1)
        ->orderBy('created_at', 'desc')
        ->first();
    
        if (Auth::id())
        {
            $user = Auth::user();
            $userid = $user->id;
            $count = Cart::where('user_id', $userid)->count();
        }

        else
        {
            $count = '';
        }
        
        return view('home.index', compact('product','count','spesial'));
    }

    public function login_home()
    {
        $product = Product::all();
        $spesial = Product::where('category', 'Spesial')
        ->where('quantity', '>=', 1)
        ->orderBy('created_at', 'desc')
        ->first();
        $user = Auth::user();
        $userid = $user->id;
        $count = Cart::where('user_id', $userid)->count();
        return view('home.index', compact('product','count','spesial'));
    }

    public function product_details($id)
    {
        $data = Product::find($id);
        if (Auth::id())
        {
            $user = Auth::user();
            $userid = $user->id;
            $count = Cart::where('user_id', $userid)->count();
        }

        else
        {
            $count = '';
        }
        return view('home.product_details',compact('data','count'));
    }

    public function add_cart($id)
    {
        // Validasi produk
        $product = Product::find($id);
        if (!$product) {
            toastr()->timeOut(10000)->closeButton()->addError('Produk tidak ditemukan.');
            return redirect()->back();
        }
    
        if ($product->quantity <= 0) {
            toastr()->timeOut(10000)->closeButton()->addError('Stok produk tidak mencukupi.');
            return redirect()->back();
        }
    
        // Dapatkan pengguna yang sedang login
        $user = Auth::user();
        $user_id = $user->id;
    
        // Periksa apakah ada pesanan yang belum selesai
        $pendingOrder = Order::where('user_id', $user_id)
            ->whereIn('status', ['Dalam Proses', 'Pending'])
            ->exists();
    
        if ($pendingOrder) {
            toastr()->timeOut(10000)->closeButton()->addError('Ada pesanan yang belum selesai, mohon bersabar jika ingin memesan lagi （＾ω＾）');
            return redirect()->back();
        }
    
        // Periksa apakah produk sudah ada di keranjang
        $cart = Cart::where('user_id', $user_id)
            ->where('product_id', $id)
            ->first();
    
        if ($cart) {
            // Validasi stok sebelum menambah jumlah di keranjang
            if ($product->quantity < ($cart->qty + 1)) {
                toastr()->timeOut(10000)->closeButton()->addError('Stok tidak mencukupi untuk menambah jumlah di keranjang.');
                return redirect()->back();
            }
    
            // Tambahkan kuantitas di keranjang
            $cart->qty += 1;
            $cart->save();
        } else {
            // Tambahkan item baru ke keranjang
            Cart::create([
                'user_id' => $user_id,
                'product_id' => $product->id,
                'qty' => 1,
            ]);
        }
    
        // Kirim pesan sukses
        toastr()->timeOut(10000)->closeButton()->addSuccess('Menu berhasil ditambahkan ke keranjang.');
        return redirect()->back();
    }
    
    
    public function mycart()
    {
        if (Auth::id()) {
            $user = Auth::user();
            $userid = $user->id;
    
            // Ambil semua item di keranjang untuk pengguna
            $cart = Cart::where('user_id', $userid)->get();
    
            // Hapus item dari keranjang jika stok habis
            foreach ($cart as $item) {
                if ($item->product && $item->product->quantity <= 0) {
                    $item->delete();
                }
            }
    
            // Ambil kembali item di keranjang setelah penghapusan
            $cart = Cart::where('user_id', $userid)->get();
    
            // Hitung total harga
            $totalPrice = $cart->sum(function ($item) {
                return $item->product->price * $item->qty;
            });
    
            // Hitung jumlah item di keranjang
            $count = $cart->count();
        } else {
            $count = '';
            $cart = collect();
            $totalPrice = 0;
        }
    
        return view('home.mycart', compact('count', 'cart', 'totalPrice'));
    }
    
    public function confirm_order(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'phone' => 'required|string',
            'note' => 'nullable|string',
            'payment' => 'required|in:cash,transfer',
        ]);
    
        $userId = Auth::id();
    
        $cartItems = Cart::where('user_id', $userId)->with('product')->get();
    
        if ($cartItems->isEmpty()) {
            toastr()->error('Keranjang Anda kosong.');
            return redirect()->back();
        }
    
        $totalPrice = 0;
    
        foreach ($cartItems as $item) {
            // Buat order baru
            $order = new Order();
            $order->name = $request->name;
            $order->rec_address = $request->address;
            $order->phone = $request->phone;
            $order->note = $request->note;
            $order->status = 'Dalam Proses';
            $order->user_id = $userId;
            $order->product_id = $item->product_id;
            $order->quantity = $item->qty;
            $order->total_price = $item->product->price * $item->qty;
            $order->payment = $request->payment;
            $order->save();
    
            $totalPrice += $order->total_price;
    
            // Kurangi stok produk
            $product = $item->product;
            if ($product) {
                $product->quantity -= $item->qty;
                $product->save();
            }
        }
    
        // Hapus semua item dari keranjang
        Cart::where('user_id', $userId)->delete();
    
        return redirect()->route('home.receipt', ['userId' => $userId])
            ->with('success', 'Pesanan berhasil dibuat. Total harga: Rp. ' . number_format($totalPrice));
    }
    
    

    public function delItem_cart($id)
    {
        $userId = Auth::user()->id;
    
        $cartItem = Cart::where('id', $id)->where('user_id', $userId)->first();
    
        if (!$cartItem) {
            toastr()->timeOut(10000)->closeButton()->addError('Item tidak ditemukan di keranjang Anda.');
            return redirect()->back();
        }
    
        $cartItem->delete();
    
        toastr()->timeOut(10000)->closeButton()->addSuccess('Item berhasil dihapus dari keranjang.');
        return redirect()->back();
    }
    
    public function updateQuantity(Request $request, $id)
    {
        // Validasi permintaan
        $request->validate([
            'qty' => 'required|integer|min:1',
        ]);
    
        // Cari item keranjang berdasarkan ID
        $cartItem = Cart::find($id);
    
        if (!$cartItem) {
            return response()->json(['error' => 'Item tidak ditemukan'], 404);
        }
    
        // Validasi stok produk
        $product = Product::find($cartItem->product_id);
        if ($product->stock < $request->qty) {
            return response()->json(['error' => 'Stok produk tidak mencukupi'], 400);
        }
    
        // Update kuantitas
        $cartItem->qty = $request->qty;
        $cartItem->save();
    
        // Hitung total harga untuk user
        $totalPrice = Cart::where('user_id', Auth::id())->get()->sum(function ($item) {
            return $item->product->price * $item->qty;
        });
    
        return response()->json(['success' => 'Kuantitas diperbarui', 'totalPrice' => $totalPrice]);
    }
    public function addQty_cart($id)
    {
        $userId = Auth::user()->id;
    
        // Cari item di keranjang untuk user
        $cartItem = Cart::where('id', $id)->where('user_id', $userId)->first();
    
        if (!$cartItem) {
            toastr()->timeOut(10000)->closeButton()->addError('Item tidak ditemukan di keranjang Anda.');
            return redirect()->back();
        }
    
        // Validasi stok produk
        $product = Product::find($cartItem->product_id);
        if ($product->quantity < ($cartItem->qty + 1)) {
            toastr()->timeOut(10000)->closeButton()->addError('Stok tidak mencukupi untuk menambah jumlah di keranjang.');
            return redirect()->back();
        }
    
        else
        {
            $cartItem->qty += 1;
            $cartItem->save();
        
            toastr()->timeOut(10000)->closeButton()->addSuccess('Kuantitas berhasil ditambahkan.');
            return redirect()->back();
        }
        
    }
    public function minQty_cart($id)
    {
        $userId = Auth::user()->id;
    
        // Cari item di keranjang untuk user
        $cartItem = Cart::where('id', $id)->where('user_id', $userId)->first();
    
        if (!$cartItem) {
            toastr()->timeOut(10000)->closeButton()->addError('Item tidak ditemukan di keranjang Anda.');
            return redirect()->back();
        }
    
        // Validasi stok produk
        $product = Product::find($cartItem->product_id);
        if (!$product || $product->quantity <= 0) {
            // Jika stok produk habis, hapus item dari keranjang
            $cartItem->delete();
            toastr()->timeOut(10000)->closeButton()->addError('Produk habis. Item dihapus dari keranjang.');
            return redirect()->back();
        }
    
        // Kurangi kuantitas
        $cartItem->qty -= 1;
    
        if ($cartItem->qty <= 0) {
            // Jika kuantitas keranjang menjadi nol, hapus item dari keranjang
            $cartItem->delete();
            toastr()->timeOut(10000)->closeButton()->addSuccess('Item dihapus dari keranjang.');
        } else {
            // Simpan perubahan jika masih ada kuantitas
            $cartItem->save();
            toastr()->timeOut(10000)->closeButton()->addSuccess('Kuantitas berhasil dikurangi.');
        }
    
        return redirect()->back();
    }
        
    
    public function receipt($userId)
    {
        $orders = Order::where('user_id', $userId)->where('status', 'Dalam Proses')
            ->with('product')
            ->get();
    
        if ($orders->isEmpty()) {
            toastr()->error('Tidak ada pesanan untuk ditampilkan.');
            return redirect()->route('home');
        }
    
        $user = Auth::user();
        $totalPrice = $orders->sum('total_price');
        $paymentMethod = $orders->first()->payment;
    
        return view('home.receipt', compact('orders', 'user', 'totalPrice', 'paymentMethod'));
    }

    public function viewPesanan()
    {
        // Periksa apakah pengguna sudah login
        if (!Auth::check()) {
            toastr()->error('Silakan login terlebih dahulu untuk melihat pesanan Anda.');
            return redirect()->route('login'); // Ganti 'login' dengan route halaman login Anda.
        }
    
        // Ambil user yang sedang login
        $user = Auth::user();
        $userId = $user->id;
    
        // Rentang waktu untuk satu hari
        $startOfDay = Carbon::now()->startOfDay();
        $endOfDay = Carbon::now()->endOfDay();
    
        // Ambil pesanan user pada hari ini
        $orders = Order::where('user_id', $userId)
            ->whereBetween('created_at', [$startOfDay, $endOfDay])
            ->with('product')
            ->get();
    
        // Hitung jumlah pesanan
        $count = $orders->count();
    
        // Jika tidak ada pesanan
        if ($orders->isEmpty()) {
            toastr()->error('Pesanan Anda kosong.');
            return view('home.viewPesanan', compact('orders', 'user', 'count'));
        }
    
        // Render view dengan data pesanan
        return view('home.viewPesanan', compact('orders', 'user', 'count'));
    }
    

    public function product_search(Request $request)
    {
        $search = $request->input('search');
        $product = Product::where('title', 'LIKE', '%' . $search . '%')
            ->orWhere('category', 'LIKE', '%' . $search . '%')
            ->where('quantity', '>=', 1)
            ->get();
    
            $spesial = Product::where('category', 'Spesial')
            ->where('quantity', '>=', 1)
            ->orderBy('created_at', 'desc')
            ->first();
    
        // Hitung jumlah item di keranjang pengguna jika login
        $count = Auth::check() ? Cart::where('user_id', Auth::id())->count() : 0;
    
        return view('home.index', compact('product', 'count', 'spesial'));

    }
      
}
