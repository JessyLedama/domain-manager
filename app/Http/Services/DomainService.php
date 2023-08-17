<?php
namespace App\Http\Services;
use App\Models\Domain;

// This service is for handling all operations concerning the domain. crud
class DomainService {

    // create a new domain
    public function store(array $domainData): Domain
    {
        $domain = Domain::create($domainData);

        return $domain;
    }

    // update a domain
    public function update(array $domainData, Domain $domain): Domain
    {
        $domain->update($domainData);

        return $domain;
    }
}