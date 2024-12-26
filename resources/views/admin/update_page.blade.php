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
        label
        {
            display: inline-block;
            width: 200px;
            padding: 20px;
        }
        input[type='text']
        {
            width: 400px;
            height: 40px;
        }
        textarea
        {
            width: 450px;
            height: 90px;
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

                    <h2>Ubah Menu</h2>
                    
                    <div class="div_deg">
                        <form action="{{ url('edit_product',$data->id) }}" method="post" enctype="multipart/form-data">

                            @csrf

                            <div>
                                <label>Produk</label>
                                <input type="text" name="title" value="{{ $data->title }}">
                            </div>
                            <div>
                                <label>Deskripsi</label>
                                <textarea name="description">{{ $data->description }}</textarea>
                            </div>
                            <div>
                                <label>Harga</label>
                                <input type="text" name="price" value="{{ $data->price }}">
                            </div>
                            <div>
                                <label>Stok</label>
                                <input type="number" name="quantity" value="{{ $data->quantity }}" min="1" required>
                            </div>
                            <div>
                                <label>Kategori</label>
                                <select name="category"> 
                                    <option value=" {{ $data->category }}">{{ $data->category }}</option>
                                    @foreach ($category as $category)

                                    <option value="{{ $category->category_name }}">{{ $category->category_name }}</option>
                                        
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label>Gambar Produk</label>
                                <img width="140" src="{{ asset('products/' . $data->image) }}">

                            </div>
                            <div>
                                <label>Ganti Gambar</label>
                                <input type="file" name="image">
                            </div>
                            <div>
                                <input class="btn btn-success" type="submit" value="Ubah Produk">
                            </div>
                        </form>
                    </div>
                    @include('admin.footer')
        </div>
    </div>
    <!-- JavaScript files-->
    @include('admin.js')
  </body>
</html>