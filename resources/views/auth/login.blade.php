@extends('layouts.app')

@section('content')
<div class=" mx-auto h-full flex justify-center items-center bg-grey ">
    <div class="w-96 bg-blue-900 rounded-lg shadow-xl p-6">
    
    <svg class="fill-current text-white w-25" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
        <path d="M3.9 4.2c-.5 0-.8.3-.8.8s.4.8.8.8c.5 0 .8-.4.8-.8.1-.5-.3-.8-.8-.8zM3.3 18.6c0 1.4-.2 2.1-1.5 2.1-.3 0-.7 0-.9-.1l-.3 1.1c.3.1.7.2 1.1.2 1.9 0 2.7-1.2 2.7-3.2V8.1H3.3v10.5zM9.4 17.5c1.4 0 2.3-.4 3-1.2.8-1 1.1-2.1 1.1-3.8 0-1.4-.2-2.7-1-3.5-.6-.7-1.5-1.1-2.9-1.1s-2.3.4-3 1.2c-.8 1-1.1 2.2-1.1 3.8 0 1.5.2 2.6 1 3.5.6.7 1.5 1.1 2.9 1.1zM7.5 9.7c.3-.4.9-.8 2-.8 1 0 1.6.3 1.9.7.5.6.7 1.7.7 2.9s-.2 2.4-.7 3.1c-.3.4-.9.8-2 .8-1 0-1.6-.3-1.9-.7-.5-.6-.7-1.6-.7-2.9 0-1.2.2-2.4.7-3.1zM15 14.4c0 2.1.4 3.1 2.5 3.1.6 0 1.3-.1 1.8-.2l-.1-1c-.5.1-1 .2-1.5.2-1.4 0-1.5-.6-1.5-2.1v-5h3V8.3h-3v-3l-1.2.2v2.7h-1.8v1.1H15v5.1zM6 18h17v1H6z"/>
    </svg>

    <h1 class="text-white text-xl pt-5 ">Welcome Back</h1>

    <h2 class="text-info pb-6">Enter your credentials below</h2>

    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="relative ">
                            <label for="email" class=" pl-2 uppercase text-blue-500 font-bold absolute">EMail</label>

                            <div class="">
                                <input id="email" type="email" class="w-full pt-8 pb-2 pl-2 text-gray-100 outline-none focus:bg-blue-700" name="email" value="{{ old('email') }}" autocomplete="email" autofocus placeholder="your@email.com">

                                @error('email')
                                    <span class="text-red-600 text-sm " role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="relative pt-2">
                            <label for="password" class="pl-2 uppercase text-blue-400 font-bold absolute">{{ __('Password') }}</label>

                            <div class="">
                                <input id="password" type="password" class="w-full pt-8 pb-2 pl-2 text-gray-100  outline-none focus:bg-blue-700 " name="password" autocomplete="current-password" placeholder="Password">

                                @error('password')
                                    <span class="text-red-600 text-sm" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="text-white pt-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div>
                            <button type="submit" class="font-bold py-2 bg-gray-400 w-full rounded text-blue-800">
                                    Login
                            </button>
                        </div>

                        <div class="text-sm font-bold flex justify-between pt-8 text-white">               
                                    <a class="" href="{{ route('password.request') }}">
                                        Forgot your password
                                    </a>
                                    <a class="" href="{{ route('register') }}">
                                        Register
                                    </a>
                               
                        </div>
                    
    </form>
        
    </div>
</div>
@endsection
