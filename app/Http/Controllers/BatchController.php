<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBatchRequest;
use App\Http\Requests\UpdateBatchRequest;
use App\Models\Batch;

class BatchController extends Controller
{
    public function index()
    {
        $batches = Batch::all();
        return view('batches.index',compact('batches'));
    }

    public function create()
    {
        return view('batches.create');
    }

    public function store(StoreBatchRequest $request)
    {
        Batch::create([
            'name' => $request->name
        ]);

        return redirect()->route('batches.index');
    }

    public function edit(Batch $batch)
    {
        return view('batches.edit',compact('batch'));
    }

    public function update(UpdateBatchRequest $request, Batch $batch)
    {
        $batch->update([
            'name' => $request->name,
        ]);

        return redirect()->route('batches.index');
    }

    public function destroy(Batch $batch)
    {
        $batch->delete();
        return redirect()->route('batches.index');
    }
}
