<!DOCTYPE html>
<html lang="en">

<head>
    <title>Receipt</title>
    @include('home.css')
    <style>
          ::-webkit-scrollbar{
            display: none;
        }
        body
        {
            background-color: #F6F5F2;
        }
        .container
        {   
            margin-top: 20px;
            background-color: #FAF8ED;
            display: flex;
            flex-direction: column;
            max-width: 667px;
            max-height: 100vh;
            justify-content: center;
            align-items: center;
            align-content: center;
            padding: 20px;
        }
        .headreceipt
        {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            align-content: center; 
        }
        .headreceipt h1
        {
            margin: 0;
            color: #31511E;
            justify-content: center;
            align-content: center;
            align-items: center;
        }
        .headreceipt p
        {
            font-size: 12px
        }
        hr
        {
            margin: 0;
            border:2px dashed #31511E;
            min-width: 100%;
        }
        .name-receipt
        {
            min-width: 100%;
            display: flex;
            margin: 0;
            gap: 25px;
        }
        .address-receipt 
        {
            display: flex;
            flex-wrap: wrap;
            min-width: 100%;
            margin: 0;

        }
        .address-receipt p
        {
            display: flex;
            min-width: 100%;
            margin: 0;

        }
        .container-item
        {
            min-width: 100%;
            display: flex;
            flex-wrap: wrap;
            margin-top: 10px;
            max-height: 200px;
            min-height: 200px;
            overflow-y: scroll;
            margin: 0;
            padding: 0;
            justify-content: flex-start;
            align-items: flex-start;
            align-content: flex-start;
        }
        #item
        {
            display: flex;
            flex-grow: 1;
            margin:0;
            min-width: 75%;
            height: 5%;
            padding: 0;
        }
        #detail-item
        {
            display: flex;
            flex-grow: 0;
        }
        .button-home a
        {
            background-color: #31511E;
            border: none;
            
        }
        
    </style>
</head>

<body>
    <div class="container">
        <div class="headreceipt">
            <h1 align="center">Struk Pembayaran</h1>
            <p align="center">{{$orders->first()->created_at}} <br>Kantin Mastrip, Jalan Dokter Sutomo No.19, Sengon, Kec. Jombang, Kabupaten Jombang, Jawa Timur 61419<hr></p>
        </div>
        <div class="name-receipt">
            <p>Customer: {{$user->name}}</p>
        </div>
        <div class="address-receipt">
            <p>{{ $orders->first()->rec_address }}</p>
            <hr>
        </div>
        <div class="container-item">
            @foreach ($orders as $order)
            <div id="item">
                {{ $order->product->title }}
            </div>
            <div id="detail-item">
                <p>{{ $order->quantity }}x Rp. {{ number_format($order->product->price) }}</p>
            </div>
            @endforeach
        </div>
        <div class="payment-method">
            <p>Metode Pembayaran: <strong>{{ $orders->first()->payment }}</strong></p>
        </div>
        <div class="total">
            <p>Total: <br></p>
            <h1>Rp. {{ number_format($totalPrice) }}</h1>
        </div>
        <div class="button-home">
            <a href="{{ url('/') }}" class="btn btn-primary">Kembali ke Beranda</a>
        </div>
    </div>
</body>

</html>
