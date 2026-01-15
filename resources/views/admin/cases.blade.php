@extends('layouts.admin')

@section('header')
    Cases List (Lupon)
@endsection

@section('content')
<div class="max-w-7xl mx-auto">
    
    <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100">
        
        <div class="px-6 py-5 border-b border-gray-100 flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div>
                <h3 class="text-lg font-bold text-gray-900">Barangay Justice Cases</h3>
                <p class="text-xs text-gray-500 mt-0.5">Manage filed complaints, hearings, and resolutions.</p>
            </div>
            <div class="flex items-center gap-3">
                <button onclick="openModal('batchUploadModal')" class="flex items-center gap-2 bg-white border border-gray-300 hover:bg-gray-50 text-gray-700 font-bold py-2.5 px-4 rounded-xl transition-all shadow-sm text-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path></svg>
                    Batch Upload
                </button>
                <button onclick="openModal('createModal')" class="flex items-center gap-2 bg-slate-900 hover:bg-slate-800 text-white font-bold py-2.5 px-5 rounded-xl transition-all shadow-md transform hover:-translate-y-0.5 text-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                    Add Case
                </button>
            </div>
        </div>

        <div class="bg-gray-50/50 p-6 border-b border-gray-200">
            <form>
                <div class="grid grid-cols-1 md:grid-cols-12 gap-4 items-end">
                    
                    <div class="md:col-span-5">
                        <label class="block text-xs font-bold text-gray-700 mb-1.5">Search</label>
                        <div class="relative">
                            <input type="text" placeholder="Search complainant, respondent, or case #..." class="w-full bg-white border border-gray-300 rounded-xl py-2 pl-10 pr-3 text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all shadow-sm">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                            </div>
                        </div>
                    </div>

                    <div class="md:col-span-3">
                        <label class="block text-xs font-bold text-gray-700 mb-1.5">Case Status</label>
                        <select class="w-full bg-white border border-gray-300 rounded-xl py-2 px-3 text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all shadow-sm cursor-pointer">
                            <option value="all">All Statuses</option>
                            <option value="pending">Pending / Mediation</option>
                            <option value="resolved">Resolved / Settled</option>
                            <option value="dismissed">Dismissed</option>
                            <option value="certified">Certified to File Action</option>
                        </select>
                    </div>

                     <div class="md:col-span-3">
                        <label class="block text-xs font-bold text-gray-700 mb-1.5">Date Filed</label>
                        <input type="date" class="w-full bg-white border border-gray-300 rounded-xl py-2 px-3 text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all shadow-sm">
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
                        <th class="px-6 py-4 font-bold tracking-wider">Case Info</th>
                        <th class="px-6 py-4 font-bold tracking-wider">Involved Parties</th>
                        <th class="px-6 py-4 font-bold tracking-wider">Hearing Details</th>
                        <th class="px-6 py-4 font-bold tracking-wider">Status</th>
                        <th class="px-6 py-4 font-bold tracking-wider text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    
                    <tr class="bg-white hover:bg-gray-50 transition-colors group">
                        <td class="px-6 py-4">
                            <div class="font-bold text-gray-900">BC-2026-001</div>
                            <div class="text-xs text-gray-500 font-medium mt-0.5">Unjust Vexation</div>
                            <div class="text-xs text-gray-400 mt-1">Filed: Jan 10, 2026</div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex flex-col gap-1">
                                <div class="text-xs">
                                    <span class="font-bold text-gray-700">Comp:</span> Juan Dela Cruz
                                </div>
                                <div class="text-xs">
                                    <span class="font-bold text-gray-700">Resp:</span> Pedro Penduko
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-2">
                                <span class="h-2 w-2 rounded-full bg-orange-400"></span>
                                <span class="font-medium text-gray-900">Jan 15, 2026</span>
                            </div>
                            <div class="text-xs text-gray-500 ml-4">10:00 AM @ Hall</div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold bg-yellow-100 text-yellow-800 border border-yellow-200 uppercase">
                                Mediation
                            </span>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex justify-end gap-2">
                                <button onclick="openModal('viewModal')" class="p-2 bg-blue-100 text-blue-600 rounded-lg hover:bg-blue-200 shadow-sm transition-all" title="View Case Details">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>
                                </button>
                                <button onclick="openModal('createModal')" class="p-2 bg-indigo-100 text-indigo-600 rounded-lg hover:bg-indigo-200 shadow-sm transition-all" title="Update Case">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                </button>
                                <button class="p-2 bg-emerald-100 text-emerald-600 rounded-lg hover:bg-emerald-200 shadow-sm transition-all" title="Print Invitation">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path></svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        <div class="bg-gray-50 px-6 py-4 border-t border-gray-100 flex items-center justify-between">
            <span class="text-sm text-gray-500">Showing <span class="font-bold text-gray-900">1</span> to <span class="font-bold text-gray-900">10</span> of <span class="font-bold text-gray-900">32</span> entries</span>
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

<div id="batchUploadModal" class="fixed inset-0 z-50 hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm transition-opacity" onclick="closeModal('batchUploadModal')"></div>
    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="relative w-full max-w-lg bg-white rounded-2xl shadow-2xl transform transition-all border border-gray-100 overflow-hidden">
            
            <div class="bg-slate-50 px-6 py-4 border-b border-gray-100 flex items-center justify-between">
                <h3 class="text-lg font-bold text-gray-900">Batch Upload Cases</h3>
                <button onclick="closeModal('batchUploadModal')" class="text-gray-400 hover:text-gray-700"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg></button>
            </div>

            <div class="p-8">
                <div class="flex flex-col items-center justify-center w-full">
                    <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-40 border-2 border-gray-300 border-dashed rounded-xl cursor-pointer bg-gray-50 hover:bg-gray-100 transition-all">
                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                            <svg class="w-8 h-8 mb-3 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                            </svg>
                            <p class="mb-2 text-sm text-gray-500"><span class="font-bold">Click to upload</span> or drag and drop</p>
                            <p class="text-xs text-gray-500">CSV or Excel files only (MAX. 5MB)</p>
                        </div>
                        <input id="dropzone-file" type="file" class="hidden" accept=".csv, .xlsx, .xls" />
                    </label>
                </div>
                
                <div class="mt-4 text-center">
                    <a href="#" class="text-xs text-indigo-600 hover:text-indigo-800 font-bold underline">Download Sample Template (.csv)</a>
                </div>
            </div>

            <div class="bg-gray-50 px-6 py-4 flex justify-end gap-3 border-t border-gray-100">
                <button onclick="closeModal('batchUploadModal')" class="px-5 py-2.5 text-sm font-bold text-gray-600 bg-white border border-gray-200 rounded-xl hover:bg-gray-50 transition-all">Cancel</button>
                <button class="px-5 py-2.5 text-sm font-bold text-white bg-slate-900 rounded-xl hover:bg-slate-800 shadow-md transition-all">Upload Files</button>
            </div>
        </div>
    </div>
</div>

<div id="createModal" class="fixed inset-0 z-50 hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm transition-opacity" onclick="closeModal('createModal')"></div>
    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="relative w-full max-w-2xl bg-white rounded-2xl shadow-2xl transform transition-all border border-gray-100 overflow-hidden">
            
            <div class="bg-slate-50 px-6 py-4 border-b border-gray-100 flex items-center justify-between">
                <h3 class="text-lg font-bold text-gray-900">File New Complaint / Update Case</h3>
                <button onclick="closeModal('createModal')" class="text-gray-400 hover:text-gray-700"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg></button>
            </div>

            <div class="p-6 space-y-4">
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Complainant (Nagreklamo)</label>
                        <input type="text" placeholder="Full Name" class="w-full bg-white border border-gray-300 rounded-xl py-2.5 px-4 text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all shadow-sm">
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Respondent (Inireklamo)</label>
                        <input type="text" placeholder="Full Name" class="w-full bg-white border border-gray-300 rounded-xl py-2.5 px-4 text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all shadow-sm">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Case Type / Offense</label>
                    <select class="w-full bg-white border border-gray-300 rounded-xl py-2.5 px-4 text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all shadow-sm">
                         <option value="">-- Select Offense --</option>
                         <option value="unjust_vexation">Unjust Vexation</option>
                         <option value="boundary_dispute">Boundary Dispute</option>
                         <option value="physical_injury">Slight Physical Injury</option>
                         <option value="debt">Collection of Debt (Utang)</option>
                         <option value="others">Others</option>
                    </select>
                </div>
                
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Date Filed</label>
                        <input type="date" class="w-full bg-white border border-gray-300 rounded-xl py-2.5 px-4 text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all shadow-sm">
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Hearing Schedule</label>
                        <input type="datetime-local" class="w-full bg-white border border-gray-300 rounded-xl py-2.5 px-4 text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all shadow-sm">
                    </div>
                </div>

                <div>
                     <label class="block text-sm font-bold text-gray-700 mb-2">Case Narrative / Details</label>
                     <textarea rows="4" placeholder="Brief description of the complaint..." class="w-full bg-white border border-gray-300 rounded-xl py-2.5 px-4 text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all shadow-sm resize-none"></textarea>
                </div>
            </div>

            <div class="bg-gray-50 px-6 py-4 flex justify-end gap-3 border-t border-gray-100">
                <button onclick="closeModal('createModal')" class="px-5 py-2.5 text-sm font-bold text-gray-600 bg-white border border-gray-200 rounded-xl hover:bg-gray-50 transition-all">Cancel</button>
                <button class="px-5 py-2.5 text-sm font-bold text-white bg-slate-900 rounded-xl hover:bg-slate-800 shadow-md transition-all">Save Case</button>
            </div>
        </div>
    </div>
</div>

<div id="viewModal" class="fixed inset-0 z-50 hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm transition-opacity" onclick="closeModal('viewModal')"></div>
    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="relative w-full max-w-lg bg-white rounded-2xl shadow-2xl transform transition-all border border-gray-100 overflow-hidden">
            
            <div class="bg-blue-50 px-6 py-4 border-b border-blue-100 flex items-center justify-between">
                <div>
                    <h3 class="text-lg font-bold text-blue-900">Case Details: BC-2026-001</h3>
                    <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-bold bg-yellow-100 text-yellow-800 border border-yellow-200 uppercase mt-1">Mediation</span>
                </div>
                <button onclick="closeModal('viewModal')" class="text-blue-400 hover:text-blue-700"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg></button>
            </div>

            <div class="p-6">
                <div class="grid grid-cols-2 gap-4 mb-6">
                    <div class="p-3 bg-gray-50 rounded-xl border border-gray-100">
                        <p class="text-xs font-bold text-gray-500 uppercase">Complainant</p>
                        <p class="font-bold text-gray-900 text-sm mt-1">Juan Dela Cruz</p>
                    </div>
                    <div class="p-3 bg-gray-50 rounded-xl border border-gray-100">
                        <p class="text-xs font-bold text-gray-500 uppercase">Respondent</p>
                        <p class="font-bold text-gray-900 text-sm mt-1">Pedro Penduko</p>
                    </div>
                </div>

                <div class="mb-4">
                     <p class="text-xs font-bold text-gray-500 uppercase mb-1">Offense</p>
                     <p class="font-bold text-gray-900">Unjust Vexation</p>
                </div>

                <div class="mb-4">
                     <p class="text-xs font-bold text-gray-500 uppercase mb-1">Narrative</p>
                     <p class="text-sm text-gray-600 leading-relaxed bg-gray-50 p-3 rounded-lg border border-gray-100">
                         Complainant alleges that respondent repeatedly annoyed and vexed him by shouting profanities whenever he passed by the respondent's house late at night.
                     </p>
                </div>

                 <div>
                     <p class="text-xs font-bold text-gray-500 uppercase mb-1">Next Hearing</p>
                     <div class="flex items-center gap-2 text-indigo-700 bg-indigo-50 p-3 rounded-lg border border-indigo-100">
                         <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                         <span class="text-sm font-bold">Jan 15, 2026 at 10:00 AM</span>
                     </div>
                </div>
            </div>

            <div class="bg-gray-50 px-6 py-4 flex justify-end border-t border-gray-100">
                <button onclick="closeModal('viewModal')" class="px-5 py-2.5 text-sm font-bold text-gray-600 bg-white border border-gray-200 rounded-xl hover:bg-gray-50 transition-all">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    function openModal(id) { document.getElementById(id).classList.remove('hidden'); }
    function closeModal(id) { document.getElementById(id).classList.add('hidden'); }
</script>
@endsection