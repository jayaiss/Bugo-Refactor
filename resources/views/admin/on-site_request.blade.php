@extends('layouts.admin')

@section('header')
    On-Site Request
@endsection

@section('content')
    <div class="flex flex-col items-center justify-center pt-10">
        
        <div class="w-full max-w-2xl bg-slate-50 rounded-2xl shadow-lg overflow-hidden border border-slate-200">
            
            <div class="bg-gradient-to-r from-red-100 via-red-50 to-slate-50 px-8 py-6 border-b border-red-100 flex items-center gap-5">
                <div class="bg-white p-3 rounded-full text-red-600 shrink-0 shadow-sm border border-red-100">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                </div>
                <div>
                    <h3 class="text-xl font-bold text-gray-900">Urgent Request</h3>
                    <p class="text-sm text-gray-600 mt-0.5">Create and submit an immediate appointment for a resident.</p>
                </div>
            </div>

            <div class="px-8 py-8">
                <form action="#" method="POST">
                    @csrf <div class="mb-8">
                        <label for="resident_search" class="block text-sm font-semibold text-gray-700 mb-2">Select Resident</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                            </div>
                            <input type="text" 
                                   name="resident_search" 
                                   id="resident_search" 
                                   class="block w-full bg-white pl-11 pr-4 py-3.5 border border-gray-300 rounded-xl text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all shadow-sm"
                                   placeholder="Search by name, ID, or address...">
                        </div>
                        <p class="mt-2 text-sm text-gray-500">Start typing to search the resident database; press Enter to select.</p>
                    </div>

                    <button type="submit" 
                            class="w-full flex justify-center items-center gap-2 bg-slate-900 hover:bg-slate-800 text-white font-bold py-4 px-6 rounded-xl focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-slate-900 transition-all duration-200 transform hover:-translate-y-0.5 shadow-md">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path></svg>
                        Submit Urgent Appointment
                    </button>
                </form>
            </div>
        </div>

    </div>
@endsection