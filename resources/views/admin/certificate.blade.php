@extends('layouts.admin')

@section('header')
    Certificate List
@endsection

@section('content')
@php
    // FRONTEND SAFE DEFAULTS (so Blade never errors)
    $certificates = $certificates ?? [];   // array of certificates
    $activeCertificates = $activeCertificates ?? []; // for Add Purpose dropdown
@endphp

<div class="px-4 py-8">
    <div class="max-w-6xl mx-auto">

        {{-- Header --}}
        <div class="flex items-start justify-between gap-4 mb-6">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-2xl bg-slate-100 border border-slate-200 flex items-center justify-center">
                    <svg class="w-5 h-5 text-slate-700" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                              d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                        <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                              d="M14 2v6h6"/>
                    </svg>
                </div>
                <div>
                    <h2 class="text-2xl font-extrabold text-slate-900">Certificate List</h2>
                    <p class="text-sm text-slate-500 mt-0.5">Manage certificates and their purposes.</p>
                </div>
            </div>

            {{-- Actions --}}
            <div class="flex gap-2">
                <button
                    type="button"
                    class="inline-flex items-center gap-2 rounded-xl bg-slate-900 hover:bg-slate-800 text-white px-4 py-2.5 text-sm font-bold shadow active:scale-[0.99]"
                    data-modal-open="addCertificateModal"
                >
                    <span class="text-lg leading-none">＋</span>
                    Add Certificate
                </button>

                <button
                    type="button"
                    class="inline-flex items-center gap-2 rounded-xl bg-white hover:bg-slate-50 text-slate-800 px-4 py-2.5 text-sm font-bold border border-slate-200 shadow-sm active:scale-[0.99]"
                    data-modal-open="addPurposeModal"
                >
                    <span class="text-lg leading-none">＋</span>
                    Add Purpose
                </button>
            </div>
        </div>

        {{-- Table Card --}}
        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
            <div class="max-h-[60vh] overflow-auto">
                <table class="min-w-full text-sm">
                    <thead class="sticky top-0 bg-slate-50 z-10">
                        <tr class="text-left text-slate-600 border-b border-slate-200">
                            <th class="px-4 py-3 font-bold uppercase tracking-wide text-[11px]">Certificate Name</th>
                            <th class="px-4 py-3 font-bold uppercase tracking-wide text-[11px]">Employee ID</th>
                            <th class="px-4 py-3 font-bold uppercase tracking-wide text-[11px]">Created At</th>
                            <th class="px-4 py-3 font-bold uppercase tracking-wide text-[11px]">Status</th>
                            <th class="px-4 py-3 font-bold uppercase tracking-wide text-[11px] text-right">Actions</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-slate-100">
                        @forelse($certificates as $cert)
                            @php
                                $certId = data_get($cert, 'Cert_Id', data_get($cert, 'id', 0));
                                $certName = data_get($cert, 'Certificates_Name', data_get($cert, 'name', ''));
                                $employeeId = data_get($cert, 'Employee_Id', data_get($cert, 'employee_id', '—'));
                                $createdAt = data_get($cert, 'Created_at', data_get($cert, 'created_at', '—'));
                                $status = data_get($cert, 'status', 'Inactive');
                                $isActive = strtolower($status) === 'active';

                                // If you already preload purposes per certificate, we will use it:
                                $purposes = data_get($cert, 'purposes', []);
                            @endphp

                            <tr class="hover:bg-slate-50/70"
                                data-cert-id="{{ $certId }}">
                                <td class="px-4 py-3 font-semibold text-slate-900">
                                    {{ $certName }}
                                </td>
                                <td class="px-4 py-3 text-slate-700">
                                    {{ $employeeId }}
                                </td>
                                <td class="px-4 py-3 text-slate-700">
                                    {{ $createdAt }}
                                </td>
                                <td class="px-4 py-3">
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-[12px] font-bold
                                        {{ $isActive ? 'bg-emerald-100 text-emerald-800' : 'bg-red-100 text-red-800' }}">
                                        {{ $isActive ? 'Active' : 'Inactive' }}
                                    </span>
                                </td>
                                <td class="px-4 py-3">
                                    <div class="flex justify-end gap-2">
                                        {{-- View Purposes --}}
                                        <button
                                            type="button"
                                            class="h-9 w-9 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-800 border border-slate-200"
                                            title="View purposes"
                                            data-modal-open="viewPurposesModal{{ $certId }}"
                                        >
                                            👁
                                        </button>

                                        {{-- Toggle Status --}}
                                        <form method="POST" action="#" class="inline"
                                              onsubmit="return confirmStatusChange(event, this, 'certificate')">
                                            @csrf
                                            <input type="hidden" name="cert_id" value="{{ $certId }}">
                                            <input type="hidden" name="new_status" value="{{ $isActive ? 'Inactive' : 'Active' }}">
                                            <button
                                                type="submit"
                                                class="h-9 w-9 rounded-xl {{ $isActive ? 'bg-red-600 hover:bg-red-700' : 'bg-emerald-600 hover:bg-emerald-700' }} text-white shadow-sm"
                                                title="{{ $isActive ? 'Deactivate' : 'Activate' }}"
                                            >
                                                {{ $isActive ? '🙈' : '👁' }}
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>

                            {{-- VIEW PURPOSES MODAL --}}
                            <div id="viewPurposesModal{{ $certId }}" class="fixed inset-0 z-50 hidden">
                                <div class="absolute inset-0 bg-black/40" data-modal-close="viewPurposesModal{{ $certId }}"></div>

                                <div class="relative mx-auto mt-16 w-[92%] max-w-4xl bg-white rounded-2xl shadow-xl border border-slate-200 overflow-hidden">
                                    <div class="px-5 py-4 bg-slate-900 text-white flex items-center justify-between">
                                        <div>
                                            <h3 class="font-extrabold">Purposes</h3>
                                            <p class="text-xs text-white/70 mt-0.5">
                                                For: <span class="font-semibold">{{ $certName }}</span>
                                            </p>
                                        </div>
                                        <button class="text-white/80 hover:text-white text-2xl leading-none"
                                                data-modal-close="viewPurposesModal{{ $certId }}">
                                            ×
                                        </button>
                                    </div>

                                    <div class="p-5 max-h-[70vh] overflow-auto">
                                        <table class="min-w-full text-sm">
                                            <thead class="sticky top-0 bg-slate-50">
                                                <tr class="text-left text-slate-600 border-b border-slate-200">
                                                    <th class="px-3 py-2 font-bold uppercase text-[11px] w-[60px]">#</th>
                                                    <th class="px-3 py-2 font-bold uppercase text-[11px]">Purpose Name</th>
                                                    <th class="px-3 py-2 font-bold uppercase text-[11px] w-[140px]">Employee ID</th>
                                                    <th class="px-3 py-2 font-bold uppercase text-[11px] w-[120px]">Status</th>
                                                    <th class="px-3 py-2 font-bold uppercase text-[11px] w-[180px]">Created At</th>
                                                    <th class="px-3 py-2 font-bold uppercase text-[11px] w-[140px] text-right">Action</th>
                                                </tr>
                                            </thead>

                                            <tbody class="divide-y divide-slate-100">
                                                @forelse($purposes as $idx => $p)
                                                    @php
                                                        $pId = data_get($p, 'purpose_id', data_get($p, 'id', 0));
                                                        $pName = data_get($p, 'purpose_name', data_get($p, 'name', ''));
                                                        $pEmp = data_get($p, 'employee_id', '—');
                                                        $pCreated = data_get($p, 'created_at', '—');
                                                        $pStatus = strtolower(data_get($p, 'status', 'inactive'));
                                                        $pActive = $pStatus === 'active';
                                                    @endphp

                                                    <tr class="hover:bg-slate-50/70">
                                                        <td class="px-3 py-2 text-slate-600">{{ $idx + 1 }}</td>
                                                        <td class="px-3 py-2 font-semibold text-slate-900">{{ $pName }}</td>
                                                        <td class="px-3 py-2 text-slate-700">{{ $pEmp }}</td>
                                                        <td class="px-3 py-2">
                                                            <span class="inline-flex items-center px-3 py-1 rounded-full text-[12px] font-bold
                                                                {{ $pActive ? 'bg-emerald-100 text-emerald-800' : 'bg-red-100 text-red-800' }}">
                                                                {{ $pActive ? 'Active' : 'Inactive' }}
                                                            </span>
                                                        </td>
                                                        <td class="px-3 py-2 text-slate-700">{{ $pCreated }}</td>
                                                        <td class="px-3 py-2 text-right">
                                                            <form method="POST" action="#" class="inline"
                                                                  onsubmit="return confirmStatusChange(event, this, 'purpose')">
                                                                @csrf
                                                                <input type="hidden" name="purpose_id" value="{{ $pId }}">
                                                                <input type="hidden" name="new_status" value="{{ $pActive ? 'inactive' : 'active' }}">
                                                                <button
                                                                    type="submit"
                                                                    class="inline-flex items-center justify-center rounded-xl px-3 py-2 text-xs font-bold text-white
                                                                    {{ $pActive ? 'bg-red-600 hover:bg-red-700' : 'bg-emerald-600 hover:bg-emerald-700' }}"
                                                                >
                                                                    {{ $pActive ? 'Deactivate' : 'Activate' }}
                                                                </button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="6" class="px-4 py-6 text-center text-slate-500">
                                                            No purposes found for this certificate.
                                                        </td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        @empty
                            <tr>
                                <td colspan="5" class="px-4 py-10 text-center text-slate-500">
                                    No certificates found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
@endsection

@push('scripts')
{{-- SweetAlert2 (if already included in layout, remove this) --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
/** Tailwind modal toggler */
document.addEventListener('click', (e) => {
    const open = e.target.closest('[data-modal-open]');
    const close = e.target.closest('[data-modal-close]');

    if (open) {
        const id = open.getAttribute('data-modal-open');
        document.getElementById(id)?.classList.remove('hidden');
    }

    if (close) {
        const id = close.getAttribute('data-modal-close');
        document.getElementById(id)?.classList.add('hidden');
    }
});

/** Confirm status change (certificate/purpose) */
function confirmStatusChange(event, form, type = 'item') {
    event.preventDefault();

    const newStatus = (form.querySelector('input[name="new_status"]')?.value || '').toLowerCase();
    const action = newStatus.includes('inactive') ? 'deactivate' : 'activate';

    Swal.fire({
        title: `Confirm ${action}`,
        text: `Are you sure you want to ${action} this ${type}?`,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: `Yes, ${action}`,
        cancelButtonText: 'Cancel',
        confirmButtonColor: action === 'deactivate' ? '#dc2626' : '#16a34a'
    }).then((result) => {
        if (result.isConfirmed) form.submit();
    });

    return false;
}
</script>
@endpush
