@extends('layouts.admin')

@section('header')
    Generate Reports
@endsection

@section('content')
<div class="max-w-7xl mx-auto">
    
    <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100 flex flex-col min-h-[500px]">
        
        <div class="px-5 py-4 border-b border-gray-100">
            <h3 class="text-lg font-bold text-gray-900">Report Generation Center</h3>
            <p class="text-xs text-gray-500 mt-0.5">Select parameters to generate and print detailed system reports.</p>
        </div>

        <div class="bg-gray-50/50 px-5 py-5 border-b border-gray-200">
            <form>
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-4 items-end">
                    
                    <div class="lg:col-span-5">
                        <label for="report_type" class="block text-xs font-bold text-gray-700 mb-1.5">Select Report Type</label>
                        <div class="relative">
                            <select id="report_type" name="report_type" class="w-full bg-white border border-gray-300 rounded-xl py-2 px-3 text-sm text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent shadow-sm transition-all cursor-pointer">
                                <option value="" disabled selected>-- Select Report Category --</option>
                                <option value="residents">Residents Master List</option>
                                <option value="events">Events & Activities Summary</option>
                                <option value="schedules">Appointment Schedules</option>
                                <option value="feedbacks">Constituent Feedbacks</option>
                                <option value="cases">Lupon Cases & Incidents</option>
                                <option value="beso">BESO / Business Records</option>
                            </select>
                        </div>
                    </div>

                    <div class="lg:col-span-4">
                        <label for="date_range" class="block text-xs font-bold text-gray-700 mb-1.5">Date Period</label>
                        <div class="relative">
                            <select id="date_range" name="date_range" class="w-full bg-white border border-gray-300 rounded-xl py-2 px-3 text-sm text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent shadow-sm transition-all cursor-pointer">
                                <option value="this_month" selected>This Month</option>
                                <option value="last_month">Last Month</option>
                                <option value="this_year">This Year</option>
                                <option value="all_time">All Time Records</option>
                                <option value="custom">Custom Range...</option>
                            </select>
                        </div>
                    </div>

                    <div class="lg:col-span-3 flex items-center gap-2">
                        <button type="button" class="flex-1 flex items-center justify-center gap-2 bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded-xl focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600 transition-all shadow-md hover:shadow-lg whitespace-nowrap text-sm h-[38px]">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
                            Load Report
                        </button>
                        
                        <button type="button" class="shrink-0 flex items-center justify-center w-[38px] h-[38px] rounded-xl bg-emerald-100 text-emerald-600 hover:bg-emerald-200 hover:text-emerald-700 transition-all shadow-sm border border-emerald-200" title="Print Current View">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path></svg>
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <div class="flex-1 flex flex-col items-center justify-center p-8 text-center bg-white">
            <div class="p-4 bg-indigo-50 rounded-full text-indigo-400 mb-3 animate-pulse">
                <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
            </div>
            <h4 class="text-lg font-bold text-gray-700">No Report Loaded</h4>
            <p class="text-sm text-gray-500 max-w-md mt-1.5">Please select a report type and date range from the controls above, then click "Load Report".</p>
        </div>

    </div>
</div>
@endsection