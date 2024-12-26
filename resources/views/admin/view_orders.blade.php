<?php
$pendapatan = $totalPrice;
?>
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
         .upper-button{
            display: flex;
            flex-wrap: wrap;
            width: 100vw;
            justify-content: flex-start;
            align-items: flex-start;
            align-content: flex-start;
            gap: 8px;
            flex-direction: column;
            margin: 0;
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

        .print-btn {
            left: 10px;
            padding: 10px;
            background-color: #eb5f6f;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        .print-btn:hover {
            background-color: #0056b3;
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
                    <!-- Print button -->
                    <div class="upper-button">
                        <button class="print-btn" id="print-btn">Laporan-PDF</button>
                        <a href="{{url ('view_orders')}}" class="btn btn-primary"style="color:white;">Semua Pesanan</a>
                        <form action="{{ url('view_orderCompleteByDate') }}" method="GET">
                            @csrf
                            <label for="date"><p>Tampilkan Pesanan <br>Berdasarkan Tanggal:</p></label>
                            <input type="date" name="date" id="date" required>
                            <button type="submit" class="btn btn-primary">Tampilkan Pesanan</button>
                        </form>
                    </div>
                    
                    
                    <div class="div_deg">
                        <table class="table_deg">
                            <thead>
                                <tr>
                                  <th colspan="9">Tabel Pesanan {{$date}}</th>
                                </tr>
                                <tr>
                                    <th>Nama Customer</th>
                                    <th>Tujuan</th>
                                    <th>No.Hp</th>
                                    <th>Catatan</th>
                                    <th>Status</th>
                                    <th>Pesanan</th>
                                    <th>Kuantitas</th>
                                    <th>Harga Per Menu</th>
                                    <th>Total Harga</th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach ($orders as $pesanan)
    
                                <tr>
                                    <td>{{ $pesanan->name }}</td>
                                    <td>{{ $pesanan->rec_address }}</td>
                                    <td>{{ $pesanan->phone }}</td>
                                    <td>{{ $pesanan->note }}</td>
                                    <td>{{ $pesanan->status }}</td>
                                    <td>{{ $pesanan->product->title }}</td>
                                    <td>{{ $pesanan->quantity }}</td>
                                    <td>{{ $pesanan->product->price }}</td>
                                    <td>{{ $pesanan->total_price }}</td>
                                </tr>  
                                @endforeach
                              </tbody>
                              <tfoot>
                                <tr>
                                  <td colspan="9">
                                    <h3>
                                        Pendapatan: +Rp.<?php 
                                        echo number_format($pendapatan, 0, ',', '.'); 
                                    ?>
                                    </h3> 
                                    
                                </tr>
                              </tfoot>
                        </table>
                    </div>
                    
                    
                    @include('admin.footer')
                </div>
        </div>
    </div>
    <!-- JavaScript files-->
    @include('admin.js')
    <!-- Add jsPDF library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <!-- Add jsPDF AutoTable plugin -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.24/jspdf.plugin.autotable.js"></script>

    <script>
        document.getElementById('print-btn').addEventListener('click', function() {
            const { jsPDF } = window.jspdf;
            const doc = new jsPDF();
            
            doc.setFontSize(20);
            doc.text("Laporan Pesanan", 20, 20);

            const table = document.querySelector('table');
            doc.autoTable({ html: table });

            doc.save('Laporan-Pesanan.pdf');
        });
    </script>
  </body>
</html>