@extends('layouts.admin')

@section('header', 'BESO Registry')

@section('content')
<div class="max-w-[1600px] mx-auto py-8 px-4 font-sans">
    
    <div class="bg-white rounded-[2rem] shadow-sm border border-slate-100 p-6 mb-6">
        <div class="flex flex-col lg:flex-row justify-between items-end gap-4">
            
            <form method="GET" action="#" class="flex-grow">
                <div class="grid grid-cols-1 md:grid-cols-12 gap-3 items-end">
                    <div class="md:col-span-3">
                        <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2 ml-1">Resident Name</label>
                        <input type="text" name="search" class="w-full bg-slate-50 border-0 rounded-xl py-2.5 px-4 text-sm font-bold ring-1 ring-slate-200 focus:ring-2 focus:ring-blue-600 outline-none transition-all" placeholder="Search by name" value="{{ request('search') }}">
                    </div>
                    
                    <div class="md:col-span-2">
                        <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2 ml-1">Month</label>
                        <select name="month" class="w-full bg-slate-50 border-0 rounded-xl py-2.5 px-3 text-sm font-bold ring-1 ring-slate-200 focus:ring-2 focus:ring-blue-600 outline-none cursor-pointer">
                            <option value="">All Months</option>
                            @foreach(range(1, 12) as $m)
                                <option value="{{ $m }}" {{ request('month') == $m ? 'selected' : '' }}>
                                    {{ date('F', mktime(0, 0, 0, $m, 1)) }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="md:col-span-1">
                        <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2 ml-1">Year</label>
                        <select name="year" class="w-full bg-slate-50 border-0 rounded-xl py-2.5 px-3 text-sm font-bold ring-1 ring-slate-200 focus:ring-2 focus:ring-blue-600 outline-none cursor-pointer">
                            <option value="">All</option>
                            @php $currentYear = date('Y'); @endphp
                            @for ($y = $currentYear; $y >= 2020; $y--)
                                <option value="{{ $y }}" {{ request('year') == $y ? 'selected' : '' }}>
                                    {{ $y }}
                                </option>
                            @endfor
                        </select>
                    </div>

                    <div class="md:col-span-3">
                        <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2 ml-1">Course</label>
                        <select name="course" class="w-full bg-slate-50 border-0 rounded-xl py-2.5 px-4 text-sm font-bold ring-1 ring-slate-200 focus:ring-2 focus:ring-blue-600 outline-none cursor-pointer">
                            <option value="">All Categories</option>
                            </select>
                    </div>

                    <div class="md:col-span-2 flex gap-2">
                        <button type="submit" class="flex-1 bg-blue-600 hover:bg-blue-700 text-white font-black text-[11px] uppercase tracking-widest py-2.5 rounded-xl transition-all shadow-md">Filter</button>
                        <a href="{{ url()->current() }}" class="flex-1 bg-slate-100 hover:bg-slate-200 text-slate-600 font-black text-[11px] uppercase tracking-widest py-2.5 rounded-xl text-center transition-all border border-slate-200">Clear</a>
                    </div>
                </div>
            </form>

            <button onclick="document.getElementById('importModal').classList.remove('hidden')" 
                class="bg-white border-2 border-dashed border-blue-200 text-blue-600 text-[11px] font-black uppercase tracking-widest px-6 py-2.5 rounded-xl hover:bg-blue-50 transition-all flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path></svg>
                Batch Upload
            </button>
        </div>
    </div>

    <div class="bg-white rounded-[2.5rem] shadow-xl shadow-slate-200/50 border border-slate-100 overflow-hidden">
        <div class="bg-blue-600 px-8 py-4 flex items-center gap-2">
            <span class="text-white text-lg">🧾</span>
            <h2 class="text-white font-black uppercase tracking-widest text-sm">BESO Registry List</h2>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50/50 border-b border-slate-100 uppercase tracking-[0.15em] text-[10px] font-black text-slate-400">
                        <th class="px-6 py-4 w-[160px]">Series No.</th>
                        <th class="px-6 py-4 w-[320px]">Resident Name</th>
                        <th class="px-6 py-4 w-[160px]">Contact No.</th>
                        <th class="px-6 py-4 w-[70px]">Age</th>
                        <th class="px-6 py-4 w-[240px]">Education</th>
                        <th class="px-6 py-4 w-[240px]">Course</th>
                        <th class="px-6 py-4 w-[220px]">Created At</th>
                        <th class="px-6 py-4 w-[120px] text-center">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50">
                    <tr class="hover:bg-blue-50/30 transition-colors group">
                        <td class="px-6 py-4">
                            <span class="bg-slate-100 text-slate-600 px-3 py-1 rounded-lg text-xs font-black tracking-tight group-hover:bg-blue-100 group-hover:text-blue-700 transition-colors">
                                2026-0001
                            </span>
                        </td>
                        <td class="px-6 py-4 text-sm font-black text-slate-900">Juan Dela Cruz</td>
                        <td class="px-6 py-4 text-xs font-bold text-slate-500">09123456789</td>
                        <td class="px-6 py-4 text-xs font-bold text-slate-500">24</td>
                        <td class="px-6 py-4 text-xs font-bold text-slate-700 uppercase tracking-tight">Tertiary Education</td>
                        <td class="px-6 py-4 text-[10px] font-black text-blue-600 uppercase tracking-widest">BS Information Technology</td>
                        <td class="px-6 py-4 text-[11px] font-bold text-slate-400 uppercase italic">January 12, 2026</td>
                        <td class="px-6 py-4 text-center">
                            <div class="flex justify-center gap-2">
                                <button class="p-2 text-amber-500 hover:bg-amber-50 rounded-lg transition-all" title="Edit">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                </button>
                                <button class="p-2 text-red-500 hover:bg-red-50 rounded-lg transition-all" title="Delete">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div id="importModal" class="hidden fixed inset-0 z-50 overflow-y-auto bg-slate-900/40 backdrop-blur-sm flex items-center justify-center p-4">
    <div class="bg-white rounded-[2.5rem] w-full max-w-lg shadow-2xl border border-slate-100 p-8">
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-lg font-black text-slate-900 uppercase tracking-tighter">Batch Upload (Excel/CSV)</h3>
            <button onclick="document.getElementById('importModal').classList.add('hidden')" class="text-slate-400 hover:text-slate-600 text-2xl font-bold">&times;</button>
        </div>
        <form id="importForm" action="#" method="POST" enctype="multipart/form-data">
            <div class="mb-6">
                <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-3 ml-1">Choose File</label>
                <input type="file" name="beso_file" class="w-full bg-slate-50 border-2 border-dashed border-slate-200 rounded-2xl p-8 text-center text-sm font-bold cursor-pointer hover:border-blue-400 transition-colors">
                <div class="text-[10px] text-slate-400 mt-3 font-medium leading-relaxed italic">
                    Max 5MB. Headers required: firstName, middleName, lastName, suffixName, education_attainment, course, contactNum, Age.
                </div>
            </div>
            <div class="flex gap-3">
                <button type="button" onclick="document.getElementById('importModal').classList.add('hidden')" class="flex-1 bg-white border border-slate-200 text-slate-500 font-black text-[11px] uppercase tracking-widest py-3.5 rounded-xl hover:bg-slate-50 transition-all">Cancel</button>
                <button type="submit" class="flex-1 bg-blue-600 hover:bg-blue-700 text-white font-black text-[11px] uppercase tracking-widest py-3.5 rounded-xl transition-all shadow-lg shadow-blue-600/20">Upload & Import</button>
            </div>
        </form>
    </div>
</div>
@endsection