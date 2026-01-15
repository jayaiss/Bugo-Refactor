    @extends('layouts.admin')

    @section('header', 'On-Site Request')

    @section('content')
    <div class="max-w-4xl mx-auto py-12 px-4">
        <nav class="flex mb-4 text-gray-400 text-xs font-semibold uppercase tracking-widest justify-center">
            <span>Administration</span>
            <span class="mx-2">/</span>
            <span class="text-blue-600">Urgent Appointments</span>
        </nav>

        <div class="bg-white rounded-3xl shadow-xl shadow-gray-200/50 border border-gray-100 overflow-hidden">
            <div class="grid grid-cols-1 md:grid-cols-12">
                
                <div class="md:col-span-4 bg-[#FAF9F6] p-8 md:p-12 border-r border-gray-50 flex flex-col justify-center">
                    <div class="w-12 h-12 bg-red-100 rounded-2xl flex items-center justify-center mb-6">
                        <span class="text-2xl">⚠️</span>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-900 leading-tight">On-Site Request</h2>
                    <p class="text-gray-500 text-sm mt-4 leading-relaxed">
                        Instantly schedule an urgent appointment. Please ensure the resident's data is verified before submission.
                    </p>
                    
                    <div class="mt-8 space-y-4">
                        <div class="flex items-center text-xs text-gray-400 font-medium italic">
                            <svg class="w-4 h-4 mr-2 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            Priority Queue Enabled
                        </div>
                    </div>
                </div>

                <div class="md:col-span-8 p-8 md:p-12">
                    <form action="#" method="POST" class="space-y-6">
                        @csrf
                        
                        <div class="relative">
                            <label for="resident_id" class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-2 ml-1">
                                Resident Search
                            </label>
                            
                            <div class="relative group">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400 group-focus-within:text-blue-500 transition-colors">
                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                                </div>
                                
                                <select name="resident_id" class="w-full bg-gray-50 border-0 rounded-2xl py-4 pl-12 pr-10 text-gray-700 font-medium ring-1 ring-gray-200 focus:ring-2 focus:ring-blue-500 outline-none appearance-none transition-all cursor-pointer">
                                    <option value="" disabled selected>Search resident by name or ID...</option>
                                    <option>Juan Dela Cruz (ID: 4021)</option>
                                    <option>Maria Clara (ID: 4022)</option>
                                </select>

                                <div class="absolute inset-y-0 right-0 flex items-center pr-4 pointer-events-none text-gray-400">
                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                </div>
                            </div>
                            <p class="text-[10px] text-gray-400 mt-3 flex items-center ml-1">
                                <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20"><path d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"></path></svg>
                                Matches are updated in real-time.
                            </p>
                        </div>

                        <div class="pt-4">
                            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 rounded-2xl flex items-center justify-center gap-3 transition-all hover:shadow-lg hover:shadow-blue-200 active:scale-[0.99]">
                                <span>Submit Appointment</span>
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <footer class="mt-12 flex flex-col items-center justify-center text-gray-400">
            <div class="flex gap-6 text-[10px] font-bold uppercase tracking-widest mb-4">
                <a href="#" class="hover:text-gray-900 transition-colors">Privacy</a>
                <a href="#" class="hover:text-gray-900 transition-colors">Terms</a>
                <a href="#" class="hover:text-gray-900 transition-colors">Support</a>
            </div>
            <p class="text-[11px] font-medium opacity-60 italic">© 2026 Barangay Bugo — Systems Division</p>
        </footer>
    </div>

    <div class="fixed bottom-8 right-8 group">
        <div class="absolute -top-12 right-0 bg-gray-900 text-white text-[10px] px-3 py-1 rounded-lg opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap font-bold">
            Help Support
        </div>
        <button class="bg-gray-900 p-4 rounded-2xl shadow-xl text-white hover:bg-blue-600 transition-all duration-300">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path></svg>
        </button>
    </div>
    @endsection