@extends('layouts.app')

@section('title','login')

@section('content')
<section class="h-screen flex justify-center items-center">
    <div class="max-w-7xl grid grid-cols-2 shadow-lg rounded-lg overflow-hidden border">
        <div class="bg-[#FEFAF5]">
            <img class="object-cover object-bottom mt-20" src="{{ asset('images/image1.jpg') }}" />
        </div>
        <div class="w-3/4 mx-auto mt-12">
            <h1 class="py-6 mb-5 text-center text-3xl font-semibold text-neutral-900">Administrator Register</h1>
            @foreach ( $errors->all() as $error)
                <span class="text-red-500 text-xs">{{ $error }}</span>
            @endforeach ()
            <div>
                <form action="{{ route('auth.register') }}" method="POST">
                    @csrf
                    <x-form-input id="name" label="name" icon="fi fi-br-id-card-clip-alt" type="text" name="name"/>
                    <x-form-input id="email" label="email" icon="fi fi-br-envelope" type="email" name="email"/>
                    <x-form-input id="password" label="password" icon="fi fi-br-lock" type="password" name="password"/>
                    <x-form-input id="confirm_password" label="Confirm Password" icon="fi fi-br-lock" type="password" name="confirm_password"/>
                    
                    <button class="py-2 bg-neutral-950 hover:bg-neutral-900 w-full rounded text-white text-[14px] font-semibold tracking-widest transition-all duration-300">REGISTER</button>
                </form>
            </div>
            <div class="my-4">
                <a href="{{ route('login') }}" class="text-sky-500 flex items-center justify-end"><span>Login Here</span><i class="fi fi-rr-caret-right"></i></a>
            </div>
        </div>
    </div>
</section>
@endsection