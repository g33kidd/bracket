<?php

namespace App\Http\Controllers\Api;

use App\Models\Game;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GamesController extends Controller
{

    public function __construct(Game $gameModel)
    {
        $this->gameModel = $gameModel;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $games = $this->gameModel->all();

        return response()->json($games->toArray());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
          'name' => 'required|max:255',
          'slug' => 'required|max:100',
          'short_name' => 'required|max:100'
        ]);

        $game = new $this->gameModel([
            'name' => $request->input('name'),
            'short_name' => $request->input('short_name'),
            'slug' => $request->input('slug'),
            'logo' => '',
            'banner' => ''
        ]);

        $game->save();
        $game->platforms()->attach($request->input('platforms'));

        return response()->json($game);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $game = $this->gameModel->find($id);

        if (!$game) {
            return $this->recordNotFound();
        }

        return response()->json($game);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $game = $this->gameModel->find($id);

        if (!$game) {
            return $this->recordNotFound();
        }

        // TODO: Add support for updating the platforms,
        // that is once testing has been added for
        // platforms.
        $game->name = $request->input('name');
        $game->short_name = $request->input('short_name');
        $game->slug = $request->input('slug');
        $game->logo = $request->input('logo');
        $game->banner = $request->input('banner');

        $game->save();

        return response()->json($game);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $game = $this->gameModel->find($id);

        if (!$game) {
            return $this->recordNotFound();
        }

        $game->delete();

        return response(null, 200);
    }
}
