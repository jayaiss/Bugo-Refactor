@extends('layouts.admin')

@section('header')
    Appointment List
@endsection

@section('content')
<div class="max-w-7xl mx-auto">
    
    <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100">
        
        <div class="p-6 border-b border-gray-100 flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div>
                <h3 class="text-xl font-bold text-gray-900">Manage Appointments</h3>
                <p class="text-sm text-gray-500">View, track, and manage resident appointment schedules.</p>
            </div>
            
            <button onclick="openModal('exportModal')" class="flex items-center gap-2 bg-indigo-50 border border-indigo-100 text-indigo-600 hover:bg-indigo-100 px-4 py-2 rounded-lg text-sm font-medium transition-colors shadow-sm">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                Export List
            </button>
        </div>

        <div class="bg-gray-50/50 p-6 border-b border-gray-100">
            <form class="grid grid-cols-1 md:grid-cols-12 gap-4">
                <div class="md:col-span-3">
                    <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-1">Date</label>
                    <input type="date" class="w-full bg-white border border-gray-300 text-gray-700 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 shadow-sm">
                </div>
                <div class="md:col-span-3">
                    <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-1">Status</label>
                    <select class="w-full bg-white border border-gray-300 text-gray-700 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 shadow-sm">
                        <option value="all">All Statuses</option>
                        <option value="pending">Pending</option>
                        <option value="approved">Approved</option>
                        <option value="completed">Completed</option>
                    </select>
                </div>
                <div class="md:col-span-6">
                    <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-1">Search</label>
                    <div class="relative">
                        <input type="text" class="w-full bg-white border border-gray-300 text-gray-700 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 pl-10 shadow-sm" placeholder="Search by name, tracking number...">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                        </div>
                        <button type="submit" class="absolute right-1 bottom-1 top-1 bg-slate-900 hover:bg-slate-800 text-white font-medium rounded-md text-xs px-4 py-1.5 transition-colors">Apply</button>
                    </div>
                </div>
            </form>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 border-b border-gray-100">
                    <tr>
                        <th class="px-6 py-4 font-bold tracking-wider">Full Name</th>
                        <th class="px-6 py-4 font-bold tracking-wider">Certificate</th>
                        <th class="px-6 py-4 font-bold tracking-wider">Tracking #</th>
                        <th class="px-6 py-4 font-bold tracking-wider">Date & Time</th>
                        <th class="px-6 py-4 font-bold tracking-wider">Status</th>
                        <th class="px-6 py-4 font-bold tracking-wider text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    <tr class="bg-white hover:bg-gray-50 transition-colors group">
                        <td class="px-6 py-4"><div class="font-medium text-gray-900">Juan Dela Cruz</div><div class="text-xs text-gray-400">ID: 2026-001</div></td>
                        <td class="px-6 py-4">Barangay Clearance</td>
                        <td class="px-6 py-4 font-mono text-xs text-gray-600 bg-gray-50 px-2 py-1 rounded w-fit">TRK-982123</td>
                        <td class="px-6 py-4"><div class="text-gray-900">Jan 12, 2026</div><div class="text-xs text-gray-400">10:00 AM</div></td>
                        <td class="px-6 py-4"><span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800 border border-yellow-200">Pending</span></td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex items-center justify-end gap-3">
                                <button onclick="openModal('viewModal')" class="flex items-center justify-center w-8 h-8 rounded-lg bg-blue-100 text-blue-600 hover:bg-blue-200 transition-all" title="View Details">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>
                                </button>
                                <button class="flex items-center justify-center w-8 h-8 rounded-lg bg-emerald-100 text-emerald-600 hover:bg-emerald-200 transition-all" title="Print">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" /></svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr class="bg-white hover:bg-gray-50 transition-colors group">
                        <td class="px-6 py-4"><div class="font-medium text-gray-900">Maria Clara</div><div class="text-xs text-gray-400">ID: 2026-002</div></td>
                        <td class="px-6 py-4">Indigency</td>
                        <td class="px-6 py-4 font-mono text-xs text-gray-600 bg-gray-50 px-2 py-1 rounded w-fit">TRK-551029</td>
                        <td class="px-6 py-4"><div class="text-gray-900">Jan 13, 2026</div><div class="text-xs text-gray-400">01:00 PM</div></td>
                        <td class="px-6 py-4"><span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 border border-green-200">Approved</span></td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex items-center justify-end gap-3">
                                <button onclick="openModal('viewModal')" class="flex items-center justify-center w-8 h-8 rounded-lg bg-blue-100 text-blue-600 hover:bg-blue-200 transition-all" title="View Details">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>
                                </button>
                                <button class="flex items-center justify-center w-8 h-8 rounded-lg bg-emerald-100 text-emerald-600 hover:bg-emerald-200 transition-all" title="Print">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" /></svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="bg-gray-50 px-6 py-4 border-t border-gray-100 flex items-center justify-between">
            <span class="text-sm text-gray-500">Showing 1 to 10 of 100 Entries</span>
            <div class="inline-flex gap-1">
                <button class="px-4 py-2 text-xs font-bold text-gray-500 bg-white border border-gray-200 rounded-lg hover:bg-gray-100">Previous</button>
                <button class="px-4 py-2 text-xs font-bold text-white bg-slate-900 rounded-lg hover:bg-slate-800">Next</button>
            </div>
        </div>
    </div>
</div>

<div id="exportModal" class="fixed inset-0 z-50 hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm transition-opacity" onclick="closeModal('exportModal')"></div>
    
    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="relative w-full max-w-md bg-white rounded-2xl shadow-2xl transform transition-all border border-gray-100">
            
            <div class="bg-indigo-50 px-6 py-4 border-b border-indigo-100 rounded-t-2xl flex items-center justify-between">
                <h3 class="text-lg font-bold text-indigo-900">Export Options</h3>
                <button onclick="closeModal('exportModal')" class="text-indigo-400 hover:text-indigo-700">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>

            <div class="p-6 space-y-4">
                <div>
                    <label class="block text-xs font-bold text-gray-500 uppercase mb-2">Select Format</label>
                    <div class="grid grid-cols-2 gap-3">
                        <label class="border border-gray-200 rounded-xl p-3 flex items-center gap-3 cursor-pointer hover:border-indigo-500 hover:bg-indigo-50 transition-all">
                            <input type="radio" name="export_format" class="text-indigo-600 focus:ring-indigo-500" checked>
                            <span class="text-sm font-medium text-gray-700">Excel (.xlsx)</span>
                        </label>
                        <label class="border border-gray-200 rounded-xl p-3 flex items-center gap-3 cursor-pointer hover:border-indigo-500 hover:bg-indigo-50 transition-all">
                            <input type="radio" name="export_format" class="text-indigo-600 focus:ring-indigo-500">
                            <span class="text-sm font-medium text-gray-700">PDF Document</span>
                        </label>
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-bold text-gray-500 uppercase mb-2">Date Range</label>
                    <select class="w-full border-gray-300 rounded-xl text-sm focus:ring-indigo-500 focus:border-indigo-500">
                        <option>Current View</option>
                        <option>Last 7 Days</option>
                        <option>Last 30 Days</option>
                        <option>All Time</option>
                    </select>
                </div>
            </div>

            <div class="bg-gray-50 px-6 py-4 rounded-b-2xl flex justify-end gap-2 border-t border-gray-100">
                <button onclick="closeModal('exportModal')" class="px-4 py-2 text-sm font-bold text-gray-500 hover:text-gray-700">Cancel</button>
                <button class="px-4 py-2 text-sm font-bold text-white bg-indigo-600 rounded-lg hover:bg-indigo-700 shadow-lg shadow-indigo-200">Export File</button>
            </div>
        </div>
    </div>
</div>

<div id="viewModal" class="fixed inset-0 z-50 hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm transition-opacity" onclick="closeModal('viewModal')"></div>
    
    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="relative w-full max-w-lg bg-white rounded-2xl shadow-2xl transform transition-all border border-gray-100">
            
            <div class="bg-blue-50 px-6 py-4 border-b border-blue-100 rounded-t-2xl flex items-center justify-between">
                <div>
                    <h3 class="text-lg font-bold text-blue-900">Appointment Details</h3>
                    <p class="text-xs text-blue-600">Tracking #: <span class="font-mono">TRK-982123</span></p>
                </div>
                <button onclick="closeModal('viewModal')" class="text-blue-400 hover:text-blue-700">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>

            <div class="p-6">
                <div class="flex items-center gap-4 mb-6">
                    <div class="h-16 w-16 rounded-full bg-slate-200 flex items-center justify-center text-xl font-bold text-slate-500">
                        JD
                    </div>
                    <div>
                        <h4 class="text-xl font-bold text-gray-900">Juan Dela Cruz</h4>
                        <p class="text-sm text-gray-500">Resident ID: 2026-001</p>
                        <span class="inline-block mt-1 px-2 py-0.5 rounded text-xs font-bold bg-yellow-100 text-yellow-800">Pending</span>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div class="bg-gray-50 p-3 rounded-xl border border-gray-100">
                        <p class="text-xs text-gray-500 uppercase font-bold">Request Type</p>
                        <p class="text-sm font-medium text-gray-900 mt-1">Barangay Clearance</p>
                    </div>
                    <div class="bg-gray-50 p-3 rounded-xl border border-gray-100">
                        <p class="text-xs text-gray-500 uppercase font-bold">Schedule</p>
                        <p class="text-sm font-medium text-gray-900 mt-1">Jan 12, 2026</p>
                        <p class="text-xs text-gray-500">10:00 AM - 11:00 AM</p>
                    </div>
                    <div class="bg-gray-50 p-3 rounded-xl border border-gray-100 col-span-2">
                        <p class="text-xs text-gray-500 uppercase font-bold">Purpose / Notes</p>
                        <p class="text-sm text-gray-600 mt-1">Requesting document for employment requirements at XYZ Corp.</p>
                    </div>
                </div>
            </div>

            <div class="bg-gray-50 px-6 py-4 rounded-b-2xl flex justify-end gap-2 border-t border-gray-100">
                <button onclick="closeModal('viewModal')" class="px-4 py-2 text-sm font-bold text-gray-500 hover:text-gray-700">Close</button>
                <button class="px-4 py-2 text-sm font-bold text-white bg-blue-600 rounded-lg hover:bg-blue-700 shadow-lg shadow-blue-200">Approve Request</button>
            </div>
        </div>
    </div>
</div>

<script>
    function openModal(id) {
        document.getElementById(id).classList.remove('hidden');
    }
    function closeModal(id) {
        document.getElementById(id).classList.add('hidden');
    }
</script>

@endsection