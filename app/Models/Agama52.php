<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agama52 extends Model
{
    use HasFactory;

    public $table = 'agama52';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama_agama'
    ];

    public function detail()
    {
        return $this->hasMany(Data52::class, 'id_agama', 'id');
    }
}
