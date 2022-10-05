<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    protected $fillable = [
      'equipment_id',
      'subject',
      'content'
    ];

    public function equipment() {
      return $this->belongsTo(Equipment::class);
    }
}
