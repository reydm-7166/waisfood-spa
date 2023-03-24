<?php

namespace App\Repositories;

class UserRepository {
    public function getAllUsers(string $id){
        return ['user1', 'user2', 'user3', $id];
    }
}
