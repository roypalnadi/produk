<?php

namespace App\Http\Controllers;

use App\Models\KategoriProduk;
use App\Models\Produk;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Validation\Rule;

class ProdukController extends Controller
{
    public function index(Request $request)
    {
        $produks = Produk::query()->with('kategori')->paginate();

        $kategoris = KategoriProduk::get();

        return view('produk.index', \compact('produks', 'kategoris'));
    }

    public function dataAjax(Request $request)
    {
        $search = $request->get('search');
        $kategoryId = $request->get('kategori_id');

        $produks = Produk::query()->with('kategori');

        if ($search) {
            $produks = $produks->where('nama', $search);
        }

        if ($kategoryId) {
            $produks = $produks->where('kategori_id', $kategoryId);
        }

        $produks = $produks->paginate();

        return view('produk.data', \compact('produks'))->render();
    }

    public function add()
    {
        $kategoris = KategoriProduk::get();

        return view('produk.add', \compact('kategoris'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'nama' => ['required', Rule::unique('produk', 'nama'),],
            'kategori_id' => 'required',
            'harga_barang' => 'required',
            'harga_jual' => 'required',
            'stok' => 'required',
            'gambar' => 'required|mimes:png,jpg|max:100',
        ]);

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $extention = $file->getClientOriginalExtension();
            $namaFile = Carbon::now()->unix() . '.' . $extention;

            $data = new Produk;

            if ($data->storeFile($file, $namaFile)) {
                $data->fill($request->all());
                $data->save();
            }
        }

        return redirect()->route('produk.index');
    }

    public function edit(Produk $model)
    {
        $kategoris = KategoriProduk::get();

        return view('produk.edit', \compact('model', 'kategoris'));
    }

    public function update(Produk $model, Request $request)
    {
        $request->validate([
            'nama' => ['required', Rule::unique('produk', 'nama')->ignore($model->id)],
            'kategori_id' => 'required',
            'harga_barang' => 'required',
            'harga_jual' => 'required',
            'stok' => 'required',
            'gambar' => 'required|mimes:png,jpg|max:100',
        ]);

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $extention = $file->getClientOriginalExtension();
            $namaFile = Carbon::now()->unix() . '.' . $extention;

            $model->dropFile();

            if ($model->storeFile($file, $namaFile)) {
                $model->fill($request->all());
                $model->save();
            }
        }

        return redirect()->route('produk.index');
    }

    public function destroy(Produk $model)
    {
        $model->dropFile();
        $model->delete();
    }

    public function export(Request $request)
    {
        $products = Produk::with('kategori')->get();

        $csvFileName = 'produk.csv';
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $csvFileName . '"',
        ];

        $handle = fopen('php://output', 'w');
        fputcsv(
            $handle,
            [
                'Nama Barang',
                'Kategori',
                'Harga Barang',
                'Harga Jual',
                'Stok'
            ],
            ';'
        ); // Add more headers as needed

        foreach ($products as $product) {
            fputcsv(
                $handle,
                [
                    $product->nama,
                    $product->kategori->nama,
                    $product->harga_barang,
                    $product->harga_jual,
                    $product->stok
                ],
                ';'
            ); // Add more fields as needed
        }

        fclose($handle);

        return Response::make('', 200, $headers);
    }
}
