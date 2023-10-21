@extends('layouts.app')

@section('title','Create Student')

@section('content')
<div class="p-5 text-gray-800">
    <div class="max-w-lg p-5 border rounded shadow-md">
        <h1 class="text-2xl font-bold my-3">Create Students</h1>

        <form action="{{ route('students.massstore') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="w-full text-xs flex">
                <input type="file" name="students" class="file:text-xs file:bg-gray-500 file:h-full file:border-0 file:text-gray-50 border border-gray-500 w-full h-10"/>
                <a href="#" class="h-10 px-2 border border-gray-500 flex items-center bg-gray-500 text-white">Example</a>
            </div>
            
            <div class="flex justify-end gap-3 w-full mt-5">
                <a href="{{ route('students.index') }}" class="px-4 py-2 border border-gray-500 text-xs text-gray-700 rounded-md">Cancle</a>
                <button class="px-4 py-2 bg-gray-500 text-xs text-white rounded-md">Submit</button>
            </div>
        </form>
    </div>
</div>
@endsection
