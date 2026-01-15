<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LGU Bugo - Admin Portal</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style> body { font-family: 'Inter', sans-serif; } </style>
    <style>
        details > summary { list-style: none; }
        details > summary::-webkit-details-marker { display: none; }
    </style>
</head>
<body class="bg-gray-50 text-slate-800">

<div class="flex h-screen overflow-hidden">

    <aside class="w-64 bg-slate-900 text-white flex flex-col shadow-2xl z-20 transition-all duration-300">
        
        <div class="h-16 flex items-center px-6 border-b border-slate-800 bg-slate-900">
            <svg class="w-8 h-8 text-blue-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
            </svg>
            <span class="font-bold text-lg tracking-wide text-gray-100">Barangay Bugo</span>
        </div>

        <nav class="flex-1 overflow-y-auto py-4 space-y-1">
            
            <div class="px-4 mb-2 mt-2">
                <p class="text-xs font-bold text-slate-500 uppercase tracking-wider">Core</p>
            </div>
            
            <a href="/dashboard" class="group flex items-center px-4 py-3 bg-blue-600/10 border-l-4 border-blue-500 text-blue-400 relative">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
                </svg>
                <span class="text-sm font-medium">Dashboard</span>
            </a>

            <div class="px-4 mb-2 mt-6">
                <p class="text-xs font-bold text-slate-500 uppercase tracking-wider">Departments</p>
            </div>
            
            <details class="group">
                <summary class="flex items-center px-4 py-2 text-slate-400 cursor-pointer hover:bg-slate-800 hover:text-white transition-all duration-200">
                    <div class="flex items-center flex-1">
                        <svg class="w-5 h-5 mr-3 text-slate-500 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span class="text-sm font-medium">Revenue Dept</span>
                    </div>
                    <svg class="w-4 h-4 text-slate-500 transition-transform duration-200 group-open:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </summary>
                <div class="mt-1 space-y-1 bg-slate-800/50 py-1">
                <a href="/on-site-req" class="flex items-center pl-12 pr-4 py-2 text-sm text-slate-400 hover:text-white hover:bg-slate-800 transition-colors">
                        <span class="w-1.5 h-1.5 bg-slate-600 rounded-full mr-3 group-hover:bg-blue-500"></span> On-Site Request
                    </a>
                    <a href="/appointments" class="flex items-center pl-12 pr-4 py-2 text-sm text-slate-400 hover:text-white hover:bg-slate-800 transition-colors">
                        <span class="w-1.5 h-1.5 bg-slate-600 rounded-full mr-3 group-hover:bg-blue-500"></span> Appointment List
                    </a>
                </div>
            </details>

            <details class="group">
                <summary class="flex items-center px-4 py-2 text-slate-400 cursor-pointer hover:bg-slate-800 hover:text-white transition-all duration-200">
                    <div class="flex items-center flex-1">
                        <svg class="w-5 h-5 mr-3 text-slate-500 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                        </svg>
                        <span class="text-sm font-medium">BESO Dept</span>
                    </div>
                    <svg class="w-4 h-4 text-slate-500 transition-transform duration-200 group-open:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </summary>
                <div class="mt-1 space-y-1 bg-slate-800/50 py-1">
                    <a href="/beso-list" class="flex items-center pl-12 pr-4 py-2 text-sm text-slate-400 hover:text-white hover:bg-slate-800 transition-colors">
                        <span class="w-1.5 h-1.5 bg-slate-600 rounded-full mr-3 group-hover:bg-blue-500"></span> BESO List
                    </a>
                </div>
            </details>

            <details class="group">
                <summary class="flex items-center px-4 py-2 text-slate-400 cursor-pointer hover:bg-slate-800 hover:text-white transition-all duration-200">
                    <div class="flex items-center flex-1">
                        <svg class="w-5 h-5 mr-3 text-slate-500 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3"></path>
                        </svg>
                        <span class="text-sm font-medium">Lupon Dept</span>
                    </div>
                    <svg class="w-4 h-4 text-slate-500 transition-transform duration-200 group-open:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </summary>
                <div class="mt-1 space-y-1 bg-slate-800/50 py-1">
                    <a href="/case-list" class="flex items-center pl-12 pr-4 py-2 text-sm text-slate-400 hover:text-white hover:bg-slate-800 transition-colors">
                        <span class="w-1.5 h-1.5 bg-slate-600 rounded-full mr-3 group-hover:bg-blue-500"></span> Case List
                    </a>
                </div>
            </details>

             <details class="group">
                <summary class="flex items-center px-4 py-2 text-slate-400 cursor-pointer hover:bg-slate-800 hover:text-white transition-all duration-200">
                    <div class="flex items-center flex-1">
                        <svg class="w-5 h-5 mr-3 text-slate-500 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        <span class="text-sm font-medium">Multimedia Dept</span>
                    </div>
                    <svg class="w-4 h-4 text-slate-500 transition-transform duration-200 group-open:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </summary>
                <div class="mt-1 space-y-1 bg-slate-800/50 py-1">
                    <a href="/event-list" class="flex items-center pl-12 pr-4 py-2 text-sm text-slate-400 hover:text-white hover:bg-slate-800 transition-colors">
                        <span class="w-1.5 h-1.5 bg-slate-600 rounded-full mr-3 group-hover:bg-blue-500"></span> Event List
                    </a>
                </div>
            </details>

             <details class="group">
                <summary class="flex items-center px-4 py-2 text-slate-400 cursor-pointer hover:bg-slate-800 hover:text-white transition-all duration-200">
                    <div class="flex items-center flex-1">
                        <svg class="w-5 h-5 mr-3 text-slate-500 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                        </svg>
                        <span class="text-sm font-medium">BHW Dept</span>
                    </div>
                    <svg class="w-4 h-4 text-slate-500 transition-transform duration-200 group-open:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </summary>
                <div class="mt-1 space-y-1 bg-slate-800/50 py-1">
                    <a href="/bhw/requests" class="flex items-center pl-12 pr-4 py-2 text-sm text-slate-400 hover:text-white hover:bg-slate-800 transition-colors">
                        <span class="w-1.5 h-1.5 bg-slate-600 rounded-full mr-3 group-hover:bg-blue-500"></span> Request List
                    </a>
                    <a href="/bhw/residents" class="flex items-center pl-12 pr-4 py-2 text-sm text-slate-400 hover:text-white hover:bg-slate-800 transition-colors">
                        <span class="w-1.5 h-1.5 bg-slate-600 rounded-full mr-3 group-hover:bg-blue-500"></span> Resident List
                    </a>
                    <a href="/bhw/inventory" class="flex items-center pl-12 pr-4 py-2 text-sm text-slate-400 hover:text-white hover:bg-slate-800 transition-colors">
                        <span class="w-1.5 h-1.5 bg-slate-600 rounded-full mr-3 group-hover:bg-blue-500"></span> Medicine Inventory
                    </a>
                </div>
            </details>

            <div class="px-4 mb-2 mt-6">
                <p class="text-xs font-bold text-slate-500 uppercase tracking-wider">System</p>
            </div>

            <details class="group">
                <summary class="flex items-center px-4 py-2 text-slate-400 cursor-pointer hover:bg-slate-800 hover:text-white transition-all duration-200">
                    <div class="flex items-center flex-1">
                        <svg class="w-5 h-5 mr-3 text-slate-500 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                        <span class="text-sm font-medium">Barangay Info</span>
                    </div>
                    <svg class="w-4 h-4 text-slate-500 transition-transform duration-200 group-open:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </summary>
                <div class="mt-1 space-y-1 bg-slate-800/50 py-1">
                    <a href="/info/officials" class="flex items-center pl-12 pr-4 py-2 text-sm text-slate-400 hover:text-white hover:bg-slate-800 transition-colors">
                        <span class="w-1.5 h-1.5 bg-slate-600 rounded-full mr-3 group-hover:bg-blue-500"></span> Official List
                    </a>
                    <a href="/info/employees" class="flex items-center pl-12 pr-4 py-2 text-sm text-slate-400 hover:text-white hover:bg-slate-800 transition-colors">
                        <span class="w-1.5 h-1.5 bg-slate-600 rounded-full mr-3 group-hover:bg-blue-500"></span> Employee List
                    </a>
                    <a href="/info/certificates" class="flex items-center pl-12 pr-4 py-2 text-sm text-slate-400 hover:text-white hover:bg-slate-800 transition-colors">
                        <span class="w-1.5 h-1.5 bg-slate-600 rounded-full mr-3 group-hover:bg-blue-500"></span> Certificate List
                    </a>
                    <a href="/info/timeslots" class="flex items-center pl-12 pr-4 py-2 text-sm text-slate-400 hover:text-white hover:bg-slate-800 transition-colors">
                        <span class="w-1.5 h-1.5 bg-slate-600 rounded-full mr-3 group-hover:bg-blue-500"></span> Time Slot List
                    </a>
                    <a href="/info/zone-leaders" class="flex items-center pl-12 pr-4 py-2 text-sm text-slate-400 hover:text-white hover:bg-slate-800 transition-colors">
                        <span class="w-1.5 h-1.5 bg-slate-600 rounded-full mr-3 group-hover:bg-blue-500"></span> Zone Leader List
                    </a>
                     <a href="/info/guidelines" class="flex items-center pl-12 pr-4 py-2 text-sm text-slate-400 hover:text-white hover:bg-slate-800 transition-colors">
                        <span class="w-1.5 h-1.5 bg-slate-600 rounded-full mr-3 group-hover:bg-blue-500"></span> Guideline List
                    </a>
                </div>
            </details>

            <details class="group">
                <summary class="flex items-center px-4 py-2 text-slate-400 cursor-pointer hover:bg-slate-800 hover:text-white transition-all duration-200">
                    <div class="flex items-center flex-1">
                        <svg class="w-5 h-5 mr-3 text-slate-500 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"></path>
                        </svg>
                        <span class="text-sm font-medium">Notice</span>
                    </div>
                    <svg class="w-4 h-4 text-slate-500 transition-transform duration-200 group-open:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </summary>
                <div class="mt-1 space-y-1 bg-slate-800/50 py-1">
                    <a href="/notice/feedbacks" class="flex items-center pl-12 pr-4 py-2 text-sm text-slate-400 hover:text-white hover:bg-slate-800 transition-colors">
                        <span class="w-1.5 h-1.5 bg-slate-600 rounded-full mr-3 group-hover:bg-blue-500"></span> Feedbacks
                    </a>
                    <a href="/notice/announcements" class="flex items-center pl-12 pr-4 py-2 text-sm text-slate-400 hover:text-white hover:bg-slate-800 transition-colors">
                        <span class="w-1.5 h-1.5 bg-slate-600 rounded-full mr-3 group-hover:bg-blue-500"></span> Announcements
                    </a>
                    <a href="/notice/faq" class="flex items-center pl-12 pr-4 py-2 text-sm text-slate-400 hover:text-white hover:bg-slate-800 transition-colors">
                        <span class="w-1.5 h-1.5 bg-slate-600 rounded-full mr-3 group-hover:bg-blue-500"></span> FAQ
                    </a>
                </div>
            </details>

            <details class="group">
                <summary class="flex items-center px-4 py-2 text-slate-400 cursor-pointer hover:bg-slate-800 hover:text-white transition-all duration-200">
                    <div class="flex items-center flex-1">
                        <svg class="w-5 h-5 mr-3 text-slate-500 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                        </svg>
                        <span class="text-sm font-medium">Audit Logs</span>
                    </div>
                    <svg class="w-4 h-4 text-slate-500 transition-transform duration-200 group-open:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </summary>
                <div class="mt-1 space-y-1 bg-slate-800/50 py-1">
                    <a href="/audit/resident" class="flex items-center pl-12 pr-4 py-2 text-sm text-slate-400 hover:text-white hover:bg-slate-800 transition-colors">
                        <span class="w-1.5 h-1.5 bg-slate-600 rounded-full mr-3 group-hover:bg-blue-500"></span> Resident Audit
                    </a>
                    <a href="/audit/admin" class="flex items-center pl-12 pr-4 py-2 text-sm text-slate-400 hover:text-white hover:bg-slate-800 transition-colors">
                        <span class="w-1.5 h-1.5 bg-slate-600 rounded-full mr-3 group-hover:bg-blue-500"></span> Admin Audit
                    </a>
                </div>
            </details>

            <a href="/reports" class="group flex items-center px-4 py-2 text-slate-400 hover:bg-slate-800 hover:text-white transition-all duration-200">
                <svg class="w-5 h-5 mr-3 text-slate-500 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
                <span class="text-sm font-medium">Report</span>
            </a>

            <a href="/archive" class="group flex items-center px-4 py-2 text-slate-400 hover:bg-slate-800 hover:text-white transition-all duration-200">
                <svg class="w-5 h-5 mr-3 text-slate-500 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"></path>
                </svg>
                <span class="text-sm font-medium">Archive</span>
            </a>

        </nav>

        <div class="bg-slate-800 p-4 border-t border-slate-700">
            <div class="flex items-center w-full">
                <div class="relative">
                    <div class="h-10 w-10 rounded-full bg-gradient-to-tr from-blue-500 to-blue-400 flex items-center justify-center text-sm font-bold shadow-lg">M</div>
                    <span class="absolute bottom-0 right-0 block h-2.5 w-2.5 rounded-full bg-green-400 ring-2 ring-slate-800"></span>
                </div>
                <div class="ml-3 overflow-hidden">
                    <p class="text-sm font-medium text-white truncate">Merlito</p>
                    <p class="text-xs text-slate-400 truncate">Administrator</p>
                </div>
                <button class="ml-auto text-slate-400 hover:text-white transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                </button>
            </div>
        </div>
    </aside>

    <div class="flex-1 flex flex-col h-screen overflow-hidden">
        
        <header class="bg-white shadow-sm h-16 flex items-center justify-between px-8 z-10 border-b border-gray-200">
            <h2 class="text-xl font-bold text-slate-800">
                @yield('header', 'Dashboard')
            </h2>
            <div class="flex items-center space-x-4">
                <span class="text-sm text-slate-500 bg-gray-100 px-3 py-1 rounded-full border border-gray-200">
                    📅 Wednesday, 8 Jan 2026
                </span>
            </div>
        </header>

        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-50 p-8">
            @yield('content')
        </main>
    </div>

</div>

</body>
</html>