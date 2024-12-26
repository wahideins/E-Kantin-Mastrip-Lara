<?php

namespace App\Http\Controllers;


use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function view_category()
    {
        $data = Category::all();

        return view('admin.category',compact('data'));
    }

    public function add_category(Request $request)
    {

        $request->validate([
            'category' => 'required|string|max:255',
        ]);
    
        $category = new Category;
    
        $category->category_name = $request->category;
    
        try {
            $category->save();
    
            toastr()->timeOut(10000)->closeButton()->addSuccess('Kategori berhasil ditambahkan.');
        } catch (\Exception $e) {
            toastr()->timeOut(10000)->closeButton()->addError('Terjadi kesalahan saat menambahkan kategori.');
        }
    
        return redirect()->back();
    }
    

    public function edit_category($id)
    {
        $data = Category::find($id);

        return view('admin.edit_category',compact('data'));
    }

    public function delete_category($id)
    {
        $data = Category::find($id);

        $data->delete();

        toastr()->timeOut(10000)->closeButton()->error('Kategori berhasil dihapus.');

        return redirect()->back();
    }

    public function update_category(Request $request,$id)
    {
        $data = Category::find($id);

        $data->category_name= $request->category;

        $data->save();

        toastr()->timeOut(10000)->closeButton()->info('Kategori berhasil diubah.');

        return redirect('view_category');

    }

    //Product

    public function add_product()
    {
        $category = Category::all();

        return view('admin.add_product',compact('category'));
    }

    public function upload_product(Request $request)
    {
        $data = new  Product;

        $data->title = $request->title;

        $data->description = $request->description;

        $data->price = $request->price;

        $data->category = $request->category;

        $data->quantity = $request->quantity;

        $image = $request->image;

        if($image)
        {
            $imagename = time().'.'.$image->getClientOriginalExtension();

            $request->image->move('products',$imagename);

            $data->image = $imagename;
        }

        if ($data->category === 'Spesial') {
            Product::where('category', 'Spesial')
                ->where('id', '!=', $data->id)
                ->delete();
        }

        $data->save();

        toastr()->timeOut(10000)->closeButton()->addSuccess('Menu berhasil ditambahkan.');

        return redirect()->back();

    }

    public function view_product()
    {
        $product = Product::paginate(3);
        return view('admin.view_product',compact('product'));
    }

    public function delete_product($id)
    {
        $data = Product::find($id);

        $image_path = public_path('products/'.$data->image);

        if(file_exists($image_path))

        {
            unlink($image_path);
        }

        $data->delete();

        toastr()->timeOut(10000)->closeButton()->success('Menu berhasil dihapus.');

        return redirect()->back();
    }

    public function update_page($id)
    {
        $data = Product::find($id);
        $category = Category::all();

        return view('admin.update_page',compact('data','category'));
    }

    public function edit_product(Request $request,$id)
    {
        $data = Product::find($id);
        $data->title = $request->title;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->quantity = $request->quantity;
        $data->category = $request->category;
        $image = $request->image;

        if($image)
        {
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('products',$imagename);
            $data->image = $imagename;
        }

        $data->save();

        toastr()->timeOut(10000)->closeButton()->success('Produk berhasil diubah.');

        return redirect('/view_product');
    }

    public function product_search(Request $request)
    {
        $search = $request->search;
        $product = Product::where('title', 'LIKE', '%'.$search.'%')->orWhere('category', 'LIKE', '%'.$search.'%')->paginate(3);

        return view('admin.view_product',compact('product'));
    }

    public function view_orderInProggress()
    {
        // Ambil pesanan yang statusnya "Dalam Proses" beserta relasi produk
        $orders = Order::where('status', 'Dalam Proses')
            ->with('product')
            ->get();
        
        // Cek jika pesanan tidak ada
        if ($orders->isEmpty()) {
            toastr()->error('Tidak ada pesanan untuk ditampilkan.');
            return view('admin.verif_order',compact('orders'));; // Ganti dengan rute yang sesuai
        }
    
        // Dapatkan user_id dari pesanan pertama, karena user_id untuk semua pesanan dalam status ini harus sama
        $userId = $orders->first()->user_id;
    
        // Hitung total harga semua pesanan untuk user yang sama
        $totalPrice = $orders->sum('total_price'); // Kita sudah ambil semua pesanan dalam status "Dalam Proses", jadi cukup menggunakan sum
    
        // Kembalikan view dengan data
        return view('admin.verif_order', compact('orders', 'totalPrice'));
    }

    public function view_orderComplete()
    {
        $orders = Order::where('status', 'Selesai')
            ->with('product')
            ->get();
        
        $userId = $orders->first()->user_id;
        $date = 'Semua Pesanan';
        $totalPrice = $orders->sum('total_price');
        if ($orders->isEmpty()) {
            toastr()->error('Tidak ada pesanan untuk ditampilkan.');
            return view('admin.view_orders',compact('orders','totalPrice','date'));
        }
    
    
        return view('admin.view_orders', compact('orders', 'totalPrice','date'));
    }
    
    public function updateOrders($id)
    {
        $data = Order::find($id);
    
        if (!$data) {
            toastr()->timeOut(10000)->closeButton()->error('Pesanan tidak ditemukan');
            return redirect()->back();
        }
    
        $data->status = 'Selesai';
        if ($data->save()) {
            toastr()->timeOut(10000)->closeButton()->success('Pesanan berhasil diperbarui menjadi Selesai');
        } else {
            toastr()->timeOut(10000)->closeButton()->error('Gagal memperbarui status pesanan');
        }
    
        return redirect()->back();
    }

    public function view_orderCompleteByDate(Request $request)
    {

        $startOfDay = Carbon::parse($request->date)->startOfDay();
        $endOfDay = Carbon::parse($request->date)->endOfDay();
    
        $orders = Order::where('status', 'Selesai')
            ->whereBetween('created_at', [$startOfDay, $endOfDay])
            ->with('product')
            ->get();
            $date = Carbon::parse($request->date)
            ->locale('id')
            ->translatedFormat('l, d F Y');

        $totalPrice = $orders->sum('total_price');
        if ($orders->isEmpty()) {
            toastr()->error('Tidak ada pesanan untuk ditampilkan pada tanggal ini.');
            return view('admin.view_orders', compact('orders','totalPrice','date'));
        }
        
    
        return view('admin.view_orders', compact('orders', 'totalPrice','date'));
    }
    
}
