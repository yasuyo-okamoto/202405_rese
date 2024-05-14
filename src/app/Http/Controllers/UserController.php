<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
  public function create()
  {
  return view('register');
  }

  public function login()
  {
    return view('login');
  }

  public function thanks()
  {
    return view('thanks');
  }
}
