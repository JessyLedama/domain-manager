<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ServiceFilePath;
use App\Http\Services\ServiceFilePathService;
use App\Models\SiteAvailable;

class ServiceFilePathController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $paths = ServiceFilePath::all();

        return view('services.filePaths.index', compact('paths',));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sites = SiteAvailable::all();

        return view('services.filePaths.create', compact('sites'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, ServicefilePathService $serviceFilePathService)
    {
        $filePath = [
            'path' => $request->path,
            'siteId' => $request->siteId,
        ];  

        $serviceFilePathService->store($filePath);

        return redirect()->route('servicePaths.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
