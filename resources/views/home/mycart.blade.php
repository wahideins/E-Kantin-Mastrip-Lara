<!DOCTYPE html>
<html>

<head>
    @include('home.css')
    <style>
      
    h1{
        font-family: Lora;
        color: #31511E;
    }
    .container-menu{
        display: flex;
        flex-wrap: wrap;
    }
    .menu-content p{
        font-family: Futura PT;
        color: #31511E;
        font-size: 18px;
    }
    .menu-content{
        margin-left: 25px;
        margin-top: 10px;
        display: flex;
        justify-content:center;
        gap: 10px;
    }
      
    .container-pil{
        display: flex;
        gap: 10px;
        margin: 10px;
        border: none;
        padding: 10px;
    }
      
    .menu-item1{
        height: 144px;
        width: 144px;
    }
      
    .menu-item1 img{
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
      
    .menu-item2{
        display: block;
        margin: 0;
    }
    .footer {
        position: fixed;
        right: 0;
        bottom: 0;
        width: 144px;
        height: 72px;
        background-color: #31511E;
        color: white;
        text-align: center;
        margin: 32px;
        align-items: center;
        border-radius:8px;
        padding: 6px
    }
    .footer p {
        color: white;
        text-align: center;
        }
    .form-pesan {
        display: block;
        width: 50%px;
        padding: 10px;
        margin:32px;
    }
    .form-pesan input, .form-pesan textarea {
        border-radius: 8px;
    }
    
    
      </style>
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            function addQty(cartId) {
                $.ajax({
                    url: "/addQty_cart/" + cartId,
                    method: "POST",
                    data: {
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        location.reload(); 
                    },
                    error: function(response) {
                        alert('Gagal menambah kuantitas.');
                    }
                });
            }
      </script>

    <script>
        function handlePaymentChange(paymentType) {
            const qrCodeDiv = document.getElementById('qr-code');
            const cashCodeDiv = document.getElementById('cash');
            if (paymentType === 'transfer') {
                qrCodeDiv.style.display = 'block';
                cashCodeDiv.style.display = 'none';
            } 
            else if (paymentType === 'cash'){
                cashCodeDiv.style.display = 'block'
                qrCodeDiv.style.display = 'none';
            }
        }
    </script>

</head>

<body>

  <div class="hero_area">
    <!-- header section strats -->
    @include('home.header')
    <!-- end header section -->
  </div>
  <!-- end hero area -->


    <div style="width: 100%; align-items:center;text-align:center;margin-top:12px;">
        <h1>Keranjang</h1>
    </div>
    <div class="container-menu" style="height: 400px">
        @foreach ($cart as $item)
            <div class="menu-content">
                <div class="container-menul" style="width:100%;padding:0px;">
                    <div class="container-pil">
                        <div class="menu-item1" style="width: 72px;">
                            <img src="products/{{ $item->product->image }}" alt=""
                                style="max-width: 144px; max-height:144px; margin-right:10px; min-width: 144px; object-fit:cover;">
                        </div>
                        <div class="menu-item2" style="margin-left: 72px;">
                            <h2>{{ $item->product->title }}</h2>
                            <div class="detail" style="max-height:98px;">
                                <p>
                                    {{ $item->product->category ?? 'Kategori tidak ditemukan' }}<br>
                                    Rp. {{ $item->product->price ?? 0 }}<br>
                                </p>

                                <div class="kuantitas">
                                    <form action="{{ url('minQty_cart/' . $item->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        <button type="submit" class="btn btn-primary btn-sm">-</button>
                                    </form>
                                    {{ $item->qty }}
                                    <form action="{{ url('addQty_cart/' . $item->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        <button type="submit" class="btn btn-primary btn-sm">+</button>
                                    </form>
                                    {{-- Button Hapus --}}
                                    <form action="{{ url('delItem_cart', $item->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" style="margin-left:10px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                            <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0"/>
                                            </svg>
                                        </button>
                                        </form>
                                </div>
                                                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    </div>
    
    </div>
    <div class="form-pesan">
        <h2>Formulir Pemesanan</h2>
        <form action="{{ url('confirm_order') }}" method="POST">
            @csrf
    
            <!-- Input Nama -->
            <div>
                <label for="name">Nama Customer</label>
                <input type="text" name="name" id="name" placeholder="{{ Auth::user()->name }}" class="form-control" required>
            </div>
    
            <!-- Input Alamat -->
            <div style="display: flex; flex-direction:column;margin-top:8px;">
                <label for="address">Destinasi Pengiriman</label>

                <select name="address" id="address">
                  <option value="Perpustakaan Mastrip">Perpustakaan Mastrip</option>
                  <option value="Dinas Kearsipan">Dinas Kearsipan</option>
                </select>
            </div>

    
            <!-- Input Nomor Telepon -->
            <div>
                <label for="phone">No. Telepon</label>
                <input type="text" name="phone" id="phone" class="form-control" required>
            </div>
    
            <!-- Input Catatan -->
            <div>
                <label for="note">Catatan untuk Penjual</label>
                <textarea name="note" id="note" cols="30" rows="3" class="form-control"></textarea>
            </div>

            <!-- Pilihan Pembayaran -->
            <div style="display: flex; flex-direction:column;margin-top:8px;">
                <label for="payment">Pilih Pembayaran</label>
            
                <select name="payment" id="payment" onchange="handlePaymentChange(this.value)">
                    <option value="cash">Cash</option>
                    <option value="transfer">Transfer</option>
                </select>
            </div>
            
            <!-- Div untuk QR Code -->
            <div id="qr-code" style="display: none; margin-top: 15px;">
                <label>Scan QR Code untuk Pembayaran Transfer:</label>
                <img src="{{ asset('images/qr.jpeg') }}" alt="QR Code" style="width: 200px; height: 200px;">
                <p>*Simpan bukti pembayaran untuk ditunjukkan ke penjual saat makanan diantar</p>
            </div>
            
            <div id="cash" style="display: none:margin-top:15px;">
                <p>Metode Pembayaran: Cash <br> Silahkan tunggu makanan atau minuman anda diantar atau bayar di kantin :3</p>
            </div>
    
            <!-- Tombol Submit -->
            <div style="margin-top: 20px;">
                <button type="submit" class="btn btn-success">Pesan Sekarang</button>
            </div>
        </form>
    </div>
    
    
   {{-- footer --}}
   <div class="footer">
        <div>
            <p>Total: Rp. {{ $totalPrice }}</p>
        </div>
    </div>

    
</body>


</html>