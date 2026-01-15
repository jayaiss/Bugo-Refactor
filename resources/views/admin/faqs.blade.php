@extends('layouts.admin')

@section('header')
    FAQs
@endsection

@section('content')
<div class="max-w-7xl mx-auto">
    
    <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100">
        
        <div class="px-6 py-5 border-b border-gray-100 flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div>
                <h3 class="text-lg font-bold text-gray-900">Frequently Asked Questions</h3>
                <p class="text-xs text-gray-500 mt-0.5">Manage the list of common questions and answers for residents.</p>
            </div>
            <button onclick="openModal('createModal')" class="flex items-center gap-2 bg-slate-900 hover:bg-slate-800 text-white font-bold py-2.5 px-5 rounded-xl transition-all shadow-md transform hover:-translate-y-0.5 text-sm">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                Add FAQ
            </button>
        </div>

        <div class="bg-gray-50/50 p-6 border-b border-gray-200">
            <form>
                <div class="flex flex-col md:flex-row gap-4 items-end">
                    
                    <div class="flex-1 w-full">
                        <label class="block text-xs font-bold text-gray-700 mb-1.5">Search</label>
                        <div class="relative">
                            <input type="text" placeholder="Search questions or keywords..." class="w-full bg-white border border-gray-300 rounded-xl py-2 pl-10 pr-3 text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all shadow-sm">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                            </div>
                        </div>
                    </div>

                    <div class="w-full md:w-48">
                        <label class="block text-xs font-bold text-gray-700 mb-1.5">Status</label>
                        <select class="w-full bg-white border border-gray-300 rounded-xl py-2 px-3 text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all shadow-sm cursor-pointer">
                            <option value="all">All Statuses</option>
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>

                    <div class="w-full md:w-auto">
                        <button type="submit" class="w-full md:w-auto flex items-center justify-center gap-2 bg-slate-900 hover:bg-slate-800 text-white font-bold py-2 px-6 rounded-xl transition-all shadow-md transform hover:-translate-y-0.5 text-sm h-[38px]">
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
                        <th class="px-6 py-4 font-bold tracking-wider w-[50%]">FAQ Details (Question & Answer)</th>
                        <th class="px-6 py-4 font-bold tracking-wider">Status</th>
                        <th class="px-6 py-4 font-bold tracking-wider">Last Updated</th>
                        <th class="px-6 py-4 font-bold tracking-wider text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    
                    <tr class="bg-white hover:bg-gray-50 transition-colors group">
                        <td class="px-6 py-4">
                            <div class="flex items-start gap-3">
                                <div class="mt-1 min-w-[24px] h-6 flex items-center justify-center bg-blue-50 text-blue-600 rounded-full text-xs font-bold">Q</div>
                                <div>
                                    <div class="font-bold text-gray-900 text-base">How do I request a Barangay Clearance?</div>
                                    <div class="mt-1 flex items-start gap-2">
                                        <span class="text-xs font-bold text-gray-400 mt-0.5">A:</span>
                                        <p class="text-sm text-gray-500 line-clamp-1">You can request a clearance by logging into your resident portal, navigating to "Documents", and selecting "Request Clearance".</p>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold bg-emerald-100 text-emerald-800 border border-emerald-200 uppercase">
                                Active
                            </span>
                        </td>
                        <td class="px-6 py-4 text-gray-500 whitespace-nowrap">
                            Jan 08, 2026
                        </td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex justify-end gap-2">
                                <button onclick="openModal('viewModal')" class="p-2 bg-blue-100 text-blue-600 rounded-lg hover:bg-blue-200 shadow-sm transition-all" title="View Full Answer">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>
                                </button>
                                <button onclick="openModal('createModal')" class="p-2 bg-indigo-100 text-indigo-600 rounded-lg hover:bg-indigo-200 shadow-sm transition-all" title="Edit">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                                </button>
                                <button class="p-2 bg-red-100 text-red-600 rounded-lg hover:bg-red-200 shadow-sm transition-all" title="Delete">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <tr class="bg-white hover:bg-gray-50 transition-colors group">
                         <td class="px-6 py-4">
                            <div class="flex items-start gap-3">
                                <div class="mt-1 min-w-[24px] h-6 flex items-center justify-center bg-gray-100 text-gray-500 rounded-full text-xs font-bold">Q</div>
                                <div>
                                    <div class="font-bold text-gray-500 text-base">When is the deadline for tax payments?</div>
                                    <div class="mt-1 flex items-start gap-2">
                                        <span class="text-xs font-bold text-gray-300 mt-0.5">A:</span>
                                        <p class="text-sm text-gray-400 line-clamp-1">The deadline for local tax payments is usually on the 20th of January each year.</p>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold bg-gray-100 text-gray-600 border border-gray-200 uppercase">
                                Inactive
                            </span>
                        </td>
                        <td class="px-6 py-4 text-gray-400 whitespace-nowrap">
                            Dec 15, 2025
                        </td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex justify-end gap-2">
                                <button onclick="openModal('viewModal')" class="p-2 bg-blue-100 text-blue-600 rounded-lg hover:bg-blue-200 shadow-sm transition-all" title="View Full Answer">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>
                                </button>
                                <button onclick="openModal('createModal')" class="p-2 bg-indigo-100 text-indigo-600 rounded-lg hover:bg-indigo-200 shadow-sm transition-all" title="Edit">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                                </button>
                                <button class="p-2 bg-red-100 text-red-600 rounded-lg hover:bg-red-200 shadow-sm transition-all" title="Delete">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                </button>
                            </div>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
        
        <div class="bg-gray-50 px-6 py-4 border-t border-gray-100 flex items-center justify-between">
            <span class="text-sm text-gray-500">Showing <span class="font-bold text-gray-900">1</span> to <span class="font-bold text-gray-900">10</span> of <span class="font-bold text-gray-900">18</span> entries</span>
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
        <div class="relative w-full max-w-2xl bg-white rounded-2xl shadow-2xl transform transition-all border border-gray-100 overflow-hidden">
            
            <div class="bg-slate-50 px-6 py-4 border-b border-gray-100 flex items-center justify-between">
                <h3 class="text-lg font-bold text-gray-900">Add / Edit FAQ</h3>
                <button onclick="closeModal('createModal')" class="text-gray-400 hover:text-gray-700"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg></button>
            </div>

            <div class="p-6 space-y-4">
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Question</label>
                    <input type="text" placeholder="e.g. How to apply for indigency?" class="w-full bg-white border border-gray-300 rounded-xl py-3 px-4 text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all shadow-sm">
                </div>
                
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Status</label>
                    <select class="w-full bg-white border border-gray-300 rounded-xl py-3 px-4 text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all shadow-sm">
                        <option value="active" selected>Active (Visible)</option>
                        <option value="inactive">Inactive (Hidden)</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Answer</label>
                    <textarea rows="5" placeholder="Write the answer here..." class="w-full bg-white border border-gray-300 rounded-xl py-3 px-4 text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all shadow-sm resize-none"></textarea>
                </div>
            </div>

            <div class="bg-gray-50 px-6 py-4 flex justify-end gap-3 border-t border-gray-100">
                <button onclick="closeModal('createModal')" class="px-5 py-2.5 text-sm font-bold text-gray-600 bg-white border border-gray-200 rounded-xl hover:bg-gray-50 transition-all">Cancel</button>
                <button class="px-5 py-2.5 text-sm font-bold text-white bg-slate-900 rounded-xl hover:bg-slate-800 shadow-md transition-all">Save FAQ</button>
            </div>
        </div>
    </div>
</div>

<div id="viewModal" class="fixed inset-0 z-50 hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm transition-opacity" onclick="closeModal('viewModal')"></div>
    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="relative w-full max-w-lg bg-white rounded-2xl shadow-2xl transform transition-all border border-gray-100 overflow-hidden">
            
            <div class="bg-blue-50 px-6 py-4 border-b border-blue-100 flex items-center justify-between">
                <h3 class="text-lg font-bold text-blue-900">FAQ Details</h3>
                <button onclick="closeModal('viewModal')" class="text-blue-400 hover:text-blue-700"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg></button>
            </div>

            <div class="p-6">
                <div class="mb-4">
                     <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold bg-emerald-100 text-emerald-800 border border-emerald-200 uppercase">
                        Active
                    </span>
                </div>
                
                <div class="space-y-4">
                    <div>
                        <h4 class="text-xs font-bold text-gray-500 uppercase mb-1">Question</h4>
                        <p class="text-lg font-bold text-gray-900">How do I request a Barangay Clearance?</p>
                    </div>
                    <div class="bg-gray-50 p-4 rounded-xl border border-gray-100">
                        <h4 class="text-xs font-bold text-gray-500 uppercase mb-2">Answer</h4>
                        <p class="text-sm text-gray-700 leading-relaxed">
                            You can request a clearance by logging into your resident portal, navigating to the "Documents" section in the sidebar, and selecting "Request Clearance". Fill out the purpose and submit. You will be notified when it is ready for pickup.
                        </p>
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