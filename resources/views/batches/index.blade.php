@extends('layouts.app')

@section('title','Batches')

@section('content')
<div class="p-5 text-gray-800">
    <div class="max-w-2xl">
        <div class="flex justify-between items-center my-3">
            <h1 class="text-2xl font-bold">Batches</h1>
            <a href="{{ route('batches.create') }}" class="px-4 py-2 bg-sky-400 text-gray-200 rounded">Create</a>
        </div>
        <table class="w-full rounded overflow-hidden">
            <thead>
                <tr class="bg-sky-100">
                    <th class="w-[10%]">No</th>
                    <th class="">Batch Name</th>
                    <th class="w-1/5">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($batches as $batch)
                    <tr class="">
                        <td class="text-center h-10">{{ $loop->iteration }}</td>
                        <td class="px-4 h-10">{{ $batch->name }}</td>
                        <td class="h-10 flex items-center justify-center gap-3">
                            <a href="{{ route('batches.edit',$batch->id) }}" class="text-lime-500 text-xl"><i class="fi fi-br-pen-square"></i></a>
                            <form action="{{ route('batches.destroy',$batch->id) }}" method="POST">
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