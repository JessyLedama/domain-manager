<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteFilePath extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'path', 'siteId', 
    ]; 

    public function siteAvailable()
    {
        return $this->belongsTo(SiteAvailable::class);
    }
}
