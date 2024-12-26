<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
    <style type="text/css">
        .div_deg
        {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 60px;
        }
        .table_deg
        {
            border: 1px solid grey;
            text-align: center;
            width: 100%;
            table-layout: flex;
        }
        th
        {
            background-color: #eb5f6f;
            color: white;
            font-size: 19px;
            font-weight: bold;
            padding: 15px;
        }
        td
        {
            border: 1px solid grey;
            text-align: center;
            color: white;
        }

        .search-container {
            display: flex;
            justify-content: left;
            align-items: center;
        }

        .search-wrapper {
            display: flex;
            align-items: center;
            width: 100%;
            max-width: 600px;
            border: 1px solid #ccc;
            overflow: hidden;
        }
        .search-input {
            flex: 1;
            height: 45px;
            border: none;
            padding: 0 15px;
            font-size: 16px;
            outline: none;
        }
        .search-btn {
            height: 45px;
            width: 50px;
            background: #eb5f6f;
            border: none;
            color: white;
            cursor: pointer;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .search-btn:hover i, .search-btn:focus i {
            color: #007bff;
        }

    </style>
  </head>
  <body>
    @include('admin.header')
    
    @include('admin.sidebar')
        <!-- Sidebar Navigation end-->
        <div class="page-content">
            <div class="page-header">
                <div class="container-fluid">
                    <div class="search-container">
                        <form action="{{ url('product_search') }}" method="get">
                            @csrf
                            <div class="search-wrapper">
                                <input type="search" name="search" placeholder="Cari sesuatu..." class="search-input">
                                <button type="submit" class="search-btn">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                    
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Produk</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Kategori</th>
                            <th scope="col">Stok</th>
                            <th scope="col">Gambar</th>
                            <th scope="col">Aksi</th>
                          </tr>
                        </thead>
                        @foreach ($product as $products)
                        <tbody>
                          <tr>
                            <th scope="row">{{ $products->id }}</th>
                            <td> {{ $products->title}} </td>
                            <td> {{ $products->description}} </td>
                            <td> {{ $products->price}} </td>
                            <td> {{ $products->category}} </td>
                            <td> {{ $products->quantity}} </td>
                            <td> <img src="products\{{ $products->image}}" alt="" style="max-width: 120px; max-height:120px;min-width: 120px; min-height:120px;object-fit:cover;"> </td>
                            <td>
                                <a class="btn btn-warning" href="{{ url('update_page',$products->id) }}">Ubah</a>
                                <a class="btn btn-danger" onclick="confirmation(event)" href="{{ url('delete_product',$products->id) }}">Hapus</a>
                            </td>
                        </tr>
                    </tbody>
                    @endforeach
                      </table>
                    <div class="div_deg">
                        {{ $product->onEachSide(1)->links() }}
                    </div>
                    
                    @include('admin.footer')

        </div>
    </div>
    <!-- JavaScript files-->
    @include('admin.js')
  </body>
</html>