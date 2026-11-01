<?php

namespace App\Http\Controllers;

use App\Models\TextCRUD;
use Illuminate\Http\Request;

class TextCRUDController extends Controller
{
    // user show data
    public function textCRUD()
    {
        $textCRUD = TextCRUD::select('*')
            ->orderBy('id', 'desc')
            ->paginate(3);

        return view('forTextCRUD.textCRUD', compact('textCRUD'));
    }

    // create data for user to DataBase
    public function textStore(Request $request)
    {
        $this->validation($request);
        $data = $this->requestData($request);
        TextCRUD::create($data);

        return redirect()->route('textCRUD')->with('success', 'Text data created successfully!');
    }

    // Text Details
    public function textDetail($id)
    {
        $data = TextCRUD::find($id);

        return view('forTextCRUD.textDetail', compact('data'));
    }

    // text Edit Page
    public function textEditPage($id)
    {
        $dataID = TextCRUD::find($id);

        return view('forTextCRUD.textEdit', compact('dataID'));
    }

    // test edit process
    public function update(Request $request)
    {
        $data = $this->requestData($request);
        $id = $request->id;
        TextCRUD::where('id', $id)->update($data);

        return redirect()->route('textDetail', $id)->with('success', 'Text data updated successfully!');

    }

    // delete TextData
    public function textDelete($id)
    {
        $deleteData = TextCRUD::find($id);
        TextCRUD::where('id', $id)->delete();

        return redirect()->route('textCRUD')->with('success', 'Text data deleted successfully!');

    }

    // validation
    private function validation($request)
    {
        $validationRule = [
            'title' => 'required|string|max:100',
            'writer' => 'required|string|max:100',
            'description' => 'required|string|max:1000',
        ];
        $validationMessage = [
            'title.required' => 'Please enter title',
            'title.max' => 'Title must be less than 100 characters',
            'writer.required' => 'Please enter writer',
            'writer.max' => 'Writer must be less than 100 characters',
            'description.required' => 'Please enter description',
            'description.max' => 'Description must be less than 1000 characters',
        ];

        return $request->validate($validationRule, $validationMessage);
    }

    // private Data
    private function requestData($request)
    {
        return [
            'title' => $request->title,
            'writer' => $request->writer,
            'description' => $request->description,
        ];
    }
}
