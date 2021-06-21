<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Departement;

class DepartementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departements = Departement::all();

        return response()->json($departements);
    }
}
