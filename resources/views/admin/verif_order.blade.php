<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
    <style type="text/css">
        .div_deg
        {
            max-width: 100%;
            min-width: 100%;
            overflow-x: scroll;
            display: flex;
            justify-content: flex-start;
            align-items: flex-start;
            margin-top: 60px;
        }
        /* .table_deg
        {
            border: 1px solid grey;
            text-align: center;
            width: 100%;
            table-layout: auto;
        } */
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
            max-width: 100%;
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
        @media only screen and (min-widht:430px)
        {
            body{
            overflow-x: hidden;
            max-width: 430px;

        }
        .div_deg
        {
            max-width: 100%;
            min-width: 100%;
            overflow-x: scroll;
            display: flex;
            justify-content: flex-start;
            align-items: flex-start;
            margin-top: 60px;
        }
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
                            {{-- <div class="search-wrapper">
                                <input type="search" name="search" placeholder="Cari sesuatu..." class="search-input">
                                <button type="submit" class="search-btn">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div> --}}
                        </form>
                    </div>
                    
                    <div class="div_deg">
                        <table class="table_deg">
                            <tr>
                                <th>Nama Customer</th>
                                <th>Tujuan</th>
                                <th>No.Hp</th>
                                <th>Catatan</th>
                                <th>Status</th>
                                <th>Pesanan</th>
                                <th>Kuantitas</th>
                                <th>Harga Per Menu x Qty</th>
                                <th>Total Harga</th>
                                <th>Verifikasi</th>
                            </tr>
                            @foreach ($orders as $pesanan)

                            <tr>
                                <td>{{ $pesanan->name }}</td>
                                <td>{{ $pesanan->rec_address }}</td>
                                <td>{{ $pesanan->phone }}</td>
                                <td>{{ $pesanan->note }}</td>
                                <td>{{ $pesanan->status }}</td>
                                <td>{{ $pesanan->product->title }}</td>
                                <td>{{ $pesanan->quantity }}</td>
                                <td>{{ $pesanan->total_price }}</td>
                                <td>{{ $totalPrice }}</td>

                                <td>
                                    <a class="btn btn-warning" href="{{ url('update_orders',$pesanan->id) }}">Selesai</a>
                                </td>
                            </tr>
                                
                            @endforeach
                            
                        </table>
                    </div>
                    {{-- <div class="div_deg">
                        {{ $orders->onEachSide(1)->links() }}
                    </div> --}}
                    
                    @include('admin.footer')

        </div>
    </div>
    <!-- JavaScript files-->
    @include('admin.js')
  </body>
</html>