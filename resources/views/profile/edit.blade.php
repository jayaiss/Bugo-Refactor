@extends('layouts.admin')

@section('header', 'My Profile')

@section('content')
<div class="max-w-4xl mx-auto">

    <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
        
        <div class="h-32 bg-gradient-to-r from-slate-800 to-slate-700"></div>

        <div class="px-8 pb-8">
            <div class="relative flex flex-col items-center -mt-16 mb-6">
                <div class="relative group">
                    <div class="h-32 w-32 rounded-full bg-white p-1 shadow-lg">
                        <div class="h-full w-full rounded-full bg-slate-100 flex items-center justify-center text-slate-500 font-bold text-4xl overflow-hidden">
                            {{ substr(Auth::user()->name, 0, 1) }}
                        </div>
                    </div>
                    <label class="absolute bottom-1 right-1 bg-emerald-500 text-white p-2 rounded-full shadow-md cursor-pointer hover:bg-emerald-600 transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        <input type="file" class="hidden">
                    </label>
                </div>

                <h2 class="mt-4 text-2xl font-bold text-slate-800">{{ Auth::user()->name }}</h2>
                <p class="text-sm text-slate-500">Administrator Account</p>
            </div>

            <form method="post" action="{{ route('profile.update') }}" class="space-y-6 max-w-2xl mx-auto">
                @csrf
                @method('patch')

                <div>
                    <label class="block text-xs font-bold text-slate-600 uppercase tracking-wide mb-2">Full Name</label>
                    <input type="text" name="name" value="{{ old('name', Auth::user()->name) }}" class="w-full bg-slate-50 border border-gray-200 text-slate-800 text-sm rounded-xl focus:ring-emerald-500 focus:border-emerald-500 block p-3 transition-shadow placeholder-gray-400">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-600 uppercase tracking-wide mb-2">Email Address</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path></svg>
                        </div>
                        <input type="email" name="email" value="{{ old('email', Auth::user()->email) }}" class="w-full pl-10 bg-slate-50 border border-gray-200 text-slate-800 text-sm rounded-xl focus:ring-emerald-500 focus:border-emerald-500 block p-3 transition-shadow">
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-600 uppercase tracking-wide mb-2">Civil Status</label>
                    <select class="w-full bg-slate-50 border border-gray-200 text-slate-800 text-sm rounded-xl focus:ring-emerald-500 focus:border-emerald-500 block p-3">
                        <option>Single</option>
                        <option>Married</option>
                        <option>Widowed</option>
                        <option>Separated</option>
                    </select>
                </div>

                <div class="pt-6">
                    <button type="submit" class="w-full text-white bg-emerald-600 hover:bg-emerald-700 focus:ring-4 focus:ring-emerald-300 font-bold rounded-xl text-sm px-5 py-3.5 text-center transition-all shadow-md hover:shadow-lg">
                        Update Profile Information
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection