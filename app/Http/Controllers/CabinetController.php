<?php

namespace App\Http\Controllers;

use App\Services\NovaPoshtaService;
use App\User;
use Illuminate\Http\Request;

class CabinetController extends Controller
{
    /**
     * @var NovaPoshtaService
     */
    public NovaPoshtaService $novaPoshtaService;

    /**
     * CheckoutController constructor.
     */
    public function __construct()
    {
        $this->novaPoshtaService = new NovaPoshtaService();
    }

    public function home()
    {
        $user = auth()->user();
        $cities = !empty($user->region) ? $this->getRegionCities($user->region) : [];
        $departaments = !empty($user->region) && !empty($user->cities) ? $this->getPostalOffices($user->cities, $user->region) : [];
        $regions = $this->getRegions();

        return view('cabinet.cabinet',
        [
            'user' => $user,
            'cities' => $cities,
            'departaments' => $departaments,
            'regions' => $regions
        ]);
    }

    public function orders()
    {
        return view('cabinet.orders');
    }

    public function getRegions()
    {
        $regions = $this->novaPoshtaService->getRegions();

        return $regions;
    }

    public function getRegionCities($region)
    {
        $cities = [];
        $isRegionExist = $this->checkRegion($region);

        if($isRegionExist){
            $cities = $this->novaPoshtaService
                ->getRegionCities($region);
        }

        return $cities;
    }

    public function getPostalOffices($city, $region)
    {
        $postalOffices = [];
        $isCityExist = $this->checkCity($region, $city);

        if($isCityExist){
            $postalOffices = $this->novaPoshtaService
                ->getPostalOffices($city, $region);
        }

        return $postalOffices;
    }

    public function checkRegion($region)
    {
        $result = false;
        $regions = $this->novaPoshtaService->getRegions();

        foreach($regions as $regionResponse){
            if($regionResponse == $region){
                $result = true;
            }
        }

        return $result;
    }

    public function checkCity($region, $city)
    {
        $result = false;
        $cities = $this->novaPoshtaService
            ->getRegionCities($region);
        foreach($cities as $cityResponse){
            if($cityResponse['name'] == $city){
                $result = true;
            }
        }

        return $result;
    }

    public function changeUser(Request $request)
    {
        $user = auth()->user();
        $form = $request->all();
        $user->phone = $form['phone'];
        $user->name = $form['firstName'];
        $user->department = $form['department'];
        $user->LastName = $form['lastName'];
        $user->region = $form['regions'];
        $user->cities = $form['cities'];
        $user->update();

        return response()->json([
            'result' => true
        ], 200);
    }
}
