<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LGU Bugo - Admin Portal</title>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style> 
        body { font-family: 'Inter', sans-serif; } 
        details > summary { list-style: none; outline: none; }
        details > summary::-webkit-details-marker { display: none; }
        [x-cloak] { display: none !important; }
        
        /* Custom Scrollbar for Sidebar */
        .scrollbar-hide::-webkit-scrollbar { display: none; }
        .scrollbar-hide { -ms-overflow-style: none; scrollbar-width: none; }
    </style>
</head>
<body class="bg-gray-50 text-slate-800 font-inter text-sm">

<div class="flex h-screen overflow-hidden">

    <aside class="w-56 bg-slate-800 text-slate-300 flex flex-col shadow-xl z-20 transition-all duration-300">
        
        <div class="h-14 flex items-center px-4 border-b border-slate-700/50 bg-slate-800 shrink-0 gap-3">
            <svg class="w-6 h-6 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
            </svg>
            <span class="font-bold text-sm tracking-wide text-white uppercase">Brgy. Bugo</span>
        </div>

        <nav class="flex-1 overflow-y-auto py-3 px-2 space-y-0.5 scrollbar-hide">
            
            <div class="px-2 mb-1 mt-1">
                <p class="text-[10px] font-bold text-slate-500 uppercase tracking-wider">Core</p>
            </div>
            
            <a href="/dashboard" class="group flex items-center px-2 py-2 text-sm rounded-lg hover:bg-slate-700/50 hover:text-white transition-all {{ request()->is('dashboard') ? 'bg-slate-700 text-white' : '' }}">
                <svg class="w-4 h-4 mr-3 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
                </svg>
                <span class="font-medium">Dashboard</span>
            </a>

            <div class="px-2 mb-1 mt-4">
                <p class="text-[10px] font-bold text-slate-500 uppercase tracking-wider">Departments</p>
            </div>
            
            <details class="group">
                <summary class="flex items-center px-2 py-2 text-sm rounded-lg cursor-pointer hover:bg-slate-700/50 hover:text-white transition-all">
                    <div class="flex items-center flex-1">
                        <svg class="w-4 h-4 mr-3 text-slate-400 group-hover:text-emerald-300 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span class="font-medium">Revenue</span>
                    </div>
                    <svg class="w-3 h-3 text-slate-500 transition-transform duration-200 group-open:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </summary>
                <div class="mt-0.5 space-y-0.5 pl-1">
                    <a href="/on-site_request" class="flex items-center px-2 py-1.5 text-xs rounded-lg text-slate-400 hover:text-white hover:bg-slate-700/50 transition-colors ml-7">On-Site Request</a>
                    <a href="/appointment_list" class="flex items-center px-2 py-1.5 text-xs rounded-lg text-slate-400 hover:text-white hover:bg-slate-700/50 transition-colors ml-7">Appointments</a>
                </div>
            </details>

            <details class="group">
                <summary class="flex items-center px-2 py-2 text-sm rounded-lg cursor-pointer hover:bg-slate-700/50 hover:text-white transition-all">
                    <div class="flex items-center flex-1">
                        <svg class="w-4 h-4 mr-3 text-slate-400 group-hover:text-emerald-300 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                        </svg>
                        <span class="font-medium">BESO</span>
                    </div>
                    <svg class="w-3 h-3 text-slate-500 transition-transform duration-200 group-open:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </summary>
                <div class="mt-0.5 space-y-0.5 pl-1">
                    <a href="/beso/list" class="flex items-center px-2 py-1.5 text-xs rounded-lg text-slate-400 hover:text-white hover:bg-slate-700/50 transition-colors ml-7">BESO List</a>
                </div>
            </details>

            <details class="group">
                <summary class="flex items-center px-2 py-2 text-sm rounded-lg cursor-pointer hover:bg-slate-700/50 hover:text-white transition-all">
                    <div class="flex items-center flex-1">
                        <svg class="w-4 h-4 mr-3 text-slate-400 group-hover:text-emerald-300 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3"></path>
                        </svg>
                        <span class="font-medium">Lupon (Justice)</span>
                    </div>
                    <svg class="w-3 h-3 text-slate-500 transition-transform duration-200 group-open:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </summary>
                <div class="mt-0.5 space-y-0.5 pl-1">
                    <a href="/cases" class="flex items-center px-2 py-1.5 text-xs rounded-lg text-slate-400 hover:text-white hover:bg-slate-700/50 transition-colors ml-7">Case List</a>
                </div>
            </details>

            <details class="group">
                <summary class="flex items-center px-2 py-2 text-sm rounded-lg cursor-pointer hover:bg-slate-700/50 hover:text-white transition-all">
                    <div class="flex items-center flex-1">
                        <svg class="w-4 h-4 mr-3 text-slate-400 group-hover:text-emerald-300 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        <span class="font-medium">Multimedia</span>
                    </div>
                    <svg class="w-3 h-3 text-slate-500 transition-transform duration-200 group-open:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </summary>
                <div class="mt-0.5 space-y-0.5 pl-1">
                    <a href="/event_list" class="flex items-center px-2 py-1.5 text-xs rounded-lg text-slate-400 hover:text-white hover:bg-slate-700/50 transition-colors ml-7">Event List</a>
                </div>
            </details>

            <details class="group">
                <summary class="flex items-center px-2 py-2 text-sm rounded-lg cursor-pointer hover:bg-slate-700/50 hover:text-white transition-all">
                    <div class="flex items-center flex-1">
                        <svg class="w-4 h-4 mr-3 text-slate-400 group-hover:text-emerald-300 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                        </svg>
                        <span class="font-medium">BHW (Health)</span>
                    </div>
                    <svg class="w-3 h-3 text-slate-500 transition-transform duration-200 group-open:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </summary>
                <div class="mt-0.5 space-y-0.5 pl-1">
                    <a href="/request_list" class="flex items-center px-2 py-1.5 text-xs rounded-lg text-slate-400 hover:text-white hover:bg-slate-700/50 transition-colors ml-7">Requests</a>
                    <a href="resident_list" class="flex items-center px-2 py-1.5 text-xs rounded-lg text-slate-400 hover:text-white hover:bg-slate-700/50 transition-colors ml-7">Residents</a>
                    <a href="medicine_inventory" class="flex items-center px-2 py-1.5 text-xs rounded-lg text-slate-400 hover:text-white hover:bg-slate-700/50 transition-colors ml-7">Inventory</a>
                </div>
            </details>

            <div class="px-2 mb-1 mt-4">
                <p class="text-[10px] font-bold text-slate-500 uppercase tracking-wider">System</p>
            </div>

            <details class="group">
                <summary class="flex items-center px-2 py-2 text-sm rounded-lg cursor-pointer hover:bg-slate-700/50 hover:text-white transition-all">
                    <div class="flex items-center flex-1">
                        <svg class="w-4 h-4 mr-3 text-slate-400 group-hover:text-emerald-300 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                        <span class="font-medium">Barangay Info</span>
                    </div>
                    <svg class="w-3 h-3 text-slate-500 transition-transform duration-200 group-open:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </summary>
                <div class="mt-0.5 space-y-0.5 pl-1">
                    <a href="/info/officials" class="flex items-center px-2 py-1.5 text-xs rounded-lg text-slate-400 hover:text-white hover:bg-slate-700/50 transition-colors ml-7">Officials</a>
                    <a href="/info/employees" class="flex items-center px-2 py-1.5 text-xs rounded-lg text-slate-400 hover:text-white hover:bg-slate-700/50 transition-colors ml-7">Employees</a>
                    <a href="/info/certificates" class="flex items-center px-2 py-1.5 text-xs rounded-lg text-slate-400 hover:text-white hover:bg-slate-700/50 transition-colors ml-7">Certificates</a>
                    <a href="/info/timeslots" class="flex items-center px-2 py-1.5 text-xs rounded-lg text-slate-400 hover:text-white hover:bg-slate-700/50 transition-colors ml-7">Time Slots</a>
                    <a href="/info/zone-leaders" class="flex items-center px-2 py-1.5 text-xs rounded-lg text-slate-400 hover:text-white hover:bg-slate-700/50 transition-colors ml-7">Zone Leaders</a>
                    <a href="/info/guidelines" class="flex items-center px-2 py-1.5 text-xs rounded-lg text-slate-400 hover:text-white hover:bg-slate-700/50 transition-colors ml-7">Guidelines</a>
                </div>
            </details>

            <details class="group">
                <summary class="flex items-center px-2 py-2 text-sm rounded-lg cursor-pointer hover:bg-slate-700/50 hover:text-white transition-all">
                    <div class="flex items-center flex-1">
                        <svg class="w-4 h-4 mr-3 text-slate-400 group-hover:text-emerald-300 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"></path>
                        </svg>
                        <span class="font-medium">Notice</span>
                    </div>
                    <svg class="w-3 h-3 text-slate-500 transition-transform duration-200 group-open:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </summary>
                <div class="mt-0.5 space-y-0.5 pl-1">
                    <a href="/feedbacks" class="flex items-center px-2 py-1.5 text-xs rounded-lg text-slate-400 hover:text-white hover:bg-slate-700/50 transition-colors ml-7">Feedbacks</a>
                    <a href="announcements" class="flex items-center px-2 py-1.5 text-xs rounded-lg text-slate-400 hover:text-white hover:bg-slate-700/50 transition-colors ml-7">Announcements</a>
                    <a href="faqs" class="flex items-center px-2 py-1.5 text-xs rounded-lg text-slate-400 hover:text-white hover:bg-slate-700/50 transition-colors ml-7">FAQ</a>
                </div>
            </details>

            <details class="group">
                <summary class="flex items-center px-2 py-2 text-sm rounded-lg cursor-pointer hover:bg-slate-700/50 hover:text-white transition-all">
                    <div class="flex items-center flex-1">
                        <svg class="w-4 h-4 mr-3 text-slate-400 group-hover:text-emerald-300 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                        </svg>
                        <span class="font-medium">Audit Logs</span>
                    </div>
                    <svg class="w-3 h-3 text-slate-500 transition-transform duration-200 group-open:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </summary>
                <div class="mt-0.5 space-y-0.5 pl-1">
                    <a href="/resident_audit" class="flex items-center px-2 py-1.5 text-xs rounded-lg text-slate-400 hover:text-white hover:bg-slate-700/50 transition-colors ml-7">Resident Audit</a>
                    <a href="/admin_audit" class="flex items-center px-2 py-1.5 text-xs rounded-lg text-slate-400 hover:text-white hover:bg-slate-700/50 transition-colors ml-7">Admin Audit</a>
                </div>
            </details>

            <a href="/reports" class="group flex items-center px-2 py-2 text-sm rounded-lg text-slate-300 hover:bg-slate-700/50 hover:text-white transition-all">
                <svg class="w-4 h-4 mr-3 text-slate-400 group-hover:text-emerald-300 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
                <span class="font-medium">Report</span>
            </a>

            <a href="/archive" class="group flex items-center px-2 py-2 text-sm rounded-lg text-slate-300 hover:bg-slate-700/50 hover:text-white transition-all">
                <svg class="w-4 h-4 mr-3 text-slate-400 group-hover:text-emerald-300 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"></path>
                </svg>
                <span class="font-medium">Archive</span>
            </a>

        </nav>

        <div class="bg-slate-900 p-3 border-t border-slate-700/50 shrink-0">
            <div class="flex items-center w-full">
                <div class="relative shrink-0">
                    <div class="h-8 w-8 rounded-full bg-emerald-500 flex items-center justify-center text-xs font-bold text-white shadow-md border-2 border-slate-800">
                        MG
                    </div>
                    <span class="absolute bottom-0 right-0 block h-2 w-2 rounded-full bg-green-400 ring-2 ring-slate-900"></span>
                </div>
                <div class="ml-2.5 overflow-hidden">
                    <p class="text-xs font-bold text-white truncate">Merlito Galacio</p>
                    <p class="text-[10px] text-slate-400 truncate uppercase tracking-wider">Admin</p>
                </div>
            </div>
        </div>
    </aside>

    <div class="flex-1 flex flex-col h-screen overflow-hidden">
        
        <header class="bg-slate-800 shadow-md h-14 flex items-center justify-between px-6 z-30 border-b border-slate-700/50 sticky top-0">
            <h2 class="text-lg font-bold text-white tracking-wide">
                @yield('header', 'Dashboard')
            </h2>

            <div class="flex items-center gap-4">
                
                <div x-data="{ open: false }" class="relative" @click.outside="open = false">
                    <button @click="open = !open" class="flex items-center gap-2 focus:outline-none group">
                        <div class="h-8 w-8 rounded-full bg-slate-700 text-slate-200 flex items-center justify-center font-bold text-xs ring-2 ring-slate-600 group-hover:ring-emerald-400 transition-all">
                            MG
                        </div>
                    </button>

                    <div x-show="open" 
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 translate-y-1"
                         x-transition:enter-end="opacity-100 translate-y-0"
                         x-transition:leave="transition ease-in duration-150"
                         x-transition:leave-start="opacity-100 translate-y-0"
                         x-transition:leave-end="opacity-0 translate-y-1"
                         class="absolute right-0 mt-2 w-56 bg-white rounded-xl shadow-xl py-2 border border-gray-100 z-50" 
                         style="display: none;">
                        
                        <div class="px-4 py-3 border-b border-gray-100 mb-2">
                            <p class="text-xs text-gray-500">Signed in as</p>
                            <p class="text-sm font-bold text-gray-900 truncate">merlito@barangay.gov.ph</p>
                        </div>

                        <a href="{{ route('profile.edit') }}" class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-slate-50 hover:text-emerald-600 transition-colors">
                            <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                            View Profile
                        </a>

                        <a href="{{ route('settings.edit') }}" class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-slate-50 hover:text-emerald-600 transition-colors">
                            <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            Settings
                        </a>
                        
                        <div class="border-t border-gray-100 my-2"></div>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full text-left flex items-center gap-2 px-4 py-2 text-sm text-red-600 hover:bg-red-50 hover:text-red-700 transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </header>

        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-50 p-6">
            @yield('content')
        </main>
    </div>

</div>

</body>
</html>