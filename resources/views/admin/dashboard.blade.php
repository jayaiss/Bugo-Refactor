@extends('layouts.admin')



@section('content')

    <div class="mb-8">
        <div class="bg-white rounded-2xl border border-slate-200/60 shadow-sm p-6">
            <form class="grid grid-cols-1 md:grid-cols-12 gap-6 items-end">
                <div class="md:col-span-3 space-y-1.5">
                    <label class="text-xs font-bold text-slate-400 uppercase tracking-wider ml-1">Start Date</label>
                    <input type="date" class="w-full bg-slate-50 border-transparent focus:bg-white focus:border-slate-300 focus:ring-0 rounded-xl text-sm font-semibold text-slate-700 px-4 py-3 transition-all">
                </div>
                <div class="md:col-span-3 space-y-1.5">
                    <label class="text-xs font-bold text-slate-400 uppercase tracking-wider ml-1">End Date</label>
                    <input type="date" class="w-full bg-slate-50 border-transparent focus:bg-white focus:border-slate-300 focus:ring-0 rounded-xl text-sm font-semibold text-slate-700 px-4 py-3 transition-all">
                </div>

                <div class="md:col-span-2 space-y-1.5">
                    <label class="text-xs font-bold text-slate-400 uppercase tracking-wider ml-1">Type</label>
                    <select class="w-full bg-slate-50 border-transparent focus:bg-white focus:border-slate-300 focus:ring-0 rounded-xl text-sm font-semibold text-slate-700 px-4 py-3 transition-all cursor-pointer">
                        <option>All Types</option>
                        <option>Certificates</option>
                        <option>Complaints</option>
                    </select>
                </div>
                <div class="md:col-span-2 space-y-1.5">
                    <label class="text-xs font-bold text-slate-400 uppercase tracking-wider ml-1">Category</label>
                    <select class="w-full bg-slate-50 border-transparent focus:bg-white focus:border-slate-300 focus:ring-0 rounded-xl text-sm font-semibold text-slate-700 px-4 py-3 transition-all cursor-pointer">
                        <option>All Categories</option>
                    </select>
                </div>

                <div class="md:col-span-2">
                    <button type="button" class="w-full bg-slate-900 hover:bg-slate-800 text-white text-sm font-bold rounded-xl px-6 py-3 transition-all shadow-lg shadow-slate-900/10 hover:shadow-slate-900/20 active:transform active:scale-[0.98] flex items-center justify-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path></svg>
                        Filter Data
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

        <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm hover:shadow-md transition-shadow duration-200">
            <div class="flex items-center gap-5">
                <div class="w-14 h-14 rounded-2xl bg-blue-50 flex items-center justify-center text-blue-600">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                </div>
                <div>
                    <p class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">Total Residents</p>
                    <h3 class="text-3xl font-black text-slate-800 tracking-tight">984</h3>
                </div>
            </div>
            <div class="mt-4 pt-4 border-t border-slate-50 flex items-center gap-2 text-xs font-semibold text-slate-400">
                <span class="text-emerald-600 bg-emerald-50 px-2 py-0.5 rounded flex items-center gap-1">
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                    +2.5%
                </span>
                <span>increase from last month</span>
            </div>
        </div>

        <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm hover:shadow-md transition-shadow duration-200">
            <div class="flex items-center gap-5">
                <div class="w-14 h-14 rounded-2xl bg-sky-50 flex items-center justify-center text-sky-600">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                </div>
                <div>
                    <p class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">Male Population</p>
                    <h3 class="text-3xl font-black text-slate-800 tracking-tight">2</h3>
                </div>
            </div>
            <div class="mt-4 w-full bg-slate-50 rounded-full h-1.5">
                <div class="bg-sky-500 h-1.5 rounded-full" style="width: 45%"></div>
            </div>
        </div>

        <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm hover:shadow-md transition-shadow duration-200">
            <div class="flex items-center gap-5">
                <div class="w-14 h-14 rounded-2xl bg-pink-50 flex items-center justify-center text-pink-500">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                </div>
                <div>
                    <p class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">Female Population</p>
                    <h3 class="text-3xl font-black text-slate-800 tracking-tight">2</h3>
                </div>
            </div>
            <div class="mt-4 w-full bg-slate-50 rounded-full h-1.5">
                <div class="bg-pink-500 h-1.5 rounded-full" style="width: 55%"></div>
            </div>
        </div>

        <div class="bg-white p-6 rounded-2xl border border-red-100 shadow-sm hover:shadow-md transition-shadow duration-200 relative group overflow-hidden">
            <div class="absolute top-0 right-0 p-4 opacity-5 group-hover:opacity-10 transition-opacity">
                <svg class="w-20 h-20 text-red-500" fill="currentColor" viewBox="0 0 20 20"><path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z"/></svg>
            </div>
            <div class="flex items-center gap-5 relative z-10">
                <div class="w-14 h-14 rounded-2xl bg-red-50 flex items-center justify-center text-red-600">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                </div>
                <div>
                    <p class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">Urgent Requests</p>
                    <h3 class="text-3xl font-black text-red-600 tracking-tight">0</h3>
                </div>
            </div>
            <a href="#" class="mt-4 pt-4 border-t border-red-50 flex items-center justify-between text-xs font-bold text-red-600 hover:text-red-700 transition-colors">
                <span>View Action Items</span>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
            </a>
        </div>

        <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm hover:shadow-md transition-shadow duration-200">
            <div class="flex items-center gap-5">
                <div class="w-14 h-14 rounded-2xl bg-purple-50 flex items-center justify-center text-purple-600">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                </div>
                <div>
                    <p class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">Upcoming Events</p>
                    <h3 class="text-3xl font-black text-slate-800 tracking-tight">0</h3>
                </div>
            </div>
            <a href="#" class="mt-4 pt-4 border-t border-slate-50 flex items-center justify-between text-xs font-bold text-purple-600 hover:text-purple-700 transition-colors">
                <span>Manage Calendar</span>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
            </a>
        </div>

        <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm hover:shadow-md transition-shadow duration-200">
            <div class="flex items-center gap-5">
                <div class="w-14 h-14 rounded-2xl bg-amber-50 flex items-center justify-center text-amber-600">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <div>
                    <p class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">Pending Review</p>
                    <h3 class="text-3xl font-black text-slate-800 tracking-tight">0</h3>
                </div>
            </div>
            <a href="#" class="mt-4 pt-4 border-t border-slate-50 flex items-center justify-between text-xs font-bold text-amber-600 hover:text-amber-700 transition-colors">
                <span>Process Queue</span>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
            </a>
        </div>

    </div>
@endsection