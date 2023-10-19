@extends('layouts.app')

@section('title','Create Student')

@section('content')
<div class="p-5 text-gray-800">
    <div class="max-w-lg p-5 border rounded shadow-md">
        <h1 class="text-2xl font-bold my-3">Create Students</h1>
        <div>
            <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <x-form-input id="id" label="Student ID" icon="fi fi-br-id-badge" type="number" name="id" />
                <div class="flex items-center gap-3 my-5">
                    <div>
                        <select class="py-1 px-4 bg-rose-500 text-gray-100 focus:border-0 focus:outline-none rounded" name="programid">
                            <option class="bg-gray-50 text-gray-800" selected disabled>Program</option>
                            @foreach ($programs as $program )
                                <option class="bg-gray-50 text-gray-800" value="{{ $program->id }}">{{ $program->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <select class="py-1 px-4 bg-green-500 text-gray-100 focus:border-0 focus:outline-none rounded" name="batchid">
                            <option class="bg-gray-50 text-gray-800" selected disabled>Batch</option>
                            @foreach ($batches as $batch )
                                <option class="bg-gray-50 text-gray-800" value="{{ $batch->id }}">{{ $batch->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <x-form-input id="name" label="Student Name" icon="fi fi-br-id-card-clip-alt" type="text" name="name" />
                <x-form-input id="email" label="Student Email" icon="fi fi-br-envelope" type="email" name="email" />
                <x-form-input id="phone" label="Student Phone No." icon="fi fi-br-mobile-notch" type="phone" name="phone" />
                <x-form-input id="guardianname" label="Guardian Name" icon="fi fi-br-users" type="text" name="guardianname" />
                <x-form-input id="dob" label="Date Of Birth" icon="fi fi-ss-cake-birthday" type="text" name="dob" />
                <x-form-input id="emergencyphone1" label="Emergency Phone 1" icon="fi fi-br-phone-office" type="phone" name="emergencyphone1" />
                <x-form-input id="emergencyphone2" label="Emergency Phone 2" icon="fi fi-br-phone-office" type="phone" name="emergencyphone2" />
                <x-form-input id="schoolemergencyphone" label="School Emergency Phone" icon="fi fi-br-phone-call" type="phone" name="schoolemergencyphone" />
                <div>
                    <div class="border-2 border-gray-300 border-dashed rounded-xl p-6 relative my-5">
                        <input type="file" id="file" name="studentprofilepicture" class="w-full h-full absolute inset-0 z-50 opacity-0" onchange="fileview(event)" />
                        <div class="text-center">
                            <img alt="" id="preview" src="{{asset('images/upload.png')}}" class="w-20 h-20 object-cover mx-auto" />
                            <h3 class="text-gray-900 font-medium text-sm mt-2">
                                <label for="file" class="">
                                    <span>Click Here To Upload Student</span>
                                    <span class="text-indigo-600">Picture</span>
                                </label>
                            </h3>
                            <span class="text-gray-500 text-xs mt-1">JPG,PNG,GIF,ICO</span>
                        </div>
                    </div>
                </div>
                <div class="flex justify-end gap-3">
                    <a href="{{ route('students.index') }}" class="bg-red-500 px-4 py-2 rounded text-white font-bold">Cancle</a>
                    <button class="bg-emerald-500 px-4 py-2 rounded text-white font-bold">Create</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">

    function fileview(event){
        const getinput = event.target;
        const getpreview = document.getElementById('preview');
        // var filereader = new FileReader();
        // filereader.readAsDataURL(getinput.files[0]);

        getpreview.src = URL.createObjectURL(getinput.files[0]);
    }
</script>
@endsection
