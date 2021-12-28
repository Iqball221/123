<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

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
public function book()
    {
        // data dari model "Book" bisa dimiliki oleh model "author"
        // melalui fk "author_id"
        return $this->belongsTo('App\Models\Book', 'id_buku');
    }

}
