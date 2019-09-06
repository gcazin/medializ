<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    /**
     * Page d'administration
     *
     * @return string|void
     */
    public function index()
    {
        return (User::isAdmin()) ? view('admin.index') : abort('403', 'Non autorisé');
    }

}
