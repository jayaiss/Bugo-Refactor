@extends('layouts.admin')

@section('header')
    Medicine Requests
@endsection

@section('content')
<div class="max-w-7xl mx-auto px-4 md:px-0">

    <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-slate-100">

        {{-- Header --}}
        <div class="px-6 py-5 border-b border-slate-100 flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div>
                <h3 class="text-lg font-black text-slate-900 tracking-tight">Medicine Requests</h3>
                <p class="text-[11px] text-slate-500 font-bold uppercase tracking-[0.2em] mt-1">
                    Manage resident health requests efficiently
                </p>
            </div>

            <div class="flex items-center gap-3">
                <button type="button"
                    onclick="alert('Demo only: reports will be connected later.')"
                    class="flex items-center gap-2 bg-white border border-slate-200 hover:bg-slate-50 text-slate-700 font-black
                           py-2.5 px-4 rounded-xl transition-all shadow-sm text-[11px] uppercase tracking-widest
                           focus:outline-none focus:ring-2 focus:ring-slate-900 focus:ring-offset-2">
                    <svg class="w-4 h-4 text-slate-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                    </svg>
                    Reports
                </button>

                <button type="button"
                    data-open-modal="createModal"
                    class="flex items-center gap-2 bg-slate-900 hover:bg-slate-800 text-white font-black
                           py-2.5 px-5 rounded-xl transition-all shadow-md hover:-translate-y-0.5 text-[11px]
                           uppercase tracking-widest focus:outline-none focus:ring-2 focus:ring-slate-900 focus:ring-offset-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    New Request
                </button>
            </div>
        </div>

        {{-- Filters --}}
        <div class="bg-slate-50/60 p-6 border-b border-slate-200">
            <form>
                <div class="grid grid-cols-1 md:grid-cols-12 gap-4 items-end">

                    <div class="md:col-span-5">
                        <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-2">
                            Search Name or ID
                        </label>
                        <div class="relative group">
                            <input type="text" placeholder="Search..."
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
                            Status
                        </label>
                        <select
                            class="w-full bg-white border border-slate-200 rounded-xl py-2.5 px-3 text-sm font-bold text-slate-700
                                   focus:outline-none focus:ring-2 focus:ring-slate-900 focus:border-transparent transition-all shadow-sm cursor-pointer">
                            <option value="all">All Statuses</option>
                            <option value="pending">Pending</option>
                            <option value="approved">Approved</option>
                            <option value="dispensed">Dispensed</option>
                        </select>
                    </div>

                    <div class="md:col-span-3">
                        <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-2">
                            Date
                        </label>
                        <input type="date"
                            class="w-full bg-white border border-slate-200 rounded-xl py-2.5 px-3 text-sm font-bold text-slate-700
                                   focus:outline-none focus:ring-2 focus:ring-slate-900 focus:border-transparent transition-all shadow-sm">
                    </div>

                    <div class="md:col-span-1">
                        <button type="submit"
                            class="w-full flex items-center justify-center gap-2 bg-slate-900 hover:bg-slate-800 text-white font-black
                                   py-2.5 px-4 rounded-xl transition-all shadow-md hover:-translate-y-0.5 text-[11px]
                                   uppercase tracking-widest h-[42px]">
                            Apply
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
                        <th class="px-6 py-4 font-black">Resident</th>
                        <th class="px-6 py-4 font-black">Request Date</th>
                        <th class="px-6 py-4 font-black">Status</th>
                        <th class="px-6 py-4 font-black">Prescription</th>
                        <th class="px-6 py-4 font-black text-right">Action</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-slate-100">

                    {{-- Sample Row 1 --}}
                    <tr class="bg-white hover:bg-slate-50 transition-colors">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="h-9 w-9 rounded-full bg-slate-900 text-white flex items-center justify-center font-black text-xs">
                                    JD
                                </div>
                                <div>
                                    <div class="font-black text-slate-900">Juan Dela Cruz</div>
                                    <div class="text-xs text-slate-500">
                                        Requesting: <span class="font-black text-slate-900">Paracetamol (10 tabs)</span>
                                    </div>
                                </div>
                            </div>
                        </td>

                        <td class="px-6 py-4 text-slate-900 whitespace-nowrap">
                            Jan 13, 2026 <span class="text-xs text-slate-500 block font-bold">09:30 AM</span>
                        </td>

                        <td class="px-6 py-4">
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-[10px] font-black uppercase tracking-widest bg-amber-100 text-amber-800 border border-amber-200">
                                Pending
                            </span>
                        </td>

                        <td class="px-6 py-4">
                            <button type="button"
                                onclick="alert('Demo only: file preview later.')"
                                class="inline-flex items-center gap-2 text-[11px] font-black text-slate-900 bg-slate-100 hover:bg-slate-200 px-3 py-2 rounded-xl transition-colors border border-slate-200">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"></path>
                                </svg>
                                View File
                            </button>
                        </td>

                        <td class="px-6 py-4 text-right">
                            <button type="button"
                                data-open-modal="viewModal"
                                class="inline-flex items-center gap-2 px-4 py-2 bg-white border border-slate-200 text-slate-700 rounded-xl
                                       hover:bg-slate-50 hover:border-slate-300 shadow-sm transition-all text-[11px] font-black uppercase tracking-widest">
                                Review
                            </button>
                        </td>
                    </tr>

                    {{-- Sample Row 2 --}}
                    <tr class="bg-white hover:bg-slate-50 transition-colors">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="h-9 w-9 rounded-full bg-slate-900 text-white flex items-center justify-center font-black text-xs">
                                    MC
                                </div>
                                <div>
                                    <div class="font-black text-slate-900">Maria Clara</div>
                                    <div class="text-xs text-slate-500">
                                        Requesting: <span class="font-black text-slate-900">Amlodipine (30 tabs)</span>
                                    </div>
                                </div>
                            </div>
                        </td>

                        <td class="px-6 py-4 text-slate-900 whitespace-nowrap">
                            Jan 12, 2026 <span class="text-xs text-slate-500 block font-bold">02:15 PM</span>
                        </td>

                        <td class="px-6 py-4">
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-[10px] font-black uppercase tracking-widest bg-slate-100 text-slate-900 border border-slate-200">
                                Approved
                            </span>
                        </td>

                        <td class="px-6 py-4">
                            <span class="text-xs text-slate-400 italic font-bold">No Attachment</span>
                        </td>

                        <td class="px-6 py-4 text-right">
                            <button type="button"
                                data-open-modal="viewModal"
                                class="inline-flex items-center gap-2 px-4 py-2 bg-slate-900 text-white rounded-xl
                                       hover:bg-slate-800 shadow-md transition-all text-[11px] font-black uppercase tracking-widest">
                                Dispense
                            </button>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>

        {{-- Footer --}}
        <div class="bg-slate-50 px-6 py-4 border-t border-slate-100 flex items-center justify-between">
            <span class="text-sm text-slate-500 font-bold">
                Showing <span class="font-black text-slate-900">1</span> to <span class="font-black text-slate-900">10</span> of
                <span class="font-black text-slate-900">15</span> requests
            </span>

            <div class="inline-flex gap-2">
                <button type="button"
                    onclick="alert('Demo only')"
                    class="px-4 py-2 text-[11px] font-black uppercase tracking-widest text-slate-600 bg-white border border-slate-200 rounded-xl hover:bg-slate-100 hover:text-slate-900 transition-colors">
                    Previous
                </button>
                <button type="button"
                    onclick="alert('Demo only')"
                    class="px-4 py-2 text-[11px] font-black uppercase tracking-widest text-white bg-slate-900 rounded-xl hover:bg-slate-800 transition-colors shadow-sm">
                    Next
                </button>
            </div>
        </div>

    </div>
</div>

{{-- CREATE MODAL --}}
<div id="createModal" class="fixed inset-0 z-50 hidden" role="dialog" aria-modal="true" aria-labelledby="createTitle">
    <div class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm" data-close-modal="createModal"></div>

    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="relative w-full max-w-lg bg-white rounded-2xl shadow-2xl border border-slate-100 overflow-hidden">

            <div class="bg-slate-900 px-6 py-4 border-b border-slate-800 flex items-center justify-between">
                <h3 id="createTitle" class="text-sm font-black uppercase tracking-widest text-white">New Medicine Request</h3>
                <button type="button" data-close-modal="createModal" class="text-white/70 hover:text-white">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            <form class="p-6 space-y-4"
                  onsubmit="event.preventDefault(); alert('Demo only: will connect backend later.');">

                <div>
                    <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-2">
                        Select Resident
                    </label>
                    <input type="text" placeholder="Search resident name..."
                        class="w-full bg-slate-50 border-0 rounded-xl py-2.5 px-4 text-sm font-bold text-slate-700
                               ring-1 ring-slate-200 focus:ring-2 focus:ring-slate-900 outline-none transition-all">
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-2">
                            Medicine / Item
                        </label>
                        <select
                            class="w-full bg-slate-50 border-0 rounded-xl py-2.5 px-4 text-sm font-bold text-slate-700
                                   ring-1 ring-slate-200 focus:ring-2 focus:ring-slate-900 outline-none cursor-pointer">
                            <option>Paracetamol</option>
                            <option>Amlodipine</option>
                            <option>Losartan</option>
                            <option>Vitamins</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-2">
                            Quantity
                        </label>
                        <input type="number" placeholder="e.g. 10"
                            class="w-full bg-slate-50 border-0 rounded-xl py-2.5 px-4 text-sm font-bold text-slate-700
                                   ring-1 ring-slate-200 focus:ring-2 focus:ring-slate-900 outline-none transition-all">
                    </div>
                </div>

                <div>
                    <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-2">
                        Upload Prescription (Optional)
                    </label>

                    <label for="dropzone-file"
                        class="flex flex-col items-center justify-center w-full h-32 border-2 border-slate-200 border-dashed rounded-xl cursor-pointer bg-slate-50 hover:bg-slate-100 transition-colors">
                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                            <svg class="w-8 h-8 mb-2 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                            </svg>
                            <p class="text-xs text-slate-500 font-bold"><span class="font-black">Click to upload</span> or drag and drop</p>
                        </div>
                        <input id="dropzone-file" type="file" class="hidden" />
                    </label>
                </div>

                <div class="bg-slate-50 px-6 py-4 -mx-6 -mb-6 border-t border-slate-100 flex justify-end gap-3">
                    <button type="button" data-close-modal="createModal"
                        class="px-5 py-2.5 text-[11px] font-black uppercase tracking-widest text-slate-700 bg-white border border-slate-200 rounded-xl hover:bg-slate-50 transition-all shadow-sm">
                        Cancel
                    </button>
                    <button type="submit"
                        class="px-5 py-2.5 text-[11px] font-black uppercase tracking-widest text-white bg-slate-900 rounded-xl hover:bg-slate-800 shadow-md transition-all">
                        Submit Request
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- VIEW MODAL --}}
<div id="viewModal" class="fixed inset-0 z-50 hidden" role="dialog" aria-modal="true" aria-labelledby="viewTitle">
    <div class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm" data-close-modal="viewModal"></div>

    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="relative w-full max-w-lg bg-white rounded-2xl shadow-2xl border border-slate-100 overflow-hidden">

            <div class="bg-slate-900 px-6 py-4 border-b border-slate-800 flex items-center justify-between">
                <div>
                    <h3 id="viewTitle" class="text-sm font-black uppercase tracking-widest text-white">Request Details</h3>
                    <p class="text-xs text-white/70 font-bold mt-1">Ref: MED-2026-088</p>
                </div>
                <button type="button" data-close-modal="viewModal" class="text-white/70 hover:text-white">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            <div class="p-6">
                <div class="grid grid-cols-2 gap-4 mb-4">
                    <div class="p-3 bg-slate-50 rounded-xl border border-slate-100">
                        <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Resident</p>
                        <p class="font-black text-slate-900 text-sm mt-1">Juan Dela Cruz</p>
                    </div>

                    <div class="p-3 bg-slate-50 rounded-xl border border-slate-100">
                        <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Status</p>
                        <span class="inline-flex items-center px-2.5 py-1 rounded-full text-[10px] font-black uppercase tracking-widest bg-amber-100 text-amber-800 border border-amber-200 mt-2">
                            Pending
                        </span>
                    </div>
                </div>

                <div class="mb-6">
                    <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2">Requested Items</p>
                    <div class="flex items-center justify-between p-3 border border-slate-200 rounded-xl bg-white shadow-sm">
                        <div class="flex items-center gap-3">
                            <div class="h-10 w-10 bg-slate-100 rounded-lg flex items-center justify-center text-slate-700">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19.428 15.428a2 2 0 00-1.022-.547l-2.384-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm font-black text-slate-900">Paracetamol (Biogesic)</p>
                                <p class="text-xs text-slate-500 font-bold">Stock Available: 500</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="text-xs text-slate-500 font-bold">Qty Requested</p>
                            <p class="text-lg font-black text-slate-900">10</p>
                        </div>
                    </div>
                </div>

                <div class="flex gap-2">
                    <button type="button"
                        onclick="alert('Demo only: reject action later.')"
                        class="flex-1 py-2.5 border border-rose-200 bg-white text-rose-700 font-black rounded-xl hover:bg-rose-50 transition-all text-[11px] uppercase tracking-widest shadow-sm">
                        Reject
                    </button>
                    <button type="button"
                        onclick="alert('Demo only: approve/dispense action later.')"
                        class="flex-1 py-2.5 bg-slate-900 text-white font-black rounded-xl hover:bg-slate-800 shadow-md transition-all text-[11px] uppercase tracking-widest">
                        Approve & Dispense
                    </button>
                </div>
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

  // Backward compatibility with your existing openModal/closeModal calls
  window.openModal = (id) => openModal(id, null);
  window.closeModal = (id) => closeModal(id);
})();
</script>
@endsection
