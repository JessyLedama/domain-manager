<?php
namespace App\Http\Services;
use App\Models\ServiceFilePath;

class ServiceFilePathService {
    
    // create siteAvailable file path in db
    public function store(array $filePath): ServiceFilePath
    {
        $serviceFilePath = ServiceFilePath::create($filePath);

        return $serviceFilePath;
    }
}