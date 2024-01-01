<?php

namespace App\Http\Clients;


class CourseAdsClient extends BaseClients{
    private $COURSEADS='course_ads';

    public function SearchAdvanceCourseAds($body = [])
    {  
        return $this->sendApiRequest("GET",$this->COURSEADS.'/getAll',$body);
    }
    public function getAllCourseAds()
    {  
        return $this->sendApiRequest("GET",$this->COURSEADS);
    }
    public function getCourseAdsById(string $id)
    {
        return $this->sendApiRequest("GET",$this->COURSEADS.'/'.$id);
    }
}