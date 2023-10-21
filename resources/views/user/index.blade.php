@extends('layouts.app')

@section('title','Home')

@section('content')
<div class="m-5 space-x-3">
    <a href="{{ route('programs.index') }}" class="px-3 py-2 rounded bg-slate-500 text-gray-100">Program</a>
    <a href="{{ route('batches.index') }}" class="px-3 py-2 rounded bg-slate-500 text-gray-100">Batch</a>
    <a href="{{ route('students.index') }}" class="px-3 py-2 rounded bg-slate-500 text-gray-100">Student</a>
    <a href="{{ route('auth.logout') }}" class="px-3 py-2 rounded bg-rose-500 text-gray-100">Logout</a>
</div>
@endsection