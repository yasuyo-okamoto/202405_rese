<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Storage;
use App\Models\Area;
use App\Models\Genre;
use App\Models\Favorite;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
  public function index(Request $request)
  {
    $restaurants = Restaurant::with(['area', 'genre'])->get();

    return view('restaurant', compact('restaurants'));
    }

  public function search(Request $request)
  {
    $areas = Area::all();
    $genres = Genre::all();
    $area_id = $request->input('area_id');
    $genre_id = $request->input('genre_id');
    $search_name = $request->input('search_name');

    $query = Restaurant::query();

    if ($area_id) {
            $query->where('area_id', $area_id);
        }

    if ($genre_id) {
            $query->where('genre_id', $genre_id);
        }

    if ($search_name) {
            $query->where('name', 'like', '%' . $search_name . '%');
        }

    $restaurants = $query->get();

    return view('restaurant', [
      'restaurants' => $restaurants,
      'areas' => $areas,
      'genres' => $genres,
      'selected_area_id' => $area_id,
      'selected_genre_id' => $genre_id,
      'search_name' => $search_name,
      'request' => $request
      ]);
  }


  public function detail($restaurant_id)
  {
    $restaurant = Restaurant::with('area', 'genre')->findOrFail($restaurant_id);
    return view('detail', compact('restaurant'));
  }

  public function add(Request $request, $restaurant_id)
    {
      $user = Auth::user();
      $restaurant = Restaurant::findOrFail($restaurant_id);

      $favorite = new Favorite();
      $favorite->user_id = $user->id;
      $favorite->restaurant_id = $restaurant->id;
      $favorite->save();

      return redirect()->back()->with('success', 'お気に入りに追加しました。');
    }

    public function remove(Request $request, $restaurant_id)
    {
      $user = Auth::user();
      $restaurant = Restaurant::findOrFail($restaurant_id);

      $user->favorites()->where('restaurant_id', $restaurant->id)->delete();

      return redirect()->back()->with('success', 'お気に入りから削除しました。');
    }

  //public function reserve(Request $request, $restaurant_id)
    //{
      //$request->validate([
        //'date' => 'required|date',
        //'time' => 'required|date_format:H:i',
        //'num_people' => 'required|integer|min=1',
      //]);

      //Reservation::create([
        //'user_id' => auth()->id(),
        //'restaurant_id' => $restaurant_id,
        //'date' => $request->date,
        //'time' => $request->time,
        //'num_people' => $request->num_people,
      //]);

      //return redirect()->route('done');
    //}



  public function mypage()
  {
    return view('mypage');
  }

  public function menu()
    {
      if (Auth::check()) {
        return view('partials.menu_logged_in');
        } else {
          return view('partials.menu_logged_out');
        }
    }
}
