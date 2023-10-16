<?php

namespace App\Http\Controllers;

use App\Models\SiteService;
use Illuminate\Http\Request;
use App\Models\SiteAvailable;
use App\Http\Services\ServiceFilePathService;
use Auth;

class SiteServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ServiceFilePathService $serviceFilePathService)
    {
        // services path
        $servicesPath = '/etc/systemd/system';

        // scan directory for content
        $services = scandir($servicesPath);

        // sites available in the db. Each site (in our db) should have a corresponding service
        $dbServices = SiteAvailable::all();

        // here, the system checks if the sites in the db have a file in the specified path. 
        foreach($dbServices as $site)
        {
            // site directory
            $siteDir = $site->serverName;

            // file path
            $filePath = $servicesPath;

            // path of file domain.conf file
            $fileName = $filePath.$siteDir.'.service';

            if(!file_exists($fileName)){

                // siteData
                $siteData = [
                    '[Unit]'.PHP_EOL,
                    'Description=/etc/systemd/system/'.$site->serverName.PHP_EOL,
                    'StartLimitIntervalSec=0'.PHP_EOL,
                    'StartLimitBurst=5'.PHP_EOL,
                    'Requires=postgresql.service'.PHP_EOL,
                    'After=network.target postgresql.service multi-user.target'.PHP_EOL,
                    '[Service]'.PHP_EOL,
                    'Type=simple'.PHP_EOL,
                    'Restart=always'.PHP_EOL,
                    'RestartSec=1'.PHP_EOL, 
                    'ExecStart=/demos/'.$site->serverName.'_v16/bin/start_odoo'.PHP_EOL,
                    '[Install]'.PHP_EOL,
                    'WantedBy=multi-user.target'.PHP_EOL,
                ];
                
                // create file
                chown($fileName, Auth::id());

                $file = fopen($fileName, 'wb');

                // if creating fails
                if(!$file)
                {
                    die('Error creating file ' . $fileName);
                }

                // input data into file
                foreach($siteData as $site)
                {
                    fputs($file, $site);
                }

                // close file
                fclose($file);

                // echo "<script>console.log('Debug Objects: " . $siteDir . "' );</script>";

                session()->flash('success', 'Your site file has been saved.');
            }
            else{
                $file = $fileName;
            }    
        }

        return view('services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $serviceData = SiteService::create([
            'description' => $request->description,
            'version' => $request->version,
            'type' => $request->type, 
        ]);

        session()->flash('success', 'Your service has been saved.');

        return redirect()->route('services.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(SiteService $siteService, $id)
    {
        $service = SiteService::find($id);

        return view('services.show', compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SiteService $siteService)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SiteService $siteService)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SiteService $siteService)
    {
        //
    }
}
