<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Response;

class MessageController extends Controller
{
    public function index(): Response|ResponseFactory
    {
        return Inertia('Users/Message/Index');
    }

    public function store(Request $request)
    {

    }
}
