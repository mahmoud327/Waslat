<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Blog;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    public function index()
    {
        $banners = Project::latest()->get();
        return view('projects.index', compact('banners'));
    }
    public function create()
    {
        return view('projects.create');
    }

    public function store(Request $request)
    {

        $banner = new Project();
        $banner->setTranslation('title', 'en', $request->title_en)
        ->setTranslation('title', 'ar', $request->title_ar)
        ->setTranslation('description', 'en', $request->description_en)
        ->setTranslation('description', 'ar', $request->description_ar);
        $banner->save();
        // $banner->active=$request->active;
        if ($request->hasFile('image')) {
           $banner->addMedia($request->file('image'))->toMediaCollection('projects/main_image');
       }

        if ($request->has('uploaded_images')) {
           $base64Images = json_decode($request->uploaded_images, true);
           // Clear existing images if necessary
           // You might want to clear the existing media if this is a requirement
           // $realEstate->clearMediaCollection('images');
           foreach ($base64Images as $base64) {
               DB::table('media')->insert([
                   'name' => $base64, // Use the saved image name
                   'file_name' => $base64, // Use the saved image name
                   'model_type' => Project::class, // Model type
                   'model_id' =>$banner->id, // Model ID
                   'collection_name' => 'projects', // Collection name
                   'disk' => 'public', // Storage type
                   'size' => strlen($base64), // Size of the image
               ]);
           }
       }

       if ($request->hasFile('plan')) {
        // Optionally delete the previous plan before adding a new one
        // $realEstate->clearMediaCollection('plans');
        $banner->addMedia($request->file('plan'))->toMediaCollection('plans');
    }
        return redirect(route('projects.index'))->with('message', __('lang.data_saved'));
    }
    public function destroy($id)
    {
        $banner = Project::findOrFail($id)->delete();
        return back()->with('message', __('lang.data_deleted'));
    }
    public function update(Request $request, $id)
    {
        $banner = Blog::findOrFail($id);
        $banner->setTranslation('title', 'en', $request->title_en)
        ->setTranslation('title', 'ar', $request->title_ar)
        ->setTranslation('description', 'en', $request->description_en)
        ->setTranslation('description', 'ar', $request->description_ar);
        $banner->videos=$request->videos;

        // $banner->active=$request->active;
        if ($request->hasFile('image')) {
            $banner->clearMediaCollection('blogs');
            $banner->addMedia($request->file('image'))->toMediaCollection('blogs');
        }
        $banner->save();
        return back()->with('message', __('lang.data_saved'));
    }


    public function uploadImages(Request $request)
    {
        $uploadedImages = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('projects', 'public');
                $uploadedImages[] = basename($path); // إرجاع اسم الملف المحفوظ فقط
            }
        }


        return response()->json([
            'message' => 'Images uploaded successfully.',
            'paths' => $uploadedImages, // إرجاع مسارات الصور المرفوعة
        ]);
    }



}
