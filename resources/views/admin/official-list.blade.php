@extends('layouts.admin')

@section('header')
    Barangay Officials
@endsection

@section('content')
<div class="w-full px-6 py-10">
    <div class="max-w-6xl mx-auto">

        {{-- Header --}}
        <div class="flex flex-col sm:flex-row sm:items-start sm:justify-between gap-6">
            <div>
                <h1 class="text-3xl font-extrabold text-gray-900">Barangay Officials</h1>
                <p class="mt-1 text-sm text-gray-500">Manage profiles, photos, and e-signatures.</p>
            </div>

            <div class="flex flex-col sm:flex-row gap-3 sm:items-center">
                {{-- Search --}}
                <div class="flex items-center bg-white border border-gray-200 rounded-lg overflow-hidden shadow-sm">
                    <div class="px-3 text-gray-400">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </div>
                    <input
                        id="tableFilter"
                        type="search"
                        class="w-64 sm:w-72 px-3 py-2.5 text-sm outline-none text-gray-700 placeholder-gray-400"
                        placeholder="Search name or position"
                        autocomplete="off"
                    />
                </div>

                {{-- Add button --}}
                <button
                    type="button"
                    class="inline-flex items-center justify-center gap-2 bg-gray-900 hover:bg-gray-800 text-white font-semibold text-sm px-4 py-2.5 rounded-lg shadow-sm"
                    data-bs-toggle="modal"
                    data-bs-target="#addOfficialModal"
                >
                    <span class="text-lg leading-none">＋</span>
                    Add Official
                </button>
            </div>
        </div>

        {{-- Card/Table --}}
        <div class="mt-8 bg-white border border-gray-200 rounded-2xl shadow-sm">
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead class="text-sm text-gray-700">
                        <tr class="border-b border-gray-200">
                            <th class="px-6 py-4 font-semibold">Full Name</th>
                            <th class="px-6 py-4 font-semibold">Position</th>
                            <th class="px-6 py-4 font-semibold">Photo</th>
                            <th class="px-6 py-4 font-semibold">Status</th>
                            <th class="px-6 py-4 font-semibold">Action</th>
                        </tr>
                    </thead>

                    <tbody class="text-sm text-gray-700">
                        @php
                            // FRONTEND SAFE DEFAULT (won't error without backend)
                            $officials = $officials ?? [];
                        @endphp

                        @forelse ($officials as $o)
                            @php
                                $full = $o['full_name'] ?? '';
                                $pos  = $o['position'] ?? '';
                                $status = $o['status'] ?? 'inactive';
                            @endphp

                            <tr class="border-b border-gray-100 hover:bg-gray-50/50 transition">
                                <td class="px-6 py-4" data-fullname="{{ strtolower($full) }}">{{ $full }}</td>
                                <td class="px-6 py-4" data-position="{{ strtolower($pos) }}">{{ $pos }}</td>

                                <td class="px-6 py-4">
                                    {{-- photo placeholder (frontend only) --}}
                                    <div class="w-10 h-10 rounded-full bg-gray-100 border border-gray-200 flex items-center justify-center text-gray-400">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2h-3l-2-2H10L8 6H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M12 13a3 3 0 100-6 3 3 0 000 6z"/>
                                        </svg>
                                    </div>
                                </td>

                                <td class="px-6 py-4">
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold
                                                 {{ $status === 'active' ? 'bg-green-50 text-green-700' : 'bg-red-50 text-red-700' }}">
                                        {{ ucfirst($status) }}
                                    </span>
                                </td>

                                <td class="px-6 py-4">
                                    <div class="flex gap-2">
                                        <button type="button" class="px-3 py-1.5 rounded-lg border border-gray-200 text-gray-700 hover:bg-gray-50 text-xs font-semibold">
                                            Edit
                                        </button>
                                        <button type="button" class="px-3 py-1.5 rounded-lg border border-gray-200 text-gray-700 hover:bg-gray-50 text-xs font-semibold">
                                            Status
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-14 text-center text-gray-500">
                                    No officials found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>

{{-- Optional: Add Official Modal placeholder (so button doesn’t error) --}}
<div class="modal fade" id="addOfficialModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Official</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="text-sm text-gray-600">
                    Front-end placeholder. (Add your form here when ready.)
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Tiny search filter JS (frontend-only) --}}
@push('scripts')
<script>
    const filterInput = document.getElementById('tableFilter');
    filterInput?.addEventListener('input', () => {
        const q = (filterInput.value || '').toLowerCase();
        document.querySelectorAll('tbody tr').forEach(tr => {
            const full = (tr.querySelector('[data-fullname]')?.getAttribute('data-fullname') || '');
            const pos  = (tr.querySelector('[data-position]')?.getAttribute('data-position') || '');
            if (!full && !pos) return; // skip empty state row
            tr.style.display = (full.includes(q) || pos.includes(q)) ? '' : 'none';
        });
    });
</script>
@endpush
@endsection
