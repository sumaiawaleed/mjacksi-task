<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Note;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;


class NoteController extends Controller
{
    public function index(Request $request)
    {
        try {
            $data['result'] = true;
            $data['notes'] = Note::where('user_id', auth()->user()->id)->paginate(30);
            return response()->json($data);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function admin(Request $request)
    {
        try {
            $data['result'] = true;
            $data['notes'] = Note::whereIn('user_id', User::where('type',2)->get()->pluck('id')->toArray())->paginate(30);
            return response()->json($data);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    private function validate_page($request, $data = '')
    {
        $rules = [
            'note_details' => 'required',

        ];


        $validator = Validator::make($request->all(), $rules);

        return $validator;

    }


    public function store(Request $request)
    {
        try {
            $validator = $this->validate_page($request);
            if ($validator->fails()) {
                return response()->json(
                    array(
                        'success' => false,
                        'errors' => $validator->getMessageBag()->toArray()

                    ), 200);
            } else {

                $request_data = [
                    'note_details' => $request->note_details,
                    'user_id' => auth()->user()->id,
                ];

                if ($request->image) {
                    $png_url = "img-" . time() . ".png";
                    $path = public_path() . '/uploads/notes/' . $png_url;
                    Image::make(file_get_contents($request->image))->save($path);
                    $request_data['image'] = $png_url;
                }

                Note::create($request_data);
                return response()->json(array('success' => true), 200);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function update($id,Request $request)
    {
        $note = Note::findOrFail($id);

        if($note->user_id != auth()->user()->id){
            return response()->json(array('success' => true), 200);
        }
        try {
            $validator = $this->validate_page($request);
            if ($validator->fails()) {
                return response()->json(
                    array(
                        'success' => false,
                        'errors' => $validator->getMessageBag()->toArray()

                    ), 200);
            } else {

                $request_data = [
                    'note_details' => $request->note_details,
                    'user_id' => auth()->user()->id,
                ];

                if ($request->image) {
                    $png_url = "img-" . time() . ".png";
                    $path = public_path() . '/uploads/notes/' . $png_url;
                    Image::make(file_get_contents($request->image))->save($path);
                    $request_data['image'] = $png_url;
                }

                $note->update($request_data);
                return response()->json(array('success' => true), 200);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function destroy($id)
    {
        $note = Note::findOrFail($id);
        $note->delete();
        return response()->json(array('success' => true));
    }
}