@extends('layouts.app')

@section('title','Programs')

@section('content')
<div class="p-5 text-gray-800">
    <div class="max-w-2xl">
        <div class="flex justify-between items-center my-3">
            <h1 class="text-2xl font-bold">Programs</h1>
            <a href="{{ route('programs.create') }}" class="px-4 py-2 bg-sky-400 text-gray-200 rounded">Create</a>
        </div>
        <table class="w-full rounded overflow-hidden">
            <thead>
                <tr class="bg-sky-100">
                    <th class="w-[10%]">No</th>
                    <th class="">Program Name</th>
                    <th class="w-1/5">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($programs as $program)
                    <tr class="">
                        <td class="text-center h-10">{{ $loop->iteration }}</td>
                        <td class="px-4 h-10">{{ $program->name }}</td>
                        <td class="h-10 flex items-center justify-center gap-3">
                            <a href="{{ route('programs.edit',$program->id) }}" class="text-lime-500 text-xl"><i class="fi fi-br-pen-square"></i></a>
                            <form action="{{ route('programs.destroy',$program->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="text-rose-500 text-xl"><i class="fi fi-br-trash-xmark"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection