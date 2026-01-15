@extends('layouts.admin')

@section('header')
    Resident Health Records
@endsection

@section('content')
<div class="max-w-7xl mx-auto">
    
    <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100">
        
        <div class="px-6 py-5 border-b border-gray-100 flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div>
                <h3 class="text-lg font-bold text-gray-900">Resident Masterlist</h3>
                <p class="text-xs text-gray-500 mt-0.5">Manage resident health profiles and family linkages.</p>
            </div>
            <div class="flex flex-wrap items-center gap-2">
                <button onclick="openModal('importModal')" class="flex items-center gap-2 bg-white border border-gray-300 hover:bg-gray-50 text-slate-700 font-bold py-2 px-4 rounded-xl transition-all shadow-sm text-xs">
                    <svg class="w-4 h-4 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path></svg>
                    Import CSV
                </button>
                
                <button onclick="openModal('linkFamilyModal')" class="flex items-center gap-2 bg-indigo-50 hover:bg-indigo-100 text-indigo-700 border border-indigo-200 font-bold py-2 px-4 rounded-xl transition-all shadow-sm text-xs">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"></path></svg>
                    Link Family
                </button>

                <button onclick="openModal('viewFamiliesModal')" class="flex items-center gap-2 bg-indigo-50 hover:bg-indigo-100 text-indigo-700 border border-indigo-200 font-bold py-2 px-4 rounded-xl transition-all shadow-sm text-xs">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                    View Families
                </button>

                <button onclick="openModal('addResidentModal')" class="flex items-center gap-2 bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-2 px-5 rounded-xl transition-all shadow-md transform hover:-translate-y-0.5 text-xs">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path></svg>
                    Add Resident
                </button>
            </div>
        </div>

        <div class="bg-gray-50/50 p-6 border-b border-gray-200">
            <form>
                <div class="grid grid-cols-1 md:grid-cols-12 gap-4 items-end">
                    <div class="md:col-span-4">
                        <label class="block text-xs font-bold text-gray-700 mb-1.5">Search</label>
                        <div class="relative">
                            <input type="text" placeholder="Last name, First name..." class="w-full bg-white border border-gray-300 rounded-xl py-2 pl-10 pr-3 text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-all shadow-sm">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                            </div>
                        </div>
                    </div>
                    <div class="md:col-span-3">
                        <label class="block text-xs font-bold text-gray-700 mb-1.5">Zone / Purok</label>
                        <select class="w-full bg-white border border-gray-300 rounded-xl py-2 px-3 text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-all shadow-sm cursor-pointer">
                            <option value="all">All Zones</option>
                            <option value="1">Zone 1</option>
                            <option value="2">Zone 2</option>
                            <option value="3">Zone 3</option>
                            <option value="4">Zone 4</option>
                        </select>
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-xs font-bold text-gray-700 mb-1.5">Sex</label>
                        <select class="w-full bg-white border border-gray-300 rounded-xl py-2 px-3 text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-all shadow-sm cursor-pointer">
                            <option value="all">All</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-xs font-bold text-gray-700 mb-1.5">Civil Status</label>
                        <select class="w-full bg-white border border-gray-300 rounded-xl py-2 px-3 text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-all shadow-sm cursor-pointer">
                            <option value="all">All</option>
                            <option value="single">Single</option>
                            <option value="married">Married</option>
                            <option value="widowed">Widowed</option>
                        </select>
                    </div>
                    <div class="md:col-span-1">
                        <button type="submit" class="w-full flex items-center justify-center gap-2 bg-slate-900 hover:bg-slate-800 text-white font-bold py-2 px-4 rounded-xl transition-all shadow-md transform hover:-translate-y-0.5 text-sm h-[38px]">
                            Filter
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 border-b border-gray-100">
                    <tr>
                        <th class="px-6 py-4 font-bold tracking-wider">Profile / Name</th>
                        <th class="px-6 py-4 font-bold tracking-wider">Address</th>
                        <th class="px-6 py-4 font-bold tracking-wider">Demographics</th>
                        <th class="px-6 py-4 font-bold tracking-wider">Occupation</th>
                        <th class="px-6 py-4 font-bold tracking-wider text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    
                    <tr class="bg-white hover:bg-gray-50 transition-colors group">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="h-10 w-10 rounded-full bg-emerald-100 flex items-center justify-center text-emerald-700 font-bold text-sm border-2 border-white shadow-sm">
                                    CB
                                </div>
                                <div>
                                    <div class="font-bold text-gray-900 text-base">Añedez, Cynthia Bahia</div>
                                    <div class="text-xs text-gray-500">ID: RES-001 • <span class="text-emerald-600">Active</span></div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="block text-gray-900 font-medium">Zone 2</span>
                            <span class="text-xs text-gray-500">Purok Manga</span>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex flex-col">
                                <span class="text-gray-900 font-bold">Female</span>
                                <span class="text-xs text-gray-500">Jan 01, 2000 (26 yrs old)</span>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-lg text-xs font-medium bg-gray-100 text-gray-600 border border-gray-200">
                                Unemployed / N/A
                            </span>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex justify-end gap-2">
                                <button onclick="openModal('viewProfileModal')" class="p-2 bg-blue-100 text-blue-600 rounded-lg hover:bg-blue-200 shadow-sm transition-all" title="View Profile">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>
                                </button>
                                <button onclick="openModal('addResidentModal')" class="p-2 bg-indigo-100 text-indigo-600 rounded-lg hover:bg-indigo-200 shadow-sm transition-all" title="Edit">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                                </button>
                                <button onclick="openModal('deleteModal')" class="p-2 bg-red-100 text-red-600 rounded-lg hover:bg-red-200 shadow-sm transition-all" title="Delete">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        <div class="bg-gray-50 px-6 py-4 border-t border-gray-100 flex items-center justify-between">
            <span class="text-sm text-gray-500">Showing <span class="font-bold text-gray-900">1</span> to <span class="font-bold text-gray-900">10</span> of <span class="font-bold text-gray-900">150</span> residents</span>
            <div class="inline-flex gap-1">
                 <button class="px-4 py-2 text-xs font-bold text-gray-500 bg-white border border-gray-200 rounded-lg hover:bg-gray-100 hover:text-gray-700 transition-colors">
                    Previous
                </button>
                 <button class="px-4 py-2 text-xs font-bold text-white bg-slate-900 rounded-lg hover:bg-slate-800 transition-colors shadow-sm">
                    Next
                </button>
            </div>
        </div>

    </div>
</div>

<div id="importModal" class="fixed inset-0 z-50 hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm transition-opacity" onclick="closeModal('importModal')"></div>
    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="relative w-full max-w-lg bg-white rounded-2xl shadow-2xl transform transition-all border border-gray-100 overflow-hidden">
            <div class="bg-slate-50 px-6 py-4 border-b border-gray-100 flex items-center justify-between">
                <h3 class="text-lg font-bold text-gray-900">Import Residents</h3>
                <button onclick="closeModal('importModal')" class="text-gray-400 hover:text-gray-700"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg></button>
            </div>
            <div class="p-8">
                <div class="flex flex-col items-center justify-center w-full">
                    <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-40 border-2 border-gray-300 border-dashed rounded-xl cursor-pointer bg-gray-50 hover:bg-gray-100 transition-all">
                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                            <svg class="w-8 h-8 mb-3 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                            </svg>
                            <p class="mb-2 text-sm text-gray-500"><span class="font-bold">Click to upload</span> or drag and drop</p>
                            <p class="text-xs text-gray-500">Excel or CSV files only</p>
                        </div>
                        <input id="dropzone-file" type="file" class="hidden" accept=".csv, .xlsx" />
                    </label>
                </div>
            </div>
            <div class="bg-gray-50 px-6 py-4 flex justify-end gap-3 border-t border-gray-100">
                <button onclick="closeModal('importModal')" class="px-5 py-2.5 text-sm font-bold text-slate-700 bg-white border border-gray-300 rounded-xl hover:bg-gray-50 transition-all shadow-sm">Cancel</button>
                <button class="px-5 py-2.5 text-sm font-bold text-white bg-slate-900 rounded-xl hover:bg-slate-800 shadow-md transition-all">Start Import</button>
            </div>
        </div>
    </div>
</div>

<div id="addResidentModal" class="fixed inset-0 z-50 hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm transition-opacity" onclick="closeModal('addResidentModal')"></div>
    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="relative w-full max-w-4xl bg-white rounded-2xl shadow-2xl transform transition-all border border-gray-100 overflow-hidden">
            <div class="bg-emerald-50 px-6 py-4 border-b border-emerald-100 flex items-center justify-between">
                <h3 class="text-lg font-bold text-emerald-900">Add New Resident</h3>
                <button onclick="closeModal('addResidentModal')" class="text-emerald-600 hover:text-emerald-800"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg></button>
            </div>
            <div class="p-6 space-y-4 max-h-[70vh] overflow-y-auto">
                <h4 class="text-sm font-bold text-gray-500 uppercase tracking-wider border-b border-gray-100 pb-2 mb-4">Personal Information</h4>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-gray-700 mb-1">Last Name</label>
                        <input type="text" class="w-full bg-white border border-gray-300 rounded-lg py-2 px-3 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-700 mb-1">First Name</label>
                        <input type="text" class="w-full bg-white border border-gray-300 rounded-lg py-2 px-3 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-700 mb-1">Middle Name</label>
                        <input type="text" class="w-full bg-white border border-gray-300 rounded-lg py-2 px-3 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500">
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-gray-700 mb-1">Extension (Jr, Sr)</label>
                        <input type="text" class="w-full bg-white border border-gray-300 rounded-lg py-2 px-3 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-700 mb-1">Birthdate</label>
                        <input type="date" class="w-full bg-white border border-gray-300 rounded-lg py-2 px-3 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-700 mb-1">Sex</label>
                        <select class="w-full bg-white border border-gray-300 rounded-lg py-2 px-3 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500">
                            <option>Male</option>
                            <option>Female</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-700 mb-1">Civil Status</label>
                        <select class="w-full bg-white border border-gray-300 rounded-lg py-2 px-3 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500">
                            <option>Single</option>
                            <option>Married</option>
                            <option>Widowed</option>
                        </select>
                    </div>
                </div>

                <h4 class="text-sm font-bold text-gray-500 uppercase tracking-wider border-b border-gray-100 pb-2 mb-4 mt-6">Address & Details</h4>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-gray-700 mb-1">Zone / Purok</label>
                        <select class="w-full bg-white border border-gray-300 rounded-lg py-2 px-3 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500">
                            <option>Zone 1</option>
                            <option>Zone 2</option>
                            <option>Zone 3</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-700 mb-1">Occupation</label>
                        <input type="text" class="w-full bg-white border border-gray-300 rounded-lg py-2 px-3 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-700 mb-1">Contact Number</label>
                        <input type="text" class="w-full bg-white border border-gray-300 rounded-lg py-2 px-3 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500">
                    </div>
                </div>
            </div>
            <div class="bg-gray-50 px-6 py-4 flex justify-end gap-3 border-t border-gray-100">
                <button onclick="closeModal('addResidentModal')" class="px-5 py-2.5 text-sm font-bold text-slate-700 bg-white border border-gray-300 rounded-xl hover:bg-gray-50 transition-all shadow-sm">Cancel</button>
                <button class="px-5 py-2.5 text-sm font-bold text-white bg-emerald-600 rounded-xl hover:bg-emerald-700 shadow-md transition-all">Save Resident</button>
            </div>
        </div>
    </div>
</div>

<div id="linkFamilyModal" class="fixed inset-0 z-50 hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm transition-opacity" onclick="closeModal('linkFamilyModal')"></div>
    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="relative w-full max-w-lg bg-white rounded-2xl shadow-2xl transform transition-all border border-gray-100 overflow-hidden">
            <div class="bg-indigo-50 px-6 py-4 border-b border-indigo-100 flex items-center justify-between">
                <h3 class="text-lg font-bold text-indigo-900">Link Family Members</h3>
                <button onclick="closeModal('linkFamilyModal')" class="text-indigo-600 hover:text-indigo-800"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg></button>
            </div>
            <div class="p-6 space-y-4">
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Select Head of Family</label>
                    <input type="text" placeholder="Search head of family..." class="w-full bg-white border border-gray-300 rounded-xl py-2.5 px-4 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                </div>
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Select Member to Link</label>
                    <input type="text" placeholder="Search member to add..." class="w-full bg-white border border-gray-300 rounded-xl py-2.5 px-4 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                </div>
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Relationship to Head</label>
                    <select class="w-full bg-white border border-gray-300 rounded-xl py-2.5 px-4 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        <option>Spouse</option>
                        <option>Child</option>
                        <option>Parent</option>
                        <option>Sibling</option>
                    </select>
                </div>
            </div>
            <div class="bg-gray-50 px-6 py-4 flex justify-end gap-3 border-t border-gray-100">
                <button onclick="closeModal('linkFamilyModal')" class="px-5 py-2.5 text-sm font-bold text-slate-700 bg-white border border-gray-300 rounded-xl hover:bg-gray-50 transition-all shadow-sm">Cancel</button>
                <button class="px-5 py-2.5 text-sm font-bold text-white bg-indigo-600 rounded-xl hover:bg-indigo-700 shadow-md transition-all">Link Member</button>
            </div>
        </div>
    </div>
</div>

<div id="viewFamiliesModal" class="fixed inset-0 z-50 hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm transition-opacity" onclick="closeModal('viewFamiliesModal')"></div>
    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="relative w-full max-w-lg bg-white rounded-2xl shadow-2xl transform transition-all border border-gray-100 overflow-hidden">
            <div class="bg-slate-50 px-6 py-4 border-b border-gray-100 flex items-center justify-between">
                <h3 class="text-lg font-bold text-gray-900">Family Groups</h3>
                <button onclick="closeModal('viewFamiliesModal')" class="text-gray-400 hover:text-gray-700"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg></button>
            </div>
            <div class="p-6">
                <div class="mb-4">
                    <input type="text" placeholder="Search Family Head..." class="w-full bg-gray-50 border border-gray-200 rounded-lg py-2 px-3 text-sm focus:outline-none focus:ring-2 focus:ring-slate-500">
                </div>
                <div class="space-y-3 max-h-64 overflow-y-auto">
                    <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg border border-gray-100">
                        <div>
                            <p class="font-bold text-gray-900 text-sm">Cruz Family</p>
                            <p class="text-xs text-gray-500">Head: Juan Dela Cruz • 4 Members</p>
                        </div>
                        <button class="text-xs font-bold text-indigo-600 hover:text-indigo-800">View Details</button>
                    </div>
                    <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg border border-gray-100">
                        <div>
                            <p class="font-bold text-gray-900 text-sm">Reyes Family</p>
                            <p class="text-xs text-gray-500">Head: Maria Reyes • 3 Members</p>
                        </div>
                        <button class="text-xs font-bold text-indigo-600 hover:text-indigo-800">View Details</button>
                    </div>
                </div>
            </div>
            <div class="bg-gray-50 px-6 py-4 flex justify-end border-t border-gray-100">
                <button onclick="closeModal('viewFamiliesModal')" class="px-5 py-2.5 text-sm font-bold text-slate-700 bg-white border border-gray-300 rounded-xl hover:bg-gray-50 transition-all shadow-sm">Close</button>
            </div>
        </div>
    </div>
</div>

<div id="viewProfileModal" class="fixed inset-0 z-50 hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm transition-opacity" onclick="closeModal('viewProfileModal')"></div>
    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="relative w-full max-w-lg bg-white rounded-2xl shadow-2xl transform transition-all border border-gray-100 overflow-hidden">
            <div class="bg-blue-50 px-6 py-4 border-b border-blue-100 flex items-center justify-between">
                <h3 class="text-lg font-bold text-blue-900">Resident Profile</h3>
                <button onclick="closeModal('viewProfileModal')" class="text-blue-500 hover:text-blue-700"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg></button>
            </div>
            <div class="p-6">
                <div class="flex items-center gap-4 mb-6">
                    <div class="h-16 w-16 rounded-full bg-blue-100 flex items-center justify-center text-blue-700 font-bold text-2xl border-2 border-white shadow-md">
                        CB
                    </div>
                    <div>
                        <h2 class="text-xl font-bold text-gray-900">Cynthia Bahia Añedez</h2>
                        <p class="text-sm text-gray-500">ID: RES-001</p>
                        <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-bold bg-emerald-100 text-emerald-800 border border-emerald-200 mt-1">Active Resident</span>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4 text-sm">
                    <div>
                        <p class="text-gray-500 text-xs uppercase font-bold">Address</p>
                        <p class="font-medium text-gray-900">Zone 2, Purok Manga</p>
                    </div>
                    <div>
                        <p class="text-gray-500 text-xs uppercase font-bold">Birthdate</p>
                        <p class="font-medium text-gray-900">Jan 01, 2000 (26 yrs old)</p>
                    </div>
                    <div>
                        <p class="text-gray-500 text-xs uppercase font-bold">Civil Status</p>
                        <p class="font-medium text-gray-900">Single</p>
                    </div>
                    <div>
                        <p class="text-gray-500 text-xs uppercase font-bold">Occupation</p>
                        <p class="font-medium text-gray-900">None</p>
                    </div>
                </div>
            </div>
            <div class="bg-gray-50 px-6 py-4 flex justify-end border-t border-gray-100">
                <button onclick="closeModal('viewProfileModal')" class="px-5 py-2.5 text-sm font-bold text-slate-700 bg-white border border-gray-300 rounded-xl hover:bg-gray-50 transition-all shadow-sm">Close</button>
            </div>
        </div>
    </div>
</div>

<div id="deleteModal" class="fixed inset-0 z-50 hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm transition-opacity" onclick="closeModal('deleteModal')"></div>
    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="relative w-full max-w-sm bg-white rounded-2xl shadow-2xl transform transition-all border border-gray-100 overflow-hidden">
            <div class="p-6 text-center">
                <div class="w-12 h-12 rounded-full bg-red-100 flex items-center justify-center mx-auto mb-4 text-red-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-2">Delete Resident?</h3>
                <p class="text-sm text-gray-500">Are you sure you want to delete this resident record? This action cannot be undone.</p>
            </div>
            <div class="bg-gray-50 px-6 py-4 flex justify-center gap-3 border-t border-gray-100">
                <button onclick="closeModal('deleteModal')" class="px-5 py-2.5 text-sm font-bold text-slate-700 bg-white border border-gray-300 rounded-xl hover:bg-gray-50 transition-all shadow-sm">Cancel</button>
                <button class="px-5 py-2.5 text-sm font-bold text-white bg-red-600 rounded-xl hover:bg-red-700 shadow-md transition-all">Yes, Delete</button>
            </div>
        </div>
    </div>
</div>

<script>
    function openModal(id) { document.getElementById(id).classList.remove('hidden'); }
    function closeModal(id) { document.getElementById(id).classList.add('hidden'); }
</script>
@endsection