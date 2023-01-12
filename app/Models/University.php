<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    use HasFactory;
    
    
    protected $fillable =
    [
      'name_university', 'logo_image','name_of_building', 'address'
    ];
    
    public function room(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
      return $this->belongsTo(room::class);
    }
}
