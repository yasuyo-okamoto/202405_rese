<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShopController extends Controller
{
  public function index()
  {
    return view('restaurant');
  }

  public function detail()
  {
    return view('detail');
  }

  public function mypage()
  {
    return view('mypage');
  }

  public function done()
  {
    return view('done');
  }
}
