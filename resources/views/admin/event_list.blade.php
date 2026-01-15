@extends('layouts.admin')

@section('header')
    Event List
@endsection

@section('content')
<div class="max-w-7xl mx-auto">
    
    <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100">
        
        <div class="p-6 border-b border-gray-100 flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div>
                <h3 class="text-xl font-bold text-gray-900">Multimedia Events</h3>
                <p class="text-sm text-gray-500">Manage community events, announcements, and schedules.</p>
            </div>
            
            <button class="flex items-center gap-2 bg-slate-900 text-white hover:bg-slate-800 px-5 py-2.5 rounded-xl text-sm font-bold transition-all shadow-lg shadow-slate-900/20 transform hover:-translate-y-0.5">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                Create New Event
            </button>
        </div>

        <div class="bg-gray-50/50 p-6 border-b border-gray-100">
            <form class="grid grid-cols-1 md:grid-cols-12 gap-4">
                
                <div class="md:col-span-3">
                    <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-1">Category</label>
                    <select class="w-full bg-white border border-gray-300 text-gray-700 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 shadow-sm">
                        <option value="all">All Categories</option>
                        <option value="community">Community</option>
                        <option value="seminar">Seminar</option>
                        <option value="health">Health Mission</option>
                        <option value="sports">Sports</option>
                    </select>
                </div>
                
                <div class="md:col-span-3">
                    <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-1">Status</label>
                    <select class="w-full bg-white border border-gray-300 text-gray-700 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 shadow-sm">
                        <option value="all">All Statuses</option>
                        <option value="upcoming">Upcoming</option>
                        <option value="ongoing">Ongoing</option>
                        <option value="completed">Completed</option>
                        <option value="cancelled">Cancelled</option>
                    </select>
                </div>

                <div class="md:col-span-6">
                    <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-1">Search Events</label>
                    <div class="relative">
                        <input type="text" 
                               class="w-full bg-white border border-gray-300 text-gray-700 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 pl-10 shadow-sm" 
                               placeholder="Search event title or location...">
                        
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                        </div>
                        
                        <button type="submit" class="absolute right-1 bottom-1 top-1 bg-slate-900 hover:bg-slate-800 text-white font-medium rounded-md text-xs px-4 py-1.5 transition-colors">
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
                        <th scope="col" class="px-6 py-4 font-bold tracking-wider">Event Details</th>
                        <th scope="col" class="px-6 py-4 font-bold tracking-wider">Date & Time</th>
                        <th scope="col" class="px-6 py-4 font-bold tracking-wider">Location</th>
                        <th scope="col" class="px-6 py-4 font-bold tracking-wider">Status</th>
                        <th scope="col" class="px-6 py-4 font-bold tracking-wider text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    
                    <tr class="bg-white hover:bg-gray-50 transition-colors group">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="h-10 w-10 rounded-lg bg-orange-100 flex items-center justify-center text-orange-600 shrink-0">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"></path></svg>
                                </div>
                                <div>
                                    <div class="font-bold text-gray-900">Barangay General Assembly</div>
                                    <div class="text-xs text-gray-500">Community Meeting</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-gray-900 font-medium">Feb 15, 2026</div>
                            <div class="text-xs text-gray-400">08:00 AM - 12:00 PM</div>
                        </td>
                        <td class="px-6 py-4 text-gray-600">
                            Covered Court
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800 border border-blue-200">
                                Upcoming
                            </span>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex items-center justify-end gap-3">
                                <button class="flex items-center justify-center w-8 h-8 rounded-lg bg-blue-100 text-blue-600 hover:bg-blue-200 hover:text-blue-700 transition-all shadow-sm" title="View Details">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>
                                </button>
                                <button class="flex items-center justify-center w-8 h-8 rounded-lg bg-indigo-100 text-indigo-600 hover:bg-indigo-200 hover:text-indigo-700 transition-all shadow-sm" title="Edit Event">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                                </button>
                                <button class="flex items-center justify-center w-8 h-8 rounded-lg bg-red-100 text-red-600 hover:bg-red-200 hover:text-red-700 transition-all shadow-sm" title="Delete Event">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <tr class="bg-white hover:bg-gray-50 transition-colors group">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="h-10 w-10 rounded-lg bg-emerald-100 flex items-center justify-center text-emerald-600 shrink-0">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                                </div>
                                <div>
                                    <div class="font-bold text-gray-900">Free Medical Checkup</div>
                                    <div class="text-xs text-gray-500">Health Mission</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-gray-900 font-medium">Jan 05, 2026</div>
                            <div class="text-xs text-gray-400">09:00 AM - 03:00 PM</div>
                        </td>
                        <td class="px-6 py-4 text-gray-600">
                            Health Center
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800 border border-gray-200">
                                Completed
                            </span>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex items-center justify-end gap-3">
                                <button class="flex items-center justify-center w-8 h-8 rounded-lg bg-blue-100 text-blue-600 hover:bg-blue-200 hover:text-blue-700 transition-all shadow-sm" title="View Details">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>
                                </button>
                                <button class="flex items-center justify-center w-8 h-8 rounded-lg bg-indigo-100 text-indigo-600 hover:bg-indigo-200 hover:text-indigo-700 transition-all shadow-sm" title="Edit Event">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                                </button>
                                <button class="flex items-center justify-center w-8 h-8 rounded-lg bg-red-100 text-red-600 hover:bg-red-200 hover:text-red-700 transition-all shadow-sm" title="Delete Event">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                </button>
                            </div>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>

        <div class="bg-gray-50 px-6 py-4 border-t border-gray-100 flex items-center justify-between">
            <span class="text-sm text-gray-500">Showing <span class="font-bold text-gray-900">1</span> to <span class="font-bold text-gray-900">10</span> of <span class="font-bold text-gray-900">50</span> Events</span>
            
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
@endsection