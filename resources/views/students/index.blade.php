@extends('layouts.app')

@section('title','Students')

@section('content')
<div class="p-5 text-gray-800">
    <div class="">
        <div class="flex justify-between items-center my-3">
            <h1 class="text-2xl font-bold">Students</h1>
            <div class="">
                <a href="{{ route('students.create') }}" class="px-4 py-2 text-gray-500 rounded text-sm"><i class="fi fi-br-user-add"></i> Add A Student</a>
                <a href="{{ route('students.masscreate') }}" class="px-4 py-2 text-gray-500 rounded text-sm"><i class="fi fi-br-users-medical"></i> Add Multiple Students</a>
            </div>
        </div>
        <table class="w-full rounded overflow-hidden">
            <thead>
                <tr class="bg-sky-100">
                    <th class="text-xs">No</th>
                    <th class="text-xs w-40">Image</th>
                    <th class="text-xs">Member ID</th>
                    <th class="text-xs">Name</th>
                    <th class="text-xs">Email</th>
                    <th class="text-xs">Phone</th>
                    <th class="text-xs">Program</th>
                    <th class="text-xs">Batch</th>
                    <th class="text-xs">Campus</th>
                    <th class="text-xs">Guardian Name</th>
                    <th class="text-xs">Date Of Birth</th>
                    <th class="text-xs">Emergency Phone 1</th>
                    <th class="text-xs">Emergency Phone 2</th>
                    <th class="text-xs">School Emergency Phone</th>
                    <th class="text-xs">Date Of Issue</th>
                    <th class="text-xs">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                @php

                @endphp
                    <tr class="text-xs text-center h-20">
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td class="py-2">
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
                        <td class="px-4">{{ $student->member_id }}</td>
                        <td class="px-4">{{ $student->name }}</td>
                        <td class="px-4">{{ $student->email }}</td>
                        <td class="px-4">{{ $student->phone }}</td>
                        <td class="px-4">{{ $programs->find($student->program_id)->name }}</td>
                        <td class="px-4">{{ $batches->find($student->batch_id)->name }}</td>
                        <td class="px-4">{{ $student->campus }}</td>
                        <td class="px-4">{{ $student->guardianname }}</td>
                        <td class="px-4">{{ $student->dob }}</td>
                        <td class="px-4">{{ $student->emergencyphone1 }}</td>
                        <td class="px-4">{{ $student->emergencyphone2 }}</td>
                        <td class="px-4">{{ $student->schoolemergencyphone }}</td>
                        <td class="px-4">{{ $student->dateofissue }}</td>
                        <td class="px-4">
                            <div class="flex items-center justify-center gap-3">
                                <a href="{{ route('students.edit',$student->id) }}" class="text-lime-500 text-xl"><i class="fi fi-br-pen-square"></i></a>
                                <a href="{{ route('students.print',$student->member_id) }}" class="text-yellow-500 text-xl"><i class="fi fi-br-print"></i></a>
                                <form action="{{ route('students.destroy',$student->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-rose-500 text-xl"><i class="fi fi-br-trash-xmark"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
