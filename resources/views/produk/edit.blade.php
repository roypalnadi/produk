@extends('layouts.app')

@section('content')
<div class="row pb-3">
    <h4 style="font-weight: bold">Daftar Produk > Ubah Produk</h4>
</div>

@include('produk._form', [
    'action' => route('produk.update', ['model' => $model?->id]),
    'method' => 'put'
])
@endsection
