<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteAvailable extends Model
{
    use HasFactory;

   /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'path',
        'domainId',
        'serverName',
        'serverAlias',
        'proxyPass',
        'proxyPassReverse',
        'rewriteCond1',
        'rewriteCond2',
    ];

    public function domain(): belongsTo
    {
        return $this->belongsTo(Domain::class);
    }

}
