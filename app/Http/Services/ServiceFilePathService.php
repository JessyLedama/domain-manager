<?php
namespace App\Http\Services;
use App\Models\ServiceFilePath;
use App\Models\SiteAvailable;

class ServiceFilePathService {

    // list all services and where they are. If no service is found, check if there are any domains. If there are domains and no site for them, create.
    public function index()
    {
        // check if services path has been provided, otherwise use default.
        $servicesPath = ServiceFilePath::first();

        if(!$servicesPath)
        {
            // services path
            $servicesPath = '/home/jayliste/Documents/services/';
        }

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
            $filePath = '/home/jayliste/Documents/services/';

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

        return $services;
    }
    
    // create siteAvailable file path in db
    public function store(array $filePath): ServiceFilePath
    {
        $serviceFilePath = ServiceFilePath::create($filePath);

        return $serviceFilePath;
    }
}