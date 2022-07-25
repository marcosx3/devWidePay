<?php

namespace App\Http\Controllers;

use App\Http\Requests\WayRequestForm;
use App\Models\User;
use App\Models\Way;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WayController extends Controller
{
    public function __construct(Way $way, User $user)
    {
        $this->way = $way;
        $this->user = $user;
    }

    //visualizar pagina de criacao de url
    public function createWayView()
    {
        return view('pages.create');
    }

    // create way - ok
    public function createWay(WayRequestForm $request)
    {
        $url = $request->only('url');
        $way = new Way();
        $way->url = $url['url'];
        $way->user_id = Auth::user()->id;
        $way->save();

        $idUser = Auth::user()->getAuthIdentifier();
        $ways = Way::all()->where('user_id', $idUser);
        return view('pages.list', compact('ways'));
    }


    public function listWayView()
    {
        $idUser = Auth::user()->getAuthIdentifier();
        $ways = Way::all()->where('user_id', $idUser);
        return view('pages.list', compact('ways'));
    }

    //editar nao funfa
    public function editWayView($id)
    {
        $way = Way::find($id);
        return view('pages.edit', compact('way'));
    }

    public function updateWay(WayRequestForm $request,Way $way ,$id)
    {
        $aux = $request->only('url');
        $url = $aux['url'];
        $way = Way::find($id);
        $way->url = $url;
        $way->update();

        $idUser = Auth::user()->getAuthIdentifier();
        $ways = Way::all()->where('user_id', $idUser);
        return view('pages.list', compact('ways'));
    
    }
    
    public function deleteWay($id, Way $way)
    {
        $way = Way::find($id);
        $way->delete();
        return redirect()->back();
    }

}
