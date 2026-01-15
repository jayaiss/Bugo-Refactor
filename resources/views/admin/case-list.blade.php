@extends('layouts.admin')

@section('header', 'Justice & Cases')

@section('content')
<div class="max-w-[1600px] mx-auto py-10 px-6 font-sans antialiased text-slate-900">
    
    <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center gap-6 mb-10">
        <div>
            <h1 class="text-4xl font-black text-slate-900 tracking-tighter">Katarungang Pambarangay</h1>
            <p class="text-slate-500 text-[11px] font-bold uppercase tracking-[0.3em] mt-2 flex items-center gap-2">
                <span class="w-2 h-2 bg-blue-600 rounded-full animate-pulse"></span>
                Mediation & Case Management Registry
            </p>
        </div>
        
        <div class="flex flex-wrap gap-4">
            <button onclick="document.getElementById('importCaseModal').classList.remove('hidden')" 
                class="bg-white border border-slate-200 text-slate-600 text-[11px] font-black uppercase tracking-widest px-8 py-4 rounded-2xl hover:bg-slate-50 transition-all flex items-center gap-3 shadow-sm hover:shadow-md">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path></svg>
                Batch Upload
            </button>
            <button class="bg-blue-600 hover:bg-blue-700 text-white text-[11px] font-black uppercase tracking-widest px-8 py-4 rounded-2xl transition-all shadow-xl shadow-blue-600/30 flex items-center gap-3 hover:-translate-y-1">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 4v16m8-8H4"></path></svg>
                New Case
            </button>
        </div>
    </div>

    <div class="bg-white rounded-[2.5rem] shadow-sm border border-slate-100 p-8 mb-8">
        <div class="flex flex-col md:flex-row gap-6 items-end">
            <div class="flex-grow">
                <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-3 ml-1">Search Record</label>
                <div class="relative group">
                    <input type="text" id="searchInput" 
                        class="w-full bg-slate-50 border-0 rounded-2xl py-4 pl-12 pr-4 text-sm font-bold ring-1 ring-slate-200 focus:ring-2 focus:ring-blue-600 outline-none transition-all" 
                        placeholder="Type case number, complainant, or respondent...">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-300 group-focus-within:text-blue-600">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </div>
                </div>
            </div>
            
            <div class="w-full md:w-48">
                <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-3 ml-1">Status</label>
                <select class="w-full bg-slate-50 border-0 rounded-2xl py-4 px-4 text-sm font-bold ring-1 ring-slate-200 focus:ring-2 focus:ring-blue-600 outline-none cursor-pointer">
                    <option value="">All Statuses</option>
                    <option value="pending">Pending</option>
                    <option value="ongoing">Ongoing</option>
                    <option value="closed">Closed</option>
                </select>
            </div>

            <div>
                <button class="bg-blue-600 hover:bg-blue-700 text-white font-black text-[11px] uppercase tracking-widest py-4.5 px-8 rounded-2xl transition-all shadow-lg shadow-blue-600/20 h-[54px]">
                    Filter
                </button>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-[2.5rem] shadow-2xl shadow-slate-200/50 border border-slate-100 overflow-hidden">
        
        <div class="bg-blue-600 px-8 py-5 flex items-center gap-4">
            <div class="p-2 bg-white/10 rounded-lg">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
            </div>
            <h2 class="text-white font-black tracking-[0.2em] uppercase text-sm">Cases Registry List</h2>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50/80 border-b border-slate-100">
                        <th class="px-8 py-6 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Case Ref.</th>
                        <th class="px-8 py-6 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Parties Involved</th>
                        <th class="px-8 py-6 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Offense Details</th>
                        <th class="px-8 py-6 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Schedule</th>
                        <th class="px-8 py-6 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Resolution</th>
                        <th class="px-8 py-6 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] text-center">Actions</th>
                    </tr>
                </thead>
                <tbody id="residentTableBody" class="divide-y divide-slate-50">
                    <tr class="hover:bg-blue-50/30 transition-all group">
                        <td class="px-8 py-6 align-top">
                            <span class="inline-flex items-center justify-center bg-slate-900 text-white text-[10px] font-black px-3 py-1.5 rounded-lg tracking-tighter whitespace-nowrap shadow-md">
                                #2026-KP-001
                            </span>
                        </td>
                        <td class="px-8 py-6 align-top">
                            <div class="space-y-1.5">
                                <div class="flex items-center gap-2">
                                    <span class="text-[9px] font-black text-blue-600 bg-blue-50 px-1.5 py-0.5 rounded uppercase tracking-widest">Comp</span>
                                    <span class="text-sm font-bold text-slate-800">Juan Dela Cruz</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <span class="text-[9px] font-black text-red-500 bg-red-50 px-1.5 py-0.5 rounded uppercase tracking-widest">Resp</span>
                                    <span class="text-sm font-bold text-slate-500">Maria Clara</span>
                                </div>
                            </div>
                        </td>
                        <td class="px-8 py-6 align-top">
                            <div class="text-sm font-black text-slate-900">Physical Injury</div>
                            <div class="text-[10px] text-slate-400 font-bold mt-1 uppercase tracking-wide">Filed: Jan 12, 2026</div>
                        </td>
                        <td class="px-8 py-6 align-top">
                            <div class="flex flex-col">
                                <span class="text-[11px] font-black text-slate-800 uppercase tracking-tight">Jan 20, 2026</span>
                                <span class="text-[9px] text-blue-600 font-black uppercase tracking-widest mt-0.5">10:00 AM</span>
                            </div>
                        </td>
                        <td class="px-8 py-6 align-top">
                            <div class="flex items-center gap-3">
                                <span class="px-3 py-1 rounded-full text-[9px] font-black uppercase tracking-widest bg-emerald-100 text-emerald-700 border border-emerald-200">
                                    Appeared
                                </span>
                                <select class="bg-white border border-slate-200 text-[10px] font-black uppercase rounded-lg px-2 py-1 focus:ring-2 focus:ring-blue-600 outline-none text-slate-600 cursor-pointer hover:border-blue-300 transition-colors">
                                    <option>Mediated</option>
                                    <option>Ongoing</option>
                                </select>
                            </div>
                        </td>
                        <td class="px-8 py-6 align-top text-center">
                            <div class="flex justify-center gap-4">
                                <button title="View" class="text-blue-400 hover:text-blue-600 hover:scale-110 transition-transform">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>
                                </button>
                                <button title="Edit" class="text-amber-400 hover:text-amber-500 hover:scale-110 transition-transform">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                </button>
                                <button title="Delete" class="text-red-400 hover:text-red-600 hover:scale-110 transition-transform">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        <div class="bg-slate-50 px-8 py-5 border-t border-slate-100 flex justify-between items-center text-[10px] font-bold text-slate-400 uppercase tracking-[0.2em]">
            <span>Showing entries 1-10 of 482</span>
            <div class="flex gap-2">
                <button class="w-8 h-8 flex items-center justify-center rounded-lg border border-slate-200 bg-white text-slate-400 hover:text-blue-600 hover:border-blue-200 transition-all">
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M15 19l-7-7 7-7"></path></svg>
                </button>
                <button class="w-8 h-8 flex items-center justify-center rounded-lg border border-slate-200 bg-white text-slate-400 hover:text-blue-600 hover:border-blue-200 transition-all">
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 5l7 7-7 7"></path></svg>
                </button>
            </div>
        </div>
    </div>
</div>
@endsection