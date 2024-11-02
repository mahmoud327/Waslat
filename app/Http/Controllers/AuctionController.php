<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\City;
use App\Models\Feature;
use App\Models\RealEstate;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuctionController extends Controller
{
    //
    public function index()
    {
        $auctions = RealEstate::orderby('created_at','desc')->with('city')->get();
        return view('auctions.index', compact('auctions'));
    }
    public function create()
    {
        $auctions = RealEstate::latest()->with('city')->get();
        $cities = City::latest()->get();
        $features = Feature::get(); // Fetch all features

        $categories = Category::latest()->get();
        return view('auctions.create', compact('cities', 'categories', 'features'));
    }

    public function edit($id)
    {
        $real_estate = RealEstate::with(['city', 'user'])->findOrFail($id);
        $categories = Category::all();
        $users = User::all();
        $cities = City::all();
        $features = Feature::all(); // Fetch all features

        return view('auctions.edit', compact('real_estate', 'categories', 'users', 'cities','features'));
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'name_en' => 'required|string|max:255',
            'name_ar' => 'required|string|max:255',
            'description_en' => 'nullable|string',
            'description_ar' => 'nullable|string',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust as per your needs
            'plan' => 'nullable|file|mimes:pdf', // Assuming the plan is a PDF file
            'features' => 'nullable|array',
            'features.*' => 'exists:features,id', // Assuming features are linked to a features table
        ]);
        $request['user_id'] = auth()->id();


        // Create the RealEstate model using the data, excluding specific fields from the request
        $realEstate = RealEstate::create($request->except(['name_en', 'name_ar', 'description_en', 'description_ar', 'images', 'plan', 'features']));
        $request['unique_code']=$realEstate.rand(1000, 9999);

        $realEstate->unique_code = rand(1000, 9999);

        // Set translations for 'name' and 'description' using the request data
        $realEstate->setTranslation('name', 'en', $request->name_en)
            ->setTranslation('name', 'ar', $request->name_ar)
            ->setTranslation('description', 'en', $request->description_en)
            ->setTranslation('description', 'ar', $request->description_ar);

        $realEstate->save();

        // Attach features if any
        if ($request->has('features')) {
            $realEstate->features()->attach($request->features);
        }

        if ($request->hasFile('image')) {
            $realEstate->clearMediaCollection('images');
             $realEstate->addMedia($request->image)->toMediaCollection('images');
         }


        // Handle images
        if ($request->has('uploaded_images')) {
            $base64Images = json_decode($request->uploaded_images, true);
            foreach ($base64Images as $base64) {
                DB::table('media')->insert([
                    'name' => $base64, // استخدام اسم الصورة المحفوظة
                    'file_name' => $base64, // استخدام اسم الصورة المحفوظة
                    'model_type' => RealEstate::class, // نوع النموذج
                    'model_id' => $realEstate->id, // معرف النموذج
                    'collection_name' => 'images', // اسم المجموعة
                    'disk' => 'public', // نوع التخزين
                    'size' => strlen($base64), // حجم الصورة
                ]);
            }
        }
        if ($request->hasFile('plan')) {
            $realEstate->addMedia($request->file('plan'))->toMediaCollection('plans');
        }
        return redirect()->route('auctions.index')->with('success', 'Real estate property created successfully.');
    }

    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $request->validate([
            'name_en' => 'required|string|max:255',
            'name_ar' => 'required|string|max:255',
            'description_en' => 'nullable|string',
            'description_ar' => 'nullable|string',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust as per your needs
            'plan' => 'nullable|file|mimes:pdf', // Assuming the plan is a PDF file
            'features' => 'nullable|array',
            'features.*' => 'exists:features,id', // Assuming features are linked to a features table
        ]);

        // Find the existing real estate property
        $realEstate = RealEstate::findOrFail($id);

        // Update the RealEstate model using the data, excluding specific fields from the request
        $realEstate->fill($request->except(['name_en', 'name_ar', 'description_en', 'description_ar', 'images', 'plan', 'features']));

        // Set translations for 'name' and 'description' using the request data
        $realEstate->setTranslation('name', 'en', $request->name_en)
            ->setTranslation('name', 'ar', $request->name_ar)
            ->setTranslation('description', 'en', $request->description_en)
            ->setTranslation('description', 'ar', $request->description_ar);

        $realEstate->save();

        if ($request->hasFile('image')) {
            $realEstate->clearMediaCollection('images');
            $realEstate->addMedia($request->image)->toMediaCollection('images');
    }

        // Attach features if any
        if ($request->has('features')) {
            $realEstate->features()->sync($request->features); // Use sync to update existing features
        }

        // Handle uploaded images
        if ($request->has('uploaded_images')) {
            $base64Images = json_decode($request->uploaded_images, true);
            // Clear existing images if necessary
            // You might want to clear the existing media if this is a requirement
            // $realEstate->clearMediaCollection('images');

            foreach ($base64Images as $base64) {
                DB::table('media')->insert([
                    'name' => $base64, // Use the saved image name
                    'file_name' => $base64, // Use the saved image name
                    'model_type' => RealEstate::class, // Model type
                    'model_id' => $realEstate->id, // Model ID
                    'collection_name' => 'images', // Collection name
                    'disk' => 'public', // Storage type
                    'size' => strlen($base64), // Size of the image
                ]);
            }
        }

        // Handle the plan file
        if ($request->hasFile('plan')) {
            // Optionally delete the previous plan before adding a new one
            // $realEstate->clearMediaCollection('plans');
            $realEstate->addMedia($request->file('plan'))->toMediaCollection('plans');
        }

        return redirect()->route('auctions.index')->with('success', 'Real estate property updated successfully.');
    }

    public function toggleStatus($id)
    {
        $auction = RealEstate::findOrFail($id);
        $auction->is_active = !$auction->is_active; // Toggle the status
        $auction->save();
        return redirect()->route('auctions.index')->with('success', 'Auction status updated successfully!');
    }

    public function show($id)
    {
        $real_estate = RealEstate::with(['city', 'user'])->find($id);
        return view('auctions.show', compact('real_estate'));
    }
    public function destroy($id)
    {
        $real_estate = RealEstate::with(['city', 'user'])->delete($id);
        return back()->with('success', 'Auction status updated successfully!');
    }

    public function uploadImages(Request $request)
    {
        $uploadedImages = [];

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('images', 'public');
                $uploadedImages[] = basename($path); // إرجاع اسم الملف المحفوظ فقط
            }
        }
        return response()->json([
            'message' => 'Images uploaded successfully.',
            'paths' => $uploadedImages, // إرجاع مسارات الصور المرفوعة
        ]);
    }
}
