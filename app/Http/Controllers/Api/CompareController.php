<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompareRequest;
use App\Interfaces\WeatherLoaderInterface;
use App\Managers\CompareManager;
use Symfony\Component\HttpFoundation\Response;

class CompareController extends Controller
{
    /** @var WeatherLoaderInterface */
    private $loader;

    /** @var CompareManager */
    private $compareManager;

    public function __construct(WeatherLoaderInterface $loader, CompareManager $compareManager)
    {
        $this->loader = $loader;
        $this->compareManager = $compareManager;
    }

    public function __invoke(CompareRequest $request) : Response
    {
        // TODO:

        return \response()->json([], Response::HTTP_OK);
    }
}
