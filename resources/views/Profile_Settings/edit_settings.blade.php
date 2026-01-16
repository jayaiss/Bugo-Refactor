@extends('layouts.admin')

@section('header', 'Security Settings')

@section('content')
<div class="min-h-screen bg-gray-50/50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-5xl mx-auto">

        <div class="bg-white rounded-3xl shadow-xl overflow-hidden border border-gray-100 flex flex-col lg:flex-row">
            
            <div class="lg:w-1/3 bg-slate-900 p-8 lg:p-10 text-white relative flex flex-col justify-between overflow-hidden">
                
                <div class="absolute inset-0 opacity-10" 
                     style="background-image: radial-gradient(#fff 1px, transparent 1px); background-size: 24px 24px;">
                </div>
                
                <div class="relative z-10">
                    <div class="w-14 h-14 bg-emerald-500/20 border border-emerald-500/30 rounded-2xl flex items-center justify-center mb-6">
                        <svg class="w-7 h-7 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                    </div>

                    <h2 class="text-2xl font-bold mb-2">Password Security</h2>
                    <p class="text-slate-400 text-sm leading-relaxed mb-8">
                        Ensure your account stays secure by using a strong, unique password.
                    </p>

                    <ul class="space-y-3 text-sm text-slate-300 mb-8">
                        <li class="flex items-center gap-3">
                            <div class="w-1.5 h-1.5 rounded-full bg-emerald-400"></div>
                            Min. 8 characters long
                        </li>
                        <li class="flex items-center gap-3">
                            <div class="w-1.5 h-1.5 rounded-full bg-emerald-400"></div>
                            Include symbols (@$!%)
                        </li>
                        <li class="flex items-center gap-3">
                            <div class="w-1.5 h-1.5 rounded-full bg-emerald-400"></div>
                            Include numbers
                        </li>
                    </ul>
                </div>

                <div class="relative z-10 bg-slate-800/50 border border-slate-700 rounded-xl p-4 backdrop-blur-sm">
                    <div class="flex gap-3">
                        <svg class="w-5 h-5 text-emerald-400 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                        <div>
                            <h4 class="font-bold text-slate-200 text-xs uppercase tracking-wide">Important Note</h4>
                            <p class="text-xs text-slate-400 mt-1 leading-relaxed">
                                Changing your password will sign you out of all other active sessions immediately.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="lg:w-2/3 p-8 lg:p-12 bg-white">
                <div class="flex items-center justify-between mb-8">
                    <h3 class="text-xl font-bold text-slate-800">Change Password</h3>
                    <div class="w-10 h-10 bg-slate-50 rounded-full flex items-center justify-center">
                        <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                    </div>
                </div>

                <form method="post" action="{{ route('password.update') }}" class="space-y-6">
                    @csrf
                    @method('put')

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2 ml-1">Current Password</label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-slate-400 group-focus-within:text-emerald-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"></path></svg>
                            </div>
                            <input type="password" name="current_password" placeholder="Enter current password" 
                                class="w-full pl-12 pr-4 py-3.5 bg-slate-50 border border-slate-200 text-slate-800 text-sm rounded-xl focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 focus:bg-white transition-all placeholder:text-slate-400">
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2 ml-1">New Password</label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-slate-400 group-focus-within:text-emerald-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                            </div>
                            <input type="password" name="password" placeholder="Enter new password" 
                                class="w-full pl-12 pr-4 py-3.5 bg-slate-50 border border-slate-200 text-slate-800 text-sm rounded-xl focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 focus:bg-white transition-all placeholder:text-slate-400">
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2 ml-1">Confirm New Password</label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-slate-400 group-focus-within:text-emerald-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>
                            <input type="password" name="password_confirmation" placeholder="Confirm new password" 
                                class="w-full pl-12 pr-4 py-3.5 bg-slate-50 border border-slate-200 text-slate-800 text-sm rounded-xl focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 focus:bg-white transition-all placeholder:text-slate-400">
                        </div>
                    </div>

                    <div class="pt-8 flex items-center justify-end gap-3 border-t border-slate-100 mt-8">
                        <button type="button" class="px-5 py-2.5 text-sm font-semibold text-slate-600 bg-white border border-slate-200 rounded-lg hover:bg-slate-50 hover:border-slate-300 transition-all">
                            Cancel
                        </button>
                        <button type="submit" class="px-6 py-2.5 text-sm font-bold text-white bg-slate-900 rounded-lg hover:bg-slate-800 shadow-md hover:shadow-lg hover:-translate-y-0.5 transition-all flex items-center gap-2">
                            <span>Update Password</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                        </button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>
@endsection