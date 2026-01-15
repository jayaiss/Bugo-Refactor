@extends('layouts.admin')

@section('header', 'Account Settings')

@section('content')
<div class="max-w-3xl mx-auto space-y-6">

    <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
        
        <div class="px-8 py-6 border-b border-gray-100 flex items-center gap-4 bg-gray-50/50">
            <div class="p-3 bg-red-50 rounded-xl">
                <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
            </div>
            <div>
                <h3 class="text-lg font-bold text-slate-800">Change Password</h3>
                <p class="text-xs text-slate-500">Ensure your account is secure using a strong password.</p>
            </div>
        </div>

        <div class="p-8">
            <div class="flex p-4 mb-6 text-sm text-amber-700 bg-amber-50 rounded-xl border border-amber-100" role="alert">
                <svg class="inline flex-shrink-0 mr-3 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                <div>
                    <span class="font-bold">Heads up!</span> If you change your password, you will be logged out of all other sessions immediately.
                </div>
            </div>

            <form method="post" action="{{ route('password.update') }}" class="space-y-5">
                @csrf
                @method('put')

                <div>
                    <label class="block text-xs font-bold text-slate-600 uppercase tracking-wide mb-2">Current Password</label>
                    <input type="password" name="current_password" class="w-full bg-white border border-gray-300 text-slate-800 text-sm rounded-xl focus:ring-red-500 focus:border-red-500 block p-3 shadow-sm transition-all">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-600 uppercase tracking-wide mb-2">New Password</label>
                    <input type="password" name="password" class="w-full bg-white border border-gray-300 text-slate-800 text-sm rounded-xl focus:ring-red-500 focus:border-red-500 block p-3 shadow-sm transition-all">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-600 uppercase tracking-wide mb-2">Confirm New Password</label>
                    <input type="password" name="password_confirmation" class="w-full bg-white border border-gray-300 text-slate-800 text-sm rounded-xl focus:ring-red-500 focus:border-red-500 block p-3 shadow-sm transition-all">
                </div>

                <div class="pt-4">
                    <button type="submit" class="w-full text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:ring-red-300 font-bold rounded-xl text-sm px-5 py-3.5 text-center transition-all shadow-md hover:shadow-lg">
                        Update Password
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection