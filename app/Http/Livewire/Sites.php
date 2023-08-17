<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\SiteAvailable;

class Sites extends Component
{
    public function render()
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

                // session()->flash('success', 'Your site file has been saved.');
            }
            else{
                $file = $fileName;
            }    
        }
    
        return view('livewire.sites', compact('sites', 'dbSites'));
    }
}
