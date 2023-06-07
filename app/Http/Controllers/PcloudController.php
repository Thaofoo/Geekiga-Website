<?php
namespace App\Http\Controllers;
use Rbaskam\LaravelPCloud\App;
use Rbaskam\LaravelPCloud\Request;
use Illuminate\Http\Request as Req;

class PcloudController{

protected $pCloudApp;

public function __construct()
{
    $this->pCloudApp = new App();
    $this->pCloudApp->setAccessToken(config('laravel-pcloud.access_token'));
    $this->pCloudApp->setLocationId(config('laravel-pcloud.location_id'));
}

public function getVideo(){
    $method = "getvideolink";
    $params = [
        "path" => "/VID-20230603-WA0020.mp4"
    ];

    $request = new Request($this->pCloudApp);
    $response = $request->get($method, $params);
    return $response;
}

public function getFileID(String $slug){
    $method = "stat";
    $params = [
        "path" => "/" . $slug
    ];

    $request = new Request($this->pCloudApp);
    $response = $request->get($method, $params);
    return $response;
}

public function uploadVideo(Req $req){
    $method = "uploadfile";
    $params = [
        "path" => "/",
        "filename" => "testingname.jpg",
        "file" => $req->file,
       
    ];

    $request = new Request($this->pCloudApp);
    $response = $request->post($method, $params);
    return $response;
}

public function viewUpload(){
    return view("admin.uploadVideo", [
        "title" => "kontol"
    ]);
}

}



