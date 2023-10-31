<?php

namespace App\Interfaces;

interface MessageRepositoryInterface
{
    // create user view
    public function sendMeesage($id);

    // store data in message table
    public function StoreMessage($request,$id);
}
