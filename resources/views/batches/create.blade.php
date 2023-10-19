@extends('layouts.app')

@section('title','Batches Create')

@section('content')
<div class="p-5 text-gray-800">
    <div class="max-w-lg p-5 border rounded shadow-md">
        <h1 class="text-2xl font-bold my-3">Create Batch</h1>
        <div>
            <form action="{{ route('batches.store') }}" method="POST">
                @csrf
                <x-form-input id="name" label="Batch Name" icon="fi fi-br-browser" type="text" name="name" />
                <div class="flex justify-end gap-3">
                    <a href="{{ route('batches.index') }}" class="bg-rose-700 px-4 py-2 rounded text-gray-200">Cancle</a>
                    <button class="bg-emerald-700 px-4 py-2 rounded text-gray-200">Create</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection