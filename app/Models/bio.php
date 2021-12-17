<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bio extends Model
{
    use HasFactory;

    protected $table = 'bio';

    protected $fillable = [
        'judul',
        'isi',
        'penulis',
    ];
}
