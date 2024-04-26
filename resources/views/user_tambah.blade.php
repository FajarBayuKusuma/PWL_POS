<!-- <body>
        <h1>Form Tambah Data User</h1>
        <form method="post" action="/user/tambah_simpan">
            
            {{ csrf_field() }}

            <label>Username</label>
            <input type="text" name="username" placeholder="Masukkan Username">    
            <br>
            <label>Nama</label>
            <input type="text" name="nama" placeholder="Masukkan Nama">
            <br>
            <label>Password</label>
            <input type="password" name="password" placeholder="Masukkan Password">
            <br>
            <label>Level ID</label>
            <input type="number" name="level_id" placeholder="Masukkan ID Level">
            <br><br>
            <input type="submit" class="btn btn-success" value="Simpan">
        </form>
</body> -->
<!-- Form Update -->
<body>
        <h1>Form Tambah Data User</h1>
        <a href="/user">kembali</a>
        <BR></BR>
        <BR></BR>

        <form method="post" action="/user/tambah_simpan">

            {{ csrf_field() }}
            {{ method_field('PUT')}}

            <label>Username</label>
            <input type="text" name="username" placeholder="Masukkan Username" value="{{$data->username}}">    
            <br>
            <label>Nama</label>
            <input type="text" name="nama" placeholder="Masukkan Nama" value="{{$data->username}}">
            <br>
            <label>Password</label>
            <input type="password" name="password" placeholder="Masukkan Password" value="{{$data->username}}">
            <br>
            <label>Level ID</label>
            <input type="number" name="level_id" placeholder="Masukkan ID Level" value="{{$data->username}}">
            <br><br>
            <input type="submit" class="btn btn-success" value="ubah">
        </form>
</body>