<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\ImageCRUD;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ImageCRUDController extends Controller
{
    /**
     * Show the Image CRUD dashboard with records and categories.
     */
    public function imgCRUD(): View
    {
        $categories = Category::all();
        $dataImgCRUD = ImageCRUD::with('category')->orderBy('id', 'desc')->paginate(4);

        return view('forImgCRUD.imgCRUD', compact('dataImgCRUD', 'categories'));
    }

    /**
     * Store a new Image record.
     */
    public function imgStore(Request $request): RedirectResponse
    {
        $this->ValidationCheck($request);
        $data = $this->RequestData($request);

        if ($request->hasFile('image')) {
            $imgName = $request->image->getClientOriginalName();
            $fileName = uniqid().'.Aung.'.$imgName;
            $request->file('image')->move(public_path('images'), $fileName);
            $data['image'] = $fileName;
        }

        ImageCRUD::create($data);

        return redirect()->route('imgCRUD')->with('success', 'Product record added successfully!');
    }

    /**
     * Delete an existing Image record and its file.
     */
    public function imgDelete(int|string $id): RedirectResponse
    {
        $data = ImageCRUD::findOrFail($id);
        $oldImage = $data->image;

        if ($oldImage && file_exists(public_path('images/'.$oldImage))) {
            unlink(public_path('images/'.$oldImage));
        }

        $data->delete();

        return redirect()->route('imgCRUD')->with('success', 'Image record deleted successfully!');
    }

 
    /**
     * Display a specific Image record detail.
     */
    public function imgDetail(int|string $id): View
    {
        $dataImg = ImageCRUD::with('category')->find($id);

        return view('forImgCRUD.imgDetail', compact('dataImg'));
    }

    //Edit Page
    public function imgEditPage(int|string $id): View
    {
        $categories = Category::all();
        $dataImg = ImageCRUD::with('category')->find($id);

        return view('forImgCRUD.imgEdit', compact('dataImg', 'categories'));
    }

    //update image

    public function updateImg(Request $request){
       
      $this->ValidationCheck($request,true);

      $id = $request->id;
      $oldData=ImageCRUD::findOrFail($id);
      $oldImage=$oldData->image;
      

      
      if($request->hasFile('new_image')){
        $newImageName=$request->new_image->getClientOriginalName();
          
        //Delete old image
        if(file_exists(public_path('/images/'.$oldData->image))){
            unlink(public_path('/images/'.$oldData->image));
        }
        //Save new image
        $updateImageName=uniqid().".AungUpdate.".$newImageName;
        $request->file('new_image')->move(public_path('/images/'), $updateImageName);
        $oldData['image']=$updateImageName;



       
      }
      else{
        $oldData['image']=$oldImage;
      }

       // Update product information
        $oldData->category_id = $request->category_id;
        $oldData->product_name = $request->product_name;
        $oldData->price = $request->price;
        $oldData->description = $request->description;

        // Save all changes
        $oldData->save();

        return redirect()->route('imgCRUD')->with('success', 'Image record updated successfully!');

        

    
    }


      
      //////////////////////////////////////////////////////////////////////////////////////////////

           /**
     * Validate the incoming request fields.
     */
    // public function ValidationCheck(Request $request): void
    // {
    //     $request->validate([
    //         'category_id' => 'required|exists:categories,id',
    //         'product_name' => 'required|string|max:255',
    //         'image' => 'required|image|mimes:jpeg,png,jpg,webp,gif|max:5120',
    //         'price' => 'required|integer|min:0',
    //         'description' => 'required|string',
    //     ]);
    // }
    public function ValidationCheck(Request $request, bool $isUpdate = false): void{
        $request->validate([
        'category_id' => 'required|exists:categories,id',
        'product_name' => 'required|string|max:255',

        'image' => $isUpdate
            ? 'prohibited'
            : 'required|image|mimes:jpeg,png,jpg,webp,gif|max:5120',

        'new_image' => $isUpdate
            ? 'nullable|image|mimes:jpeg,png,jpg,webp,gif|max:5120'
            : 'prohibited',

        'price' => 'required|integer|min:0',
        'description' => 'required|string',
    ]);
   }

    /**
     * Extract request data into an array.
     */
    private function RequestData(Request $request): array
    {
        return [
            'category_id' => (int) $request->category_id,
            'image' => $request->image,
            'product_name' => $request->product_name,
            'price' => (int) $request->price,
            'description' => $request->description,
        ];
    }
}
