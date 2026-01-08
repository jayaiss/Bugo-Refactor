@extends('layouts.admin')

@section('header', 'Appointment List')

@section('content')

    <div class="max-w-7xl mx-auto">

        <div class="flex flex-col md:flex-row justify-between items-center mb-6 gap-4">
            
            <div class="flex flex-1 w-full md:w-auto gap-4">
                <div class="relative w-full md:w-64">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </div>
                    <input type="text" class="pl-10 w-full border-gray-300 rounded-lg text-sm focus:ring-blue-500 focus:border-blue-500 p-2.5 bg-white border shadow-sm" placeholder="Search resident...">
                </div>

                <select class="w-full md:w-48 border-gray-300 rounded-lg text-sm focus:ring-blue-500 focus:border-blue-500 p-2.5 bg-white border shadow-sm">
                    <option value="">All Statuses</option>
                    <option value="pending">Pending</option>
                    <option value="confirmed">Confirmed</option>
                    <option value="completed">Completed</option>
                    <option value="cancelled">Cancelled</option>
                </select>
            </div>

            <div class="flex gap-3">
                <button class="flex items-center bg-white border border-gray-300 text-gray-700 hover:bg-gray-50 font-medium rounded-lg text-sm px-4 py-2.5 shadow-sm transition-colors">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                    Export
                </button>
                <button class="flex items-center bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg text-sm px-4 py-2.5 shadow-sm transition-colors">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                    New Appointment
                </button>
            </div>
        </div>

        <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 border-b border-gray-200">
                        <tr>
                            <th scope="col" class="px-6 py-4">Reference ID</th>
                            <th scope="col" class="px-6 py-4">Resident Name</th>
                            <th scope="col" class="px-6 py-4">Service Type</th>
                            <th scope="col" class="px-6 py-4">Date & Time</th>
                            <th scope="col" class="px-6 py-4">Status</th>
                            <th scope="col" class="px-6 py-4 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        
                        <tr class="bg-white hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4 font-medium text-gray-900">#APT-00125</td>
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    <div class="h-8 w-8 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center font-bold text-xs mr-3">JD</div>
                                    <div>
                                        <div class="font-medium text-gray-900">Juan Dela Cruz</div>
                                        <div class="text-xs text-gray-400">Purok 1, Bugo</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">Business Clearance</td>
                            <td class="px-6 py-4">
                                <div class="text-gray-900">Jan 12, 2026</div>
                                <div class="text-xs text-gray-400">10:00 AM</div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="bg-yellow-100 text-yellow-800 text-xs font-medium px-2.5 py-0.5 rounded-full border border-yellow-200">Pending</span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <button class="text-blue-600 hover:text-blue-900 font-medium text-sm mr-3">Edit</button>
                                <button class="text-red-600 hover:text-red-900 font-medium text-sm">Cancel</button>
                            </td>
                        </tr>

                        <tr class="bg-white hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4 font-medium text-gray-900">#APT-00124</td>
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    <div class="h-8 w-8 rounded-full bg-pink-100 text-pink-600 flex items-center justify-center font-bold text-xs mr-3">MC</div>
                                    <div>
                                        <div class="font-medium text-gray-900">Maria Clara</div>
                                        <div class="text-xs text-gray-400">Purok 3, Bugo</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">Barangay Indigency</td>
                            <td class="px-6 py-4">
                                <div class="text-gray-900">Jan 10, 2026</div>
                                <div class="text-xs text-gray-400">2:30 PM</div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded-full border border-green-200">Confirmed</span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <button class="text-blue-600 hover:text-blue-900 font-medium text-sm mr-3">View</button>
                            </td>
                        </tr>

                        <tr class="bg-white hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4 font-medium text-gray-900">#APT-00123</td>
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    <div class="h-8 w-8 rounded-full bg-indigo-100 text-indigo-600 flex items-center justify-center font-bold text-xs mr-3">JR</div>
                                    <div>
                                        <div class="font-medium text-gray-900">Jose Rizal</div>
                                        <div class="text-xs text-gray-400">Purok 2, Bugo</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">Cedula</td>
                            <td class="px-6 py-4">
                                <div class="text-gray-900">Jan 08, 2026</div>
                                <div class="text-xs text-gray-400">9:00 AM</div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded-full border border-blue-200">Completed</span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <button class="text-gray-400 hover:text-gray-600 font-medium text-sm cursor-not-allowed">Archived</button>
                            </td>
                        </tr>

                         <tr class="bg-white hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4 font-medium text-gray-900">#APT-00122</td>
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    <div class="h-8 w-8 rounded-full bg-orange-100 text-orange-600 flex items-center justify-center font-bold text-xs mr-3">AL</div>
                                    <div>
                                        <div class="font-medium text-gray-900">Andres Lapu</div>
                                        <div class="text-xs text-gray-400">Purok 5, Bugo</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">Business Clearance</td>
                            <td class="px-6 py-4">
                                <div class="text-gray-900">Jan 05, 2026</div>
                                <div class="text-xs text-gray-400">11:00 AM</div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded-full border border-red-200">Cancelled</span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <button class="text-blue-600 hover:text-blue-900 font-medium text-sm mr-3">Reschedule</button>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
            
            <div class="bg-white px-6 py-4 border-t border-gray-200 flex items-center justify-between">
                <span class="text-sm text-gray-500">
                    Showing <span class="font-medium text-gray-900">1</span> to <span class="font-medium text-gray-900">4</span> of <span class="font-medium text-gray-900">12</span> entries
                </span>
                <div class="flex space-x-1">
                    <button class="px-3 py-1 border border-gray-300 rounded-md text-sm font-medium text-gray-500 hover:bg-gray-50 disabled:opacity-50">Previous</button>
                    <button class="px-3 py-1 border border-blue-500 bg-blue-50 rounded-md text-sm font-medium text-blue-600">1</button>
                    <button class="px-3 py-1 border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50">2</button>
                    <button class="px-3 py-1 border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50">3</button>
                    <button class="px-3 py-1 border border-gray-300 rounded-md text-sm font-medium text-gray-500 hover:bg-gray-50">Next</button>
                </div>
            </div>
        </div>

    </div>

@endsection