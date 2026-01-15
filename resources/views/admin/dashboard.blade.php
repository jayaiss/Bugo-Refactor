@extends('layouts.admin')

@section('header', 'Admin Dashboard')

@section('content')
    <div class="space-y-6">
        {{-- Filters --}}
        <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6">
            <form method="GET" action="{{ url()->current() }}" class="grid grid-cols-1 md:grid-cols-5 gap-4 items-end">
                <div>
                    <label for="start_date" class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1">
                        Start date
                    </label>
                    <input
                        id="start_date"
                        name="start_date"
                        type="date"
                        value="{{ request('start_date') }}"
                        class="w-full rounded-xl border border-gray-300 bg-gray-50 px-3 py-2.5 text-sm text-gray-900
                               focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500
                               transition"
                    >
                </div>

                <div>
                    <label for="end_date" class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1">
                        End date
                    </label>
                    <input
                        id="end_date"
                        name="end_date"
                        type="date"
                        value="{{ request('end_date') }}"
                        class="w-full rounded-xl border border-gray-300 bg-gray-50 px-3 py-2.5 text-sm text-gray-900
                               focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500
                               transition"
                    >
                </div>

                <div>
                    <label for="type" class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1">
                        Request Type
                    </label>
                    <select
                        id="type"
                        name="type"
                        class="w-full rounded-xl border border-gray-300 bg-gray-50 px-3 py-2.5 text-sm text-gray-900
                               focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500
                               transition"
                    >
                        <option value="" @selected(request('type') === null || request('type') === '')>All Types</option>
                        <option value="certificates" @selected(request('type') === 'certificates')>Certificates</option>
                        <option value="complaints" @selected(request('type') === 'complaints')>Complaints</option>
                    </select>
                </div>

                <div>
                    <label for="category" class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1">
                        Category
                    </label>
                    <select
                        id="category"
                        name="category"
                        class="w-full rounded-xl border border-gray-300 bg-gray-50 px-3 py-2.5 text-sm text-gray-900
                               focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500
                               transition"
                    >
                        <option value="">All Categories</option>
                        {{-- Example:
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}" @selected(request('category') == $cat->id)>{{ $cat->name }}</option>
                        @endforeach
                        --}}
                    </select>
                </div>

                <div class="flex gap-2">
                    <button
                        type="submit"
                        class="w-full rounded-xl bg-blue-600 px-5 py-2.5 text-sm font-semibold text-white
                               shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500/40
                               transition"
                    >
                        Apply
                    </button>

                    <a
                        href="{{ url()->current() }}"
                        class="inline-flex items-center justify-center rounded-xl border border-gray-300 bg-white px-4 py-2.5
                               text-sm font-semibold text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2
                               focus:ring-gray-300 transition"
                        title="Reset filters"
                    >
                        Reset
                    </a>
                </div>
            </form>
        </div>

        {{-- Stats --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            {{-- Stat Card: Total Residents --}}
            <div class="bg-white rounded-2xl border border-gray-200 shadow-sm p-6">
                <div class="flex items-start justify-between">
                    <div>
                        <p class="text-[11px] font-extrabold uppercase tracking-wider text-gray-500">Total Residents</p>
                        <div class="mt-2 flex items-baseline gap-2">
                            <h3 class="text-3xl font-extrabold text-blue-600">
                                {{ $totalResidents ?? 984 }}
                            </h3>
                            <span class="text-xs font-semibold text-green-600 bg-green-50 border border-green-100 px-2 py-0.5 rounded-full">
                                +3.2%
                            </span>
                        </div>
                        <p class="mt-1 text-xs text-gray-500">Compared to last period</p>
                    </div>

                    <div class="p-3 rounded-xl bg-blue-50 border border-blue-100">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                </div>
            </div>

            {{-- Stat Card: Urgent Requests --}}
            <div class="bg-white rounded-2xl border border-gray-200 shadow-sm p-6">
                <div class="flex items-start justify-between">
                    <div>
                        <p class="text-[11px] font-extrabold uppercase tracking-wider text-gray-500">Urgent Requests</p>
                        <div class="mt-2 flex items-baseline gap-2">
                            <h3 class="text-3xl font-extrabold text-red-500">{{ $urgentRequests ?? 12 }}</h3>
                            <span class="text-xs font-semibold text-red-600 bg-red-50 border border-red-100 px-2 py-0.5 rounded-full">
                                Needs review
                            </span>
                        </div>
                        <p class="mt-1 text-xs text-gray-500">High priority queue</p>
                    </div>

                    <div class="p-3 rounded-xl bg-red-50 border border-red-100">
                        <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                    </div>
                </div>
            </div>

            {{-- Stat Card: Upcoming Events --}}
            <div class="bg-white rounded-2xl border border-gray-200 shadow-sm p-6">
                <div class="flex items-start justify-between">
                    <div>
                        <p class="text-[11px] font-extrabold uppercase tracking-wider text-gray-500">Upcoming Events</p>
                        <div class="mt-2 flex items-baseline gap-2">
                            <h3 class="text-3xl font-extrabold text-indigo-500">{{ $upcomingEvents ?? 4 }}</h3>
                            <span class="text-xs font-semibold text-indigo-600 bg-indigo-50 border border-indigo-100 px-2 py-0.5 rounded-full">
                                This month
                            </span>
                        </div>
                        <p class="mt-1 text-xs text-gray-500">Scheduled activities</p>
                    </div>

                    <div class="p-3 rounded-xl bg-indigo-50 border border-indigo-100">
                        <svg class="w-6 h-6 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                </div>
            </div>

            {{-- Stat Card: Pending Appts --}}
            <div class="bg-white rounded-2xl border border-gray-200 shadow-sm p-6">
                <div class="flex items-start justify-between">
                    <div>
                        <p class="text-[11px] font-extrabold uppercase tracking-wider text-gray-500">Pending Appts</p>
                        <div class="mt-2 flex items-baseline gap-2">
                            <h3 class="text-3xl font-extrabold text-amber-500">{{ $pendingAppointments ?? 8 }}</h3>
                            <span class="text-xs font-semibold text-amber-700 bg-amber-50 border border-amber-100 px-2 py-0.5 rounded-full">
                                Awaiting
                            </span>
                        </div>
                        <p class="mt-1 text-xs text-gray-500">For approval</p>
                    </div>

                    <div class="p-3 rounded-xl bg-amber-50 border border-amber-100">
                        <svg class="w-6 h-6 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        {{-- Charts --}}
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <div class="lg:col-span-2 bg-white rounded-2xl border border-gray-200 shadow-sm p-6">
                <div class="flex items-center justify-between mb-4">
                    <h4 class="text-sm font-extrabold text-gray-700 uppercase tracking-wide">Resident Registration Trend</h4>
                    <span class="text-xs text-gray-500">Last 6 months</span>
                </div>
                <div class="relative">
                    <canvas id="residentChart" height="110"></canvas>
                </div>
            </div>

            <div class="bg-white rounded-2xl border border-gray-200 shadow-sm p-6">
                <div class="flex items-center justify-between mb-4">
                    <h4 class="text-sm font-extrabold text-gray-700 uppercase tracking-wide">Gender Distribution</h4>
                    <span class="text-xs text-gray-500">Residents</span>
                </div>
                <div class="relative">
                    <canvas id="genderChart" height="220"></canvas>
                </div>
            </div>
        </div>
    </div>

    {{-- Chart.js (load once) --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        // Optional: make charts responsive and crisp
        Chart.defaults.font.family = "ui-sans-serif, system-ui, -apple-system, Segoe UI, Roboto, Helvetica, Arial";
        Chart.defaults.color = "#6b7280"; // gray-500

        // Line Chart (Residents)
        const residentEl = document.getElementById('residentChart');
        if (residentEl) {
            const ctxLine = residentEl.getContext('2d');

            new Chart(ctxLine, {
                type: 'line',
                data: {
                    labels: {!! json_encode($residentLabels ?? ['Jan','Feb','Mar','Apr','May','Jun']) !!},
                    datasets: [{
                        label: 'New Residents',
                        data: {!! json_encode($residentData ?? [65, 59, 80, 81, 56, 95]) !!},
                        borderColor: '#2563eb',
                        backgroundColor: 'rgba(37, 99, 235, 0.12)',
                        fill: true,
                        tension: 0.4,
                        borderWidth: 2,
                        pointRadius: 3,
                        pointHoverRadius: 5,
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { display: false },
                        tooltip: {
                            callbacks: {
                                label: (ctx) => ` ${ctx.parsed.y} residents`
                            }
                        }
                    },
                    scales: {
                        x: {
                            grid: { display: false }
                        },
                        y: {
                            beginAtZero: true,
                            ticks: { precision: 0 }
                        }
                    }
                }
            });
        }

        // Doughnut Chart (Gender)
        const genderEl = document.getElementById('genderChart');
        if (genderEl) {
            const ctxPie = genderEl.getContext('2d');

            const male = {{ $maleCount ?? 480 }};
            const female = {{ $femaleCount ?? 504 }};
            const total = male + female;

            new Chart(ctxPie, {
                type: 'doughnut',
                data: {
                    labels: ['Male', 'Female'],
                    datasets: [{
                        data: [male, female],
                        backgroundColor: ['#0ea5e9', '#ec4899'],
                        hoverOffset: 6,
                        borderWidth: 0
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: { position: 'bottom' },
                        tooltip: {
                            callbacks: {
                                label: (ctx) => {
                                    const value = ctx.parsed;
                                    const pct = total ? Math.round((value / total) * 100) : 0;
                                    return ` ${ctx.label}: ${value} (${pct}%)`;
                                }
                            }
                        }
                    },
                    cutout: '72%'
                }
            });
        }
    </script>
@endsection
