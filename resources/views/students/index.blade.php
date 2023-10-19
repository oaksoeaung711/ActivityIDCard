@extends('layouts.app')

@section('title','Students')

@section('content')
<div class="p-5 text-gray-800">
    <div class="">
        <div class="flex justify-between items-center my-3">
            <h1 class="text-2xl font-bold">Students</h1>
            <a href="{{ route('students.create') }}" class="px-4 py-2 bg-sky-400 text-gray-200 rounded">Create</a>
        </div>
        <table class="w-full rounded overflow-hidden">
            <thead>
                <tr class="bg-sky-100">
                    <th class="text-xs">No</th>
                    <th class="text-xs">Image</th>
                    <th class="text-xs">Member ID</th>
                    <th class="text-xs">Name</th>
                    <th class="text-xs">Email</th>
                    <th class="text-xs">Phone</th>
                    <th class="text-xs">Program</th>
                    <th class="text-xs">Batch</th>
                    <th class="text-xs">Guardian Name</th>
                    <th class="text-xs">Date Of Birth</th>
                    <th class="text-xs">Emergency Phone 1</th>
                    <th class="text-xs">Emergency Phone 2</th>
                    <th class="text-xs">School Emergency Phone</th>
                    <th class="text-xs">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr class="text-xs">
                        <td class="text-center h-20">{{ $loop->iteration }}</td>
                        <td class="h-20 py-2">
                            @if (empty($student->studentprofilepicture))
                                <div class="w-20 h-20 rounded-full overflow-hidden border mx-auto">
                                    <img src="{{ asset('images/student.png') }}" alt="studentprofilepicture" class="h-full w-full" />
                                </div>
                            @else
                                <div class="w-20 h-20 rounded-full overflow-hidden border mx-auto">
                                    <img src="{{ asset($student->studentprofilepicture) }}" alt="studentprofilepicture" class="h-full w-full" />
                                </div>
                            @endif
                        </td>
                        <td class="px-4 h-20">KBTC-000001</td>
                        <td class="px-4 h-20">{{ $student->name }}</td>
                        <td class="px-4 h-20">{{ $student->email }}</td>
                        <td class="px-4 h-20">{{ $student->phone }}</td>
                        <td class="px-4 h-20">{{ $programs->find($student->program_id)->name }}</td>
                        <td class="px-4 h-20">{{ $batches->find($student->batch_id)->name }}</td>
                        <td class="px-4 h-20">{{ $student->guardianname }}</td>
                        <td class="px-4 h-20">{{ $student->dob }}</td>
                        <td class="px-4 h-20">{{ $student->emergencyphone1 }}</td>
                        <td class="px-4 h-20">{{ $student->emergencyphone2 }}</td>
                        <td class="px-4 h-20">{{ $student->schoolemergencyphone }}</td>
                        <td class="h-20 flex items-center justify-center gap-3">
                            <a href="{{ route('students.edit',$student->id) }}" class="text-lime-500 text-xl"><i class="fi fi-br-pen-square"></i></a>
                            <form action="{{ route('students.destroy',$student->id) }}" method="POST">
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