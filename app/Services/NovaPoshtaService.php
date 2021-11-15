<?php


namespace App\Services;


use LisDev\Delivery\NovaPoshtaApi2;

class NovaPoshtaService
{
    /**
     * @var NovaPoshtaApi2
     */
    public $api;

    const CRIMEA = 'АРК';

    public function __construct()
    {
        $this->api = new NovaPoshtaApi2(env('NOVA_POSHTA_KEY', '817ec4b853860628914aef2d6a3c160e'));
    }

    public function getRegions($search = '')
    {
        $regions = $this->api->getAreas($search);

        try {
            $regions = $regions['data'];
        } catch (\Exception $e) {
            $regions = [];
        }
        $regionsWithoutArk = [];

        foreach ($regions as $region) {
            if ($region['DescriptionRu'] !== self::CRIMEA) {
                $regionsWithoutArk[] = $region['DescriptionRu'];
            }
        }
        return $regionsWithoutArk;
    }

    public function getRegionCities($region = '')
    {
        $cities = $this->api->getCity('', $region);

        try {
            $cities = $cities['data'];
        } catch (\Exception $e) {
            $cities = [];
        }
        $parseCities = [];

        foreach ($cities as $city) {
            $parseCities[] = [
                'name' => $city['DescriptionRu'],
                'ref' => $city['Ref']
            ];
        }
        return $parseCities;
    }

    public function getPostalOffices($cities, $region)
    {
        $city = $this->api->getCity($cities, $region);
        $parsePostalOffices = [];
        if($city['success']){
            $postalOffices = $this->api->getWarehouses($city['data'][0]['Ref']);

            if (!empty($postalOffices['data'])) {
                foreach ($postalOffices['data'] as $postalOffice) {
                    $parsePostalOffices[] = [
                        'id'   =>  $postalOffice['Ref'],
                        'name' =>  $postalOffice['DescriptionRu'],
                        'number' => $postalOffice['Number']
                    ];
                }
            }
        }
        return $parsePostalOffices;
    }
}
