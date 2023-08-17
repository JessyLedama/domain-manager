<?php

namespace App\Http\Controllers;

use App\Models\Domain;
use Illuminate\Http\Request;
use App\Http\Services\DomainService;

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
     * Store a newly created resource in storage.
     */
    public function store(Request $request, DomainService $domainService)
    {
        $domainData = [
            'name' => $request->name,
            'url' => $request->url,
            'type' => $request->type,
            'version' => $request->version,
        ];

        $domainService->store($domainData);

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
