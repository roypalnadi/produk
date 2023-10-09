@extends('layouts.app')

@section('content')
<div class="row pb-3">
    <h4 style="font-weight: bold">Daftar Produk > Tambah Produk</h4>
</div>

@include('produk._form', [
    'action' => route('produk.create'),
    'method' => 'post'
])
@endsection
