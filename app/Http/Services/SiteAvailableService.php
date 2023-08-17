<?php
namespace App\Http\Services;
use App\Models\SiteAvailable;

// manage all things SiteAvailable: CRUD
class SiteAvailableService {

    // create siteAvailable file & in db
    public function store(array $siteData): SiteAvailable
    {
        $siteAvailable = SiteAvailable::create($siteData);

        return $siteAvailable;
    }

    // update a domain
    public function update(array $domainData, Domain $domain): Domain
    {
        $domain->update($domainData);

        return $domain;
    }

    // create .conf file based on site data
    public function createFile(array $siteData): SiteAvailable
    {
        // 
    }
}