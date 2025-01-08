<?php

namespace App\Http\Clients;

class RegistrationClient extends BaseClients
{
    private $Registration='submit_courses';

    public function register(array $data)
    {
        return $this->sendApiRequest('POST', $this->Registration, $data);
    }

}
