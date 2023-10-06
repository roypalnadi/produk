@extends('layouts.app')

@section('content')
<div class="row pb-3">
    <h4 style="font-weight: bold">Daftar Produk > Tambah Produk</h4>
</div>

<form class="row" method="post" action="{{ route('produk.create') }}" enctype="multipart/form-data">
    @csrf
    <div class="row pb-4">
        <div class="col-4">
            <div class="input-group-sm flex-nowrap me-4">
                <label class="form-label fw-bold" for="inputBarang">Kategori</label>
                <select id="category" name="kategori_id" class="form-select @error('kategori_id') is-invalid @enderror" aria-label="Default select example">
                    <option value="" selected>Pilih Kategori</option>
                    @foreach ($kategoris as $kategori)
                        <option @if (old('kategori_id') == $kategori->id) selected @endif value="{{ $kategori->id }}" >{{$kategori->nama}}</option>
                    @endforeach
                </select>
                @error('kategori_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="col-8">
            <div class="input-group-sm">
                <label class="form-label fw-bold" for="inputBarang">Nama Barang</label>
                <input name="nama" id="nama" type="text" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}" aria-label="nama" aria-describedby="addon-wrapping" placeholder="Masukan nama barang">
                @error('nama')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    </div>

    <div class="row pb-4">
        <div class="col-4">
            <div class="input-group-sm flex-nowrap me-4">
                <label class="form-label fw-bold" for="inputHargaBeli">Harga Beli</label>
                <input name="harga_barang" id="buy" type="number" class="form-control @error('harga_barang') is-invalid @enderror" value="{{ old('harga_barang') }}" aria-label="harga-beli" aria-describedby="addon-wrapping" placeholder="Masukan harga beli">
                @error('harga_barang')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="col-4">
            <div class="input-group-sm flex-nowrap me-4">
                <label class="form-label fw-bold" for="inputHargaJual">Harga Jual</label>
                <input name="harga_jual" id="sell" type="number" class="form-control @error('harga_jual') is-invalid @enderror" value="{{ old('harga_jual') }}" aria-label="harga-jual" aria-describedby="addon-wrapping" placeholder="Masukan harga jual">
                @error('harga_jual')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="col-4">
            <div class="input-group-sm flex-nowrap">
                <label class="form-label fw-bold" for="inputStockBarang">Stok Barang</label>
                <input name="stok" id="stok-barang" type="number" class="form-control @error('stok') is-invalid @enderror" value="{{ old('stok') }}" aria-label="stok-barang" aria-describedby="addon-wrapping" placeholder="Masukan Stok barang">
                @error('stok')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    </div>

    <div class="row pb-4">
        <div class="col-12">
            <label for="formFile" class="form-label fw-bold">Gambar</label>
            <input name="gambar" class="form-control form-control-sm @error('gambar') is-invalid @enderror" type="file" id="formFile">
            @error('gambar')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>
    </div>
    <div class="row justify-content-end pb-4">
        <div class="col-2 me-5 text-end">
            <a href="{{ route('produk.index') }}" class="px-5 btn btn-sm btn-outline-primary">Batalkan</a>
        </div>
        <div class="col-2 text-end">
            <button type="submit" class="px-5 btn btn-sm btn-primary">Simpan</button>
        </div>
    </div>
</form>
@endsection
