@extends('layouts.app')

@section('title','Create Student')

@section('content')
<div class="p-5 text-gray-800 flex gap-2">
    <div class="max-w-lg p-5 rounded shadow-md bg-teal-100">
        <h1 class="text-2xl font-bold text-gray-700 text-center">Success Student Lists</h1>
        @foreach ($successemails as $successemail)
            <p class="text-gray-600">{{ $successemail }}</p>
        @endforeach
    </div>

    <div class="max-w-lg p-5 rounded shadow-md bg-rose-100">
        <h1 class="text-2xl font-bold text-gray-700 text-center">Error Student Lists</h1>
        @foreach ($erroremails as $erroremail)
            <p class="text-gray-600">{{ $erroremail }}</p>
        @endforeach
    </div>
</div>
<a href="{{ route('students.index') }}" class="px-4 py-2 bg-sky-500 rounded m-5 text-gray-600">Home</a>
@endsection
