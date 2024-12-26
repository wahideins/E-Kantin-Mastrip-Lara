<!DOCTYPE html>
<html>
    <head> 
        @include('admin.css')

        <style type="text/css">
        input[type='text']
        {
            width: 400px;
            height: 42px;
        }

        .div_deg
        {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 30px;
        }
        .table_deg
        {
            text-align: center;
            margin: auto;
            border: 1px solid grey;
            text-align: center;
            width: 100%;
            table-layout: flex;
            margin-top: 50px;
            width: 550px;
        }

        th
        {
            background-color: #eb5f6f;
            padding: 15px;
            font-size: 20px;
            font-weight: bold;
            color: white;
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

                    <h2 style="color: white;">Tambah Kategori</h2>

                    <div class="div_deg">

                <form action="{{ url('add_category') }}" method="post">
                @csrf

                    <div>
                        <input type="text" name="category">
                        <input class="btn btn-primary" type="submit" value="+Tambah Katgori">
                    </div>
                </form>

                </div>
                <div>
                    <table class="table_deg">
                        <tr>
                            <th>Nama Kategori</th>
                            <th>Aksi</th>
                        </tr>

                        @foreach ($data as $data)

                        <tr>
                            <td>{{ $data->category_name }}</td>
                            <td>
                                <a class="btn btn-warning" href="{{ url('edit_category',$data->id) }}">Edit</a>
                                <a class="btn btn-danger" onclick="confirmation(event)" href= "{{  url('delete_category',$data->id) }}">Delete</a>
                            </td>
                        </tr>
                            
                        @endforeach
                        
                    </table>
                </div>
                @include('admin.footer')
            </div>
        </div>
        <!-- JavaScript files-->
        @include('admin.js')
    </body>
</html>