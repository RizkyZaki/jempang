<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class News extends Model
{
  use HasFactory, SoftDeletes;

  protected $table = 'news';
  protected $guarded = ['id'];

  /**
   * Relasi ke model Comment
   */
  public function comments()
  {
    return $this->hasMany(Comments::class);
  }
  public function user()
  {
    return $this->belongsTo(User::class, 'enhancer');
  }
}
