@extends('layouts.admin')

@section('header')
    Employees
@endsection

@section('content')
<div class="px-6 py-8">
    <div class="max-w-6xl mx-auto">

        {{-- Header --}}
        <div class="flex flex-col gap-4 sm:flex-row sm:items-start sm:justify-between">
            <div>
                <h1 class="text-2xl sm:text-3xl font-black text-slate-900 flex items-center gap-3 tracking-tight">
                    <span class="inline-flex h-10 w-10 items-center justify-center rounded-2xl bg-slate-900 text-white shadow-sm">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M17 20h5v-2a4 4 0 00-4-4h-1M9 20H4v-2a4 4 0 014-4h1m8-4a4 4 0 10-8 0 4 4 0 008 0z"/>
                        </svg>
                    </span>
                    Employee List
                </h1>
                <p class="mt-1 text-[11px] font-bold uppercase tracking-widest text-slate-500">
                    Manage employee accounts and roles
                </p>
            </div>

            <div class="flex flex-col sm:flex-row gap-2">
                <button type="button"
                        class="inline-flex items-center justify-center gap-2 rounded-xl bg-slate-900 px-4 py-2.5
                               text-[11px] font-black uppercase tracking-widest text-white shadow-md
                               hover:bg-slate-800 active:scale-[0.99] focus:outline-none focus:ring-2 focus:ring-slate-900/30"
                        onclick="openModal('addEmployeeModal')">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M18 9v3m0 0v3m0-3h3m-3 0h-3M12 6a4 4 0 100 8 4 4 0 000-8z"/>
                    </svg>
                    Add Employee
                </button>

                <button type="button"
                        class="inline-flex items-center justify-center gap-2 rounded-xl border border-slate-200 bg-white px-4 py-2.5
                               text-[11px] font-black uppercase tracking-widest text-slate-800 shadow-sm
                               hover:bg-slate-50 active:scale-[0.99] focus:outline-none focus:ring-2 focus:ring-slate-900/20"
                        onclick="openModal('addRoleModal')">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M9 12h6m-6 4h6M10 6h4a2 2 0 012 2v12H8V8a2 2 0 012-2z"/>
                    </svg>
                    Add Role
                </button>
            </div>
        </div>

        {{-- Search --}}
        <div class="mt-6 rounded-2xl border border-slate-200 bg-white p-4 shadow-sm">
            <div class="flex flex-col sm:flex-row gap-3 sm:items-center sm:justify-between">
                <div class="relative w-full sm:max-w-md">
                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-slate-400">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </div>
                    <input
                        id="employeeSearch"
                        type="text"
                        class="w-full rounded-xl border border-slate-200 bg-slate-50 py-2.5 pl-10 pr-3 text-sm font-bold text-slate-800
                               placeholder-slate-400 outline-none focus:bg-white focus:ring-2 focus:ring-slate-900/30"
                        placeholder="Search employee name or ID..."
                        autocomplete="off"
                    >
                </div>
                <div class="flex items-center gap-2 text-[11px] font-bold text-slate-500 uppercase tracking-widest">
                    <span class="inline-flex h-2 w-2 rounded-full bg-slate-900 animate-pulse"></span>
                    Live filter enabled
                </div>
            </div>
        </div>

        {{-- Table --}}
        <div class="mt-4 rounded-2xl border border-slate-200 bg-white shadow-sm overflow-hidden">
            <div class="px-4 py-3 border-b border-slate-200 bg-slate-900 text-white font-black text-[11px] uppercase tracking-widest flex items-center gap-2">
                <span class="text-base">👤</span> Employee List
            </div>

            <div class="max-h-[65vh] overflow-auto">
                <table class="min-w-full text-sm">
                    <thead class="sticky top-0 bg-slate-50 z-10 border-b border-slate-100">
                        <tr class="text-left text-slate-600 text-[10px] uppercase tracking-widest">
                            <th class="px-4 py-3 font-black">Employee ID</th>
                            <th class="px-4 py-3 font-black">Name</th>
                            <th class="px-4 py-3 font-black">Gender</th>
                            <th class="px-4 py-3 font-black">Zone</th>
                            <th class="px-4 py-3 font-black text-right">Actions</th>
                        </tr>
                    </thead>

                    <tbody id="employeeTableBody" class="divide-y divide-slate-100">
                        @php
                            // SAFE DEFAULT (no backend yet)
                            $employees = $employees ?? [];
                        @endphp

                        @forelse($employees as $e)
                            @php
                                $id = $e['employee_id'] ?? '';
                                $name = $e['name'] ?? '';
                                $gender = $e['gender'] ?? '';
                                $zone = $e['zone'] ?? '';
                                $initials = collect(explode(' ', trim($name)))->filter()->map(fn($p)=>mb_substr($p,0,1))->take(2)->implode('');
                                $initials = $initials ?: 'EM';
                            @endphp

                            <tr data-name="{{ strtolower($name) }}" data-id="{{ strtolower($id) }}" class="hover:bg-slate-50/70">
                                <td class="px-4 py-3">
                                    <span class="inline-flex items-center rounded-xl bg-slate-100 px-3 py-1 text-[11px] font-black text-slate-700 border border-slate-200">
                                        {{ $id }}
                                    </span>
                                </td>

                                <td class="px-4 py-3">
                                    <div class="flex items-center gap-3">
                                        <div class="h-9 w-9 rounded-xl bg-slate-900 text-white flex items-center justify-center text-xs font-black shadow-sm">
                                            {{ $initials }}
                                        </div>
                                        <div class="leading-tight">
                                            <div class="text-slate-900 font-black">{{ $name }}</div>
                                            <div class="text-[11px] font-bold text-slate-500">
                                                {{ $gender ?: '—' }} • {{ $zone ?: '—' }}
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                <td class="px-4 py-3 text-slate-700 font-bold">
                                    {{ $gender ?: '—' }}
                                </td>

                                <td class="px-4 py-3 text-slate-700 font-bold">
                                    {{ $zone ?: '—' }}
                                </td>

                                <td class="px-4 py-3">
                                    <div class="flex justify-end gap-2">
                                        <button type="button"
                                                class="h-9 w-9 rounded-xl bg-white border border-slate-200 text-slate-700 hover:bg-slate-50 grid place-items-center shadow-sm"
                                                onclick="openViewModal('{{ $id }}')"
                                                title="View">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                      d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                      d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                            </svg>
                                        </button>

                                        <button type="button"
                                                class="h-9 w-9 rounded-xl bg-slate-900 text-white hover:bg-slate-800 grid place-items-center shadow-sm"
                                                onclick="openEditModal('{{ $id }}')"
                                                title="Edit">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                      d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5"/>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                      d="M18.5 2.5a2.121 2.121 0 113 3L12 15l-4 1 1-4 9.5-9.5z"/>
                                            </svg>
                                        </button>

                                        <button type="button"
                                                class="h-9 w-9 rounded-xl bg-rose-600 text-white hover:bg-rose-700 grid place-items-center shadow-sm"
                                                onclick="confirmDelete('{{ $id }}')"
                                                title="Delete">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                      d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M9 7h6m-7 0V5a2 2 0 012-2h4a2 2 0 012 2v2"/>
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-4 py-10 text-center">
                                    <p class="text-sm font-black text-slate-700">No employees found</p>
                                    <p class="text-[11px] font-bold text-slate-500">Add an employee to get started.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Pagination placeholder --}}
            <div class="flex justify-end px-4 py-3 border-t border-slate-200 bg-white">
                <div class="inline-flex items-center gap-1">
                    <button class="h-9 w-9 rounded-xl border border-slate-200 bg-white hover:bg-slate-50 text-slate-600">«</button>
                    <button class="h-9 w-9 rounded-xl border border-slate-200 bg-white hover:bg-slate-50 text-slate-600">‹</button>
                    <button class="h-9 w-9 rounded-xl bg-slate-900 text-white font-black">1</button>
                    <button class="h-9 w-9 rounded-xl border border-slate-200 bg-white hover:bg-slate-50 text-slate-700">2</button>
                    <button class="h-9 w-9 rounded-xl border border-slate-200 bg-white hover:bg-slate-50 text-slate-600">›</button>
                    <button class="h-9 w-9 rounded-xl border border-slate-200 bg-white hover:bg-slate-50 text-slate-600">»</button>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- ===================== MODALS (BLACK THEME) ===================== --}}

{{-- Add Role Modal --}}
<div id="addRoleModal" class="fixed inset-0 z-50 hidden">
    <div class="absolute inset-0 bg-black/60 backdrop-blur-sm" onclick="closeModal('addRoleModal')"></div>

    <div class="relative mx-auto mt-24 w-full max-w-md rounded-2xl bg-white shadow-2xl border border-slate-200 overflow-hidden">
        <div class="px-5 py-4 bg-slate-900 text-white flex items-center justify-between">
            <h3 class="font-black uppercase tracking-widest text-[11px]">Add Role</h3>
            <button class="text-white/70 hover:text-white font-black" onclick="closeModal('addRoleModal')">✕</button>
        </div>

        <form id="addRoleForm" class="p-5 space-y-4" action="#" method="POST">
            @csrf
            <div>
                <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-2">Role Name</label>
                <input type="text" name="roleName" required
                       class="w-full rounded-xl border border-slate-200 bg-slate-50 px-3 py-2.5 text-sm font-bold text-slate-800
                              outline-none focus:bg-white focus:ring-2 focus:ring-slate-900/30">
            </div>

            <div class="flex justify-end gap-2 pt-2">
                <button type="button" onclick="closeModal('addRoleModal')"
                        class="rounded-xl border border-slate-200 bg-white px-4 py-2 text-[11px] font-black uppercase tracking-widest text-slate-700 hover:bg-slate-50">
                    Cancel
                </button>
                <button type="submit"
                        class="rounded-xl bg-slate-900 px-4 py-2 text-[11px] font-black uppercase tracking-widest text-white hover:bg-slate-800 shadow-sm">
                    Submit
                </button>
            </div>
        </form>
    </div>
</div>

{{-- Add Employee Modal --}}
<div id="addEmployeeModal" class="fixed inset-0 z-50 hidden">
    <div class="absolute inset-0 bg-black/60 backdrop-blur-sm" onclick="closeModal('addEmployeeModal')"></div>

    <div class="relative mx-auto mt-12 w-full max-w-2xl rounded-2xl bg-white shadow-2xl border border-slate-200 overflow-hidden">
        <div class="px-5 py-4 bg-slate-900 text-white flex items-center justify-between">
            <h3 class="font-black uppercase tracking-widest text-[11px]">Add Employee</h3>
            <button class="text-white/70 hover:text-white font-black" onclick="closeModal('addEmployeeModal')">✕</button>
        </div>

        <form id="addEmployeeForm" class="p-5" action="#" method="POST">
            @csrf

            {{-- Placeholder (keep your fields later) --}}
            <div class="rounded-2xl border border-slate-200 bg-slate-50 p-4">
                <p class="text-sm font-black text-slate-900">Frontend Placeholder</p>
                <p class="text-[11px] font-bold text-slate-500 mt-1">
                    Replace this block with your actual form fields (employee_id, name, gender, zone, etc.).
                    I can convert your original modal to this black theme with the same IDs.
                </p>
            </div>

            <div class="flex justify-end gap-2 pt-5">
                <button type="button" onclick="closeModal('addEmployeeModal')"
                        class="rounded-xl border border-slate-200 bg-white px-4 py-2 text-[11px] font-black uppercase tracking-widest text-slate-700 hover:bg-slate-50">
                    Cancel
                </button>
                <button type="submit"
                        class="rounded-xl bg-slate-900 px-4 py-2 text-[11px] font-black uppercase tracking-widest text-white hover:bg-slate-800 shadow-sm">
                    Add
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Modal helpers (no Bootstrap)
    function openModal(id) {
        document.getElementById(id)?.classList.remove('hidden');
    }
    function closeModal(id) {
        document.getElementById(id)?.classList.add('hidden');
    }

    // Frontend filter
    const search = document.getElementById('employeeSearch');
    const tbody = document.getElementById('employeeTableBody');

    search?.addEventListener('input', () => {
        const q = (search.value || '').toLowerCase().trim();
        tbody?.querySelectorAll('tr').forEach(tr => {
            const name = tr.getAttribute('data-name') || '';
            const id   = tr.getAttribute('data-id') || '';
            if (!name && !id) return; // skip empty row
            tr.style.display = (name.includes(q) || id.includes(q)) ? '' : 'none';
        });
    });

    // Close modal via ESC key
    document.addEventListener('keydown', (e) => {
        if (e.key !== 'Escape') return;
        ['addEmployeeModal','addRoleModal'].forEach(id => closeModal(id));
    });

    // Action placeholders
    function openViewModal(employeeId) {
        console.log('View:', employeeId);
        // Later: open a view modal or route
    }
    function openEditModal(employeeId) {
        console.log('Edit:', employeeId);
        // Later: open edit modal with prefilled fields
        openModal('addEmployeeModal');
    }
    function confirmDelete(employeeId) {
        if (typeof Swal !== 'undefined') {
            Swal.fire({
                title: 'Delete employee?',
                text: "This action can’t be undone.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) console.log('Delete:', employeeId);
            });
        } else {
            if (confirm("Delete employee " + employeeId + "?")) console.log('Delete:', employeeId);
        }
    }

    // Confirm forms (SweetAlert optional)
    document.getElementById('addRoleForm')?.addEventListener('submit', function(e){
        if (typeof Swal === 'undefined') return; // allow normal submit
        e.preventDefault();
        Swal.fire({
            title: 'Add role?',
            text: 'Confirm adding this role.',
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Yes, add',
            cancelButtonText: 'Cancel'
        }).then(r => { if (r.isConfirmed) e.target.submit(); });
    });

    document.getElementById('addEmployeeForm')?.addEventListener('submit', function(e){
        if (typeof Swal === 'undefined') return;
        e.preventDefault();
        Swal.fire({
            title: 'Add employee?',
            text: 'Confirm adding this employee.',
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Yes, add',
            cancelButtonText: 'Cancel'
        }).then(r => { if (r.isConfirmed) e.target.submit(); });
    });
</script>
@endpush
