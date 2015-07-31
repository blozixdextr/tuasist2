<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App;
use Auth;
use Redirect;
use Session;
use App\Models\User;
use App\Models\Location;
use App\Models\Mappers\LocationMapper;
use App\Models\Mappers\CategoryMapper;

class TestController extends Controller
{

    public function test()
    {
        $caregoryMapper = new CategoryMapper();
        $str = 'courier service
handyman
construction works
cleaning services
domestic services
repair of equipment
distribution of leaflets
computer help
site development
work on the Internet
care for animals
organization of holidays
education
repetiroty
beauty and health';
        $locations = [];
        $l = explode("\n", $str);
        foreach ($l as $t) {
            $locations[] = trim($t);
        }

        $caregoryMapper->massAdd($locations, 0, 'category');
    }

}
