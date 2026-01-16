@extends('layouts.admin')

@section('header')
    Resident Audit Logs
@endsection

@section('content')
<div class="max-w-7xl mx-auto">
    
    <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100">
        
        <div class="px-6 py-5 border-b border-gray-100 flex justify-between items-center">
            <div>
                <h3 class="text-lg font-bold text-gray-900">Resident Activity Logs</h3>
                <p class="text-xs text-gray-500 mt-0.5">Track system activities, logins, and document requests by residents.</p>
            </div>
        </div>

        <div class="bg-gray-50/50 p-6 border-b border-gray-200">
            <form>
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-4">
                    
                    <div>
                        <label class="block text-xs font-bold text-gray-700 mb-1.5">Module</label>
                        <select class="w-full bg-white border border-gray-300 rounded-xl py-2 px-3 text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all shadow-sm cursor-pointer">
                            <option value="all">All Modules</option>
                            <option value="residents">Residents</option>
                            <option value="schedule_appointment">Schedule Appointment</option>
                            <option value="cedula">Cedula</option>
                            <option value="login">Login</option>
                            <option value="logout">Logout</option>
                            <option value="change_password">Change Password</option>
                            <option value="personal_details">Personal Details</option>
                            <option value="uploaded_profile_picture">Uploaded Profile Picture</option>
                            <option value="feedbacks">Feedbacks</option>
                            <option value="beso">BESO</option>
                            <option value="residents_forgot_password">Residents Forgot Password</option>
                            <option value="linked_family_member">Linked Family Member</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-gray-700 mb-1.5">Action</label>
                        <select class="w-full bg-white border border-gray-300 rounded-xl py-2 px-3 text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all shadow-sm cursor-pointer">
                            <option value="all">All Actions</option>
                            <option value="edited">Edited</option>
                            <option value="added">Added</option>
                            <option value="login">Login</option>
                            <option value="logout">Logout</option>
                            <option value="schedule">Schedule</option>
                            <option value="password_reset">Password_Reset</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-gray-700 mb-1.5">Role</label>
                        <select disabled class="w-full bg-gray-100 border border-gray-300 rounded-xl py-2 px-3 text-sm text-gray-500 cursor-not-allowed">
                            <option value="residents" selected>Residents</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-gray-700 mb-1.5">Actor (Action By)</label>
                        <input type="text" placeholder="e.g. Juan Dela Cruz" class="w-full bg-white border border-gray-300 rounded-xl py-2 px-3 text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all shadow-sm">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-12 gap-4 items-end">
                    
                    <div class="md:col-span-3">
                        <label class="block text-xs font-bold text-gray-700 mb-1.5">From Date</label>
                        <div class="relative">
                            <input type="date" class="w-full bg-white border border-gray-300 rounded-xl py-2 px-3 text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all shadow-sm">
                        </div>
                    </div>

                    <div class="md:col-span-3">
                        <label class="block text-xs font-bold text-gray-700 mb-1.5">To Date</label>
                        <div class="relative">
                            <input type="date" class="w-full bg-white border border-gray-300 rounded-xl py-2 px-3 text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all shadow-sm">
                        </div>
                    </div>

                    <div class="hidden md:block md:col-span-2"></div>

                    <div class="md:col-span-4 flex justify-end gap-2">
                         <button type="reset" class="flex items-center gap-2 bg-white border border-gray-300 text-gray-700 hover:bg-gray-50 font-bold py-2 px-5 rounded-xl transition-all text-sm shadow-sm">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
                            Reset
                        </button>
                        <button type="submit" class="flex items-center gap-2 bg-slate-900 hover:bg-slate-800 text-white font-bold py-2 px-6 rounded-xl transition-all shadow-md transform hover:-translate-y-0.5 text-sm">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path></svg>
                            Apply Filters
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 border-b border-gray-100">
                    <tr>
                        <th class="px-6 py-4 font-bold tracking-wider">Log Name</th>
                        <th class="px-6 py-4 font-bold tracking-wider">Module</th>
                        <th class="px-6 py-4 font-bold tracking-wider">Action Type</th>
                        <th class="px-6 py-4 font-bold tracking-wider">Actor</th>
                        <th class="px-6 py-4 font-bold tracking-wider text-right">Date & Time</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    
                    <tr class="bg-white hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4 font-medium text-gray-900">User Login</td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800 border border-gray-200 uppercase">
                                Login
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800 border border-blue-200 uppercase">
                                Login
                            </span>
                        </td>
                        <td class="px-6 py-4 text-gray-900">Juan Dela Cruz</td>
                        <td class="px-6 py-4 text-right text-gray-500">
                            Dec 19, 2025 <span class="text-xs ml-1 font-mono">10:14 AM</span>
                        </td>
                    </tr>

                    <tr class="bg-white hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4 font-medium text-gray-900">Requested Cedula</td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800 border border-gray-200 uppercase">
                                Cedula
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-emerald-100 text-emerald-800 border border-emerald-200 uppercase">
                                Added
                            </span>
                        </td>
                        <td class="px-6 py-4 text-gray-900">Maria Clara</td>
                        <td class="px-6 py-4 text-right text-gray-500">
                            Dec 19, 2025 <span class="text-xs ml-1 font-mono">09:40 AM</span>
                        </td>
                    </tr>

                     <tr class="bg-white hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4 font-medium text-gray-900">Scheduled Appointment</td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800 border border-gray-200 uppercase">
                                Schedule Appointment
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-indigo-100 text-indigo-800 border border-indigo-200 uppercase">
                                Schedule
                            </span>
                        </td>
                        <td class="px-6 py-4 text-gray-900">Juan Dela Cruz</td>
                        <td class="px-6 py-4 text-right text-gray-500">
                            Dec 18, 2025 <span class="text-xs ml-1 font-mono">10:32 AM</span>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
        
        <div class="bg-gray-50 px-6 py-4 border-t border-gray-100 flex items-center justify-between">
            <span class="text-sm text-gray-500">Showing <span class="font-bold text-gray-900">1</span> to <span class="font-bold text-gray-900">10</span> of <span class="font-bold text-gray-900">156</span> Logs</span>
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