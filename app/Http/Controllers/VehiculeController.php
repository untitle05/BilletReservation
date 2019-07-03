<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vehicule;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Storage;


class VehiculeController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $vehicules = Vehicule::all();

    return view('vehicule.index', compact('vehicules'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  { }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request)
  {
    // dd($request);
    if ($request->ajax()) {
      $vehicule = Vehicule::create($request->all());

      return Response()->json($vehicule);

    }
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
    $vehicule = Vehicule::find($r->id);
    return response()->json($vehicule);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function updateVehicule(Request $r)
  {
    // dd($r->all());
    if($r->ajax()){
      $vehicule = Vehicule::find($r->id);
      $vehicule->immat_vehi	= $r->immat_vehi;
      $vehicule->marque_vehi = $r->marque_vehi;
      $vehicule->model = $r->model;
      $vehicule->nbrPlace_vehi = $r->nbrPlace_vehi;
      $vehicule->vitesseMax = $r->vitesseMax;

      $vehicule->save();
      return response()->json($vehicule);
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
    // dd($r->id);
    Vehicule::destroy($r->id);
   }
}
