<div class="table-responsive">
    <table class="table table-bordered" style="font-size: 12px">
        <thead>
            <tr>
                <th class="text-center" scope="col">No</th>
                <th class="text-center" scope="col">Image</th>
                <th scope="col">Nama Produk</th>
                <th scope="col">Kategori Produk</th>
                <th scope="col">Harga Beli (Rp)</th>
                <th scope="col">Harga Jual (Rp)</th>
                <th scope="col">Stok Produk</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($produks as $no => $item)
                <tr>
                    <td class="text-center">{{++$no}}</td>
                    <td class="text-center"><img src="{{$item->link_image}}" alt="{{$item->nama}}" class="img-fluid" width="30"></td>
                    <td>{{$item->nama}}</td>
                    <td>{{$item->kategori?->nama}}</td>
                    <td>{{$item->harga_barang}}</td>
                    <td>{{$item->harga_jual}}</td>
                    <td>{{$item->stok}}</td>
                    <td>
                        {{-- <button id="edit" type="submit" class="btn btn-sm show_confirm ps-0 pb-0 pt-0" data-value="{{ $item->id }}" data-toggle="tooltip" title='Edit'>
                            <img src="{{ asset('assets/edit.png') }}"alt="">
                        </button> --}}
                        <button id="delete" type="submit" class="btn btn-sm show_confirm ps-0 pb-0 pt-0" data-value="{{ $item->id }}" data-toggle="tooltip" title='Delete'>
                            <img src="{{ asset('assets/delete.png') }}"alt="">
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $produks->links('pagination::bootstrap-5') }}
</div>
