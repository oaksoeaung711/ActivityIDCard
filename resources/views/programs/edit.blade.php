@extends('layouts.app')

@section('title','Programs Edit')

@section('content')
<div class="p-5 text-gray-800">
    <div class="max-w-lg p-5 border rounded shadow-md">
        <h1 class="text-2xl font-bold my-3">Edit Program</h1>
        <div>
            <form action="{{ route('programs.update',$program->id) }}" method="POST">
                @csrf
                @method('PUT')
                <x-form-input id="name" label="Program Name" icon="fi fi-br-browser" type="text" name="name" value="{{ $program->name }}" />
                <div class="flex justify-end gap-3">
                    <a href="{{ route('programs.index') }}" class="bg-rose-700 px-4 py-2 rounded text-gray-200">Cancle</a>
                    <button class="bg-emerald-700 px-4 py-2 rounded text-gray-200">Edit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection