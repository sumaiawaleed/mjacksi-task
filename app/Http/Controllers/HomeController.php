<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\NoteDataTableGeneral;
class HomeController extends Controller
{

    public function index(NoteDataTableGeneral $dataTable,Request $request){
        $data['title'] = "note Notes";
        return $dataTable->render('welcome',compact('data'));
    }
}
