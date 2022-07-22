<?php

namespace App\Http\Controllers;

use App\Http\Requests\WayRequestForm;
use App\Models\User;
use App\Models\Way;
use Illuminate\Support\Facades\DB;

class WayController extends Controller
{
    protected $user;
    protected $ways;

    public function __construct(User $user, Way $way)
    {
        $this->user = $user;
        $this->ways = $way;
    }

    //visualizar pagina de criacao de url
    public function createWayView()
    {
        return view('pages.create');
    }
    // create way
    public function createWay(WayRequestForm $request)
    {
        $ways = $request->only('way');
        $this->model->create($ways);
    }


    public function listWayView()
    {
        $ways = $this->ways->all();
        return view('pages.list', compact('ways'));
    }

    public function editWayView($id)
    {
        $way = Way::find($id);
        return view('pages.edit', compact('way'));
    }

    public function updateWay(WayRequestForm $request, $id)
    {
        $ways = $request->only('way');

        DB::table('ways')
            ->where('id', $id)
            ->update([
                'url' => $ways['way']
            ]);

        $ways = $this->ways->all();
        return view('pages.list', compact('ways'));
    }

    public function deleteWay($id)
    {
        $way = Way::find($id);
        DB::table('ways')
            ->where('id', $id)
            ->delete();
        $ways = $this->ways->all();
        return view('pages.list', compact('ways'));
    }
}
