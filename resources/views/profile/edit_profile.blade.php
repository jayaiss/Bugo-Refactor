@extends('layouts.admin')

@section('header', 'My Profile')

@section('content')
<div class="min-h-screen bg-gray-50/50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-5xl mx-auto">
        
        <div class="bg-white rounded-3xl shadow-xl overflow-hidden border border-gray-100 transition-all duration-300 hover:shadow-2xl">
            <div class="grid grid-cols-1 lg:grid-cols-3">

                <div class="bg-slate-900 text-white relative lg:col-span-1 p-8 flex flex-col items-center justify-center text-center">
                    
                    <div class="absolute inset-0 opacity-10" 
                         style="background-image: radial-gradient(circle at 2px 2px, rgba(255,255,255,0.3) 1px, transparent 0); background-size: 24px 24px;">
                    </div>

                    <div class="relative z-10 mb-6 group">
                        <div class="w-32 h-32 rounded-full border-4 border-white/20 bg-slate-800 flex items-center justify-center shadow-lg transition-transform duration-300 group-hover:scale-105 overflow-hidden">
                            <span class="text-4xl font-bold text-slate-400">MG</span>
                            </div>
                        <div class="absolute bottom-2 right-2 w-5 h-5 bg-emerald-400 border-4 border-slate-900 rounded-full"></div>
                    </div>

                    <div class="relative z-10 mb-8">
                        <h2 class="text-2xl font-bold tracking-tight mb-1">Merlito Galacio</h2>
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-white/10 text-slate-300 border border-white/10">
                            Administrator
                        </span>
                    </div>

                    <label class="relative z-10 w-full max-w-[200px] group cursor-pointer">
                        <div class="flex items-center justify-center gap-2 px-4 py-2.5 bg-white/10 hover:bg-white/20 border border-white/20 rounded-xl transition-all duration-200">
                            <svg class="w-4 h-4 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path></svg>
                            <span class="text-sm font-medium">Change Photo</span>
                        </div>
                        <input type="file" class="hidden">
                    </label>
                </div>

                <div class="lg:col-span-2 p-8 lg:p-10 bg-white">
                    <div class="flex items-center justify-between mb-8">
                        <div>
                            <h3 class="text-xl font-bold text-slate-800">Account Settings</h3>
                            <p class="text-sm text-slate-500 mt-1">Manage your personal information</p>
                        </div>
                        <div class="w-10 h-10 rounded-full bg-emerald-50 flex items-center justify-center">
                            <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        </div>
                    </div>

                    <form action="#" class="space-y-6">
                        
                        <div class="space-y-2">
                            <label class="text-sm font-semibold text-slate-700">Email Address</label>
                            <div class="relative group">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <svg class="w-5 h-5 text-slate-400 group-focus-within:text-emerald-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path></svg>
                                </div>
                                <input type="email" value="merlito@barangay.gov.ph" 
                                    class="w-full pl-12 pr-4 py-3 bg-slate-50 border border-slate-200 text-slate-800 text-sm rounded-xl focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 focus:bg-white transition-all placeholder:text-slate-400 hover:border-slate-300">
                            </div>
                        </div>

                        <div class="space-y-2">
                            <label class="text-sm font-semibold text-slate-700">Civil Status</label>
                            <div class="relative group">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <svg class="w-5 h-5 text-slate-400 group-focus-within:text-emerald-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                                </div>
                                <select class="w-full pl-12 pr-10 py-3 bg-slate-50 border border-slate-200 text-slate-800 text-sm rounded-xl focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 focus:bg-white transition-all appearance-none cursor-pointer hover:border-slate-300">
                                    <option>Single</option>
                                    <option selected>Married</option>
                                    <option>Widowed</option>
                                    <option>Separated</option>
                                </select>
                                <div class="absolute inset-y-0 right-0 flex items-center px-4 pointer-events-none">
                                    <svg class="w-4 h-4 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                </div>
                            </div>
                        </div>

                        <div class="pt-8 flex items-center justify-end gap-3">
                            <button type="button" class="px-5 py-2.5 text-sm font-semibold text-slate-600 bg-white border border-slate-200 rounded-lg hover:bg-slate-50 hover:border-slate-300 transition-all">
                                Cancel
                            </button>
                            <button type="button" class="px-6 py-2.5 text-sm font-semibold text-white bg-slate-900 rounded-lg hover:bg-slate-800 shadow-md hover:shadow-lg hover:-translate-y-0.5 transition-all flex items-center gap-2">
                                <span>Save Changes</span>
                                <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            </button>
                        </div>

                    </form>
                </div>

            </div>
        </div>

    </div>
</div>
@endsection