@extends('layouts.admin')

@section('header', 'BESO Registry')

@section('content')
<div class="max-w-[1600px] mx-auto py-8 px-4 font-sans antialiased text-slate-900">

    {{-- Header / Filters Card --}}
    <div class="bg-white rounded-[2rem] shadow-sm border border-slate-100 p-6 mb-6">
        <div class="flex flex-col lg:flex-row justify-between items-end gap-4">

            <form method="GET" action="#" class="flex-grow">
                <div class="grid grid-cols-1 md:grid-cols-12 gap-3 items-end">

                    <div class="md:col-span-3">
                        <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2 ml-1">
                            Resident Name
                        </label>
                        <input
                            type="text"
                            name="search"
                            value="{{ request('search') }}"
                            class="w-full bg-slate-50 border-0 rounded-2xl py-3 px-4 text-sm font-bold
                                   ring-1 ring-slate-200 focus:ring-2 focus:ring-slate-900 outline-none transition-all"
                            placeholder="Search by name"
                        >
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2 ml-1">
                            Month
                        </label>
                        <select
                            name="month"
                            class="w-full bg-slate-50 border-0 rounded-2xl py-3 px-3 text-sm font-bold
                                   ring-1 ring-slate-200 focus:ring-2 focus:ring-slate-900 outline-none cursor-pointer"
                        >
                            <option value="">All Months</option>
                            @foreach(range(1, 12) as $m)
                                <option value="{{ $m }}" {{ request('month') == $m ? 'selected' : '' }}>
                                    {{ date('F', mktime(0, 0, 0, $m, 1)) }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="md:col-span-1">
                        <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2 ml-1">
                            Year
                        </label>
                        <select
                            name="year"
                            class="w-full bg-slate-50 border-0 rounded-2xl py-3 px-3 text-sm font-bold
                                   ring-1 ring-slate-200 focus:ring-2 focus:ring-slate-900 outline-none cursor-pointer"
                        >
                            <option value="">All</option>
                            @php $currentYear = date('Y'); @endphp
                            @for ($y = $currentYear; $y >= 2020; $y--)
                                <option value="{{ $y }}" {{ request('year') == $y ? 'selected' : '' }}>
                                    {{ $y }}
                                </option>
                            @endfor
                        </select>
                    </div>

                    <div class="md:col-span-3">
                        <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2 ml-1">
                            Course
                        </label>
                        <select
                            name="course"
                            class="w-full bg-slate-50 border-0 rounded-2xl py-3 px-4 text-sm font-bold
                                   ring-1 ring-slate-200 focus:ring-2 focus:ring-slate-900 outline-none cursor-pointer"
                        >
                            <option value="">All Categories</option>
                            {{-- later: @foreach($courses as $course) --}}
                        </select>
                    </div>

                    <div class="md:col-span-2 flex gap-2">
                        <button
                            type="submit"
                            class="flex-1 bg-slate-900 hover:bg-slate-800 text-white font-black text-[11px] uppercase tracking-widest
                                   py-3 rounded-2xl transition-all shadow-md shadow-slate-900/10
                                   focus:outline-none focus:ring-2 focus:ring-slate-900 focus:ring-offset-2"
                        >
                            Filter
                        </button>
                        <a
                            href="{{ url()->current() }}"
                            class="flex-1 bg-white hover:bg-slate-50 text-slate-700 font-black text-[11px] uppercase tracking-widest
                                   py-3 rounded-2xl text-center transition-all border border-slate-200
                                   focus:outline-none focus:ring-2 focus:ring-slate-900 focus:ring-offset-2"
                        >
                            Clear
                        </a>
                    </div>

                </div>
            </form>

            <button
                type="button"
                data-open-modal="importModal"
                class="bg-white border border-dashed border-slate-300 text-slate-900 text-[11px] font-black uppercase tracking-widest
                       px-6 py-3 rounded-2xl hover:bg-slate-50 transition-all flex items-center gap-2
                       focus:outline-none focus:ring-2 focus:ring-slate-900 focus:ring-offset-2"
            >
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                          d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path>
                </svg>
                Batch Upload
            </button>
        </div>
    </div>

    {{-- Table Card --}}
    <div class="bg-white rounded-[2.5rem] shadow-xl shadow-slate-200/50 border border-slate-100 overflow-hidden">
        <div class="bg-slate-900 px-8 py-4 flex items-center gap-3">
            <span class="text-white text-lg">🧾</span>
            <h2 class="text-white font-black uppercase tracking-widest text-sm">BESO Registry List</h2>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50/70 border-b border-slate-100 uppercase tracking-[0.15em] text-[10px] font-black text-slate-400">
                        <th class="px-6 py-4 w-[160px]">Series No.</th>
                        <th class="px-6 py-4 w-[320px]">Resident Name</th>
                        <th class="px-6 py-4 w-[160px]">Contact No.</th>
                        <th class="px-6 py-4 w-[70px]">Age</th>
                        <th class="px-6 py-4 w-[240px]">Education</th>
                        <th class="px-6 py-4 w-[240px]">Course</th>
                        <th class="px-6 py-4 w-[220px]">Created At</th>
                        <th class="px-6 py-4 w-[120px] text-center">Actions</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-slate-50">
                    {{-- Demo row (replace with @foreach later) --}}
                    <tr class="hover:bg-slate-50 transition-colors group">
                        <td class="px-6 py-4">
                            <span class="bg-slate-100 text-slate-700 px-3 py-1 rounded-lg text-xs font-black tracking-tight
                                         group-hover:bg-slate-900 group-hover:text-white transition-colors">
                                2026-0001
                            </span>
                        </td>
                        <td class="px-6 py-4 text-sm font-black text-slate-900">Juan Dela Cruz</td>
                        <td class="px-6 py-4 text-xs font-bold text-slate-500">09123456789</td>
                        <td class="px-6 py-4 text-xs font-bold text-slate-500">24</td>
                        <td class="px-6 py-4 text-xs font-bold text-slate-700 uppercase tracking-tight">Tertiary Education</td>
                        <td class="px-6 py-4 text-[10px] font-black text-slate-900 uppercase tracking-widest">BS Information Technology</td>
                        <td class="px-6 py-4 text-[11px] font-bold text-slate-400 uppercase italic">January 12, 2026</td>
                        <td class="px-6 py-4 text-center">
                            <div class="flex justify-center gap-2">
                                <button
                                    type="button"
                                    class="p-2 text-amber-500 hover:bg-amber-50 rounded-lg transition-all"
                                    title="Edit"
                                    onclick="alert('Demo only: edit will be connected to backend later.')"
                                >
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                    </svg>
                                </button>

                                <button
                                    type="button"
                                    class="p-2 text-rose-600 hover:bg-rose-50 rounded-lg transition-all"
                                    title="Delete"
                                    onclick="alert('Demo only: delete will be connected to backend later.')"
                                >
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>

            </table>
        </div>
    </div>
</div>

{{-- =========================
   IMPORT MODAL (WORKING)
========================= --}}
<div id="importModal" class="hidden fixed inset-0 z-50" role="dialog" aria-modal="true" aria-labelledby="import-title">
    <div class="absolute inset-0 bg-slate-900/60 backdrop-blur-sm" data-close-modal="importModal"></div>

    <div class="relative mx-auto w-full max-w-lg px-4 py-10">
        <div class="bg-white rounded-[2.5rem] shadow-2xl border border-slate-100 overflow-hidden">
            <div class="px-8 py-5 bg-slate-900 flex items-center justify-between">
                <h3 id="import-title" class="text-white text-sm font-black uppercase tracking-widest">
                    Batch Upload (Excel/CSV)
                </h3>
                <button type="button" class="text-white/70 hover:text-white" data-close-modal="importModal" aria-label="Close">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            <form id="importForm" action="#" method="POST" enctype="multipart/form-data" class="p-8 space-y-5"
                  onsubmit="event.preventDefault(); alert('Demo only: import will be connected to backend later.');">

                <div>
                    <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-3 ml-1">
                        Choose File
                    </label>

                    <label class="block">
                        <input
                            id="beso_file"
                            type="file"
                            name="beso_file"
                            class="w-full bg-slate-50 border-2 border-dashed border-slate-200 rounded-2xl p-8
                                   text-center text-sm font-bold cursor-pointer hover:border-slate-900 transition-colors"
                            accept=".csv,.xlsx,.xls"
                        >
                    </label>

                    <p id="beso_filename" class="mt-3 text-[11px] font-black text-slate-700 hidden"></p>

                    <div class="text-[10px] text-slate-400 mt-3 font-medium leading-relaxed italic">
                        Max 5MB. Headers required: firstName, middleName, lastName, suffixName, education_attainment, course, contactNum, Age.
                    </div>
                </div>

                <div class="flex gap-3 pt-2">
                    <button type="button"
                        class="flex-1 bg-white border border-slate-200 text-slate-700 font-black text-[11px] uppercase tracking-widest
                               py-3.5 rounded-2xl hover:bg-slate-50 transition-all"
                        data-close-modal="importModal"
                    >
                        Cancel
                    </button>

                    <button type="submit"
                        class="flex-1 bg-slate-900 hover:bg-slate-800 text-white font-black text-[11px] uppercase tracking-widest
                               py-3.5 rounded-2xl transition-all shadow-lg shadow-slate-900/15"
                    >
                        Upload & Import
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- JS: reusable modal system + filename preview --}}
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

  // filename preview
  const fileInput = document.getElementById('beso_file');
  const fileName = document.getElementById('beso_filename');
  if (fileInput && fileName) {
    fileInput.addEventListener('change', () => {
      const f = fileInput.files?.[0];
      if (!f) {
        fileName.classList.add('hidden');
        fileName.textContent = '';
        return;
      }
      fileName.textContent = `Selected: ${f.name}`;
      fileName.classList.remove('hidden');
    });
  }
})();
</script>
@endsection
