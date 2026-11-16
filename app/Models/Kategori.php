<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
<<<<<<< HEAD
=======
use Illuminate\Database\Eloquent\Relations\HasMany;
>>>>>>> 7852ec3e701ca6a29b3a612aa59e0de9ddcd5cb7

class Kategori extends Model
{
    protected $table = 'kategori';

<<<<<<< HEAD
    protected $fillable = [
        'nama',
    ];
=======
    protected $fillable = ['nama_kategori'];

    public function produks(): HasMany
    {
        return $this->hasMany(Produk::class);
    }
>>>>>>> 7852ec3e701ca6a29b3a612aa59e0de9ddcd5cb7
}
