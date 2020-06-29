<?php

namespace I9w3b\ListRoutes\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use I9w3b\ListRoutes\Entities\ListRoutes;

class ListRoutesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(config('listroutes.middleware'));
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
      $ListRoutes = new ListRoutes;
      return view('listroutes::index', compact('ListRoutes'));
    }

}
