<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pelanggan extends Model
{
    protected $table = 'pelanggan';

    protected $fillable = ['nama_pelanggan'];

    public function transaksis(): HasMany
    {
        return $this->hasMany(Transaksi::class);
    }
}
