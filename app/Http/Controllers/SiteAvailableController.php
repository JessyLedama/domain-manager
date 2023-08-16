<?php

namespace App\Http\Controllers;

use App\Models\SiteAvailable;
use Illuminate\Http\Request;
use App\Models\Domain;

class SiteAvailableController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // sites directory
        $sitesDir = '/home/jayliste/Documents/sites';

        // scan directory for content
        $sites = scandir($sitesDir);

        // directories available in the db
        $dbSites = SiteAvailable::all();

        // here, the system checks if the sites in the db have a file in the specified path. 
        foreach($dbSites as $site)
        {
            // site directory
            $siteDir = $site->serverName;

            // file path
            $filePath = '/home/jayliste/Documents/sites/';

            // path of file domain.conf file
            $fileName = $filePath.$siteDir.'.conf';

            if(!file_exists($fileName)){

                // siteData
                $siteData = [
                    '<VirtualHost *:80>'.PHP_EOL,
                    'ServerName '.$site->serverName.PHP_EOL,
                    'ServerAlias '.$site->serverAlias.PHP_EOL,
                    'ProxyPass / http://'.$site->proxyPass.' nocanon'.PHP_EOL,
                    'ProxyPassReverse / https://'.$site->proxyPassReverse.PHP_EOL,
                    'RewriteEngine on'.PHP_EOL,
                    'RewriteCond %{SERVER_NAME} ='.$site->serverAlias.' OR'.PHP_EOL,
                    'RewriteCond %{SERVER_NAME} ='.$site->serverName.PHP_EOL,
                    'RewriteRule ^ https://%{SERVER_NAME}%{REQUEST_URI} [END,NE,R=permanent]'.PHP_EOL,
                    '</VirtualHost>'.PHP_EOL, 
                ];
                
                // create file
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

        return view('sites.index', compact('sites', 'dbSites'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $domains = Domain::all();

        return view('sites.create', compact('domains'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // save site data to db
        $siteData = SiteAvailable::create([
            'path' => $request->path,
            'domainId' => $request->domainId,
            'serverName' => $request->serverName,
            'serverAlias' => $request->serverAlias,
            'proxyPass' => $request->proxyPass,
            'proxyPassReverse' => $request->proxyPassReverse,
            'rewriteCond1' => $request->rewriteCond1,
            'rewriteCond2' => $request->rewriteCond2,
        ]);

        // create domain.conf file
        $file = '/home/jayliste/Documents/sites'.$request->serverName.'.conf';

        $content = 'Test content';

        if(!file_exists($file))
        {
            fopen($file, 'w+');
        }

        $current = file_get_contents($file);
        $current .= $content;

        file_put_contents($file, $current);
        
        // check if file exists, create if not
        // if(!file_exists($file)){
        //     $site = file_put_contents($file.$request->serverName, $content);
        // }

        session()->flash('success', 'Your site has been saved.');

        return redirect()->route('sites.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(SiteAvailable $siteAvailable, $id)
    {
        $site = SiteAvailable::find($id);

        return view('sites.show', compact('site'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SiteAvailable $siteAvailable)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SiteAvailable $siteAvailable)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SiteAvailable $siteAvailable)
    {
        //
    }
}
