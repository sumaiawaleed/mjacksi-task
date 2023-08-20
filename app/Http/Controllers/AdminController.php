<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\DataTables\NoteDataTable;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(NoteDataTable $dataTable,Request $request){
        $data['title'] = "note Notes";
        return $dataTable->render('dashboard.notes.index',compact('data'));
    }

}
