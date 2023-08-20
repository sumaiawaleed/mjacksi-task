<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\NoteDataTable;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use App\Models\Note;
use App\Models\User
;

class NoteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(NoteDataTable $dataTable,Request $request){
        $data['title'] = "note Notes";
        return $dataTable->render('dashboard.notes.index',compact('data'));
    }

    private function validate_page($request,$data = '')
    {
        $rules = [
            'note_details' => 'required',
            'image' => 'image|nullable',

        ];

        $validator = Validator::make($request->all(), $rules);

        return $validator;

    }

    public function show($id){
        $form_data = Note::findOrFail($id);
        return json_encode($form_data);
    }

    public function store(Request $request)
    {
        $validator = $this->validate_page($request);
        if ($validator->fails()) {
            return response()->json(array(
                'success' => false,
                'errors' => $validator->getMessageBag()->toArray()

            ), 200);
        } else {

            $request_data= [
                'note_details' => $request->note_details,
                'user_id' => auth()->user()->id,
            ];

            if($request->image){
                $png_url = "img-" . time() . ".png";
                $path = public_path() . '/uploads/notes/' . $png_url;
                Image::make(file_get_contents($request->image))->save($path);
                $request_data['image'] = $png_url;
            }

            Note::create($request_data);
            return response()->json(array('success' => true), 200);
        }
    }

    public function edit($id)
    {
        $form_data = Note::findOrFail($id);
        $returnHTML = view('dashboard.notes.partials._edit',compact('form_data'))->render();
        return $returnHTML;
    }

    public function update($id,Request $request)
    {
        $note = Note::findOrFail($request->id);
        $validator = $this->validate_page($request,$note);
        if ($validator->fails()) {
            return response()->json(array(
                'success' => false,
                'errors' => $validator->getMessageBag()->toArray()

            ), 200);
        } else {
            $request_data= [
                'note_details' => $request->note_details,
                'user_id' => auth()->user()->id,
            ];
            if($request->image){
                if($note->image){
                    Storage::disk('public_uploads')->delete('/notes/' . $note->image);
                }
                $png_url = "img-" . time() . ".png";
                $path = public_path() . '/uploads/notes/' . $png_url;
                Image::make(file_get_contents($request->image))->save($path);
                $request_data['image'] = $png_url;
            }

            $note->update($request_data);
            return response()->json(array('success' => true), 200);
        }
    }

    public function remove($id)
    {
        $note = Note::findOrFail($id);
        $note->delete();
        return response()->json(array('success' => true));
    }
}
