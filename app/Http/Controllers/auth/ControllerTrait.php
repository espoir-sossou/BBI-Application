<?php

namespace App\Http\Controllers\Auth;


trait ControllerTrait
{
    /**
     * @param array $data
     * @return boolean
     */
    public function apiResponseState(array $data)
    {
        if ($data['status'] === '0000') {
            return true;
        } elseif ($data['status'] === '0001') {
            abort(500);
        }
        return false;
    }


    public function apiResponseData(array $data)
    {
        return $data['data'];
    }

    public function apiResponseStatus(array $data)
    {
        return $data['status'];
    }

    public function apiResponseMessage(array $data)
    {
        return $data['message'];
    }
}
