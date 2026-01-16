@extends('layouts.admin')

@section('header', 'Multimedia & Events')

@section('content')
<div class="max-w-[1600px] mx-auto py-10 px-6 font-sans antialiased text-slate-900">

    {{-- HEADER --}}
    <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center gap-6 mb-10">
        <div>
            <h1 class="text-4xl font-black text-slate-900 tracking-tighter">Event Management</h1>
            <p class="text-slate-500 text-[11px] font-bold uppercase tracking-[0.3em] mt-2 flex items-center gap-2">
                <span class="w-2 h-2 bg-slate-900 rounded-full animate-pulse"></span>
                Multimedia Department Schedule
            </p>
        </div>

        <div class="flex flex-wrap gap-4">
            <button type="button"
                onclick="window.print()"
                class="bg-white border border-slate-200 text-slate-700 text-[11px] font-black uppercase tracking-widest px-8 py-4 rounded-2xl
                       hover:bg-slate-50 transition-all flex items-center gap-3 shadow-sm hover:shadow-md
                       focus:outline-none focus:ring-2 focus:ring-slate-900 focus:ring-offset-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z">
                    </path>
                </svg>
                Print List
            </button>

            <button type="button"
                data-open-modal="addEventModal"
                class="bg-slate-900 hover:bg-slate-800 text-white text-[11px] font-black uppercase tracking-widest px-8 py-4 rounded-2xl
                       transition-all shadow-xl shadow-slate-900/20 flex items-center gap-3 hover:-translate-y-1 active:scale-95
                       focus:outline-none focus:ring-2 focus:ring-slate-900 focus:ring-offset-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 4v16m8-8H4"></path>
                </svg>
                Create Event
            </button>
        </div>
    </div>

    {{-- FILTERS (structure only) --}}
    <form method="GET" action="{{ url()->current() }}">
        <div class="bg-white rounded-[2.5rem] shadow-sm border border-slate-100 p-8 mb-8">
            <div class="flex flex-col md:flex-row gap-6 items-end">

                <div class="flex-grow">
                    <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-3 ml-1">
                        Find Event
                    </label>
                    <div class="relative group">
                        <input type="text" name="q" value="{{ request('q') }}"
                            class="w-full bg-slate-50 border-0 rounded-2xl py-4 pl-12 pr-4 text-sm font-bold
                                   ring-1 ring-slate-200 focus:ring-2 focus:ring-slate-900 outline-none transition-all"
                            placeholder="Search title or location...">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-300 group-focus-within:text-slate-900 transition-colors">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="w-full md:w-40">
                    <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-3 ml-1">
                        Year
                    </label>
                    <select name="year"
                        class="w-full bg-slate-50 border-0 rounded-2xl py-4 px-4 text-sm font-bold
                               ring-1 ring-slate-200 focus:ring-2 focus:ring-slate-900 outline-none cursor-pointer text-slate-700">
                        <option value="">All</option>
                        <option value="2026" @selected(request('year') == '2026')>2026</option>
                        <option value="2025" @selected(request('year') == '2025')>2025</option>
                    </select>
                </div>

                <div class="w-full md:w-48">
                    <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-3 ml-1">
                        Month
                    </label>
                    <select name="month"
                        class="w-full bg-slate-50 border-0 rounded-2xl py-4 px-4 text-sm font-bold
                               ring-1 ring-slate-200 focus:ring-2 focus:ring-slate-900 outline-none cursor-pointer text-slate-700">
                        <option value="">All Months</option>
                        @foreach(range(1,12) as $m)
                            <option value="{{ $m }}" @selected((int)request('month') === $m)>
                                {{ date('F', mktime(0,0,0,$m,1)) }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="flex gap-2">
                    <button type="submit"
                        class="bg-slate-900 hover:bg-slate-800 text-white font-black text-[11px] uppercase tracking-widest
                               py-4 px-8 rounded-2xl transition-all shadow-lg shadow-slate-900/10 h-[54px]
                               focus:outline-none focus:ring-2 focus:ring-slate-900 focus:ring-offset-2">
                        Filter
                    </button>

                    <a href="{{ url()->current() }}"
                        class="bg-white hover:bg-slate-50 text-slate-700 font-black text-[11px] uppercase tracking-widest
                               py-4 px-8 rounded-2xl transition-all border border-slate-200 h-[54px] inline-flex items-center
                               focus:outline-none focus:ring-2 focus:ring-slate-900 focus:ring-offset-2">
                        Clear
                    </a>
                </div>

            </div>
        </div>
    </form>

    {{-- TABLE --}}
    <div class="bg-white rounded-[2.5rem] shadow-2xl shadow-slate-200/50 border border-slate-100 overflow-hidden">

        <div class="bg-slate-900 px-8 py-5 flex items-center gap-4">
            <div class="p-2 bg-white/10 rounded-lg">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
            </div>
            <h2 class="text-white font-black tracking-[0.2em] uppercase text-sm">Scheduled Events</h2>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50/80 border-b border-slate-100">
                        <th class="px-8 py-6 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Event Details</th>
                        <th class="px-8 py-6 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Location</th>
                        <th class="px-8 py-6 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Organizer</th>
                        <th class="px-8 py-6 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Status</th>
                        <th class="px-8 py-6 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] text-center">Controls</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-slate-50">
                    @forelse($events ?? [] as $event)
                        <tr class="hover:bg-slate-50 transition-all group">

                            <td class="px-8 py-6 align-top">
                                <div class="flex items-start gap-4">
                                    <div class="flex-shrink-0 w-14 h-14 bg-slate-50 rounded-xl border border-slate-200 flex flex-col items-center justify-center text-slate-900 shadow-sm group-hover:bg-white group-hover:border-slate-300 transition-colors">
                                        <span class="text-[10px] font-black uppercase tracking-wider">
                                            {{ $event->month ?? 'Jan' }}
                                        </span>
                                        <span class="text-xl font-black leading-none">
                                            {{ $event->day ?? '01' }}
                                        </span>
                                    </div>

                                    <div>
                                        <div class="text-sm font-black text-slate-900 group-hover:text-slate-700 transition-colors">
                                            {{ $event->title ?? 'Event Title' }}
                                        </div>
                                        <div class="text-[10px] text-slate-400 font-bold uppercase mt-1 tracking-wide">
                                            {{ $event->time ?? '08:00 AM - 12:00 PM' }}
                                        </div>
                                    </div>
                                </div>
                            </td>

                            <td class="px-8 py-6 align-top">
                                <div class="flex items-center gap-2 text-slate-600">
                                    <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                    <span class="text-xs font-bold">{{ $event->location ?? '—' }}</span>
                                </div>
                            </td>

                            <td class="px-8 py-6 align-top">
                                <span class="text-xs font-bold text-slate-700">{{ $event->organizer ?? '—' }}</span>
                            </td>

                            <td class="px-8 py-6 align-top">
                                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-[9px] font-black uppercase tracking-widest bg-emerald-100 text-emerald-700 border border-emerald-200">
                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                                    {{ $event->status ?? 'Upcoming' }}
                                </span>
                            </td>

                            <td class="px-8 py-6 align-top text-center">
                                <div class="flex justify-center gap-3">
                                    <button type="button"
                                        onclick="alert('Demo only: view modal will be connected later.')"
                                        class="text-slate-400 hover:text-slate-900 hover:scale-110 transition-transform"
                                        title="View">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                    </button>

                                    <button type="button"
                                        onclick="alert('Demo only: edit modal will be connected later.')"
                                        class="text-slate-400 hover:text-amber-500 hover:scale-110 transition-transform"
                                        title="Edit">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                        </svg>
                                    </button>

                                    <button type="button"
                                        onclick="alert('Demo only: delete confirmation will be connected later.')"
                                        class="text-slate-400 hover:text-rose-600 hover:scale-110 transition-transform"
                                        title="Delete">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                    </button>
                                </div>
                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-8 py-14 text-center">
                                <p class="text-sm font-black text-slate-700">No events found.</p>
                                <p class="text-xs text-slate-500 font-bold mt-1">Try adjusting the filters.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>

            </table>
        </div>

        {{-- Footer / Pagination placeholder --}}
        <div class="bg-slate-50 px-8 py-5 border-t border-slate-100 flex justify-between items-center text-[10px] font-bold text-slate-400 uppercase tracking-[0.2em]">
            <span>Showing entries 1-10 of 0</span>
            <div class="flex gap-2">
                <button type="button"
                    class="w-9 h-9 flex items-center justify-center rounded-xl border border-slate-200 bg-white text-slate-400 hover:text-slate-900 hover:border-slate-400 transition-all"
                    onclick="alert('Demo only')">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M15 19l-7-7 7-7"></path>
                    </svg>
                </button>
                <button type="button"
                    class="w-9 h-9 flex items-center justify-center rounded-xl border border-slate-200 bg-white text-slate-400 hover:text-slate-900 hover:border-slate-400 transition-all"
                    onclick="alert('Demo only')">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 5l7 7-7 7"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>
</div>

{{-- ADD EVENT MODAL (WORKING + ESC + Click overlay) --}}
<div id="addEventModal" class="hidden fixed inset-0 z-[100]" role="dialog" aria-modal="true" aria-labelledby="addEventTitle">
    <div class="absolute inset-0 bg-slate-900/60 backdrop-blur-sm" data-close-modal="addEventModal"></div>

    <div class="relative mx-auto w-full max-w-2xl px-4 py-10">
        <div class="bg-white rounded-[2.5rem] shadow-2xl border border-slate-100 overflow-hidden">

            <div class="px-8 py-5 bg-slate-900 flex items-center justify-between">
                <h3 id="addEventTitle" class="text-white text-sm font-black uppercase tracking-widest">Create Event</h3>
                <button type="button" class="text-white/70 hover:text-white" data-close-modal="addEventModal" aria-label="Close">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            <form class="p-8 space-y-5"
                  onsubmit="event.preventDefault(); alert('Demo only: will connect backend later.');">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2 ml-1">Event Title</label>
                        <input type="text"
                            class="w-full bg-slate-50 border-0 rounded-2xl py-3 px-4 text-sm font-bold ring-1 ring-slate-200 focus:ring-2 focus:ring-slate-900 outline-none transition-all"
                            placeholder="e.g., Barangay Assembly">
                    </div>

                    <div>
                        <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2 ml-1">Organizer</label>
                        <input type="text"
                            class="w-full bg-slate-50 border-0 rounded-2xl py-3 px-4 text-sm font-bold ring-1 ring-slate-200 focus:ring-2 focus:ring-slate-900 outline-none transition-all"
                            placeholder="e.g., Multimedia Team">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2 ml-1">Date</label>
                        <input type="date"
                            class="w-full bg-slate-50 border-0 rounded-2xl py-3 px-4 text-sm font-bold ring-1 ring-slate-200 focus:ring-2 focus:ring-slate-900 outline-none transition-all">
                    </div>

                    <div>
                        <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2 ml-1">Time</label>
                        <input type="text"
                            class="w-full bg-slate-50 border-0 rounded-2xl py-3 px-4 text-sm font-bold ring-1 ring-slate-200 focus:ring-2 focus:ring-slate-900 outline-none transition-all"
                            placeholder="e.g., 08:00 AM - 12:00 PM">
                    </div>
                </div>

                <div>
                    <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2 ml-1">Location</label>
                    <input type="text"
                        class="w-full bg-slate-50 border-0 rounded-2xl py-3 px-4 text-sm font-bold ring-1 ring-slate-200 focus:ring-2 focus:ring-slate-900 outline-none transition-all"
                        placeholder="e.g., Barangay Hall">
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2 ml-1">Status</label>
                        <select
                            class="w-full bg-slate-50 border-0 rounded-2xl py-3 px-4 text-sm font-bold ring-1 ring-slate-200 focus:ring-2 focus:ring-slate-900 outline-none cursor-pointer">
                            <option>Upcoming</option>
                            <option>Ongoing</option>
                            <option>Completed</option>
                            <option>Cancelled</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2 ml-1">Attachment (optional)</label>
                        <input type="file"
                            class="w-full bg-slate-50 border-2 border-dashed border-slate-200 rounded-2xl py-3 px-4 text-sm font-bold
                                   cursor-pointer hover:border-slate-900 transition-colors"
                            accept="image/*,video/*,.pdf">
                    </div>
                </div>

                <div>
                    <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2 ml-1">Notes (optional)</label>
                    <textarea rows="4"
                        class="w-full bg-slate-50 border-0 rounded-2xl py-3 px-4 text-sm font-bold ring-1 ring-slate-200 focus:ring-2 focus:ring-slate-900 outline-none transition-all resize-none"
                        placeholder="Short description / requirements…"></textarea>
                </div>

                <div class="flex gap-3 pt-2">
                    <button type="button"
                        class="flex-1 bg-white border border-slate-200 text-slate-700 font-black text-[11px] uppercase tracking-widest py-3.5 rounded-2xl hover:bg-slate-50 transition-all"
                        data-close-modal="addEventModal">
                        Cancel
                    </button>
                    <button type="submit"
                        class="flex-1 bg-slate-900 hover:bg-slate-800 text-white font-black text-[11px] uppercase tracking-widest py-3.5 rounded-2xl transition-all shadow-lg shadow-slate-900/15">
                        Save Event
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Reusable Modal System --}}
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
})();
</script>
@endsection
