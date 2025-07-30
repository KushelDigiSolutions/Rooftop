<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SupplierCollection;
use App\Models\Supplier;
use Illuminate\Support\Facades\Auth;

class SupplierCollectionController extends Controller
{
    public function index()
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Please login to access this page.');
        }

        $userRole = Auth::user()->getRoleNames()->first();

        $allowedRoles = ['Super Admin', 'Admin'];
        if (!in_array($userRole, $allowedRoles)) {
            return redirect()->route('login')->with('error', 'You do not have permission to access this page.');
        }
        
        $suppliers = Supplier::orderBy('id', 'desc')->get();
        $collections = SupplierCollection::with('supplier')->latest()->get();
        return view('admin.master.suppliercollection', compact('collections', 'suppliers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'supplier_id' => 'required|exists:suppliers,id', // Ensure supplier_id is required and exists
            'collection_name' => 'required|max:255|unique:supplier_collections,collection_name',
        ]);

        SupplierCollection::create([
            'supplier_id' => $request->supplier_id, // Store supplier_id
            'collection_name' => $request->collection_name,
        ]);

        return redirect()->route('supplier-collections.index')->with('success', 'Supplier Collection added successfully.');
    }

    public function edit($id)
    {
        $collection = SupplierCollection::with('supplier')->findOrFail($id);
        return response()->json($collection);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'supplier_id' => 'required|exists:suppliers,id', // Ensure supplier_id is required and exists
            'collection_name' => 'required|max:255|unique:supplier_collections,collection_name,' . $id,
        ]);

        $collection = SupplierCollection::findOrFail($id);
        $collection->update([
            'supplier_id' => $request->supplier_id, // Update supplier_id
            'collection_name' => $request->collection_name,
        ]);

        return redirect()->route('supplier-collections.index')->with('success', 'Supplier Collection updated successfully.');
    }


    // Remove the specified supplier collection from the database
    public function destroy($id)
    {
        $collection = SupplierCollection::findOrFail($id);
        $collection->delete();

        return redirect()->route('supplier-collections.index')->with('success', 'Supplier Collection deleted successfully');
    }
}
