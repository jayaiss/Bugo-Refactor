@extends('layouts.admin')

@section('header', 'On-Site Request')

@section('content')
<div class="max-w-4xl mx-auto py-12 px-4">
    {{-- Breadcrumb --}}
    <nav class="flex mb-6 text-gray-400 text-[11px] font-semibold uppercase tracking-[0.22em] justify-center">
        <span>Administration</span>
        <span class="mx-2">/</span>
        <span class="text-slate-900">Urgent Appointments</span>
    </nav>

    {{-- Main Card --}}
    <div class="relative bg-white rounded-3xl shadow-xl shadow-gray-200/60 border border-gray-100 overflow-hidden">
        {{-- soft top glow --}}
        <div class="pointer-events-none absolute inset-0 bg-gradient-to-br from-red-50/60 via-transparent to-blue-50/40"></div>

        <div class="relative grid grid-cols-1 md:grid-cols-12">

            {{-- Left Panel --}}
            <aside class="md:col-span-4 bg-[#FAF9F6] p-8 md:p-12 border-b md:border-b-0 md:border-r border-gray-100 flex flex-col justify-center">
                <div class="w-12 h-12 bg-red-100 rounded-2xl flex items-center justify-center mb-6 ring-1 ring-red-200/60">
                    <span class="text-2xl">⚠️</span>
                </div>

                <h2 class="text-2xl font-extrabold text-gray-900 leading-tight">
                    On-Site Request
                </h2>

                <p class="text-gray-500 text-sm mt-4 leading-relaxed">
                    Instantly schedule an urgent appointment.
                    Please ensure the resident’s data is verified before submission.
                </p>

                {{-- Priority Badge --}}
                <div class="mt-8">
                    <div class="inline-flex items-center gap-2 rounded-full bg-white px-3 py-2 text-[11px] font-semibold text-gray-700 ring-1 ring-gray-200">
                        <span class="inline-flex h-2 w-2 rounded-full bg-green-500"></span>
                        Priority Queue Enabled
                    </div>
                </div>

                {{-- Mini Tips --}}
                <div class="mt-6 space-y-2 text-[11px] text-gray-400">
                    <div class="flex items-start gap-2">
                        <svg class="w-4 h-4 mt-0.5 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M12 2a10 10 0 100 20 10 10 0 000-20z" />
                        </svg>
                        <span>Use search to avoid duplicate urgent entries.</span>
                    </div>
                    <div class="flex items-start gap-2">
                        <svg class="w-4 h-4 mt-0.5 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <span>Confirm resident identity before submitting.</span>
                    </div>
                </div>
            </aside>

            {{-- Right Panel --}}
            <section class="md:col-span-8 p-8 md:p-12">
                <form id="urgentForm" action="#" method="POST" class="space-y-7" novalidate>
                    @csrf

                    {{-- Field --}}
                    <div>
                        <label for="resident_id" class="block text-[11px] font-bold text-gray-400 uppercase tracking-[0.18em] mb-2 ml-1">
                            Resident Search
                        </label>

                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400 group-focus-within:text-slate-900 transition-colors">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                            </div>

                            <select
                                id="resident_id"
                                name="resident_id"
                                class="w-full bg-gray-50 border-0 rounded-2xl py-4 pl-12 pr-10 text-gray-800 font-semibold
                                       ring-1 ring-gray-200 focus:ring-2 focus:ring-slate-900 outline-none appearance-none
                                       transition-all cursor-pointer hover:bg-white"
                                required
                            >
                                <option value="" disabled selected>Search resident by name or ID...</option>
                                <option value="4021">Juan Dela Cruz (ID: 4021)</option>
                                <option value="4022">Maria Clara (ID: 4022)</option>
                            </select>

                            <div class="absolute inset-y-0 right-0 flex items-center pr-4 pointer-events-none text-gray-400">
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </div>
                        </div>

                        <p class="text-[11px] text-gray-400 mt-3 flex items-center ml-1">
                            <svg class="w-3.5 h-3.5 mr-1.5 text-gray-300" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                                <path d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"></path>
                            </svg>
                            Matches are updated in real-time.
                        </p>

                        {{-- Validation placeholder --}}
                        <p id="resident_error" class="hidden mt-3 ml-1 text-xs font-semibold text-red-600">
                            Please select a resident before submitting.
                        </p>
                    </div>

                    {{-- Divider --}}
                    <div class="pt-2">
                        <div class="h-px w-full bg-gradient-to-r from-transparent via-gray-200 to-transparent"></div>
                    </div>

                    {{-- Action --}}
                    <div class="pt-2">
                        <button
                            type="submit"
                            class="w-full bg-slate-900 hover:bg-slate-800 text-white font-extrabold py-4 rounded-2xl
                                   flex items-center justify-center gap-3 transition-all
                                   hover:shadow-lg hover:shadow-slate-200 active:scale-[0.99]
                                   focus:outline-none focus:ring-2 focus:ring-slate-900 focus:ring-offset-2"
                        >
                            <span>Submit Appointment</span>
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                            </svg>
                        </button>

                        <button
                            type="button"
                            class="mt-3 w-full bg-white hover:bg-gray-50 text-gray-800 font-bold py-3.5 rounded-2xl
                                   ring-1 ring-gray-200 transition-all
                                   focus:outline-none focus:ring-2 focus:ring-slate-900 focus:ring-offset-2"
                            onclick="
                                const sel = document.getElementById('resident_id');
                                sel.value='';
                                document.getElementById('resident_error').classList.add('hidden');
                                sel.focus();
                            "
                        >
                            Clear Selection
                        </button>
                    </div>
                </form>
            </section>
        </div>
    </div>

    {{-- Footer --}}
    <footer class="mt-12 flex flex-col items-center justify-center text-gray-400">
        <div class="flex gap-6 text-[10px] font-bold uppercase tracking-[0.22em] mb-3">
            <a href="#" class="hover:text-gray-900 transition-colors">Privacy</a>
            <a href="#" class="hover:text-gray-900 transition-colors">Terms</a>
            <a href="#" class="hover:text-gray-900 transition-colors">Support</a>
        </div>
        <p class="text-[11px] font-medium opacity-60 italic">
            © 2026 Barangay Bugo — Systems Division
        </p>
    </footer>
</div>

{{-- Floating Help --}}
<div class="fixed bottom-8 right-8 group">
    <div class="absolute -top-12 right-0 bg-gray-900 text-white text-[10px] px-3 py-1 rounded-lg opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap font-bold shadow">
        Help Support
    </div>

    <button
        type="button"
        class="bg-gray-900 p-4 rounded-2xl shadow-xl text-white hover:bg-slate-800 transition-all duration-300
               focus:outline-none focus:ring-2 focus:ring-slate-900 focus:ring-offset-2"
        aria-label="Help"
    >
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
        </svg>
    </button>
</div>

{{-- Tiny frontend validation (optional) --}}
@push('scripts')
<script>
document.getElementById('urgentForm')?.addEventListener('submit', function(e){
  const sel = document.getElementById('resident_id');
  const err = document.getElementById('resident_error');
  if (!sel?.value) {
    e.preventDefault();
    err?.classList.remove('hidden');
    sel?.focus();
  }
});
</script>
@endpush
@endsection
