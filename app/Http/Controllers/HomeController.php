<?php

namespace App\Http\Controllers;

use App\Models\ClientsWork;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class HomeController extends Controller
{

    public function index()
    {
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
    }


    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }

    public function getDataClients(Request $request)
    {
        if ($request->ajax()) {

            $clientsWorks = ClientsWork::with('medicalcenter', 'doctor', 'typeworks', 'status')
                ->select('clients_works.*');

            return DataTables::of($clientsWorks)
                ->addColumn('actions', 'actions.action')
                ->rawColumns(['actions'])
                ->make(true);
        }
        return view('system.index');
    }
}


//join('medical_centers', 'clients_works.medical_center_id', '=', 'medical_centers.id')
//->select('clients_works.*', 'medical_centers.name AS medicalCenter')