<?php

namespace App\Http\Controllers;

use App\Http\Clients\CourseAdsClient;
use App\Http\Controllers\Controller;
use App\Http\Requests\SearchAdvanceRequest;

class CourseAdsController extends Controller
{
    private $courseAdsClient;
    public function __construct()
    {
        $this->courseAdsClient = new CourseAdsClient();
      
    }

    public function searchAdvanceCourseAds(SearchAdvanceRequest $request)
    {  
        return $this->courseAdsClient->SearchAdvanceCourseAds($request->validated());
    }
    public function getAllCourseAds()
    {  
        return $this->courseAdsClient->getAllCourseAds();
    }
    public function getCourseAdsById(string $id)
    {
        return $this->courseAdsClient->getCourseAdsById($id);
    }
}


