<?php

namespace App\Http\Controllers;

use App\Models\Domain;
use Illuminate\Http\Request;
use App\Http\Services\DomainService;
use App\Http\Services\SiteAvailableService;
use App\Models\SiteFilePath;
use App\Models\ServiceFilePath;

class DomainController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $domains = Domain::all();

        return view('domains.index', compact('domains'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('domains.create');
    }

    /**
     * Store a newly created domain in storage. 
     * After storing the domain, store a siteAvailable record for the domain.
     */
    public function store(Request $request, DomainService $domainService, SiteAvailableService $siteAvailableService)
    {
        // get file paths
        $sitePath = SiteFilePath::first();

        // if file path is not set, use default.
        if(!$sitePath)
        {
            $sitePath = '/etc/apache2/sites-available';
        }

        $servicePath = ServiceFilePath::first();

        // if file path is not set, use default.
        if(!$servicePath)
        {
            $servicePath = '/etc/systemd/system';
        }


        // prepare $domainData for storage
        $domainData = [
            'name' => $request->name,
            'url' => $request->url,
            'type' => $request->type,
            'version' => $request->version,
        ];

        // store the domain using $domainService
        $domainService->store($domainData);

        $domain = Domain::where('name', $request->name)->first();

        // prepare serviceAvailableData for storage
        $siteData = [
            'path' => $sitePath,
            'domainId' => $domain->id,
            'serverName' => $request->name,
            'serverAlias' => 'www.'.$request->name,
            'proxyPass' => $request->url,
            'proxyPassReverse' => $request->url,
            'rewriteCond1' => 'www.'.$request->name,
            'rewriteCond2' => $request->name,
        ];
        
        // store the site
        $siteAvailableService->store($siteData);

        return redirect()->route('domains.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Domain $domain)
    {
        $domain = Domain::find($domain);

        return view('domains.show', compact('domain'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Domain $domain)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Domain $domain)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Domain $domain)
    {
        //
    }
}
