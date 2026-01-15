@extends('layouts.admin')

@section('header')
    Medicine Inventory
@endsection

@section('content')
<div class="max-w-7xl mx-auto">
    
    <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100">
        
        <div class="px-6 py-5 border-b border-gray-100 flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div>
                <h3 class="text-lg font-bold text-gray-900">Inventory Management</h3>
                <p class="text-xs text-gray-500 mt-0.5">Track medicine stock levels, expiration, and supply.</p>
            </div>
            <button onclick="openModal('addMedicineModal')" class="flex items-center gap-2 bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-2.5 px-5 rounded-xl transition-all shadow-md transform hover:-translate-y-0.5 text-sm">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                Add Medicine
            </button>
        </div>

        <div class="bg-gray-50/50 p-6 border-b border-gray-200">
            <form>
                <div class="grid grid-cols-1 md:grid-cols-12 gap-4 items-end">
                    
                    <div class="md:col-span-5">
                        <label class="block text-xs font-bold text-gray-700 mb-1.5">Search Medicine</label>
                        <div class="relative">
                            <input type="text" placeholder="Search generic or brand name..." class="w-full bg-white border border-gray-300 rounded-xl py-2 pl-10 pr-3 text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-all shadow-sm">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                            </div>
                        </div>
                    </div>

                    <div class="md:col-span-3">
                        <label class="block text-xs font-bold text-gray-700 mb-1.5">Category</label>
                        <select class="w-full bg-white border border-gray-300 rounded-xl py-2 px-3 text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-all shadow-sm cursor-pointer">
                            <option value="all">All Categories</option>
                            <option value="antibiotic">Antibiotics</option>
                            <option value="vitamins">Vitamins / Supplements</option>
                            <option value="analgesic">Analgesics / Pain</option>
                            <option value="maintenance">Maintenance</option>
                        </select>
                    </div>

                     <div class="md:col-span-3">
                        <label class="block text-xs font-bold text-gray-700 mb-1.5">Stock Level</label>
                        <select class="w-full bg-white border border-gray-300 rounded-xl py-2 px-3 text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-all shadow-sm cursor-pointer">
                            <option value="all">All Levels</option>
                            <option value="good">Good Stock</option>
                            <option value="low">Low Stock</option>
                            <option value="critical">Critical / Out of Stock</option>
                        </select>
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
                        <th class="px-6 py-4 font-bold tracking-wider">Medicine Name</th>
                        <th class="px-6 py-4 font-bold tracking-wider">Category</th>
                        <th class="px-6 py-4 font-bold tracking-wider w-1/4">Stock Level</th>
                        <th class="px-6 py-4 font-bold tracking-wider">Status</th>
                        <th class="px-6 py-4 font-bold tracking-wider text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    
                    <tr class="bg-white hover:bg-gray-50 transition-colors group">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="h-10 w-10 bg-emerald-50 rounded-lg flex items-center justify-center text-emerald-600">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.384-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path></svg>
                                </div>
                                <div>
                                    <div class="font-bold text-gray-900">Amoxicillin 500mg</div>
                                    <div class="text-xs text-gray-500">Unit: Capsule</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-lg text-xs font-medium bg-gray-100 text-gray-600 border border-gray-200">
                                Antibiotic
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <div class="w-full bg-gray-100 rounded-full h-2 mb-1">
                                <div class="bg-emerald-500 h-2 rounded-full" style="width: 85%"></div>
                            </div>
                            <div class="flex justify-between text-xs">
                                <span class="font-bold text-gray-900">850 pcs</span>
                                <span class="text-gray-400">Target: 1000</span>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-xs font-bold bg-emerald-100 text-emerald-800 border border-emerald-200 uppercase">
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                Available
                            </span>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex justify-end gap-2">
                                <button onclick="openModal('restockModal')" class="p-2 bg-emerald-100 text-emerald-600 rounded-lg hover:bg-emerald-200 shadow-sm transition-all" title="Add Stock">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                                </button>
                                <button onclick="openModal('addMedicineModal')" class="p-2 bg-indigo-100 text-indigo-600 rounded-lg hover:bg-indigo-200 shadow-sm transition-all" title="Edit Details">
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
                            <div class="flex items-center gap-3">
                                <div class="h-10 w-10 bg-orange-50 rounded-lg flex items-center justify-center text-orange-600">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.384-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path></svg>
                                </div>
                                <div>
                                    <div class="font-bold text-gray-900">Ascorbic Acid (Vitamin C)</div>
                                    <div class="text-xs text-gray-500">Unit: Tablet</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-lg text-xs font-medium bg-gray-100 text-gray-600 border border-gray-200">
                                Vitamins
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <div class="w-full bg-gray-100 rounded-full h-2 mb-1">
                                <div class="bg-orange-400 h-2 rounded-full" style="width: 15%"></div>
                            </div>
                            <div class="flex justify-between text-xs">
                                <span class="font-bold text-orange-600">45 pcs</span>
                                <span class="text-gray-400">Target: 300</span>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-xs font-bold bg-orange-100 text-orange-800 border border-orange-200 uppercase">
                                <span class="w-1.5 h-1.5 rounded-full bg-orange-500"></span>
                                Low Stock
                            </span>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex justify-end gap-2">
                                <button onclick="openModal('restockModal')" class="p-2 bg-emerald-100 text-emerald-600 rounded-lg hover:bg-emerald-200 shadow-sm transition-all" title="Add Stock">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                                </button>
                                <button onclick="openModal('addMedicineModal')" class="p-2 bg-indigo-100 text-indigo-600 rounded-lg hover:bg-indigo-200 shadow-sm transition-all" title="Edit Details">
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
            <span class="text-sm text-gray-500">Showing <span class="font-bold text-gray-900">1</span> to <span class="font-bold text-gray-900">10</span> of <span class="font-bold text-gray-900">42</span> items</span>
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

<div id="addMedicineModal" class="fixed inset-0 z-50 hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm transition-opacity" onclick="closeModal('addMedicineModal')"></div>
    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="relative w-full max-w-2xl bg-white rounded-2xl shadow-2xl transform transition-all border border-gray-100 overflow-hidden">
            
            <div class="bg-slate-50 px-6 py-4 border-b border-gray-100 flex items-center justify-between">
                <h3 class="text-lg font-bold text-gray-900">Add Medicine Item</h3>
                <button onclick="closeModal('addMedicineModal')" class="text-gray-400 hover:text-gray-700"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg></button>
            </div>

            <div class="p-6 space-y-4">
                <div class="grid grid-cols-2 gap-4">
                    <div class="col-span-2">
                        <label class="block text-sm font-bold text-gray-700 mb-2">Medicine Name (Brand/Generic)</label>
                        <input type="text" placeholder="e.g. Amoxicillin 500mg" class="w-full bg-white border border-gray-300 rounded-xl py-2.5 px-4 text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-all shadow-sm">
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Category</label>
                        <select class="w-full bg-white border border-gray-300 rounded-xl py-2.5 px-4 text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-all shadow-sm">
                            <option>Antibiotic</option>
                            <option>Vitamins</option>
                            <option>Cough Remedy</option>
                            <option>Maintenance</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Unit Type</label>
                        <select class="w-full bg-white border border-gray-300 rounded-xl py-2.5 px-4 text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-all shadow-sm">
                            <option>Tablet</option>
                            <option>Capsule</option>
                            <option>Syrup</option>
                            <option>Sachet</option>
                        </select>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Initial Stock</label>
                        <input type="number" placeholder="0" class="w-full bg-white border border-gray-300 rounded-xl py-2.5 px-4 text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-all shadow-sm">
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Target/Max Stock</label>
                        <input type="number" placeholder="e.g. 1000" class="w-full bg-white border border-gray-300 rounded-xl py-2.5 px-4 text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-all shadow-sm">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Description / Notes</label>
                    <textarea rows="3" placeholder="Additional details..." class="w-full bg-white border border-gray-300 rounded-xl py-2.5 px-4 text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-all shadow-sm resize-none"></textarea>
                </div>
            </div>

            <div class="bg-gray-50 px-6 py-4 flex justify-end gap-3 border-t border-gray-100">
                <button onclick="closeModal('addMedicineModal')" class="px-5 py-2.5 text-sm font-bold text-slate-700 bg-white border border-gray-300 rounded-xl hover:bg-gray-50 transition-all shadow-sm">Cancel</button>
                <button class="px-5 py-2.5 text-sm font-bold text-white bg-emerald-600 rounded-xl hover:bg-emerald-700 shadow-md transition-all">Save Medicine</button>
            </div>
        </div>
    </div>
</div>

<div id="restockModal" class="fixed inset-0 z-50 hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm transition-opacity" onclick="closeModal('restockModal')"></div>
    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="relative w-full max-w-sm bg-white rounded-2xl shadow-2xl transform transition-all border border-gray-100 overflow-hidden">
            
            <div class="bg-emerald-50 px-6 py-4 border-b border-emerald-100">
                <h3 class="text-lg font-bold text-emerald-900">Restock Medicine</h3>
                <p class="text-xs text-emerald-600">Amoxicillin 500mg</p>
            </div>

            <div class="p-6">
                <label class="block text-sm font-bold text-gray-700 mb-2">Quantity to Add</label>
                <div class="flex items-center border border-gray-300 rounded-xl overflow-hidden shadow-sm">
                    <button class="px-4 py-3 bg-gray-50 hover:bg-gray-100 border-r border-gray-300 text-gray-600 font-bold">-</button>
                    <input type="number" value="100" class="w-full text-center py-3 text-sm font-bold text-gray-900 outline-none">
                    <button class="px-4 py-3 bg-gray-50 hover:bg-gray-100 border-l border-gray-300 text-gray-600 font-bold">+</button>
                </div>
                <div class="mt-4 text-xs text-gray-500 text-center">
                    Current Stock: <span class="font-bold text-gray-900">850</span> &bull; New Total: <span class="font-bold text-emerald-600">950</span>
                </div>
            </div>

            <div class="bg-gray-50 px-6 py-4 flex justify-end gap-3 border-t border-gray-100">
                <button onclick="closeModal('restockModal')" class="flex-1 px-5 py-2.5 text-sm font-bold text-slate-700 bg-white border border-gray-300 rounded-xl hover:bg-gray-50 transition-all shadow-sm">Cancel</button>
                <button class="flex-1 px-5 py-2.5 text-sm font-bold text-white bg-emerald-600 rounded-xl hover:bg-emerald-700 shadow-md transition-all">Confirm</button>
            </div>
        </div>
    </div>
</div>

<script>
    function openModal(id) { document.getElementById(id).classList.remove('hidden'); }
    function closeModal(id) { document.getElementById(id).classList.add('hidden'); }
</script>
@endsection