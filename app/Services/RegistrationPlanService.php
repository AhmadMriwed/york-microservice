<?php

namespace App\Services;

use App\Http\Resources\PlanRegisterResource;
use App\Models\PlanRegister;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegistrationPlanUserMail;
use App\Mail\RegistrationPlanCompanyMail;

class RegistrationPlanService
{
    /**
     * Handle the registration process for a training plan.
     *
     * @param array $registrationDetails
     * @return PlanRegisterResource
     */
    public function registerOrUpdate(array $registrationDetails)
    {
        $this->addConstantValues($registrationDetails);

        $existingRegistration = PlanRegister::where('email', $registrationDetails['email'])->first();

        $planRegister = null;

        if ($existingRegistration) {
            $existingRegistration->update([
                'full_name' => $registrationDetails['full_name'],
                'phone' => $registrationDetails['phone'],
                'email' => $registrationDetails['email'],
                'plan_id' => $registrationDetails['training_plan_id'],
            ]);


            $planRegister = $existingRegistration;
        } else {

            $planRegister = PlanRegister::query()->create($registrationDetails);

        }


        Cookie::queue(Cookie::make('reg', 'yes', 3600));

        $this->sendEmails($registrationDetails);

        return $planRegister;
    }


    /**
     * Add constant values to registration details.
     *
     * @param array &$registrationDetails
     * @return void
     */
    protected function addConstantValues(array &$registrationDetails): void
    {
        $registrationDetails['title'] = 'Training Plan Registration Successful';
        $registrationDetails['sub_title'] = 'Welcome to Your Learning Journey with York British Academy';
        $registrationDetails['registration_time'] = now()->format('Y-m-d H:i:s');
    }

    /**
     * Send emails to the user and the company.
     *
     * @param array $registrationDetails
     * @return void
     */
    protected function sendEmails(array $registrationDetails): void
    {

        Mail::to($registrationDetails['email'])->send(new RegistrationPlanUserMail($registrationDetails));

        Mail::to('099450735z@gmail.com')->send(new RegistrationPlanCompanyMail($registrationDetails));
    }
}
