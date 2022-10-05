<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Equipment extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
      'manufacture_id',
      'category_id',
      'model',
      'CPU',
      'memory',
      'storage',
      'invoice_number',
      'price',
      'purchase_date'
    ];


    public function manufacture() {
      return $this->belongsTo(Manufacture::class);
    }

    public function category() {
      return $this->belongsTo(Category::class);
    }

    public function notes() {
      return $this->hasMany(Note::class);
    }

    public function users() {
      return $this->belongsToMany(User::class);
    }
}
