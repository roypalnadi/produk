<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produk extends BaseModel
{
    use HasFactory, SoftDeletes;

    public $timestamps = true;

    protected $pathFile = '/produk';
    protected $columnFile = 'link_image';

    protected $table = 'produk';

    protected $fillable = [
        'nama',
        'kategori_id',
        'harga_barang',
        'harga_jual',
        'stok',
    ];

    public function kategori()
    {
        return $this->belongsTo(KategoriProduk::class, 'kategori_id', 'id');
    }

    public function getLinkImageAttribute($value)
    {
        return url('storage/' . $this->pathFile . '/' . $value);
    }
}
