<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PenggunaController extends Controller
{
    public function index()
    {
        $users = User::orderBy(
            'ID'
        )->get();
        return view(
            'pengguna.index',
            compact('users')
        );
    }
}
