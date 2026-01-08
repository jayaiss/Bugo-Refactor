@extends('layouts.admin')

@section('header', 'Admin Dashboard')

@section('content')

    <div class="bg-white rounded-xl shadow-sm p-6 mb-8 border border-gray-200">
        <div class="grid grid-cols-1 md:grid-cols-5 gap-4 items-end">
            <div>
                <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1">Start date</label>
                <input type="date" class="w-full border-gray-300 rounded-lg text-sm focus:ring-blue-500 focus:border-blue-500 p-2.5 bg-gray-50 border transition-shadow">
            </div>
            <div>
                <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1">End date</label>
                <input type="date" class="w-full border-gray-300 rounded-lg text-sm focus:ring-blue-500 focus:border-blue-500 p-2.5 bg-gray-50 border transition-shadow">
            </div>
            <div>
                <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1">Request Type</label>
                <select class="w-full border-gray-300 rounded-lg text-sm p-2.5 bg-gray-50 border focus:ring-blue-500 focus:border-blue-500">
                    <option>All Types</option>
                    <option>Certificates</option>
                    <option>Complaints</option>
                </select>
            </div>
            <div>
                <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1">Category</label>
                <select class="w-full border-gray-300 rounded-lg text-sm p-2.5 bg-gray-50 border focus:ring-blue-500 focus:border-blue-500">
                    <option>All Categories</option>
                </select>
            </div>
            <div>
                <button class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg text-sm px-5 py-2.5 text-center transition-colors shadow-sm">
                    Apply Filter
                </button>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

        <div class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm hover:shadow-md transition-shadow relative overflow-hidden group">
            <div class="relative z-10">
                <p class="text-slate-500 text-xs font-bold uppercase tracking-wider mb-1">Total Residents</p>
                <h3 class="text-4xl font-extrabold text-blue-600">984</h3>
            </div>
        </div>

        <div class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm hover:shadow-md transition-shadow relative overflow-hidden">
            <div class="relative z-10">
                <p class="text-slate-500 text-xs font-bold uppercase tracking-wider mb-1">Males</p>
                <h3 class="text-4xl font-extrabold text-sky-500">2</h3>
            </div>
        </div>

        <div class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm hover:shadow-md transition-shadow relative overflow-hidden">
            <div class="relative z-10">
                <p class="text-slate-500 text-xs font-bold uppercase tracking-wider mb-1">Females</p>
                <h3 class="text-4xl font-extrabold text-pink-500">2</h3>
            </div>
        </div>
        
        <div class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm hover:shadow-md transition-shadow relative overflow-hidden">
            <div class="relative z-10">
                <p class="text-slate-500 text-xs font-bold uppercase tracking-wider mb-1">Urgent Requests</p>
                <h3 class="text-4xl font-extrabold text-red-500">0</h3>
            </div>
        </div>

        <div class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm hover:shadow-md transition-shadow relative overflow-hidden">
            <div class="relative z-10">
                <p class="text-slate-500 text-xs font-bold uppercase tracking-wider mb-1">Upcoming Events</p>
                <h3 class="text-4xl font-extrabold text-indigo-500">0</h3>
            </div>
        </div>

         <div class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm hover:shadow-md transition-shadow relative overflow-hidden">
            <div class="relative z-10">
                <p class="text-slate-500 text-xs font-bold uppercase tracking-wider mb-1">Pending Appointments</p>
                <h3 class="text-4xl font-extrabold text-amber-500">0</h3>
            </div>
        </div>

    </div>
@endsection