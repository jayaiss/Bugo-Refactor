@extends('layouts.admin')

@section('header')
    Generate Reports
@endsection

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-0">

    <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-slate-200 flex flex-col min-h-[520px]">

        {{-- Header --}}
        <div class="px-6 py-5 border-b border-slate-200 bg-white">
            <div class="flex items-start justify-between gap-4">
                <div>
                    <h3 class="text-lg font-black text-slate-900 tracking-tight">Report Generation Center</h3>
                    <p class="text-[11px] font-bold uppercase tracking-widest text-slate-500 mt-1">
                        Select parameters to generate and print system reports
                    </p>
                </div>

                <div class="hidden sm:flex items-center gap-2">
                    <span class="inline-flex items-center gap-2 px-3 py-1.5 rounded-xl bg-slate-50 border border-slate-200 text-[10px] font-black uppercase tracking-widest text-slate-600">
                        <span class="h-2 w-2 rounded-full bg-slate-900 animate-pulse"></span>
                        Ready
                    </span>
                </div>
            </div>
        </div>

        {{-- Controls --}}
        <div class="bg-slate-50/70 px-6 py-6 border-b border-slate-200">
            <form id="reportForm" class="space-y-4" onsubmit="return false;">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-4 items-end">

                    <div class="lg:col-span-5">
                        <label for="report_type" class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-2 ml-1">
                            Report Type
                        </label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400 group-focus-within:text-slate-900 transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M9 12h6m-6 4h6M10 6h4a2 2 0 012 2v12H8V8a2 2 0 012-2z"/>
                                </svg>
                            </div>

                            <select id="report_type" name="report_type"
                                class="w-full bg-white border border-slate-200 rounded-xl py-3 pl-11 pr-10 text-sm font-bold text-slate-800
                                       leading-tight outline-none focus:ring-2 focus:ring-slate-900/30 shadow-sm transition-all cursor-pointer appearance-none">
                                <option value="" disabled selected>-- Select Report Category --</option>
                                <option value="residents">Residents Master List</option>
                                <option value="events">Events & Activities Summary</option>
                                <option value="schedules">Appointment Schedules</option>
                                <option value="feedbacks">Constituent Feedbacks</option>
                                <option value="cases">Lupon Cases & Incidents</option>
                                <option value="beso">BESO / Business Records</option>
                            </select>

                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none text-slate-400">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div class="lg:col-span-4">
                        <label for="date_range" class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-2 ml-1">
                            Date Period
                        </label>

                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400 group-focus-within:text-slate-900 transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                            </div>

                            <select id="date_range" name="date_range"
                                class="w-full bg-white border border-slate-200 rounded-xl py-3 pl-11 pr-10 text-sm font-bold text-slate-800
                                       leading-tight outline-none focus:ring-2 focus:ring-slate-900/30 shadow-sm transition-all cursor-pointer appearance-none">
                                <option value="this_month" selected>This Month</option>
                                <option value="last_month">Last Month</option>
                                <option value="this_year">This Year</option>
                                <option value="all_time">All Time Records</option>
                                <option value="custom">Custom Range...</option>
                            </select>

                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none text-slate-400">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div class="lg:col-span-3 flex items-center gap-2">
                        <button id="loadBtn" type="button"
                            class="flex-1 inline-flex items-center justify-center gap-2 bg-slate-900 hover:bg-slate-800 text-white
                                   font-black py-3 px-4 rounded-xl focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-slate-900/30
                                   transition-all shadow-md hover:shadow-lg whitespace-nowrap text-[11px] uppercase tracking-widest h-[44px]">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                            </svg>
                            Load Report
                        </button>

                        <button id="printBtn" type="button"
                            class="shrink-0 inline-flex items-center justify-center w-[44px] h-[44px] rounded-xl
                                   bg-white text-slate-900 hover:bg-slate-50 transition-all shadow-sm border border-slate-200
                                   disabled:opacity-50 disabled:cursor-not-allowed"
                            title="Print Current View" disabled>
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/>
                            </svg>
                        </button>
                    </div>
                </div>

                {{-- Custom Range --}}
                <div id="customRangeWrap" class="hidden">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-2 ml-1">From</label>
                            <input id="date_from" type="date"
                                   class="w-full bg-white border border-slate-200 rounded-xl py-3 px-4 text-sm font-bold text-slate-800
                                          outline-none focus:ring-2 focus:ring-slate-900/30 shadow-sm">
                        </div>
                        <div>
                            <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-2 ml-1">To</label>
                            <input id="date_to" type="date"
                                   class="w-full bg-white border border-slate-200 rounded-xl py-3 px-4 text-sm font-bold text-slate-800
                                          outline-none focus:ring-2 focus:ring-slate-900/30 shadow-sm">
                        </div>
                    </div>
                    <p class="text-[11px] font-bold text-slate-500 mt-2">
                        Tip: Choose a custom range, then click <span class="font-black text-slate-800">Load Report</span>.
                    </p>
                </div>
            </form>
        </div>

        {{-- Content Area --}}
        <div class="flex-1 p-8 bg-white">
            {{-- Empty state --}}
            <div id="emptyState" class="flex flex-col items-center justify-center text-center">
                <div class="p-4 bg-slate-100 rounded-2xl text-slate-500 mb-3 animate-pulse border border-slate-200">
                    <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                              d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                </div>
                <h4 class="text-lg font-black text-slate-800">No Report Loaded</h4>
                <p class="text-sm text-slate-500 max-w-md mt-2">
                    Select a <span class="font-black text-slate-800">Report Type</span> and <span class="font-black text-slate-800">Date Period</span>,
                    then click <span class="font-black text-slate-800">Load Report</span>.
                </p>
            </div>

            {{-- Preview --}}
            <div id="reportPreview" class="hidden">
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 mb-5">
                    <div>
                        <div class="text-[10px] font-black uppercase tracking-widest text-slate-500">Preview</div>
                        <h4 id="previewTitle" class="text-xl font-black text-slate-900 tracking-tight">—</h4>
                        <p id="previewMeta" class="text-[11px] font-bold text-slate-500 mt-1">—</p>
                    </div>

                    <div class="flex items-center gap-2">
                        <button type="button" id="resetBtn"
                                class="inline-flex items-center justify-center gap-2 rounded-xl border border-slate-200 bg-white px-4 py-2.5
                                       text-[11px] font-black uppercase tracking-widest text-slate-800 hover:bg-slate-50 shadow-sm">
                            Reset
                        </button>
                        <button type="button" id="printBtn2"
                                class="inline-flex items-center justify-center gap-2 rounded-xl bg-slate-900 px-4 py-2.5
                                       text-[11px] font-black uppercase tracking-widest text-white hover:bg-slate-800 shadow-md">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/>
                            </svg>
                            Print
                        </button>
                    </div>
                </div>

                {{-- Fake table preview (frontend only) --}}
                <div class="rounded-2xl border border-slate-200 overflow-hidden">
                    <div class="bg-slate-900 text-white px-5 py-3 text-[11px] font-black uppercase tracking-widest">
                        Report Output (Preview)
                    </div>

                    <div class="overflow-x-auto">
                        <table class="min-w-full text-sm">
                            <thead class="bg-slate-50 border-b border-slate-200">
                                <tr class="text-[10px] font-black uppercase tracking-widest text-slate-600">
                                    <th class="px-5 py-3 text-left">#</th>
                                    <th class="px-5 py-3 text-left">Field</th>
                                    <th class="px-5 py-3 text-left">Value</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100">
                                <tr class="hover:bg-slate-50">
                                    <td class="px-5 py-3 font-black text-slate-900">1</td>
                                    <td class="px-5 py-3 font-bold text-slate-700">Report Type</td>
                                    <td id="rowReportType" class="px-5 py-3 text-slate-700 font-bold">—</td>
                                </tr>
                                <tr class="hover:bg-slate-50">
                                    <td class="px-5 py-3 font-black text-slate-900">2</td>
                                    <td class="px-5 py-3 font-bold text-slate-700">Date Period</td>
                                    <td id="rowDateRange" class="px-5 py-3 text-slate-700 font-bold">—</td>
                                </tr>
                                <tr class="hover:bg-slate-50">
                                    <td class="px-5 py-3 font-black text-slate-900">3</td>
                                    <td class="px-5 py-3 font-bold text-slate-700">Generated</td>
                                    <td id="rowGeneratedAt" class="px-5 py-3 text-slate-700 font-bold">—</td>
                                </tr>
                                <tr class="hover:bg-slate-50">
                                    <td class="px-5 py-3 font-black text-slate-900">4</td>
                                    <td class="px-5 py-3 font-bold text-slate-700">Notes</td>
                                    <td class="px-5 py-3 text-slate-600">
                                        Frontend preview only. Backend export/print hooks can be added later.
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="bg-slate-50 px-5 py-3 border-t border-slate-200 text-[11px] font-bold text-slate-500 flex items-center justify-between">
                        <span>Tip: Use the Print button when ready.</span>
                        <span class="inline-flex items-center gap-2">
                            <span class="h-2 w-2 rounded-full bg-slate-900"></span>
                            Prepared
                        </span>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

{{-- Print styles --}}
<style>
@media print {
    body * { visibility: hidden; }
    #printArea, #printArea * { visibility: visible; }
    #printArea { position: absolute; left: 0; top: 0; width: 100%; }
}
</style>

{{-- Hidden print area (cloned preview) --}}
<div id="printArea" class="hidden"></div>

@push('scripts')
<script>
(function () {
    const reportType = document.getElementById('report_type');
    const dateRange  = document.getElementById('date_range');
    const customWrap = document.getElementById('customRangeWrap');
    const dateFrom   = document.getElementById('date_from');
    const dateTo     = document.getElementById('date_to');

    const loadBtn    = document.getElementById('loadBtn');
    const printBtn   = document.getElementById('printBtn');
    const printBtn2  = document.getElementById('printBtn2');
    const resetBtn   = document.getElementById('resetBtn');

    const emptyState   = document.getElementById('emptyState');
    const reportPreview= document.getElementById('reportPreview');

    const previewTitle = document.getElementById('previewTitle');
    const previewMeta  = document.getElementById('previewMeta');

    const rowReportType  = document.getElementById('rowReportType');
    const rowDateRange   = document.getElementById('rowDateRange');
    const rowGeneratedAt = document.getElementById('rowGeneratedAt');

    const printArea = document.getElementById('printArea');

    function getLabel(selectEl) {
        const opt = selectEl?.options?.[selectEl.selectedIndex];
        return opt ? opt.text : '';
    }

    function toggleCustomRange() {
        const isCustom = dateRange?.value === 'custom';
        customWrap?.classList.toggle('hidden', !isCustom);
    }

    function validate() {
        if (!reportType?.value) return { ok:false, msg:'Please select a Report Type.' };
        if (!dateRange?.value)  return { ok:false, msg:'Please select a Date Period.' };

        if (dateRange.value === 'custom') {
            if (!dateFrom?.value || !dateTo?.value) return { ok:false, msg:'Please select both From and To dates.' };
            if (dateFrom.value > dateTo.value) return { ok:false, msg:'Invalid custom range: From is after To.' };
        }
        return { ok:true };
    }

    function toast(message) {
        // SweetAlert optional
        if (typeof Swal !== 'undefined') {
            Swal.fire({ icon:'warning', title:'Oops', text: message, confirmButtonText:'OK' });
        } else {
            alert(message);
        }
    }

    function formatRange() {
        if (dateRange.value !== 'custom') return getLabel(dateRange);
        return `${dateFrom.value} to ${dateTo.value}`;
    }

    function loadPreview() {
        const v = validate();
        if (!v.ok) return toast(v.msg);

        const typeLabel = getLabel(reportType);
        const rangeLabel = formatRange();
        const now = new Date();
        const generated = now.toLocaleString();

        previewTitle.textContent = typeLabel;
        previewMeta.textContent  = `Period: ${rangeLabel}`;

        rowReportType.textContent  = typeLabel;
        rowDateRange.textContent   = rangeLabel;
        rowGeneratedAt.textContent = generated;

        emptyState.classList.add('hidden');
        reportPreview.classList.remove('hidden');

        printBtn.disabled = false;
    }

    function resetAll() {
        // reset selects (keep default for dateRange)
        if (reportType) reportType.selectedIndex = 0;
        if (dateRange) dateRange.value = 'this_month';
        if (dateFrom) dateFrom.value = '';
        if (dateTo) dateTo.value = '';
        toggleCustomRange();

        reportPreview.classList.add('hidden');
        emptyState.classList.remove('hidden');

        printBtn.disabled = true;
        printArea.classList.add('hidden');
        printArea.innerHTML = '';
    }

    function doPrint() {
        // Clone preview card into print area
        const v = validate();
        if (!v.ok) return toast(v.msg);

        printArea.innerHTML = '';
        const clone = reportPreview.cloneNode(true);
        clone.classList.remove('hidden');
        clone.id = 'printAreaInner';
        printArea.appendChild(clone);

        printArea.classList.remove('hidden');
        window.print();
        // Keep print area hidden again after print
        setTimeout(() => {
            printArea.classList.add('hidden');
            printArea.innerHTML = '';
        }, 200);
    }

    dateRange?.addEventListener('change', toggleCustomRange);
    loadBtn?.addEventListener('click', loadPreview);
    printBtn?.addEventListener('click', doPrint);
    printBtn2?.addEventListener('click', doPrint);
    resetBtn?.addEventListener('click', resetAll);

    // init
    toggleCustomRange();
})();
</script>
@endpush
@endsection
