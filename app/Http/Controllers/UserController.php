<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\UserDataTable;
use App\Models\User;
use App\Models\Notification;
use App\Models\Note;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
     public function index(UserDataTable $dataTable,Request $request){
        $data['title'] = __('site.users');
        return $dataTable->render('dashboard.users.index',compact('data'));
    }

    public function notifications($user_id) {
        $user = User::findOrFail($user_id);
        $data['title'] =  $data['title'] = $user->name."'s notifications";

        $data['notifications'] = Notification::where('user_id',$user_id)->get();
        return view('dashboard.users.notifications.index',compact('data'));
    }

    public function notes($user_id) {
        $user = User::findOrFail($user_id);
        $data['title'] = $user->name."'s Notes";
        $data['notes'] = Note::where('user_id',$user_id)->get();
        return view('dashboard.users.notes.index',compact('data'));
    }

    private function validate_notes($request,$data = '')
    {
        $rules = [
            'title' => 'required',
            'description' => 'required',

        ];

        $validator = Validator::make($request->all(), $rules);

        return $validator;

    }

    public function store_notifications(Request $request) {
        $validator = $this->validate_notes($request);
        if ($validator->fails()) {
            return response()->json(array(
                'success' => false,
                'errors' => $validator->getMessageBag()->toArray()

            ), 200);
        } else {

            $request_data= [
                'title' => $request->title,
                'description' => $request->description,
                'user_id' => ($request->user_id) ? ($request->user_id) : null
            ];

            Notification::create($request_data);
            return response()->json(array('success' => true), 200);
        }
    }
}
