<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    // public function __construct(
    //     protected UserRepository $users
    // ){}

    public function index() {

        // $users = $this->users->getAllUsers("test");


        return Inertia('Static/Register');

    }
}
