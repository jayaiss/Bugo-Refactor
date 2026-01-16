<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barangay Bugo - Official Digital Portal</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: { sans: ['Inter', 'sans-serif'] },
                    colors: {
                        brand: {
                            50: '#f0f9ff',
                            100: '#e0f2fe',
                            500: '#0ea5e9',
                            600: '#0284c7',
                            800: '#075985',
                            900: '#0c4a6e',
                        },
                        accent: {
                            500: '#f97316',
                        }
                    }
                }
            }
        }
    </script>
    
    <style>
        [x-cloak] { display: none !important; }
        .text-gradient {
            background: linear-gradient(135deg, #0c4a6e 0%, #0284c7 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .glass {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(226, 232, 240, 0.8);
        }
        .service-card { transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1); }
        .service-card:hover { transform: translateY(-5px); box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1); }
        .img-zoom { overflow: hidden; }
        .img-zoom img { transition: transform 0.5s ease; }
        .img-zoom:hover img { transform: scale(1.05); }
    </style>
</head>
<body class="bg-slate-50 text-slate-800 antialiased selection:bg-brand-900 selection:text-white" x-data="{ loginOpen: false }">

    <nav x-data="{ scrolled: false }" 
         @scroll.window="scrolled = (window.pageYOffset > 20)"
         :class="scrolled ? 'glass py-4' : 'bg-transparent py-6'"
         class="fixed top-0 left-0 w-full z-40 transition-all duration-300">
        
        <div class="max-w-7xl mx-auto px-6 flex justify-between items-center">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-full overflow-hidden border-2 border-brand-900 shadow-sm bg-white">
                    <img src="{{ asset('image/logo.png') }}" alt="Bugo Logo" class="w-full h-full object-contain p-0.5">
                </div>
                <div class="leading-tight">
                    <h1 class="text-lg font-bold text-slate-900 tracking-tight">Barangay Bugo</h1>
                    <p class="text-[10px] text-slate-500 uppercase tracking-wider font-semibold">Official Portal</p>
                </div>
            </div>

            <div class="hidden md:flex items-center gap-8 text-sm font-medium text-slate-600">
                <a href="#" class="hover:text-brand-900 transition-colors">Home</a>
                <a href="#services" class="hover:text-brand-900 transition-colors">Services</a>
                <a href="#gallery" class="hover:text-brand-900 transition-colors">Gallery</a>
                <a href="#council" class="hover:text-brand-900 transition-colors">The Council</a>
                
                <button @click="loginOpen = true" class="px-5 py-2.5 bg-slate-900 text-white rounded-full text-xs font-semibold hover:bg-brand-600 transition-all shadow-lg hover:shadow-brand-500/30">
                    Portal Login &rarr;
                </button>
            </div>
        </div>
    </nav>

    <div x-show="loginOpen" x-cloak 
         class="fixed inset-0 z-50 flex items-center justify-center px-4"
         aria-labelledby="modal-title" role="dialog" aria-modal="true">
        
        <div x-show="loginOpen" 
             x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
             x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
             class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm transition-opacity" 
             @click="loginOpen = false"></div>

        <div x-show="loginOpen" 
             x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
             x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
             class="relative bg-white rounded-2xl shadow-2xl max-w-sm w-full p-8 overflow-hidden transform transition-all">
            
            <button @click="loginOpen = false" class="absolute top-4 right-4 text-slate-400 hover:text-slate-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>

            <div class="text-center mb-8">
                <div class="w-16 h-16 mx-auto mb-4 bg-slate-50 rounded-full flex items-center justify-center border border-slate-100">
                    <img src="{{ asset('image/logo.png') }}" alt="Logo" class="w-12 h-12 object-contain">
                </div>
                <h3 class="text-2xl font-bold text-slate-900">Welcome Back</h3>
                <p class="text-xs text-slate-500 mt-2 uppercase tracking-widest font-semibold">Official Personnels </p>
            </div>

            <form method="POST" action="{{ route('login') }}" class="space-y-5">
                @csrf
                <div>
                    <label for="email" class="block text-sm font-medium text-slate-700 mb-1">Username </label>
                    <input type="text" name="email" id="email" required class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-lg focus:ring-2 focus:ring-brand-500 focus:border-brand-500 transition-colors outline-none text-sm" placeholder="Enter your issued Username">
                </div>
                
                <div>
                    <label for="password" class="block text-sm font-medium text-slate-700 mb-1">Password</label>
                    <input type="password" name="password" id="password" required class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-lg focus:ring-2 focus:ring-brand-500 focus:border-brand-500 transition-colors outline-none text-sm" placeholder="••••••••">
                </div>

                <div class="flex items-center justify-between text-xs">
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" class="rounded border-slate-300 text-brand-600 focus:ring-brand-500">
                        <span class="text-slate-600">Remember me</span>
                    </label>
                    <a href="#" class="text-brand-600 hover:text-brand-800 font-medium">Forgot Password?</a>
                </div>

                <button type="submit" class="w-full py-3 px-4 bg-brand-900 hover:bg-brand-800 text-white font-bold rounded-lg shadow-lg hover:shadow-brand-900/30 transition-all duration-300 transform hover:-translate-y-0.5">
                    Sign In to Portal
                </button>
            </form>

            <div class="mt-8 pt-6 border-t border-slate-100 text-center">
                <p class="text-xs text-slate-400 leading-relaxed">
                    <span class="font-bold text-slate-600 block mb-1">No account yet?</span>
                    Accounts are strictly provisioned by the Barangay Secretary. Please visit the Hall with your valid ID to request access.
                </p>
            </div>
        </div>
    </div>

    <header class="relative pt-32 pb-20 lg:pt-48 lg:pb-32 overflow-hidden">
        <div class="absolute top-0 right-0 -mr-20 -mt-20 w-[600px] h-[600px] bg-blue-100 rounded-full blur-3xl opacity-50 z-0"></div>
        <div class="absolute bottom-0 left-0 -ml-20 -mb-20 w-[400px] h-[400px] bg-orange-50 rounded-full blur-3xl opacity-50 z-0"></div>

        <div class="relative z-10 max-w-7xl mx-auto px-6 grid lg:grid-cols-2 gap-12 items-center">
            
            <div class="text-center lg:text-left order-2 lg:order-1">
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-blue-50 border border-blue-100 text-brand-800 text-xs font-semibold mb-6">
                    <span class="relative flex h-2 w-2">
                      <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-sky-400 opacity-75"></span>
                      <span class="relative inline-flex rounded-full h-2 w-2 bg-sky-500"></span>
                    </span>
                    System Online & Operational
                </div>

                <h1 class="text-5xl lg:text-7xl font-extrabold text-slate-900 tracking-tight leading-[1.1] mb-6">
                    Service for the <br>
                    <span class="text-gradient">Modern Citizen.</span>
                </h1>
                
                <p class="text-lg text-slate-600 mb-8 leading-relaxed max-w-xl mx-auto lg:mx-0">
                    Experience a streamlined Barangay Bugo. Request certificates, file reports, and stay updated with a transparent, digital-first government.
                </p>

                <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                    <button @click="loginOpen = true" class="px-8 py-4 bg-brand-900 text-white rounded-xl font-semibold hover:bg-brand-800 transition-all shadow-xl shadow-brand-900/20 flex items-center justify-center gap-2">
                        <span>Access Services</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </button>
                    <a href="#council" class="px-8 py-4 bg-white text-slate-700 border border-slate-200 rounded-xl font-semibold hover:bg-slate-50 transition-all flex items-center justify-center">
                        Meet the Council
                    </a>
                </div>
            </div>

            <div class="relative order-1 lg:order-2">
                <div class="relative rounded-2xl overflow-hidden shadow-2xl border-4 border-white img-zoom">
                    <img src="{{ asset('image/council_banner.png') }}" class="w-full h-[400px] lg:h-[500px] object-cover" alt="Barangay Bugo Hall">
                    <div class="absolute bottom-6 left-6 bg-white/95 backdrop-blur px-5 py-3 rounded-xl shadow-lg border border-slate-100">
                        <p class="text-xs text-slate-500 uppercase tracking-wider font-bold">Total Residents</p>
                        <p class="text-2xl font-bold text-slate-900">121,000+</p>
                    </div>
                </div>
                <div class="absolute -z-10 top-10 -right-10 w-full h-full border-2 border-brand-200 rounded-2xl hidden lg:block"></div>
            </div>
        </div>
    </header>

    <section id="services" class="py-24 bg-white relative">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-slate-900 mb-4">Digital Services</h2>
                <p class="text-slate-500 max-w-2xl mx-auto">Skip the lines. Access essential barangay services and health assistance from the comfort of your home.</p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <div class="service-card group bg-slate-50 border border-slate-100 rounded-2xl p-8 relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-blue-100 rounded-full -mr-16 -mt-16 opacity-50 group-hover:scale-150 transition-transform duration-500"></div>
                    
                    <div class="w-12 h-12 bg-white rounded-xl shadow-md flex items-center justify-center text-brand-600 mb-6 relative z-10">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    </div>
                    
                    <h3 class="text-xl font-bold text-slate-900 mb-3 relative z-10">Online Scheduling</h3>
                    <p class="text-slate-500 text-sm leading-relaxed relative z-10 mb-6">
                        Book appointments for <strong>Cedula, Barangay Clearance, Indigency, Residency,</strong> and <strong>First Time Job Seeker</strong> documents.
                    </p>
                    <button @click="loginOpen = true" class="inline-flex items-center text-sm font-semibold text-brand-600 hover:text-brand-800 relative z-10">
                        Book Schedule <span class="ml-1">&rarr;</span>
                    </button>
                </div>

                <div class="service-card group bg-slate-50 border border-slate-100 rounded-2xl p-8 relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-red-100 rounded-full -mr-16 -mt-16 opacity-50 group-hover:scale-150 transition-transform duration-500"></div>
                    
                    <div class="w-12 h-12 bg-white rounded-xl shadow-md flex items-center justify-center text-red-500 mb-6 relative z-10">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                    </div>
                    
                    <h3 class="text-xl font-bold text-slate-900 mb-3 relative z-10">Health Services</h3>
                    <p class="text-slate-500 text-sm leading-relaxed relative z-10 mb-6">
                        Connect with <strong>Barangay Health Workers (BHW)</strong>. Submit <strong>Online Medicine Requests</strong> and get health assistance efficiently.
                    </p>
                    <button @click="loginOpen = true" class="inline-flex items-center text-sm font-semibold text-red-500 hover:text-red-700 relative z-10">
                        Request Medicine <span class="ml-1">&rarr;</span>
                    </button>
                </div>

                <div class="service-card group bg-slate-50 border border-slate-100 rounded-2xl p-8 relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-orange-100 rounded-full -mr-16 -mt-16 opacity-50 group-hover:scale-150 transition-transform duration-500"></div>
                    
                    <div class="w-12 h-12 bg-white rounded-xl shadow-md flex items-center justify-center text-accent-500 mb-6 relative z-10">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                    </div>
                    
                    <h3 class="text-xl font-bold text-slate-900 mb-3 relative z-10">Resident Profiling</h3>
                    <p class="text-slate-500 text-sm leading-relaxed relative z-10 mb-6">
                        Access your verified resident profile. Ensure your census data is up-to-date for faster processing of all barangay services.
                    </p>
                    <button @click="loginOpen = true" class="inline-flex items-center text-sm font-semibold text-accent-500 hover:text-orange-700 relative z-10">
                        View Profile <span class="ml-1">&rarr;</span>
                    </button>
                </div>
            </div>
        </div>
    </section>

    <section id="gallery" class="py-24 bg-slate-50">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-slate-900 mb-4">Community Highlights</h2>
                <p class="text-slate-500 max-w-2xl mx-auto">A glimpse into the vibrant life and dedicated service in Barangay Bugo.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="md:col-span-2 relative rounded-2xl overflow-hidden shadow-xl img-zoom h-96">
                    <img src="{{ asset('image/officials_group.png') }}" alt="Barangay Officials" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent flex items-end p-8">
                        <h3 class="text-white text-2xl font-bold">Community Engagement</h3>
                    </div>
                </div>
                
                <div class="flex flex-col gap-6">
                    <div class="relative rounded-2xl overflow-hidden shadow-xl img-zoom h-44 bg-slate-800">
                        <img src="{{ asset('image/hero_bg.png') }}" alt="Captain Banner" class="w-full h-full object-cover">
                    </div>
                    <div class="relative rounded-2xl overflow-hidden shadow-xl img-zoom h-44 bg-brand-900 flex items-center justify-center p-4">
                        <img src="{{ asset('image/logo.png') }}" alt="Official Seal" class="h-full object-contain opacity-90">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="council" class="py-24 bg-slate-900 text-white relative overflow-hidden">
        <div class="absolute top-0 left-0 w-full h-full overflow-hidden opacity-20">
            <div class="absolute w-96 h-96 bg-brand-500 rounded-full blur-[100px] -top-20 -left-20"></div>
            <div class="absolute w-96 h-96 bg-accent-500 rounded-full blur-[100px] bottom-0 right-0"></div>
        </div>

        <div class="max-w-7xl mx-auto px-6 relative z-10">
            <div class="grid lg:grid-cols-2 gap-16 items-center">
                <div class="relative order-2 lg:order-1">
                    <div class="absolute inset-0 bg-gradient-to-tr from-brand-600 to-accent-500 rounded-2xl transform rotate-3 scale-105 opacity-50"></div>
                    <div class="bg-slate-800 rounded-2xl border border-slate-700 overflow-hidden">
                         <img src="{{ asset('image/hero_bg.png') }}" class="relative w-full h-auto object-contain" alt="18th Barangay Council Banner">
                    </div>
                </div>

                <div class="order-1 lg:order-2">
                    <span class="text-brand-400 font-bold tracking-widest text-xs uppercase mb-2 block">18th Barangay Council</span>
                    <h2 class="text-4xl md:text-5xl font-bold mb-6 leading-tight">Leadership with <br>Integrity.</h2>
                    <p class="text-slate-400 text-lg mb-8 font-light leading-relaxed">
                        Under the administration of <strong class="text-white">Hon. Spencer L. Cailing</strong>, we are committed to transparent governance and sustainable progress for every Bugoanon.
                    </p>

                    <div class="grid grid-cols-2 gap-8 border-t border-slate-800 pt-8">
                        <div>
                            <div class="text-3xl font-bold text-white mb-1">100%</div>
                            <div class="text-sm text-slate-500">Digitized Records</div>
                        </div>
                        <div>
                            <div class="text-3xl font-bold text-white mb-1">24/7</div>
                            <div class="text-sm text-slate-500">Online Access</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="bg-white border-t border-slate-200 py-12">
        <div class="max-w-7xl mx-auto px-6 flex flex-col md:flex-row justify-between items-center gap-6">
            <div class="flex items-center gap-2">
                <div class="w-8 h-8 rounded-lg flex items-center justify-center overflow-hidden">
                    <img src="{{ asset('image/logo.png') }}" alt="Bugo Logo" class="w-full h-full object-contain">
                </div>
                <span class="text-slate-900 font-bold tracking-tight">Barangay Bugo</span>
            </div>
            
            <div class="text-slate-500 text-sm">
                &copy; 2024 Barangay Bugo Official Portal. All rights reserved.
            </div>
        </div>
    </footer>

</body>
</html>