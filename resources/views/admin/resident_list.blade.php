@extends('layouts.admin')

@section('header')
    Resident Health Records
@endsection

@section('content')
<div class="max-w-7xl mx-auto px-4 md:px-0">

    <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-slate-100">

        {{-- Header --}}
        <div class="px-6 py-5 border-b border-slate-100 flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div>
                <h3 class="text-lg font-black text-slate-900 tracking-tight">Resident Masterlist</h3>
                <p class="text-[11px] text-slate-500 font-bold uppercase tracking-[0.2em] mt-1">
                    Manage resident health profiles and family linkages
                </p>
            </div>

            <div class="flex flex-wrap items-center gap-2">
                <button type="button" data-open-modal="importModal"
                    class="flex items-center gap-2 bg-white border border-slate-200 hover:bg-slate-50 text-slate-700 font-black
                           py-2 px-4 rounded-xl transition-all shadow-sm text-[11px] uppercase tracking-widest
                           focus:outline-none focus:ring-2 focus:ring-slate-900 focus:ring-offset-2">
                    <svg class="w-4 h-4 text-slate-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path>
                    </svg>
                    Import CSV
                </button>

                <button type="button" data-open-modal="linkFamilyModal"
                    class="flex items-center gap-2 bg-white border border-slate-200 hover:bg-slate-50 text-slate-700 font-black
                           py-2 px-4 rounded-xl transition-all shadow-sm text-[11px] uppercase tracking-widest
                           focus:outline-none focus:ring-2 focus:ring-slate-900 focus:ring-offset-2">
                    <svg class="w-4 h-4 text-slate-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"></path>
                    </svg>
                    Link Family
                </button>

                <button type="button" data-open-modal="viewFamiliesModal"
                    class="flex items-center gap-2 bg-white border border-slate-200 hover:bg-slate-50 text-slate-700 font-black
                           py-2 px-4 rounded-xl transition-all shadow-sm text-[11px] uppercase tracking-widest
                           focus:outline-none focus:ring-2 focus:ring-slate-900 focus:ring-offset-2">
                    <svg class="w-4 h-4 text-slate-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                    View Families
                </button>

                <button type="button" data-open-modal="addResidentModal"
                    class="flex items-center gap-2 bg-slate-900 hover:bg-slate-800 text-white font-black
                           py-2 px-5 rounded-xl transition-all shadow-md hover:-translate-y-0.5 text-[11px]
                           uppercase tracking-widest focus:outline-none focus:ring-2 focus:ring-slate-900 focus:ring-offset-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                    </svg>
                    Add Resident
                </button>
            </div>
        </div>

        {{-- Filters --}}
        <div class="bg-slate-50/60 p-6 border-b border-slate-200">
            <form>
                <div class="grid grid-cols-1 md:grid-cols-12 gap-4 items-end">

                    <div class="md:col-span-4">
                        <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-2">
                            Search
                        </label>
                        <div class="relative group">
                            <input type="text" placeholder="Last name, First name..."
                                class="w-full bg-white border border-slate-200 rounded-xl py-2.5 pl-10 pr-3 text-sm font-bold text-slate-700
                                       focus:outline-none focus:ring-2 focus:ring-slate-900 focus:border-transparent transition-all shadow-sm">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none text-slate-300 group-focus-within:text-slate-900 transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div class="md:col-span-3">
                        <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-2">
                            Zone / Purok
                        </label>
                        <select
                            class="w-full bg-white border border-slate-200 rounded-xl py-2.5 px-3 text-sm font-bold text-slate-700
                                   focus:outline-none focus:ring-2 focus:ring-slate-900 focus:border-transparent transition-all shadow-sm cursor-pointer">
                            <option value="all">All Zones</option>
                            <option value="1">Zone 1</option>
                            <option value="2">Zone 2</option>
                            <option value="3">Zone 3</option>
                            <option value="4">Zone 4</option>
                        </select>
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-2">
                            Sex
                        </label>
                        <select
                            class="w-full bg-white border border-slate-200 rounded-xl py-2.5 px-3 text-sm font-bold text-slate-700
                                   focus:outline-none focus:ring-2 focus:ring-slate-900 focus:border-transparent transition-all shadow-sm cursor-pointer">
                            <option value="all">All</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-2">
                            Civil Status
                        </label>
                        <select
                            class="w-full bg-white border border-slate-200 rounded-xl py-2.5 px-3 text-sm font-bold text-slate-700
                                   focus:outline-none focus:ring-2 focus:ring-slate-900 focus:border-transparent transition-all shadow-sm cursor-pointer">
                            <option value="all">All</option>
                            <option value="single">Single</option>
                            <option value="married">Married</option>
                            <option value="widowed">Widowed</option>
                        </select>
                    </div>

                    <div class="md:col-span-1">
                        <button type="submit"
                            class="w-full flex items-center justify-center bg-slate-900 hover:bg-slate-800 text-white font-black
                                   py-2.5 px-4 rounded-xl transition-all shadow-md hover:-translate-y-0.5 text-[11px]
                                   uppercase tracking-widest h-[42px]">
                            Filter
                        </button>
                    </div>

                </div>
            </form>
        </div>

        {{-- Table --}}
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-slate-600">
                <thead class="text-[10px] text-slate-500 uppercase tracking-[0.2em] bg-slate-50 border-b border-slate-100">
                    <tr>
                        <th class="px-6 py-4 font-black">Profile / Name</th>
                        <th class="px-6 py-4 font-black">Address</th>
                        <th class="px-6 py-4 font-black">Demographics</th>
                        <th class="px-6 py-4 font-black">Occupation</th>
                        <th class="px-6 py-4 font-black text-right">Actions</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-slate-100">

                    {{-- Sample Row --}}
                    <tr class="bg-white hover:bg-slate-50 transition-colors">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="h-10 w-10 rounded-full bg-slate-900 text-white flex items-center justify-center font-black text-sm border-2 border-white shadow-sm">
                                    CB
                                </div>
                                <div>
                                    <div class="font-black text-slate-900 text-base">Añedez, Cynthia Bahia</div>
                                    <div class="text-xs text-slate-500 font-bold">
                                        ID: RES-001 • <span class="text-slate-900">Active</span>
                                    </div>
                                </div>
                            </div>
                        </td>

                        <td class="px-6 py-4">
                            <span class="block text-slate-900 font-black">Zone 2</span>
                            <span class="text-xs text-slate-500 font-bold">Purok Manga</span>
                        </td>

                        <td class="px-6 py-4">
                            <div class="flex flex-col">
                                <span class="text-slate-900 font-black">Female</span>
                                <span class="text-xs text-slate-500 font-bold">Jan 01, 2000 (26 yrs old)</span>
                            </div>
                        </td>

                        <td class="px-6 py-4">
                            <span class="inline-flex items-center px-3 py-1 rounded-xl text-[11px] font-black bg-slate-100 text-slate-700 border border-slate-200">
                                Unemployed / N/A
                            </span>
                        </td>

                        <td class="px-6 py-4 text-right">
                            <div class="flex justify-end gap-2">
                                <button type="button" data-open-modal="viewProfileModal"
                                    class="p-2 bg-white border border-slate-200 text-slate-700 rounded-xl hover:bg-slate-50 shadow-sm transition-all"
                                    title="View Profile">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </button>

                                <button type="button" data-open-modal="addResidentModal"
                                    class="p-2 bg-white border border-slate-200 text-slate-700 rounded-xl hover:bg-slate-50 shadow-sm transition-all"
                                    title="Edit">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15.232 5.232l3.536 3.536M9 11l6.232-6.232a2.5 2.5 0 013.536 3.536L12.536 14.536A2 2 0 0111.12 15H9v-2.5A2 2 0 019 11z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 19H5a2 2 0 01-2-2V6a2 2 0 012-2h7" />
                                    </svg>
                                </button>

                                <button type="button" data-open-modal="deleteModal"
                                    class="p-2 bg-white border border-slate-200 text-rose-600 rounded-xl hover:bg-rose-50 shadow-sm transition-all"
                                    title="Delete">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>

        {{-- Footer --}}
        <div class="bg-slate-50 px-6 py-4 border-t border-slate-100 flex items-center justify-between">
            <span class="text-sm text-slate-500 font-bold">
                Showing <span class="font-black text-slate-900">1</span> to <span class="font-black text-slate-900">10</span> of
                <span class="font-black text-slate-900">150</span> residents
            </span>

            <div class="inline-flex gap-2">
                <button type="button" onclick="alert('Demo only')"
                    class="px-4 py-2 text-[11px] font-black uppercase tracking-widest text-slate-600 bg-white border border-slate-200 rounded-xl
                           hover:bg-slate-100 hover:text-slate-900 transition-colors">
                    Previous
                </button>
                <button type="button" onclick="alert('Demo only')"
                    class="px-4 py-2 text-[11px] font-black uppercase tracking-widest text-white bg-slate-900 rounded-xl hover:bg-slate-800 transition-colors shadow-sm">
                    Next
                </button>
            </div>
        </div>

    </div>
</div>

{{-- IMPORT MODAL --}}
<div id="importModal" class="fixed inset-0 z-50 hidden" role="dialog" aria-modal="true" aria-labelledby="importTitle">
    <div class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm" data-close-modal="importModal"></div>

    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="relative w-full max-w-lg bg-white rounded-2xl shadow-2xl border border-slate-100 overflow-hidden">
            <div class="bg-slate-900 px-6 py-4 border-b border-slate-800 flex items-center justify-between">
                <h3 id="importTitle" class="text-sm font-black uppercase tracking-widest text-white">Import Residents</h3>
                <button type="button" data-close-modal="importModal" class="text-white/70 hover:text-white">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            <form class="p-8"
                onsubmit="event.preventDefault(); alert('Demo only: import will be connected later.');">
                <label for="resident-import-file" class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-3 ml-1">
                    Upload File (CSV/XLSX)
                </label>

                <label
                    class="flex flex-col items-center justify-center w-full h-40 border-2 border-slate-200 border-dashed rounded-xl cursor-pointer bg-slate-50 hover:bg-slate-100 transition-all">
                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                        <svg class="w-8 h-8 mb-3 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                        </svg>
                        <p class="mb-2 text-sm text-slate-500 font-bold">
                            <span class="font-black">Click to upload</span> or drag and drop
                        </p>
                        <p class="text-xs text-slate-400 font-bold">Excel or CSV files only</p>
                    </div>
                    <input id="resident-import-file" type="file" class="hidden" accept=".csv,.xlsx" />
                </label>

                <div class="bg-slate-50 px-6 py-4 -mx-8 -mb-8 mt-8 flex justify-end gap-3 border-t border-slate-100">
                    <button type="button" data-close-modal="importModal"
                        class="px-5 py-2.5 text-[11px] font-black uppercase tracking-widest text-slate-700 bg-white border border-slate-200 rounded-xl hover:bg-slate-50 transition-all shadow-sm">
                        Cancel
                    </button>
                    <button type="submit"
                        class="px-5 py-2.5 text-[11px] font-black uppercase tracking-widest text-white bg-slate-900 rounded-xl hover:bg-slate-800 shadow-md transition-all">
                        Start Import
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- ADD/EDIT RESIDENT MODAL --}}
<div id="addResidentModal" class="fixed inset-0 z-50 hidden" role="dialog" aria-modal="true" aria-labelledby="residentTitle">
    <div class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm" data-close-modal="addResidentModal"></div>

    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="relative w-full max-w-4xl bg-white rounded-2xl shadow-2xl border border-slate-100 overflow-hidden">

            <div class="bg-slate-900 px-6 py-4 border-b border-slate-800 flex items-center justify-between">
                <h3 id="residentTitle" class="text-sm font-black uppercase tracking-widest text-white">Add / Edit Resident</h3>
                <button type="button" data-close-modal="addResidentModal" class="text-white/70 hover:text-white">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            <form class="p-6 space-y-4 max-h-[70vh] overflow-y-auto"
                onsubmit="event.preventDefault(); alert('Demo only: save will be connected later.');">
                <h4 class="text-[11px] font-black text-slate-500 uppercase tracking-[0.2em] border-b border-slate-100 pb-2">
                    Personal Information
                </h4>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-2">Last Name</label>
                        <input type="text" class="w-full bg-slate-50 border-0 rounded-xl py-2.5 px-4 text-sm font-bold text-slate-700 ring-1 ring-slate-200 focus:ring-2 focus:ring-slate-900 outline-none">
                    </div>
                    <div>
                        <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-2">First Name</label>
                        <input type="text" class="w-full bg-slate-50 border-0 rounded-xl py-2.5 px-4 text-sm font-bold text-slate-700 ring-1 ring-slate-200 focus:ring-2 focus:ring-slate-900 outline-none">
                    </div>
                    <div>
                        <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-2">Middle Name</label>
                        <input type="text" class="w-full bg-slate-50 border-0 rounded-xl py-2.5 px-4 text-sm font-bold text-slate-700 ring-1 ring-slate-200 focus:ring-2 focus:ring-slate-900 outline-none">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <div>
                        <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-2">Extension</label>
                        <input type="text" class="w-full bg-slate-50 border-0 rounded-xl py-2.5 px-4 text-sm font-bold text-slate-700 ring-1 ring-slate-200 focus:ring-2 focus:ring-slate-900 outline-none">
                    </div>
                    <div>
                        <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-2">Birthdate</label>
                        <input type="date" class="w-full bg-slate-50 border-0 rounded-xl py-2.5 px-4 text-sm font-bold text-slate-700 ring-1 ring-slate-200 focus:ring-2 focus:ring-slate-900 outline-none">
                    </div>
                    <div>
                        <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-2">Sex</label>
                        <select class="w-full bg-slate-50 border-0 rounded-xl py-2.5 px-4 text-sm font-bold text-slate-700 ring-1 ring-slate-200 focus:ring-2 focus:ring-slate-900 outline-none cursor-pointer">
                            <option>Male</option>
                            <option>Female</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-2">Civil Status</label>
                        <select class="w-full bg-slate-50 border-0 rounded-xl py-2.5 px-4 text-sm font-bold text-slate-700 ring-1 ring-slate-200 focus:ring-2 focus:ring-slate-900 outline-none cursor-pointer">
                            <option>Single</option>
                            <option>Married</option>
                            <option>Widowed</option>
                        </select>
                    </div>
                </div>

                <h4 class="text-[11px] font-black text-slate-500 uppercase tracking-[0.2em] border-b border-slate-100 pb-2 mt-6">
                    Address & Details
                </h4>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-2">Zone / Purok</label>
                        <select class="w-full bg-slate-50 border-0 rounded-xl py-2.5 px-4 text-sm font-bold text-slate-700 ring-1 ring-slate-200 focus:ring-2 focus:ring-slate-900 outline-none cursor-pointer">
                            <option>Zone 1</option>
                            <option>Zone 2</option>
                            <option>Zone 3</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-2">Occupation</label>
                        <input type="text" class="w-full bg-slate-50 border-0 rounded-xl py-2.5 px-4 text-sm font-bold text-slate-700 ring-1 ring-slate-200 focus:ring-2 focus:ring-slate-900 outline-none">
                    </div>
                    <div>
                        <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-2">Contact Number</label>
                        <input type="text" class="w-full bg-slate-50 border-0 rounded-xl py-2.5 px-4 text-sm font-bold text-slate-700 ring-1 ring-slate-200 focus:ring-2 focus:ring-slate-900 outline-none">
                    </div>
                </div>

                <div class="bg-slate-50 px-6 py-4 -mx-6 -mb-6 mt-6 flex justify-end gap-3 border-t border-slate-100">
                    <button type="button" data-close-modal="addResidentModal"
                        class="px-5 py-2.5 text-[11px] font-black uppercase tracking-widest text-slate-700 bg-white border border-slate-200 rounded-xl hover:bg-slate-50 transition-all shadow-sm">
                        Cancel
                    </button>
                    <button type="submit"
                        class="px-5 py-2.5 text-[11px] font-black uppercase tracking-widest text-white bg-slate-900 rounded-xl hover:bg-slate-800 shadow-md transition-all">
                        Save Resident
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- LINK FAMILY MODAL --}}
<div id="linkFamilyModal" class="fixed inset-0 z-50 hidden" role="dialog" aria-modal="true" aria-labelledby="linkTitle">
    <div class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm" data-close-modal="linkFamilyModal"></div>

    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="relative w-full max-w-lg bg-white rounded-2xl shadow-2xl border border-slate-100 overflow-hidden">
            <div class="bg-slate-900 px-6 py-4 border-b border-slate-800 flex items-center justify-between">
                <h3 id="linkTitle" class="text-sm font-black uppercase tracking-widest text-white">Link Family Members</h3>
                <button type="button" data-close-modal="linkFamilyModal" class="text-white/70 hover:text-white">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            <form class="p-6 space-y-4"
                onsubmit="event.preventDefault(); alert('Demo only: family linking will be connected later.');">
                <div>
                    <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-2">Head of Family</label>
                    <input type="text" placeholder="Search head of family..."
                        class="w-full bg-slate-50 border-0 rounded-xl py-2.5 px-4 text-sm font-bold text-slate-700 ring-1 ring-slate-200 focus:ring-2 focus:ring-slate-900 outline-none">
                </div>

                <div>
                    <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-2">Member to Link</label>
                    <input type="text" placeholder="Search member to add..."
                        class="w-full bg-slate-50 border-0 rounded-xl py-2.5 px-4 text-sm font-bold text-slate-700 ring-1 ring-slate-200 focus:ring-2 focus:ring-slate-900 outline-none">
                </div>

                <div>
                    <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-2">Relationship</label>
                    <select class="w-full bg-slate-50 border-0 rounded-xl py-2.5 px-4 text-sm font-bold text-slate-700 ring-1 ring-slate-200 focus:ring-2 focus:ring-slate-900 outline-none cursor-pointer">
                        <option>Spouse</option>
                        <option>Child</option>
                        <option>Parent</option>
                        <option>Sibling</option>
                    </select>
                </div>

                <div class="bg-slate-50 px-6 py-4 -mx-6 -mb-6 flex justify-end gap-3 border-t border-slate-100">
                    <button type="button" data-close-modal="linkFamilyModal"
                        class="px-5 py-2.5 text-[11px] font-black uppercase tracking-widest text-slate-700 bg-white border border-slate-200 rounded-xl hover:bg-slate-50 transition-all shadow-sm">
                        Cancel
                    </button>
                    <button type="submit"
                        class="px-5 py-2.5 text-[11px] font-black uppercase tracking-widest text-white bg-slate-900 rounded-xl hover:bg-slate-800 shadow-md transition-all">
                        Link Member
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- VIEW FAMILIES MODAL --}}
<div id="viewFamiliesModal" class="fixed inset-0 z-50 hidden" role="dialog" aria-modal="true" aria-labelledby="familiesTitle">
    <div class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm" data-close-modal="viewFamiliesModal"></div>

    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="relative w-full max-w-lg bg-white rounded-2xl shadow-2xl border border-slate-100 overflow-hidden">
            <div class="bg-slate-900 px-6 py-4 border-b border-slate-800 flex items-center justify-between">
                <h3 id="familiesTitle" class="text-sm font-black uppercase tracking-widest text-white">Family Groups</h3>
                <button type="button" data-close-modal="viewFamiliesModal" class="text-white/70 hover:text-white">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            <div class="p-6">
                <input type="text" placeholder="Search Family Head..."
                    class="w-full bg-slate-50 border-0 rounded-xl py-2.5 px-4 text-sm font-bold text-slate-700 ring-1 ring-slate-200 focus:ring-2 focus:ring-slate-900 outline-none">

                <div class="space-y-3 max-h-64 overflow-y-auto mt-4">
                    <div class="flex items-center justify-between p-3 bg-slate-50 rounded-xl border border-slate-100">
                        <div>
                            <p class="font-black text-slate-900 text-sm">Cruz Family</p>
                            <p class="text-xs text-slate-500 font-bold">Head: Juan Dela Cruz • 4 Members</p>
                        </div>
                        <button type="button" onclick="alert('Demo only')"
                            class="text-[11px] font-black uppercase tracking-widest text-slate-900 hover:underline">
                            View
                        </button>
                    </div>
                    <div class="flex items-center justify-between p-3 bg-slate-50 rounded-xl border border-slate-100">
                        <div>
                            <p class="font-black text-slate-900 text-sm">Reyes Family</p>
                            <p class="text-xs text-slate-500 font-bold">Head: Maria Reyes • 3 Members</p>
                        </div>
                        <button type="button" onclick="alert('Demo only')"
                            class="text-[11px] font-black uppercase tracking-widest text-slate-900 hover:underline">
                            View
                        </button>
                    </div>
                </div>
            </div>

            <div class="bg-slate-50 px-6 py-4 flex justify-end border-t border-slate-100">
                <button type="button" data-close-modal="viewFamiliesModal"
                    class="px-5 py-2.5 text-[11px] font-black uppercase tracking-widest text-slate-700 bg-white border border-slate-200 rounded-xl hover:bg-slate-50 transition-all shadow-sm">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>

{{-- VIEW PROFILE MODAL --}}
<div id="viewProfileModal" class="fixed inset-0 z-50 hidden" role="dialog" aria-modal="true" aria-labelledby="profileTitle">
    <div class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm" data-close-modal="viewProfileModal"></div>

    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="relative w-full max-w-lg bg-white rounded-2xl shadow-2xl border border-slate-100 overflow-hidden">
            <div class="bg-slate-900 px-6 py-4 border-b border-slate-800 flex items-center justify-between">
                <h3 id="profileTitle" class="text-sm font-black uppercase tracking-widest text-white">Resident Profile</h3>
                <button type="button" data-close-modal="viewProfileModal" class="text-white/70 hover:text-white">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            <div class="p-6">
                <div class="flex items-center gap-4 mb-6">
                    <div class="h-16 w-16 rounded-full bg-slate-900 text-white flex items-center justify-center font-black text-2xl border-2 border-white shadow-md">
                        CB
                    </div>
                    <div>
                        <h2 class="text-xl font-black text-slate-900">Cynthia Bahia Añedez</h2>
                        <p class="text-sm text-slate-500 font-bold">ID: RES-001</p>
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-[10px] font-black uppercase tracking-widest bg-slate-100 text-slate-900 border border-slate-200 mt-2">
                            Active Resident
                        </span>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4 text-sm">
                    <div class="p-3 bg-slate-50 rounded-xl border border-slate-100">
                        <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Address</p>
                        <p class="font-black text-slate-900 mt-1">Zone 2, Purok Manga</p>
                    </div>
                    <div class="p-3 bg-slate-50 rounded-xl border border-slate-100">
                        <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Birthdate</p>
                        <p class="font-black text-slate-900 mt-1">Jan 01, 2000 (26 yrs old)</p>
                    </div>
                    <div class="p-3 bg-slate-50 rounded-xl border border-slate-100">
                        <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Civil Status</p>
                        <p class="font-black text-slate-900 mt-1">Single</p>
                    </div>
                    <div class="p-3 bg-slate-50 rounded-xl border border-slate-100">
                        <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Occupation</p>
                        <p class="font-black text-slate-900 mt-1">None</p>
                    </div>
                </div>
            </div>

            <div class="bg-slate-50 px-6 py-4 flex justify-end border-t border-slate-100">
                <button type="button" data-close-modal="viewProfileModal"
                    class="px-5 py-2.5 text-[11px] font-black uppercase tracking-widest text-slate-700 bg-white border border-slate-200 rounded-xl hover:bg-slate-50 transition-all shadow-sm">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>

{{-- DELETE MODAL --}}
<div id="deleteModal" class="fixed inset-0 z-50 hidden" role="dialog" aria-modal="true" aria-labelledby="deleteTitle">
    <div class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm" data-close-modal="deleteModal"></div>

    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="relative w-full max-w-sm bg-white rounded-2xl shadow-2xl border border-slate-100 overflow-hidden">
            <div class="p-6 text-center">
                <div class="w-12 h-12 rounded-full bg-rose-100 flex items-center justify-center mx-auto mb-4 text-rose-700">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                    </svg>
                </div>
                <h3 id="deleteTitle" class="text-lg font-black text-slate-900 mb-2">Delete Resident?</h3>
                <p class="text-sm text-slate-500 font-bold">This action cannot be undone.</p>
            </div>

            <div class="bg-slate-50 px-6 py-4 flex justify-center gap-3 border-t border-slate-100">
                <button type="button" data-close-modal="deleteModal"
                    class="px-5 py-2.5 text-[11px] font-black uppercase tracking-widest text-slate-700 bg-white border border-slate-200 rounded-xl hover:bg-slate-50 transition-all shadow-sm">
                    Cancel
                </button>
                <button type="button" onclick="alert('Demo only: delete will be connected later.')"
                    class="px-5 py-2.5 text-[11px] font-black uppercase tracking-widest text-white bg-slate-900 rounded-xl hover:bg-slate-800 shadow-md transition-all">
                    Yes, Delete
                </button>
            </div>
        </div>
    </div>
</div>

{{-- Modal System (ESC + overlay click + focus) --}}
<script>
(function () {
  let lastFocused = null;

  function isHidden(el){ return el.classList.contains('hidden'); }

  function openModal(id, trigger = null) {
    const modal = document.getElementById(id);
    if (!modal) return;

    lastFocused = trigger || document.activeElement;
    modal.classList.remove('hidden');
    document.body.classList.add('overflow-hidden');

    setTimeout(() => {
      const focusable = modal.querySelector('input, select, textarea, button:not([disabled]), [tabindex]:not([tabindex="-1"])');
      focusable?.focus();
    }, 0);
  }

  function closeModal(id) {
    const modal = document.getElementById(id);
    if (!modal) return;

    modal.classList.add('hidden');

    const anyOpen = Array.from(document.querySelectorAll('[role="dialog"]')).some(m => !isHidden(m));
    if (!anyOpen) document.body.classList.remove('overflow-hidden');

    lastFocused?.focus?.();
  }

  document.addEventListener('click', (e) => {
    const openBtn = e.target.closest('[data-open-modal]');
    if (openBtn) {
      openModal(openBtn.getAttribute('data-open-modal'), openBtn);
      return;
    }

    const closeBtn = e.target.closest('[data-close-modal]');
    if (closeBtn) {
      closeModal(closeBtn.getAttribute('data-close-modal'));
    }
  });

  document.addEventListener('keydown', (e) => {
    if (e.key !== 'Escape') return;
    const open = Array.from(document.querySelectorAll('[role="dialog"]')).filter(m => !isHidden(m));
    const top = open[open.length - 1];
    if (top?.id) closeModal(top.id);
  });

  // Backward compatibility
  window.openModal = (id) => openModal(id, null);
  window.closeModal = (id) => closeModal(id);
})();
</script>
@endsection
