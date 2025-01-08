<?php

namespace App\Http\Clients;

use App\Models\TrainingPlan;

class TrainingPlanClient extends BaseClients
{
    private $TrainingPlan='training_plan' ;

    public function getAllTrainingPlans()
    {
        return $this->sendApiRequest('GET',$this->TrainingPlan);
    }
    public function getTrainingPlanById(string $id){
        return $this->sendApiRequest('GET',$this->TrainingPlan.'/'.$id);
    }
    public function getLastTrainingPlan(){
        return $this->sendApiRequest('GET',$this->TrainingPlan.'/get_last');
    }

}
