<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SiteFilePath;
use App\Models\ServiceFilePath;

class PathSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // this path is the SiteFilePath. It is the path to where the site.conf will be stored
        $sitePathData = '/etc/apache2/sites-available/';

        // this path is where the new service that will be created will be stored
        $servicePathData = '/etc/systemd/system/';

        // checking whether they have any data in them
        $sitepath = SiteFilePath::first();
        $servicePath = ServiceFilePath::first();

        // if they're empty, populate them with data.
        if(!isset($sitepath)){
            SiteFilePath::create([
                'path' => $sitePathData
            ]);
        };

        if(!isset($servicePath)) {
            ServiceFilePath::create([
                'path' => $servicePathData
            ]);
        };
    }
}
