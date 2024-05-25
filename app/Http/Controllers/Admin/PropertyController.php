<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PropertyRequest;
use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.properties.index', [
            'properties' => Property::orderBy('created_at', 'desc')->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $property = new Property();
        // $property->surface = 150;

        $property->fill([
            'surface' => 40,
            'rooms' => 3,
            'bedrooms' => 1,
            'floor' => 0,
            'price' => 0,
            'city' => 'Tanger',
            'postal_code' => 90000
            // 'solde' => false,
        ]);

        return view('admin.properties.form', [
            'property' => $property
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PropertyRequest $request)
    {
        // dd($request);

        $property = Property::create($request->validated());
        return to_route('admin.properties.index')->with('success', 'Le bien a bien été créé');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Property $property)
    {
        return view('admin.properties.form', ['property' => $property]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PropertyRequest $request, Property $property)
    {
        // dd($request);
        $property->update($request->validated());
        return to_route('admin.properties.index')->with('success', 'Le bien a bien été modifié');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Property $property)
    {
        // $property = Property::find($id);
        $property->delete();
        return to_route('admin.properties.index')->with('success', 'Le bien a bien été archivé');
    }

    public function restorePost($id)
    {
        $property = Property::withTrashed()->find($id);
        $property->restore(); // This restores the soft-deleted property
        return to_route('admin.properties.index')->with('success', 'Le bien a bien été activé');
    }

    public function forceDelete($id)
    {
        // If you have not deleted before
        $property = Property::find($id);

        // If you have soft-deleted it before
        $property = Property::withTrashed()->find($id);

        $property->forceDelete(); // This permanently deletes the property for ever!

        return to_route('admin.properties.index')->with('success', 'Le bien a bien été supprimer');
    }
}
