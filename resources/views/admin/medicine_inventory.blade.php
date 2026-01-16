@extends('layouts.admin')

@section('header')
    Medicine Inventory
@endsection

@section('content')
<div class="max-w-7xl mx-auto px-4 md:px-0">

    <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-slate-100">

        {{-- Header --}}
        <div class="px-6 py-5 border-b border-slate-100 flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div>
                <h3 class="text-lg font-black text-slate-900 tracking-tight">Inventory Management</h3>
                <p class="text-[11px] text-slate-500 font-bold uppercase tracking-widest mt-1">
                    Track medicine stock levels and availability
                </p>
            </div>

            <button onclick="openModal('addMedicineModal')"
                class="flex items-center gap-2 bg-slate-900 hover:bg-slate-800 text-white font-black
                       py-2.5 px-5 rounded-xl transition-all shadow-md hover:-translate-y-0.5
                       text-[11px] uppercase tracking-widest">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 4v16m8-8H4"></path>
                </svg>
                Add Medicine
            </button>
        </div>

        {{-- Filters --}}
        <div class="bg-slate-50/60 p-6 border-b border-slate-200">
            <form>
                <div class="grid grid-cols-1 md:grid-cols-12 gap-4 items-end">

                    <div class="md:col-span-5">
                        <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-2">
                            Search Medicine
                        </label>
                        <div class="relative">
                            <input type="text" placeholder="Generic or brand name..."
                                class="w-full bg-white border border-slate-200 rounded-xl py-2.5 pl-10 pr-3
                                       text-sm font-bold text-slate-700
                                       focus:outline-none focus:ring-2 focus:ring-slate-900 shadow-sm">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 text-slate-400">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div class="md:col-span-3">
                        <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-2">
                            Category
                        </label>
                        <select class="w-full bg-white border border-slate-200 rounded-xl py-2.5 px-3
                                       text-sm font-bold text-slate-700 focus:ring-2 focus:ring-slate-900">
                            <option>All Categories</option>
                            <option>Antibiotics</option>
                            <option>Vitamins</option>
                            <option>Analgesics</option>
                            <option>Maintenance</option>
                        </select>
                    </div>

                    <div class="md:col-span-3">
                        <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-2">
                            Stock Level
                        </label>
                        <select class="w-full bg-white border border-slate-200 rounded-xl py-2.5 px-3
                                       text-sm font-bold text-slate-700 focus:ring-2 focus:ring-slate-900">
                            <option>All Levels</option>
                            <option>Good</option>
                            <option>Low</option>
                            <option>Critical</option>
                        </select>
                    </div>

                    <div class="md:col-span-1">
                        <button class="w-full h-[42px] bg-slate-900 hover:bg-slate-800 text-white
                                       rounded-xl text-[11px] font-black uppercase tracking-widest shadow-md">
                            Apply
                        </button>
                    </div>

                </div>
            </form>
        </div>

        {{-- Table --}}
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-slate-600">
                <thead class="bg-slate-50 text-[10px] uppercase tracking-widest text-slate-500 border-b border-slate-100">
                    <tr>
                        <th class="px-6 py-4 font-black">Medicine</th>
                        <th class="px-6 py-4 font-black">Category</th>
                        <th class="px-6 py-4 font-black w-1/4">Stock</th>
                        <th class="px-6 py-4 font-black">Status</th>
                        <th class="px-6 py-4 font-black text-right">Actions</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-slate-100">

                    {{-- Row --}}
                    <tr class="bg-white hover:bg-slate-50 transition-colors">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="h-10 w-10 rounded-xl bg-slate-900 text-white flex items-center justify-center">
                                    💊
                                </div>
                                <div>
                                    <p class="font-black text-slate-900">Amoxicillin 500mg</p>
                                    <p class="text-xs text-slate-500 font-bold">Unit: Capsule</p>
                                </div>
                            </div>
                        </td>

                        <td class="px-6 py-4">
                            <span class="px-3 py-1 rounded-xl bg-slate-100 text-slate-700 text-[11px] font-black">
                                Antibiotic
                            </span>
                        </td>

                        <td class="px-6 py-4">
                            <div class="w-full bg-slate-200 rounded-full h-2 mb-1">
                                <div class="bg-slate-900 h-2 rounded-full" style="width:85%"></div>
                            </div>
                            <div class="flex justify-between text-xs font-bold">
                                <span class="text-slate-900">850 pcs</span>
                                <span class="text-slate-400">Target: 1000</span>
                            </div>
                        </td>

                        <td class="px-6 py-4">
                            <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full
                                         bg-slate-100 text-slate-900 text-[11px] font-black uppercase">
                                <span class="w-2 h-2 bg-slate-900 rounded-full"></span>
                                Available
                            </span>
                        </td>

                        <td class="px-6 py-4 text-right">
                            <div class="flex justify-end gap-2">
                                <button onclick="openModal('restockModal')"
                                    class="p-2 bg-white border border-slate-200 rounded-xl hover:bg-slate-50 shadow-sm">
                                    ➕
                                </button>
                                <button onclick="openModal('addMedicineModal')"
                                    class="p-2 bg-white border border-slate-200 rounded-xl hover:bg-slate-50 shadow-sm">
                                    ✏️
                                </button>
                                <button class="p-2 bg-rose-50 text-rose-600 rounded-xl hover:bg-rose-100 shadow-sm">
                                    🗑
                                </button>
                            </div>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>

        {{-- Footer --}}
        <div class="bg-slate-50 px-6 py-4 border-t border-slate-100 flex justify-between items-center">
            <span class="text-sm font-bold text-slate-500">
                Showing <span class="text-slate-900">1–10</span> of <span class="text-slate-900">42</span>
            </span>

            <div class="flex gap-2">
                <button class="px-4 py-2 text-[11px] font-black bg-white border border-slate-200 rounded-xl">
                    Previous
                </button>
                <button class="px-4 py-2 text-[11px] font-black bg-slate-900 text-white rounded-xl">
                    Next
                </button>
            </div>
        </div>

    </div>
</div>

{{-- MODALS remain same structure, only change headers to bg-slate-900 --}}
<script>
    function openModal(id){ document.getElementById(id).classList.remove('hidden') }
    function closeModal(id){ document.getElementById(id).classList.add('hidden') }
</script>
@endsection
