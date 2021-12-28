<?php

namespace Database\Seeders;
Use App\Models\Suplier;
Use App\Models\Book;
use Illuminate\Database\Seeder;

class BooksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $suplier1 = Suplier::create(['suplier' => 'Iqbal', 'alamat' => 'Cibaduyut']);
        $suplier2 = Suplier::create(['suplier' => 'Juleha', 'alamat' => 'Karawang']);
        $suplier3 = Suplier::create(['suplier' => 'Resta', 'alamat' => 'Jakarta']);

        // membuat sample buku
        $book1 = Book::create(['nama_buku' => 'Batman',
            'pengarang' => 'yayat', 'harga' => 100000, 'id_suplier' => $suplier1->id]);
            $book2 = Book::create(['nama_buku' => 'Superman',
            'pengarang' => 'Adbul', 'harga' => 5000, 'id_suplier' => $suplier2->id]);
            $book3 = Book::create(['nama_buku' => 'One piece',
            'pengarang' => 'Oda', 'harga' => 100000, 'id_suplier' => $suplier3->id]);
            $book4 = Book::create(['nama_buku' => 'Avengers',
            'pengarang' => 'marvel', 'harga' => 150000, 'id_suplier' => $suplier1->id]);
    }
}
