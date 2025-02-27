<?php

namespace App\Http\Clients;


class CourseAdsClient extends BaseClients{
    private $COURSEADS='course_ads';

    public function SearchAdvanceCourseAds($body = [])
    {
        $language = request()->header('Accept-Language', 'en');

        return $this->sendApiRequest("GET",$this->COURSEADS.'/getAll',$body, [],[
            'Accept-Language' => $language
        ]);
    }
    public function getAllCourseAds()
    {
        $language = request()->header('Accept-Language', 'en');

        return $this->sendApiRequest("GET",$this->COURSEADS, [], [], [
            'Accept-Language' => $language
        ]);
    }
    public function getCourseAdsById(string $id)
    {
        $language = request()->header('Accept-Language', 'en');

        return $this->sendApiRequest("GET",$this->COURSEADS.'/'.$id, [], [], [
            'Accept-Language' => $language
        ]);
    }
    public function getMapFilterCourse()
    {
        $language = request()->header('Accept-Language', 'en');

        return $this->sendApiRequest("GET",$this->COURSEADS.'/getMap/filterCourse', [], [], [
            'Accept-Language' => $language
        ]);
    }
}
