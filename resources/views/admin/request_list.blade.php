@extends('layouts.admin')

@section('header')
    Medicine Requests
@endsection

@section('content')
<div class="max-w-7xl mx-auto">
    
    <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100">
        
        <div class="px-6 py-5 border-b border-gray-100 flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div>
                <h3 class="text-lg font-bold text-gray-900">Medicine Requests</h3>
                <p class="text-xs text-gray-500 mt-0.5">Manage resident health requests efficiently.</p>
            </div>
            <div class="flex items-center gap-3">
                <button class="flex items-center gap-2 bg-white border border-gray-300 hover:bg-gray-50 text-slate-700 font-bold py-2.5 px-4 rounded-xl transition-all shadow-sm text-sm">
                    <svg class="w-4 h-4 text-slate-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
                    Reports
                </button>
                <button onclick="openModal('createModal')" class="flex items-center gap-2 bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-2.5 px-5 rounded-xl transition-all shadow-md transform hover:-translate-y-0.5 text-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                    New Request
                </button>
            </div>
        </div>

        <div class="bg-gray-50/50 p-6 border-b border-gray-200">
            <form>
                <div class="grid grid-cols-1 md:grid-cols-12 gap-4 items-end">
                    
                    <div class="md:col-span-5">
                        <label class="block text-xs font-bold text-gray-700 mb-1.5">Search Name or ID</label>
                        <div class="relative">
                            <input type="text" placeholder="Search..." class="w-full bg-white border border-gray-300 rounded-xl py-2 pl-10 pr-3 text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-all shadow-sm">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                            </div>
                        </div>
                    </div>

                    <div class="md:col-span-3">
                        <label class="block text-xs font-bold text-gray-700 mb-1.5">Status</label>
                        <select class="w-full bg-white border border-gray-300 rounded-xl py-2 px-3 text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-all shadow-sm cursor-pointer">
                            <option value="all">All Statuses</option>
                            <option value="pending">Pending</option>
                            <option value="approved">Approved</option>
                            <option value="dispensed">Dispensed</option>
                        </select>
                    </div>

                     <div class="md:col-span-3">
                        <label class="block text-xs font-bold text-gray-700 mb-1.5">Date Range</label>
                        <input type="date" class="w-full bg-white border border-gray-300 rounded-xl py-2 px-3 text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-all shadow-sm">
                    </div>

                    <div class="md:col-span-1">
                        <button type="submit" class="w-full flex items-center justify-center gap-2 bg-slate-900 hover:bg-slate-800 text-white font-bold py-2 px-4 rounded-xl transition-all shadow-md transform hover:-translate-y-0.5 text-sm h-[38px]">
                            Apply
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 border-b border-gray-100">
                    <tr>
                        <th class="px-6 py-4 font-bold tracking-wider">RESIDENT</th>
                        <th class="px-6 py-4 font-bold tracking-wider">REQUEST DATE</th>
                        <th class="px-6 py-4 font-bold tracking-wider">STATUS</th>
                        <th class="px-6 py-4 font-bold tracking-wider">PRESCRIPTION</th>
                        <th class="px-6 py-4 font-bold tracking-wider text-right">ACTION</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    
                    <tr class="bg-white hover:bg-gray-50 transition-colors group">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="h-9 w-9 rounded-full bg-emerald-100 flex items-center justify-center text-emerald-700 font-bold text-xs">
                                    JD
                                </div>
                                <div>
                                    <div class="font-bold text-gray-900">Juan Dela Cruz</div>
                                    <div class="text-xs text-gray-500">Requesting: <span class="font-semibold text-emerald-600">Paracetamol (10 tabs)</span></div>
                                </div>
                            </div>
                        </td>
                        
                        <td class="px-6 py-4 text-gray-900 whitespace-nowrap">
                            Jan 13, 2026 <span class="text-xs text-gray-500 block">09:30 AM</span>
                        </td>
                        
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold bg-orange-100 text-orange-800 border border-orange-200 uppercase">
                                Pending
                            </span>
                        </td>

                        <td class="px-6 py-4">
                            <button class="flex items-center gap-1 text-xs font-bold text-purple-600 bg-purple-50 hover:bg-purple-100 px-3 py-1.5 rounded-lg transition-colors border border-purple-100">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"></path></svg>
                                View File
                            </button>
                        </td>

                        <td class="px-6 py-4 text-right">
                            <div class="flex justify-end gap-2">
                                <button onclick="openModal('viewModal')" class="flex items-center gap-1.5 px-3 py-1.5 bg-white border border-gray-200 text-slate-600 rounded-lg hover:bg-gray-50 hover:border-gray-300 shadow-sm transition-all text-xs font-bold">
                                    Review
                                </button>
                            </div>
                        </td>
                    </tr>

                    <tr class="bg-white hover:bg-gray-50 transition-colors group">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="h-9 w-9 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-700 font-bold text-xs">
                                    MC
                                </div>
                                <div>
                                    <div class="font-bold text-gray-900">Maria Clara</div>
                                    <div class="text-xs text-gray-500">Requesting: <span class="font-semibold text-emerald-600">Amlodipine (30 tabs)</span></div>
                                </div>
                            </div>
                        </td>
                        
                        <td class="px-6 py-4 text-gray-900 whitespace-nowrap">
                            Jan 12, 2026 <span class="text-xs text-gray-500 block">02:15 PM</span>
                        </td>
                        
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold bg-blue-100 text-blue-800 border border-blue-200 uppercase">
                                Approved
                            </span>
                        </td>

                        <td class="px-6 py-4">
                            <span class="text-xs text-gray-400 italic">No Attachment</span>
                        </td>

                        <td class="px-6 py-4 text-right">
                            <div class="flex justify-end gap-2">
                                <button onclick="openModal('viewModal')" class="flex items-center gap-1.5 px-3 py-1.5 bg-emerald-100 text-emerald-700 border border-emerald-200 rounded-lg hover:bg-emerald-200 shadow-sm transition-all text-xs font-bold">
                                    Dispense
                                </button>
                            </div>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
        
        <div class="bg-gray-50 px-6 py-4 border-t border-gray-100 flex items-center justify-between">
            <span class="text-sm text-gray-500">Showing <span class="font-bold text-gray-900">1</span> to <span class="font-bold text-gray-900">10</span> of <span class="font-bold text-gray-900">15</span> requests</span>
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

<div id="createModal" class="fixed inset-0 z-50 hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm transition-opacity" onclick="closeModal('createModal')"></div>
    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="relative w-full max-w-lg bg-white rounded-2xl shadow-2xl transform transition-all border border-gray-100 overflow-hidden">
            
            <div class="bg-slate-50 px-6 py-4 border-b border-gray-100 flex items-center justify-between">
                <h3 class="text-lg font-bold text-gray-900">New Medicine Request</h3>
                <button onclick="closeModal('createModal')" class="text-gray-400 hover:text-gray-700"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg></button>
            </div>

            <div class="p-6 space-y-4">
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Select Resident</label>
                    <input type="text" placeholder="Search resident name..." class="w-full bg-white border border-gray-300 rounded-xl py-2.5 px-4 text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-all shadow-sm">
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Medicine / Item</label>
                        <select class="w-full bg-white border border-gray-300 rounded-xl py-2.5 px-4 text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-all shadow-sm">
                            <option>Paracetamol</option>
                            <option>Amlodipine</option>
                            <option>Losartan</option>
                            <option>Vitamins</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Quantity</label>
                        <input type="number" placeholder="e.g. 10" class="w-full bg-white border border-gray-300 rounded-xl py-2.5 px-4 text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-all shadow-sm">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Upload Prescription (Optional)</label>
                    <div class="flex items-center justify-center w-full">
                        <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-xl cursor-pointer bg-gray-50 hover:bg-gray-100">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg class="w-8 h-8 mb-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                                <p class="mb-2 text-xs text-gray-500"><span class="font-bold">Click to upload</span> or drag and drop</p>
                            </div>
                            <input id="dropzone-file" type="file" class="hidden" />
                        </label>
                    </div> 
                </div>
            </div>

            <div class="bg-gray-50 px-6 py-4 flex justify-end gap-3 border-t border-gray-100">
                <button onclick="closeModal('createModal')" class="px-5 py-2.5 text-sm font-bold text-slate-700 bg-white border border-gray-300 rounded-xl hover:bg-gray-50 transition-all shadow-sm">Cancel</button>
                <button class="px-5 py-2.5 text-sm font-bold text-white bg-emerald-600 rounded-xl hover:bg-emerald-700 shadow-md transition-all">Submit Request</button>
            </div>
        </div>
    </div>
</div>

<div id="viewModal" class="fixed inset-0 z-50 hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm transition-opacity" onclick="closeModal('viewModal')"></div>
    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="relative w-full max-w-lg bg-white rounded-2xl shadow-2xl transform transition-all border border-gray-100 overflow-hidden">
            
            <div class="bg-emerald-50 px-6 py-4 border-b border-emerald-100 flex items-center justify-between">
                <div>
                    <h3 class="text-lg font-bold text-emerald-900">Request Details</h3>
                    <p class="text-xs text-emerald-700 mt-0.5">Ref: MED-2026-088</p>
                </div>
                <button onclick="closeModal('viewModal')" class="text-emerald-400 hover:text-emerald-700"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg></button>
            </div>

            <div class="p-6">
                <div class="grid grid-cols-2 gap-4 mb-4">
                    <div class="p-3 bg-gray-50 rounded-xl border border-gray-100">
                        <p class="text-xs font-bold text-gray-500 uppercase">Resident</p>
                        <p class="font-bold text-gray-900 text-sm mt-1">Juan Dela Cruz</p>
                    </div>
                    <div class="p-3 bg-gray-50 rounded-xl border border-gray-100">
                        <p class="text-xs font-bold text-gray-500 uppercase">Status</p>
                        <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-bold bg-orange-100 text-orange-800 border border-orange-200 uppercase mt-1">Pending</span>
                    </div>
                </div>

                <div class="mb-6">
                    <p class="text-xs font-bold text-gray-500 uppercase mb-2">Requested Items</p>
                    <div class="flex items-center justify-between p-3 border border-gray-200 rounded-xl bg-white shadow-sm">
                        <div class="flex items-center gap-3">
                            <div class="h-10 w-10 bg-emerald-50 rounded-lg flex items-center justify-center text-emerald-600">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.384-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path></svg>
                            </div>
                            <div>
                                <p class="text-sm font-bold text-gray-900">Paracetamol (Biogesic)</p>
                                <p class="text-xs text-gray-500">Stock Available: 500</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="text-xs text-gray-500">Qty Requested</p>
                            <p class="text-lg font-bold text-emerald-600">10</p>
                        </div>
                    </div>
                </div>
                
                <div class="flex gap-2">
                    <button class="flex-1 py-2.5 border border-red-200 bg-white text-red-600 font-bold rounded-xl hover:bg-red-50 transition-all text-sm shadow-sm">Reject Request</button>
                    <button class="flex-1 py-2.5 bg-emerald-600 text-white font-bold rounded-xl hover:bg-emerald-700 shadow-md transition-all text-sm">Approve & Dispense</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function openModal(id) { document.getElementById(id).classList.remove('hidden'); }
    function closeModal(id) { document.getElementById(id).classList.add('hidden'); }
</script>
@endsection