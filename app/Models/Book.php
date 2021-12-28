<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $visible = ['id_suplier', 'nama_buku', 'pengarang', 'stok', 'harga' ];
    protected $fillable = ['id_suplier', 'nama_buku', 'pengarang', 'stok', 'harga'];
    public $timestamp = true;

    public function suplier()
    {
        // data dari model "Book" bisa dimiliki oleh model "author"
        // melalui fk "author_id"
        return $this->belongsTo('App\Models\Suplier', 'id_suplier');
    }

    public function image()
    {
    if ($this->cover && file_exists(public_path('image/book/' . $this->cover))) {
        return asset('image/book/' . $this->cover);
    } else {
        return asset('image/no_image.png');
    }
}

public function deleteImage()
{
    if ($this->cover && file_exists(public_path('image/book/' . $this->cover))) {
        return unlink(public_path('image/book/' . $this->cover));
    }

}
public function transaksi()
    {
        // data model "author" bisa dimiliki banyak data
        // dari model "Book" melalui fk "author_id"
        return $this->hasMany('App\Models\Transaksi', 'id_buku');
    }
}