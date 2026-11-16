<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pelanggan extends Model
{
    protected $table = 'pelanggan';

<<<<<<< HEAD
    protected $fillable = [
        'nama',
        'tipe',
        'no_hp',
    ];
=======
    protected $fillable = ['nama', 'tipe', 'no_hp'];
>>>>>>> 7852ec3e701ca6a29b3a612aa59e0de9ddcd5cb7

    public function transaksis(): HasMany
    {
        return $this->hasMany(Transaksi::class);
    }
}
