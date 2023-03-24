<?php

namespace App\Repositories;

class UserRepository {
    public function validateUserRegistration(Array $id){
        return ['user1', 'user2', 'user3', $id];
    }
}
