<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    // Kolom ini HARUS sama persis dengan yang ada di migration
    protected $fillable = [
        'kode', 
        'nama', 
        'deskripsi', 
        'harga', 
        'kapasitas', 
        'tanggal', 
        'status'
    ];

    // Tambahkan baris ini karena di migration Anda tidak ada $table->timestamps()
    public $timestamps = false; 
}