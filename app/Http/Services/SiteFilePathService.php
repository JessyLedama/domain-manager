<?php
namespace App\Http\Services;
use App\Models\SiteFilePath;

class SiteFilePathService {
    
    // create siteAvailable file path in db
    public function store(array $sitePath): SiteFilePath
    {
        $siteFilePath = SiteFilePath::create($sitePath);

        return $siteFilePath;
    }
}