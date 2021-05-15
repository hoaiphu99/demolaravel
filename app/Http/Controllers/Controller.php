<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Psr\Http\Message\ResponseInterface;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Promise;
use GuzzleHttp\Pool;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function testController(Request $request) {
        $file = $request->file('image');

        $type = $file->getClientOriginalExtension();
        $name = time().'.'.$type;
        $path = public_path().'/assets/images/';

        $file->move($path, $name);
        $path_1 = $path.$name;
        $data = file_get_contents($path_1);
        $base64_data = base64_encode($data);
        $base64String = 'data:image/' . $type . ';base64,' . $base64_data;

        dd($base64String);
    }
}
