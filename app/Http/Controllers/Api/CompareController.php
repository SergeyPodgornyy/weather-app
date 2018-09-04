<?php

namespace App\Http\Controllers\Api;

use App\Entities\CityCollection;
use App\Entities\WeatherCollection;
use App\Http\Controllers\Controller;
use App\Http\Requests\CompareRequest;
use App\Interfaces\WeatherLoaderInterface;
use App\Managers\CityManager;
use App\Managers\CompareManager;
use Symfony\Component\HttpFoundation\Response;

class CompareController extends Controller
{
    /** @var WeatherLoaderInterface */
    private $loader;

    /** @var CompareManager */
    private $compareManager;

    /** @var CityManager */
    private $cityManager;

    public function __construct(
        WeatherLoaderInterface $loader,
        CompareManager $compareManager,
        CityManager $cityManager
    ) {
        $this->loader = $loader;
        $this->compareManager = $compareManager;
        $this->cityManager = $cityManager;
    }

    public function __invoke(CompareRequest $request) : Response
    {
        /** @var CityCollection $cities */
        $cities = $this->cityManager->parse($request->query->get('cities'));

        /** @var WeatherCollection $weather */
        $weather = $this->loader->load($cities);

        return \response()->json(
            $this->compareManager->compare($weather),
            Response::HTTP_OK
        );
    }
}
