<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PathSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // this path is the SiteFilePath. It is the path to where these 
        $sitePathData = '/etc/apache2/sites-available';
        $servicePathData = '/etc/systemd/system';

        $sitepath = SiteFilePath::first();
        $servicePath = ServiceFilePath::first();

        if(!isset($sitepath){
            SiteFilePath::create([
                'path' => $sitePathData
            ]);
        });

        if(!isset($servicePath) {
            ServiceFilePath::create([
                'path' => $servicePathData
            ]);
        });
    }
}
