<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vehicule;
use App\Destination;
use Illuminate\Support\Facades\Input;
use App\Voyage;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class VoyageController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $voyages = Voyage::with('destination')
      ->with('vehicule')
      ->get();

    // dd($voyages[0]->destination->destination_name);
    return view('voyage.index', compact('voyages'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    $vehicules = Vehicule::all();
    $destinations = Destination::with('arrets')->get();
    return view('voyage.create', compact('vehicules', 'destinations'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $r)
  {
    $voyage = new Voyage([
      'dateDep_voy' => Carbon::parse($r['dateDep_voy']),
      'dateArrv_voy' => Carbon::parse($r['dateArrv_voy']),
      'vehicule_id' => (int) $r['vehicule_id'],
      'destination_id' => (int) $r['destination_id'],
      'frais' => $r['frais']
    ]);

    // dd($voyage);
    $voyage->save();

    $destination = Destination::find((int) $r['destination_id']);
    // $destinationArrivee = Destination::find((int) $r['id_destination_arrivee']);

    return redirect()->route('voyage.create')->withStore('le voyage ' . $destination->destination_name . ' a ete bien enregistree');
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
  public function edit($id)
  { }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id)
  { }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  { }

  public function arretsDest()
  {
    $id_destination_arrivee = Input::get('id_destination_arrivee');

    $arretsDest = Destination::with('arrets')
      ->where('id', '=', (int) $id_destination_arrivee)
      ->get();
    // dd($arretsDest);
    return response()->json($arretsDest);
  }
}
