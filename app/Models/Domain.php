<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Domain extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'url',
        'type',
        'version',
    ];

    // a somain has many site, http and https
    public function siteAvailable(): hasOne
    {
        return $this->hasMany(SiteAvailable::class);
    }

    // a domain has one service
    public function siteService(): hasOne
    {
        return $this->hasOne(SiteService::class);
    }

}
