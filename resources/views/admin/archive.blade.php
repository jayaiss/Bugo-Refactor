@extends('layouts.admin')

@section('header')
    System Archives
@endsection

@section('content')
<div class="max-w-7xl mx-auto">
    
    <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100 min-h-[600px] flex flex-col">
        
        <div class="px-8 py-6 border-b border-gray-100 flex flex-col md:flex-row md:items-center justify-between gap-4 bg-gradient-to-r from-slate-50 to-white">
            <div>
                <h3 class="text-xl font-bold text-gray-900">Recycle Bin & Archives</h3>
                <p class="text-sm text-gray-500 mt-1">View, restore, or permanently delete removed records.</p>
            </div>
            
            <div class="relative w-full md:w-64">
                <input type="text" 
                       placeholder="Search archives..." 
                       class="w-full bg-white border border-gray-900 rounded-xl py-2 pl-10 pr-4 text-sm text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-slate-900 focus:border-transparent transition-all shadow-sm">
                
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-900" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </div>
            </div>

        </div>

        <div class="bg-slate-100/80 px-8 py-4 border-b border-gray-200 overflow-x-auto">
            <div class="flex space-x-2 min-w-max">
                <button onclick="switchTab('residents')" id="tab-residents" class="tab-btn px-4 py-2 rounded-lg text-sm font-bold transition-all bg-slate-900 text-white shadow-md">
                    Residents
                </button>
                <button onclick="switchTab('employees')" id="tab-employees" class="tab-btn px-4 py-2 rounded-lg text-sm font-bold text-gray-600 hover:bg-white hover:text-indigo-600 transition-all border border-transparent hover:border-indigo-100 hover:shadow-sm">
                    Employees
                </button>
                <button onclick="switchTab('appointments')" id="tab-appointments" class="tab-btn px-4 py-2 rounded-lg text-sm font-bold text-gray-600 hover:bg-white hover:text-indigo-600 transition-all border border-transparent hover:border-indigo-100 hover:shadow-sm">
                    Appointments
                </button>
                <button onclick="switchTab('events')" id="tab-events" class="tab-btn px-4 py-2 rounded-lg text-sm font-bold text-gray-600 hover:bg-white hover:text-indigo-600 transition-all border border-transparent hover:border-indigo-100 hover:shadow-sm">
                    Events
                </button>
                <button onclick="switchTab('feedback')" id="tab-feedback" class="tab-btn px-4 py-2 rounded-lg text-sm font-bold text-gray-600 hover:bg-white hover:text-indigo-600 transition-all border border-transparent hover:border-indigo-100 hover:shadow-sm">
                    Feedback
                </button>
            </div>
        </div>

        <div class="p-0 flex-1 bg-white relative">
            
            <div id="content-residents" class="tab-content block h-full">
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500">
                        <thead class="text-xs text-gray-700 uppercase bg-slate-50/50 border-b border-gray-100">
                            <tr>
                                <th class="px-6 py-4 font-bold">ID</th>
                                <th class="px-6 py-4 font-bold">Full Name</th>
                                <th class="px-6 py-4 font-bold">Gender</th>
                                <th class="px-6 py-4 font-bold">Purok / Address</th>
                                <th class="px-6 py-4 font-bold">Deleted At</th>
                                <th class="px-6 py-4 font-bold text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            <tr class="bg-white hover:bg-red-50/40 transition-colors">
                                <td class="px-6 py-4 font-mono text-xs text-red-900/70">RES-009</td>
                                <td class="px-6 py-4 font-medium text-gray-900">Pedro Penduko</td>
                                <td class="px-6 py-4">Male</td>
                                <td class="px-6 py-4">Purok 3</td>
                                <td class="px-6 py-4 text-xs text-red-600">Oct 24, 2025</td>
                                <td class="px-6 py-4 text-right">
                                    <div class="flex justify-end gap-2">
                                        <button class="p-2 bg-emerald-100 text-emerald-600 rounded-lg hover:bg-emerald-200 shadow-sm transition-all" title="Restore"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg></button>
                                        <button class="p-2 bg-red-100 text-red-600 rounded-lg hover:bg-red-200 shadow-sm transition-all" title="Delete Permanently"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg></button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div id="content-employees" class="tab-content hidden h-full">
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500">
                        <thead class="text-xs text-gray-700 uppercase bg-slate-50/50 border-b border-gray-100">
                            <tr>
                                <th class="px-6 py-4 font-bold">ID</th>
                                <th class="px-6 py-4 font-bold">Full Name</th>
                                <th class="px-6 py-4 font-bold">Role / Position</th>
                                <th class="px-6 py-4 font-bold">Deleted At</th>
                                <th class="px-6 py-4 font-bold text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            <tr class="bg-white hover:bg-red-50/40 transition-colors">
                                <td class="px-6 py-4 font-mono text-xs text-red-900/70">EMP-102</td>
                                <td class="px-6 py-4 font-medium text-gray-900">Ana Marie</td>
                                <td class="px-6 py-4">BHW Staff</td>
                                <td class="px-6 py-4 text-xs text-red-600">Nov 01, 2025</td>
                                <td class="px-6 py-4 text-right">
                                    <div class="flex justify-end gap-2">
                                        <button class="p-2 bg-emerald-100 text-emerald-600 rounded-lg hover:bg-emerald-200 shadow-sm transition-all" title="Restore"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg></button>
                                        <button class="p-2 bg-red-100 text-red-600 rounded-lg hover:bg-red-200 shadow-sm transition-all" title="Delete Permanently"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg></button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div id="content-appointments" class="tab-content hidden h-full">
                 <div class="flex flex-col items-center justify-center h-full py-20 text-center">
                    <div class="p-4 bg-indigo-50 rounded-full text-indigo-300 mb-3">
                        <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    </div>
                    <p class="text-gray-500 font-medium">No archived appointments found.</p>
                </div>
            </div>

            <div id="content-events" class="tab-content hidden h-full">
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500">
                        <thead class="text-xs text-gray-700 uppercase bg-slate-50/50 border-b border-gray-100">
                            <tr>
                                <th class="px-6 py-4 font-bold">Event Title</th>
                                <th class="px-6 py-4 font-bold">Location</th>
                                <th class="px-6 py-4 font-bold">Date Scheduled</th>
                                <th class="px-6 py-4 font-bold text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            <tr class="bg-white hover:bg-red-50/40 transition-colors">
                                <td class="px-6 py-4 font-medium text-gray-900">Basketball League</td>
                                <td class="px-6 py-4">Covered Court</td>
                                <td class="px-6 py-4 text-red-600">Dec 12, 2025</td>
                                <td class="px-6 py-4 text-right">
                                    <div class="flex justify-end gap-2">
                                        <button class="p-2 bg-emerald-100 text-emerald-600 rounded-lg hover:bg-emerald-200 shadow-sm transition-all" title="Restore"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg></button>
                                        <button class="p-2 bg-red-100 text-red-600 rounded-lg hover:bg-red-200 shadow-sm transition-all" title="Delete Permanently"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg></button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div id="content-feedback" class="tab-content hidden h-full">
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500">
                        <thead class="text-xs text-gray-700 uppercase bg-slate-50/50 border-b border-gray-100">
                            <tr>
                                <th class="px-6 py-4 font-bold">Feedback ID</th>
                                <th class="px-6 py-4 font-bold">Message Content</th>
                                <th class="px-6 py-4 font-bold">Received At</th>
                                <th class="px-6 py-4 font-bold text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            <tr class="bg-white hover:bg-red-50/40 transition-colors">
                                <td class="px-6 py-4 font-mono text-xs text-red-900/70">FDB-992</td>
                                <td class="px-6 py-4 text-gray-900 truncate max-w-xs">Suggesting to add more lights near the main road...</td>
                                <td class="px-6 py-4 text-xs text-red-600">Jan 02, 2026</td>
                                <td class="px-6 py-4 text-right">
                                    <div class="flex justify-end gap-2">
                                        <button class="p-2 bg-emerald-100 text-emerald-600 rounded-lg hover:bg-emerald-200 shadow-sm transition-all" title="Restore"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg></button>
                                        <button class="p-2 bg-red-100 text-red-600 rounded-lg hover:bg-red-200 shadow-sm transition-all" title="Delete Permanently"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg></button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

    </div>
</div>

<script>
    function switchTab(tabId) {
        // 1. Hide all tab content
        document.querySelectorAll('.tab-content').forEach(el => el.classList.add('hidden'));
        document.querySelectorAll('.tab-content').forEach(el => el.classList.remove('block'));

        // 2. Show the selected content
        document.getElementById('content-' + tabId).classList.remove('hidden');
        document.getElementById('content-' + tabId).classList.add('block');

        // 3. Reset all buttons to inactive style with new hover colors
        document.querySelectorAll('.tab-btn').forEach(btn => {
            btn.classList.remove('bg-slate-900', 'text-white', 'shadow-md');
            btn.classList.add('text-gray-600', 'hover:bg-white', 'hover:text-indigo-600', 'hover:border-indigo-100', 'hover:shadow-sm');
        });

        // 4. Set active button style
        const activeBtn = document.getElementById('tab-' + tabId);
        activeBtn.classList.remove('text-gray-600', 'hover:bg-white', 'hover:text-indigo-600', 'hover:border-indigo-100', 'hover:shadow-sm');
        activeBtn.classList.add('bg-slate-900', 'text-white', 'shadow-md');
    }
</script>
@endsection