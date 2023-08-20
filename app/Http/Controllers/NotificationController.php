<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\NotificationDataTable;

class NotificationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(NotificationDataTable $dataTable,Request $request){
        $data['title'] = "General Notifications";
        return $dataTable->render('dashboard.notifications.index',compact('data'));
    }

}
