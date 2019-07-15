<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class PackagistApiServices
{
    private $_baseUrl;
    private $_curlTimeout;
    private $_maxRedirects;
    private $_vendorListCacheKey;
    private $_vendorListCacheTime;
    private $_vendorItemCacheTime;

    private function curlPackagist()
    {
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => $this->_baseUrl,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => $this->_maxRedirects,
            CURLOPT_TIMEOUT => $this->_curlTimeout,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => [
                "Accept: application/json",
                "cache-control: no-cache"
            ],
        ]);
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if ($err) {
            Log::error($err);
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
     * Set the vendor cache key
     *
     * @param string $key    The key
     */
    private function assignVendorCacheKey($key)
    {
        $this->_vendorListCacheKey = $key . "packagistVendorKey";
    }

    /**
     * Create the instance
     */
    public function __construct()
    {
        $this->_maxRedirects = config('packagistapi.curl.maxredirects');
        $this->_curlTimeout = config('packagistapi.curl.timeout');
        $this->_vendorListCacheTime = now()->addMinutes(config('packagistapi.caching.vendorListCacheTime'));
        $this->_vendorItemCacheTime = now()->addMinutes(config('packagistapi.caching.vendorItemCacheTime'));
    }

    /**
     * Gets the packagist vendor repositories list.
     *
     * @param string $vendor  The vendor
     *
     * @return collection The packagist vendor repositories list.
     */
    public function getPackagistVendorRepositoriesList($vendor = null)
    {
        if (!$vendor) {
            $vendor = config('packagistapi.vendor.default');
        }

        $this->assignVendorCacheKey($vendor);

        if ($this->checkIfItemIsCached($this->_vendorListCacheKey)) {
            return Cache::get($this->_vendorListCacheKey);
        }

        $this->_baseUrl = config('packagistapi.urls.vendorBase') . $vendor;
        $response       = $this->curlPackagist();
        $list           = collect(json_decode($response)->packageNames);

        Cache::put($this->_vendorListCacheKey, $list, $this->_vendorListCacheTime);

        return $list;
    }

    /**
     * Gets the vendor packages count.
     *
     * @param string $vendor  The vendor
     *
     * @return integer  The vendor packages count.
     */
    public function getVendorPackagesCount($vendor = null)
    {
        if (!$vendor) {
            $vendor = config('packagistapi.vendor.default');
        }

        return $this->getPackagistVendorRepositoriesList($vendor)->count();
    }

    /**
     * Gets the vendors packages details.
     *
     * @param string $vendor The vendor
     *
     * @return collection The vendors packages details.
     */
    public function getVendorsPackagesDetails($vendor = null)
    {
        if (!$vendor) {
            $vendor = config('packagistapi.vendor.default');
        }

        $this->assignVendorCacheKey($vendor);
        $projects = $this->getPackagistVendorRepositoriesList($vendor);
        $vendorProjects = collect([]);

        foreach ($projects as $project) {
            if ($this->checkIfItemIsCached($project)) {
                $item = Cache::get($project);
            } else {
                $this->_baseUrl = config('packagistapi.urls.projectPreFix').$project.config('packagistapi.urls.projectPostFix');
                $item = json_decode($this->curlPackagist())->package;
                Cache::put($project, $item, $this->_vendorListCacheTime);
            }
            $vendorProjects[] = $item;
        }

        return $vendorProjects;
    }

    /**
     * Gets the vendors total downloads.
     *
     * @param string $vendor    The vendor
     *
     * @return integer          The vendors total downloads.
     */
    public function getVendorsTotalDownloads($vendor = null)
    {
        if (!$vendor) {
            $vendor = config('packagistapi.vendor.default');
        }

        $totalDownloads = 0;
        $vendorProjects = $this->getVendorsPackagesDetails($vendor);

        foreach ($vendorProjects as $vendorProject) {
            $totalDownloads += $vendorProject->downloads->total;
        }

        return $totalDownloads;
    }

    /**
     * Gets the vendors total stars.
     *
     * @param string $vendor The vendor
     *
     * @return integer The vendors total stars.
     */
    public function getVendorsTotalStars($vendor = null)
    {
        if (!$vendor) {
            $vendor = config('packagistapi.vendor.default');
        }

        $totalStars = 0;
        $vendorProjects = $this->getVendorsPackagesDetails($vendor);

        foreach ($vendorProjects as $vendorProject) {
            $totalStars += $vendorProject->favers;
        }

        return $totalStars;
    }

}
