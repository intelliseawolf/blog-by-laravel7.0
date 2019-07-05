<?php

namespace App\Services\Sections;

use App\Services\PackagistApiServices;

class CountersSectionService
{
    /**
     * Gets the counters data.
     *
     * @return array The counters data.
     */
    public function getCountersServiceData()
    {
        $packagistApiServices           = new PackagistApiServices;
        $packagistVendorPackagesCount   = $packagistApiServices->getVendorPackagesCount();
        $packagistVendorsTotalDownloads = $packagistApiServices->getVendorsTotalDownloads();

        return [
            'enabled' => true,
            'background' => 'https://hdqwalls.com/wallpapers/code.jpg',
            'bsClass'    => "col-md-3 col-sm-6",
            'items' => collect([
                [
                    'title'     => 'Published Packagist Packages',
                    'number'    => $packagistVendorPackagesCount,
                    'increment' => '',
                    'delay'     => '',
                    'icon'      => 'fa fa-code',
                    'link'      => 'https://packagist.org/packages/jeremykenedy/'
                ],
                [
                    'title'     => 'Package Downloads',
                    'number'    => $packagistVendorsTotalDownloads,
                    'increment' => $packagistVendorsTotalDownloads / 500,
                    'delay'     => '150',
                    'icon'      => 'fa fa-heart',
                    'link'      => 'https://packagist.org/packages/jeremykenedy/',
                ],
                [
                    'title'     => 'Lines of Code Written',
                    'number'    => '9140852',
                    'increment' => '20000',
                    'delay'     => '300',
                    'icon'      => 'fa fa-coffee',
                    'link'      => 'https://sourcerer.io/jeremykenedy',
                ],
                [
                    'title'     => 'Open Source Commits',
                    'number'    => '1359',
                    'increment' => '10',
                    'delay'     => '450',
                    'icon'      => 'fa fa-trophy',
                    'link'      => 'https://sourcerer.io/jeremykenedy',
                ],
            ]),
        ];
    }

}
