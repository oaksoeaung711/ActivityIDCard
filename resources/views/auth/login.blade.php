@extends('layouts.app')

@section('title','login')

@section('content')
<section class="h-screen flex justify-center items-center">
    <div class="max-w-7xl h-[500px] grid grid-cols-2 shadow-lg rounded-lg overflow-hidden border">
        <div class="bg-[#FEFAF5]">
            <img class="object-cover object-bottom mt-20" src="{{ asset('images/image1.jpg') }}" />
        </div>
        <div class="w-3/4 mx-auto mt-12">
            <h1 class="py-6 mb-5 text-center text-3xl font-semibold text-neutral-900">Administrator Login</h1>
            @if (Session::has('message'))
                <p class="my-4 text-red-500">{{ Session::get('message') }}</p>    
            @endif
            <div>
                <form action="{{ route('auth.login') }}" method="POST">
                    @csrf
                    <x-form-input id="email" label="email" icon="fi fi-br-envelope" type="email" name="email"/>
                    <x-form-input id="password" label="password" icon="fi fi-br-lock" type="password" name="password"/>
                    
                    <button class="py-2 bg-neutral-950 hover:bg-neutral-900 w-full rounded text-white text-[14px] font-semibold tracking-widest transition-all duration-300">LOGIN</button>
                </form>
            </div>
            <div class="my-4">
                <a href="{{ route('register') }}" class="text-sky-500 flex items-center justify-end"><span>Register Here</span><i class="fi fi-rr-caret-right"></i></a>
            </div>
        </div>
    </div>
</section>
@endsection