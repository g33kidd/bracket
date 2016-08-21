<?php

namespace App\Http\Controllers\Api;

use App\Models\Platform;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PlatformsController extends Controller
{

    public function __construct(Platform $platformModel)
    {
        $this->platformModel = $platformModel;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $platforms = $this->platformModel->all();

        return response()->json($platforms->toArray());
    }

    /**
     * Store a newly created resource in storage.
     *
     * TODO: Add the banners and logos here...
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

        $platform = new $this->platformModel([
            'name' => $request->input('name'),
            'short_name' => $request->input('short_name'),
            'slug' => $request->input('slug'),
            'logo' => '',
            'banner' => ''
        ]);
        $platform->save();

        return response()->json($platform);
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
        $platform = $this->platformModel->find($id);

        if (!$platform) {
            return $this->recordNotFound();
        }

        return response()->json($platform);
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
        $this->validate($request, [
            'name' => 'required|max:255',
            'slug' => 'required|max:100',
            'short_name' => 'required|max:100'
        ]);

        $platform = $this->platformModel->find($id);

        if (!$platform) {
            return $this->recordNotFound();
        }

        $platform->name = $request->input('name');
        $platform->short_name = $request->input('short_name');
        $platform->slug = $request->input('slug');
        $platform->logo = $request->input('logo');
        $platform->banner = $request->input('banner');

        $platform->save();

        return response()->json($platform);
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
        $platform = $this->platformModel->find($id);

        if (!$platform) {
            return $this->recordNotFound();
        }

        $platform->delete();

        return response(null, 200);
    }
}
