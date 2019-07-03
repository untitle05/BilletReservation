<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Arret;
use App\Destination;

class ArretController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $destinationArrets = Destination::with('arrets')->get();
    // dd($destinations);
    return view('arret.index', compact('destinationArrets'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    $destinations = Destination::all();
    return view('arret.create', compact('destinations'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $r)
  {

    $arret = new Arret([
      'nom_arret' => $r['nom_arret'],
      'destination_id' => (int) $r['destination_id']
    ]);

    // dd($arret->destination_id);
    $arret->save();
    return redirect()->route('arret.create')->withStore('l\'arret ' . $arret->nom_arret . ' a bien été enregistré');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  { }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit(Request $r)
  {
    $arret = Arret::find($r->id);
    return response()->json($arret);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id)
  { }

  public function updateArret(Request $r)
  {
    if ($r->ajax()) {
      $arret = Arret::find($r->id);
      $arret->nom_arret  = $r->nom_arret;
      $arret->destination_id = $r->destination_id;

      $arret->save();
      return response()->json($arret);
    }
  }
  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy(Request $r)
  {
    $arret = Arret::destroy($r->id);
  }
}
