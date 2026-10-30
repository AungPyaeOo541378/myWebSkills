<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ImageCRUD;

class ImageCRUDController extends Controller
{
    //for Image CRUD
    public function imgCRUD()
    {
         $dataImgCRUD = ImageCRUD::select('*')->orderBy('id', 'desc')->paginate(4); // show 5 records per page

        return view('forImgCRUD.imgCRUD',compact('dataImgCRUD'));
    }

    //for Image Store
    public function imgStore(Request $request){
        $data=$this->ValidationCheck($request);
        $data=$this->RequestData($request);
        $imgTitle=$request->title;
        if($request->hasFile('image')){
             $imgName=$request->image->getClientOriginalName();
             $fileName=uniqid().'.Aung.'.$imgName;
             $request->file('image')->move(public_path().'/images', $fileName);
             $data['image']=$fileName;
            

            
        }
        ImageCRUD::create($data);
        return redirect()->route('imgCRUD')->with('success', 'Image added successfully!');
    }

   public function imgDelete($id)
   {
            
            $data = ImageCRUD::find($id);
            $oldImage=$data->image;
            
            if(file_exists(public_path().'/images/'.$oldImage)){
                unlink(public_path().'/images/'.$oldImage);
            }
            ImageCRUD::where('id', $id)->delete();
            return redirect()->route('imgCRUD')->with('success', 'Image deleted successfully!');

           
           
   }

   public function ValidationCheck($request){
            $request->validate([
                'title'=>'required',
                'image'=>'required',
            ]);
            return[
                'title'=>$request->title,
                'image'=>$request->image,
            ];
   }

  public function imgDetail($id)
  {
     $dataImg = ImageCRUD::find($id);

     return view('forImgCRUD.imgDetail',compact('dataImg'));
  }

    public function RequestData($request){
        return[
            'title'=>$request->title,
            'image'=>$request->image,
        ];
    }
        
}
