<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Polygons;

class PolygonController extends Controller
{
    public function __construct()
    {
        $this->polygon = new Polygons();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //dilakukan perulangan
        $polygon = $this->polygon->polygons();
        foreach ($polygon as $p) {
            $feature[] = [
                'type'=> 'Feature',
                'geometry'=> json_decode($p->geom),
                'properties'=> [
                    'id' => $p->id,
                    'name'=> $p->name,
                    'description'=> $p->Description,
                    'image'=> $p->image,
                    'created_at' => $p->created_at,
                    'updated_at' => $p->updated_at
                ]
            ];
        }
        return response()->json([
            'type' => 'FeatureCollection',
            'features' => $feature,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'Geometry' => 'required',
            'image' => 'mimes:jpg,jpeg,png,tiff,gif[max:10000' //10MB
        ],
        [
            'name.required' => 'Name is required',
            'Geometry.required' => 'Location is required',
            'image.mimes' => 'Image must be a file of type: jpg, jpeg, png, tiff, gif',
            'image.max' => 'image must not exceed 10MB'
        ]);

            //create folder images
            if (!is_dir('storage/images')) {
                mkdir('storage/images', 0777);
            } //jika direktori images tidak tersedia (dia akan cek dl), maka dia harus membuat mkdir (make directory) storage images dengan permission foldernya 0777

           // upload image
           if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '_polygon.' . $image->getClientOriginalExtension();
            $image->move('storage/images', $filename);
           } else{
            $filename = null;
           }

           $data = [
            'name' => $request->name,
            'Description' => $request->Description,
            'Geometry' => $request->Geometry,
            'image' => $filename
        ];

            //create Polygon
            if(!$this->polygon->create($data)) {
                return redirect()->back()->with('error', 'Failed to create polygon');
            }

            //redirect to map
            return redirect()->back()->with('success', 'polygon created successfully');
        }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         //get image
         $image = $this->polygon->find($id)->image;
         //dd($image);
         //dd tidak menjalankan dibawahnya

         // delete point
         if (!$this->polygon->destroy($id)) {
             return redirect()->back()->with('error', 'Failed to delete polygon');
         }

         //delete image
         if ($image !=null) {
             unlink('storage/images/' . $image);
             //unlink untuk menghapus file
         }

         // redirect to map
         return redirect()->back()->with('succes', 'Polygon deleted succesfully');
    }
}
