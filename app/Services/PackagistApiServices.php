<?php

namespace App\Services;

use Cache;

class PackagistApiServices
{

    private $_baseUrl;
    private $_curlTimeout;
    private $_vendorListCacheKey;
    private $_vendorListCacheTime;
    private $_vendorItemCacheTime;

    private function curlPackagist()
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->_baseUrl,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => $this->_curlTimeout,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => [
                "Accept: application/json",
                "cache-control: no-cache"
            ],
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if ($err) {
            return null;
        }

        return $response;
    }

    /**
     * Check if packagist vendor list exists in the cache
     *
     * @return boolean
     */
    private function checkIfItemIsCached($key = null)
    {
        if(Cache::has($key)) {
            return true;
        }
        return false;
    }

    /**
     * Create the instance
     */
    public function __construct()
    {
        $this->_curlTimeout = 30;
        $this->_vendorListCacheKey = 'packagistVenforList';
        $this->_vendorListCacheTime = now()->addMinutes(1);
        $this->_vendorItemCacheTime = now()->addMinutes(1);
    }

    /**
     * Gets the packagist vendor repositories list.
     *
     * @param      <type>  $vendor  The vendor
     *
     * @return     <type>  The packagist vendor repositories list.
     */
    public function getPackagistVendorRepositoriesList($vendor = null)
    {
        if ($this->checkIfItemIsCached('packagistVenforList')) {
            return Cache::get($this->_vendorListCacheKey);
        }



        $this->_baseUrl = "https://packagist.org/packages/list.json?vendor=" . $vendor;
        $response       = $this->curlPackagist();
        $list           = collect(json_decode($response)->packageNames);

        Cache::put($this->_vendorListCacheKey, $list, $this->_vendorListCacheTime);

        return $list;
    }



    public function getVendorsTotalDownloads($vendor=null, $projects = null)
    {
        $vendorProjects = collect([]);

        foreach ($projects as $project) {
            $this->_baseUrl = "https://packagist.org/packages/jeremykenedy/laravel-blocker.json";

            if ($this->checkIfItemIsCached($project)) {
                $item = Cache::get($project);
            } else {
                $this->_baseUrl = "https://packagist.org/packages/".$project.".json";
                $item = json_decode($this->curlPackagist())->package;
                Cache::put($project, $item, $this->_vendorListCacheTime);
            }

            $vendorProjects[] = $item;
        }

        dd($vendorProjects);

    }

    // Cache::put('key', 'value', now()->addMinutes(10));   //Storing Items In The Cache
    // Cache::put('key', 'value', $seconds);                //Storing Items In The Cache
    // Cache::forever('key', 'value');                      //Storing Items Forever
    // Cache::add('key', 'value', $seconds);                //Store If Not Present
    // Cache::flush();

}
