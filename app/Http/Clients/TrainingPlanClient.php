<?php

namespace App\Http\Clients;

use App\Models\TrainingPlan;

class TrainingPlanClient extends BaseClients
{
    private $TrainingPlan='training_plan' ;

    public function getAllTrainingPlans()
    {
        $language = request()->header('Accept-Language', 'en');

        return $this->sendApiRequest('GET',$this->TrainingPlan, [], [], [
            'Accept-Language' => $language
        ]);
    }
    public function getTrainingPlanById(string $id){
        $language = request()->header('Accept-Language', 'en');

        return $this->sendApiRequest('GET',$this->TrainingPlan.'/'.$id, [], [], [
            'Accept-Language' => $language
        ]);
    }
    public function getLastTrainingPlan(){
        $language = request()->header('Accept-Language', 'en');


        return $this->sendApiRequest('GET',$this->TrainingPlan.'/get_last', [], [], [
            'Accept-Language' => $language
        ]);
    }

}
