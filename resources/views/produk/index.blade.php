@extends('layouts.app')

@section('content')
<div class="row pb-3">
    <h4 style="font-weight: bold">Daftar Produk</h4>
</div>

<div class="row py-4">
    <div class="col-6 d-flex">
        <div class="input-group input-group-sm flex-nowrap me-4">
            <span class="input-group-text" id="addon-wrapping"><i class="fa-solid fa-magnifying-glass"></i></span>
            <input id="search" type="text" class="form-control" aria-label="Search" aria-describedby="addon-wrapping" placeholder="Cari Barang">
        </div>
        <div class="input-group input-group-sm flex-nowrap" style="width: 285px;">
            <span class="input-group-text" id="addon-wrapping"><i class="fa-solid fa-cube"></i></span>
            <select id="category" class="form-select" aria-label="Default select example">
                <option value="" selected>Semua</option>
                @foreach ($kategoris as $kategori)
                    <option value="{{ $kategori->id }}" >{{$kategori->nama}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-6 d-flex justify-content-end">
        <a href="{{ route('produk.export') }}" type="button" class="btn btn-success btn-sm me-4">
            <img src="{{ asset('assets/MicrosoftExcelLogo.png') }}"alt="">
            <span class="btn-label">
                Export Excel
            </span>
        </a>
        <a href="{{ route('produk.add') }}" type="button" class="btn btn-danger btn-sm">
            <img src="{{ asset('assets/PlusCircle.png') }}"alt="">
            <span class="btn-label">
                Tambah Produk
            </span>
        </a>
    </div>

</div>

<div id="produk-data">
    @include('produk.data')
</div>

@endsection
