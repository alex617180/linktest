<?php

namespace App\Http\Controllers;

use App\Home;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public $home;

    public function __construct(Home $home)
    {
        $this->home = $home;
    }
    public function index(){
        return view('home');
    }
    public function getLink(Request $request){

        $url = $request->get('url');
        $value = $this->home->where('url', $url)->first();

        if(isset($value)){
            $shortKey = $value->short_key;
        }else {
            $shortKey = $this->home->getGeneratedKey();
            $this->home->create(['url' => $url, 'short_key' => $shortKey]);
        }

        $link = route('transition', ['key' => $shortKey]);

        return view('home', ['link' => $link]);
    }
    public function transitionToKey(Request $request){

        $value = $this->home->where('short_key', $request->path())->first();

        if(isset($value)){
            return redirect($value->url);
        }

        return redirect()->route('home');
    }
}
