<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Managemen Inventaris Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <!-- 0. Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid col-md-12">
            <div class="navbar-brand">
                <a href="/"><img src="https://i.ibb.co.com/JRX0Zsj/logoM.png" alt="logoM" border="0" style="width: 40px"></a>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/managemen_barang">Data Barang</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    <div class="container mt-4">
        <!-- 1. Content-->
        <h1 class="text-center mb-4">Managemen Inventaris Barang</h1>
        <div class="row justify-content-center">
            <div class="col-md-8">
            <div class="card mb-3">
                <div class="card-body">
                    @if (@session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        
                        
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                        </div>
                    @endif
                    <!-- 2. Form input data -->
                    <form id="barang-form" action="{{ route('managemen_barang.post') }}" method="post">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="name-input" class="form-label">Nama Barang</label>
                            <input type="text" class="form-control" name="name" id="name-input" placeholder="Masukkan nama barang" required value="{{ old('name') }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="quantity-input" class="form-label">Jumlah</label>
                            <input type="text" class="form-control" name="quantity" id="quantity-input" placeholder="Masukkan jumlah" required value="{{ old('quantity') }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="price-input" class="form-label">Harga</label>
                            <input type="text" class="form-control" name="price" id="price-input" placeholder="Masukkan harga" required value="{{ old('price') }}">
                        </div>
                        <div class="text-center">
                            <button class="btn btn-primary mx-auto" type="submit" style="width: 400px">
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <!-- 3. Searching -->
                        <form id="barang-form" action="{{ route('managemen_barang') }}" method="get">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="search" value="{{ request('search') }}" 
                                    placeholder="masukkan kata kunci">
                                <button class="btn btn-secondary" type="submit">
                                    Cari
                                </button>
                            </div>
                            <th>
                                <form action="{{ route('managemen_barang') }}" method="GET">
                                    <input type="hidden" name="sort_by" value="name">
                                    <input type="hidden" name="sort_direction" value="{{ $sortDirection === 'asc' ? 'desc' : 'asc' }}">
                                    <button type="submit" class="btn btn-primary mb-3">
                                        @if($sortDirection === 'asc')
                                            A-Z
                                        @else
                                            Z-A
                                        @endif
                                        <i class="fa fa-sort"></i>
                                    </button>
                                </form>
                            </th>
                            <div class="mb-3">
                                <strong>Kelompokan Berdasarkan Huruf</strong>
                                <ul class="list-inline">
                                    @foreach($groupedLetters as $letter)
                                        <li class="list-inline-item">
                                            <a href="{{ route('managemen_barang', ['first_character' => $letter->first_character]) }}">{{ $letter->first_character }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>                            
                            
                        </form>
                        
                        <ul class="list-group mb-4" id="barang-list">
                        @foreach ($data as $item)
                            <!-- 4. Display Data -->
                            <li class="list-group-item d-flex flex-column align-items-start">
                                <table class="table mb-0">
                                    <thead>
                                        <tr>
                                            <th>Nama Barang</th>
                                            <th>Jumlah</th>
                                            <th>Harga</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="task-text">
                                                {{ $item->name }}
                                            </td>
                                            <td class="task-text">
                                                {{ $item->quantity }}
                                            </td>
                                            <td class="task-text">
                                                {{ $item->price }}
                                            </td>
                                            <td>
                                                <div class="btn-group">
                                                    <form action="{{ route('managemen_barang.delete', ['id' => $item->id]) }}" method="POST" onsubmit="return confirm('Yakin akan menghapus data ini?')">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="btn btn-danger btn-sm delete-btn">✕</button>
                                                    </form>
                                                    <button class="btn btn-primary btn-sm edit-btn" data-bs-toggle="collapse" data-bs-target="#collapse-{{ $loop->index }}" aria-expanded="false">✎</button>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <input type="text" class="form-control edit-input" style="display: none;" value="{{ $item->name }}">
                            </li>
                            
                            
                            <!-- 5. Update Data -->
                            <li class="list-group-item collapse" id="collapse-{{ $loop->index }}">
                                <form action="{{ route('managemen_barang.update',['id'=>$item->id]) }}" method="POST">
                                    @csrf
                                    @method('put')
                                    <div>
                                        <div class="form-group mb-3">
                                            <label for="name-input" class="form-label">Nama Barang</label>
                                            <input type="text" class="form-control" name="name" id="name-input" placeholder="Masukkan nama barang" required value="{{ old('name') }}">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="quantity-input" class="form-label">Jumlah</label>
                                            <input type="text" class="form-control" name="quantity" id="quantity-input" placeholder="Masukkan jumlah" required value="{{ old('quantity') }}">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="price-input" class="form-label">Harga</label>
                                            <input type="text" class="form-control" name="price" id="price-input" placeholder="Masukkan harga" required value="{{ old('price') }}">
                                        </div>
                                        <div class="text-center">
                                            <button class="btn btn-primary mx-auto" type="submit" style="width: 400px">
                                                Update
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </li>
                            @endforeach
                        </ul>
                        {{ $data->links() }}
                        
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle (popper.js included) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js">
    </script>

    {{-- Footer --}}
    <footer class="bg-dark text-white py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h5>About Us</h5>
                    <p>"Ingin data aman, rapi, terstruktur, dan dapat diakses 24 Jam? <strong> Manageman Inventaris Barang Solusinya"</strong></p>
                </div>
                <div class="col-md-3">
                    <h5>Quick Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="/" class="text-white">Home</a></li>
                        <li><a href="/managemen_barang" class="text-white">Data Barang</a></li>
                        <li><a href="#" class="text-white">About</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h5>Social Media</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-white"><i class="fab fa-facebook-f"></i> Facebook</a></li>
                        <li><a href="#" class="text-white"><i class="fab fa-twitter"></i> Twitter</a></li>
                        <li><a href="#" class="text-white"><i class="fab fa-instagram"></i> Instagram</a></li>
                        <li><a href="#" class="text-white"><i class="fab fa-linkedin-in"></i> LinkedIn</a></li>
                    </ul>
                </div>
            </div>
            <div class="text-center mt-3">
                <p>&copy; 2024 Aflah Firdaus Fuady. All rights reserved.</p>
            </div>
        </div>
    </footer>

</body>

</html>