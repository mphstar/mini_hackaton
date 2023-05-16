@extends('admin.app')

@section('main')
    <div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>

        <div class="page-heading">
            <h3>Master Data Ikan</h3>
        </div>
        <div class="page-content">
            <div class="d-flex justify-content-between mb-4">
                <div class="">

                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Master Data Ikan</a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                                {{ isset($data) ? 'Update' : 'Tambah' }}
                            </li>
                        </ol>
                    </nav>
                </div>

            </div>
        </div>

        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <h4 class="card-title">{{ isset($data) ? 'Update Data' : 'Create Data' }}</h4>
                    <div class="col-md-12 mt-4 col-12">
                        <div class="card">

                            <form action="{{ isset($data) ? '/home/update/proses' : '/home/create/proses' }}" method="POST" enctype="multipart/form-data" 
                                class="form form-vertical">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        @isset($data)
                                            <input type="hidden" class="form-control" name="id"
                                                placeholder="ID" value="{{ isset($data) ? $data->id : '' }}">
                                        @endisset
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="nama">Nama Ikan</label>
                                                <input type="text" id="nama"
                                                    class="form-control @error('nama')
                                                is-invalid
                                                @enderror"
                                                    name="nama" placeholder="Nama Ikan"
                                                    value="{{ isset($data) ? $data->nama_ikan : old('nama') }}">
                                                @error('nama')
                                                    <div class="invalid-feedback">
                                                        <i class="bx bx-radio-circle"></i>
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="stok">Stok</label>
                                                <input type="text" id="stok"
                                                    class="form-control @error('stok')
                                                is-invalid
                                                @enderror"
                                                    name="stok" placeholder="Stok"
                                                    value="{{ isset($data) ? $data->stok : old('stok') }}">
                                                @error('stok')
                                                    <div class="invalid-feedback">
                                                        <i class="bx bx-radio-circle"></i>
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="deskripsi">Deskripsi</label>
                                                <input type="text" id="deskripsi"
                                                    class="form-control @error('deskripsi')
                                                is-invalid
                                                @enderror"
                                                    name="deskripsi" placeholder="Deskripsi"
                                                    value="{{ isset($data) ? $data->deskripsi : old('deskripsi') }}">
                                                @error('deskripsi')
                                                    <div class="invalid-feedback">
                                                        <i class="bx bx-radio-circle"></i>
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="gambar">Gambar</label>
                                                <input type="file" id="gambar"
                                                    class="form-control @error('gambar')
                                                is-invalid
                                                @enderror"
                                                    name="gambar" placeholder="Gambar"
                                                    value="{{ isset($data) ? $data->gambar : '' }}">
                                                @error('gambar')
                                                    <div class="invalid-feedback">
                                                        <i class="bx bx-radio-circle"></i>
                                                        {{ $message }}
                                                    </div>
                                                @enderror

                                            </div>
                                        </div>

                                        <div class="col-12 d-flex mt-4 justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">
                                                Submit
                                            </button>
                                            <button type="reset" class="btn btn-light-secondary me-1 mb-1">
                                                Reset
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <footer>
            <div class="footer clearfix mb-0 text-muted">
                <div class="float-start">
                    <p>2021 &copy; Mazer</p>
                </div>
                <div class="float-end">
                    <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a
                            href="https://saugi.me">Saugi</a></p>
                </div>
            </div>
        </footer>
    </div>
@endsection
