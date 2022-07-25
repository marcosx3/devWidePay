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
    public function createWayView()
    {
        return view('pages.create');
    }
    public function createWay(WayRequestForm $request)
    {
        $url = $request->only('url');
        $way = new Way();
        $way->url = $url['url'];
        $way->user_id = Auth::user()->id;

        if ($way->save()) {
            return redirect()->route("way.list")->with('success', "URL cadastrada com sucesso!");
        }
        return redirect()->route("way.list")->with('error', "URL não cadastrada entre em contato com o suporte!");
    }
    public function listWayView()
    {
        $idUser = Auth::user()->getAuthIdentifier();
        $ways = Way::all()->where('user_id', $idUser);
        return view('pages.list', compact('ways'));
    }
    public function editWayView($id)
    {
        $way = Way::find($id);
        return view('pages.edit', compact('way'));
    }
    public function updateWay(WayRequestForm $request, Way $way, $id)
    {
        $aux = $request->only('url');
        $url = $aux['url'];
        $way = Way::find($id);
        $way->url = $url;
        if($way->update())
        {
            return redirect()->route('way.list')->with('success',"URL atualizada com sucesso.");
        }
        return redirect()->route('way.list')->with('error',"URL não atualizada entre em contato com o suporte!");
    }
    public function deleteWay($id, Way $way)
    {
        $way = Way::find($id);
        if($way->delete())
        {
            return redirect()->back()->with("success","URL deletada com sucesso.");
        }
        return redirect()->back()->with("error","URL não deletada.");
      
    }
}
