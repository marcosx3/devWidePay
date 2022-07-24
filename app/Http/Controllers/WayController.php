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

    public function updateWay(WayRequestForm $request, $id)
    {
        $way = $request->only('url');
        DB::table('ways')
            ->where('id', $id)
            ->update([
                'url' => $way['url']
            ]);

        return redirect()->back();
    }

    public function deleteWay($id)
    {
        $way = Way::find($id);
        DB::table('ways')
            ->where('id', $id)
            ->delete();
        return redirect()->back();
    }
}
