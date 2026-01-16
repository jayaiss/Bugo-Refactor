@extends('layouts.admin')

@section('header')
    Guideline List
@endsection

@section('content')
<div class="px-4 py-6">

    {{-- Header --}}
    <div class="flex items-start justify-between mb-5 max-w-6xl mx-auto">
        <div class="flex items-center gap-3">
            <div class="h-10 w-10 rounded-xl bg-slate-900 text-white grid place-items-center shadow">
                📜
            </div>
            <div>
                <h1 class="text-2xl font-extrabold text-slate-900">Guideline List</h1>
            </div>
        </div>

        <button
            type="button"
            class="inline-flex items-center gap-2 rounded-full bg-slate-900 hover:bg-slate-800 text-white px-4 py-2 text-sm font-bold shadow"
            data-open="#addGuidelineModal"
        >
            + Add Guideline
        </button>
    </div>

    @if(!empty($message))
        <div class="max-w-6xl mx-auto mb-4">
            {!! $message !!}
        </div>
    @endif

    {{-- Table Card --}}
    <div class="max-w-6xl mx-auto rounded-2xl border border-slate-200 bg-white shadow-sm overflow-hidden">
        <div class="overflow-auto">
            <table class="min-w-full text-sm align-middle">
                <thead class="bg-slate-50 sticky top-0 z-10">
                    <tr class="text-left text-slate-700 border-b border-slate-200">
                        <th class="px-4 py-3 font-semibold w-[220px]">CERTIFICATE</th>
                        <th class="px-4 py-3 font-semibold w-[320px]">DESCRIPTION</th>
                        <th class="px-4 py-3 font-semibold w-[320px]">REQUIREMENTS</th>
                        <th class="px-4 py-3 font-semibold w-[170px]">CREATED</th>
                        <th class="px-4 py-3 font-semibold w-[140px] text-center">ACTION</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-slate-200">
                    @php
                        $guidelines   = $guidelines ?? [];
                        $certificates = $certificates ?? [];
                        $usedCerts    = $usedCerts ?? [];
                        $certMap = collect($certificates)->mapWithKeys(fn($c) => [$c['Cert_Id'] => $c['Certificates_Name']])->all();

                        $cleanPrefix = function($text){
                            $text = $text ?? '';
                            return preg_replace('/^Guidelines - /', '', $text);
                        };
                    @endphp

                    @forelse($guidelines as $row)
                        @php
                            $certId = (int)($row['cert_id'] ?? 0);
                            $certName = $certId === 0 ? 'Custom' : ($certMap[$certId] ?? 'Unknown');

                            $cleaned = $cleanPrefix($row['guide_description'] ?? '');
                            $req = $row['requirements'] ?? '';
                            $created = $row['created_at'] ?? '';

                            $isLongDesc = (mb_strlen($cleaned) > 280) || (substr_count($cleaned, "\n") > 4);
                            $prefillCustom = ($certId === 0) ? $certName : '';
                        @endphp

                        <tr class="hover:bg-slate-50">
                            <td class="px-4 py-3 font-semibold text-slate-900">
                                {{ $certName }}
                            </td>

                            <td class="px-4 py-3">
                                <div class="text-slate-800 line-clamp-4 whitespace-pre-wrap">
                                    {{ $cleaned }}
                                </div>

                                @if($isLongDesc)
                                    <button
                                        type="button"
                                        class="mt-1 text-xs font-bold text-slate-900 hover:underline"
                                        data-open="#viewDetailsModal"
                                        data-title="{{ $certName }}"
                                        data-desc="{{ e($cleaned) }}"
                                        data-req="{{ e($req) }}"
                                        data-created="{{ e($created) }}"
                                    >
                                        View details
                                    </button>
                                @endif
                            </td>

                            <td class="px-4 py-3 whitespace-pre-wrap text-slate-800">
                                {{ $req }}
                            </td>

                            <td class="px-4 py-3 text-slate-700 whitespace-nowrap">
                                {{ $created }}
                            </td>

                            <td class="px-4 py-3">
                                <div class="flex justify-center gap-2">
                                    {{-- Edit --}}
                                    <button
                                        type="button"
                                        class="h-9 w-9 rounded-full border border-amber-400 text-amber-600 hover:bg-amber-50 grid place-items-center"
                                        title="Edit"
                                        data-open="#editModal{{ $row['Id'] }}"
                                    >✏</button>

                                    {{-- Delete --}}
                                    <button
                                        type="button"
                                        class="h-9 w-9 rounded-full border border-rose-400 text-rose-600 hover:bg-rose-50 grid place-items-center swal-delete-btn"
                                        title="Delete"
                                        data-id="{{ $row['Id'] }}"
                                    >🗑</button>
                                </div>
                            </td>
                        </tr>

                        {{-- Edit Modal --}}
                        <div id="editModal{{ $row['Id'] }}" class="fixed inset-0 z-50 hidden">
                            <div class="absolute inset-0 bg-black/40" data-close="#editModal{{ $row['Id'] }}"></div>

                            <div class="relative mx-auto mt-20 w-full max-w-2xl px-4">
                                <div class="rounded-2xl bg-white shadow-xl border border-slate-200 overflow-hidden">
                                    <div class="px-5 py-4 border-b border-slate-200 flex items-center justify-between">
                                        <h3 class="font-extrabold text-slate-900">Edit Guideline</h3>
                                        <button class="text-slate-500 hover:text-slate-700" data-close="#editModal{{ $row['Id'] }}">✕</button>
                                    </div>

                                    <form class="edit-guideline-form p-5 space-y-4" method="POST" action="{{ url()->current() }}">
                                        @csrf
                                        <input type="hidden" name="update_id" value="{{ $row['Id'] }}">

                                        <div>
                                            <label class="block text-sm font-semibold text-slate-700 mb-2">Certificate</label>
                                            <select name="cert_id"
                                                    class="w-full rounded-xl border border-slate-300 bg-white px-3 py-2.5 text-sm focus:ring-2 focus:ring-slate-900 focus:outline-none"
                                                    onchange="toggleCustomCert(this)">
                                                <option value="">-- Select Certificate --</option>
                                                <option value="0" {{ $certId === 0 ? 'selected' : '' }}>Others</option>

                                                @foreach($certificates as $cert)
                                                    @php
                                                        $cId = (int)$cert['Cert_Id'];
                                                        $disabled = in_array($cId, $usedCerts) && $cId !== $certId;
                                                    @endphp
                                                    <option value="{{ $cId }}"
                                                        {{ $cId === $certId ? 'selected' : '' }}
                                                        {{ $disabled ? 'disabled' : '' }}>
                                                        {{ $cert['Certificates_Name'] }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <p class="mt-1 text-xs text-slate-500">
                                                Tip: choose “Others” if you want a custom certificate name.
                                            </p>
                                        </div>

                                        <div class="custom-cert-group {{ $certId === 0 ? '' : 'hidden' }}">
                                            <label class="block text-sm font-semibold text-slate-700 mb-2">Custom Certificate Name</label>
                                            <input type="text" name="custom_cert_name"
                                                   value="{{ $prefillCustom }}"
                                                   class="w-full rounded-xl border border-slate-300 bg-white px-3 py-2.5 text-sm focus:ring-2 focus:ring-slate-900 focus:outline-none">
                                        </div>

                                        <div>
                                            <label class="block text-sm font-semibold text-slate-700 mb-2">Description</label>
                                            <textarea name="guide_description" rows="6" required
                                                      class="w-full rounded-xl border border-slate-300 bg-white px-3 py-2.5 text-sm focus:ring-2 focus:ring-slate-900 focus:outline-none">{{ $cleaned }}</textarea>
                                        </div>

                                        <div>
                                            <label class="block text-sm font-semibold text-slate-700 mb-2">Requirements</label>
                                            <textarea name="requirements" rows="4"
                                                      class="w-full rounded-xl border border-slate-300 bg-white px-3 py-2.5 text-sm focus:ring-2 focus:ring-slate-900 focus:outline-none">{{ $req }}</textarea>
                                        </div>

                                        <div class="flex justify-end gap-2 pt-2">
                                            <button type="button"
                                                    class="rounded-xl border border-slate-300 bg-white hover:bg-slate-100 px-4 py-2.5 text-sm font-bold"
                                                    data-close="#editModal{{ $row['Id'] }}">
                                                Cancel
                                            </button>

                                            <button type="button"
                                                    class="rounded-xl bg-slate-900 hover:bg-slate-800 text-white px-4 py-2.5 text-sm font-bold shadow confirm-edit-btn">
                                                💾 Save
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    @empty
                        <tr>
                            <td colspan="5" class="px-4 py-10 text-center text-slate-500">
                                No guidelines found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- View Details Modal --}}
<div id="viewDetailsModal" class="fixed inset-0 z-50 hidden">
    <div class="absolute inset-0 bg-black/40" data-close="#viewDetailsModal"></div>

    <div class="relative mx-auto mt-20 w-full max-w-3xl px-4">
        <div class="rounded-2xl bg-white shadow-xl border border-slate-200 overflow-hidden">
            <div class="px-5 py-4 border-b border-slate-200 flex items-center justify-between">
                <h3 class="font-extrabold text-slate-900">Guideline Details</h3>
                <button class="text-slate-500 hover:text-slate-700" data-close="#viewDetailsModal">✕</button>
            </div>

            <div class="p-5 space-y-4">
                <div>
                    <div class="text-xs font-semibold text-slate-500">Certificate</div>
                    <div id="vd-cert" class="font-semibold text-slate-900"></div>
                </div>

                <div>
                    <div class="text-xs font-semibold text-slate-500">Description</div>
                    <div id="vd-desc" class="whitespace-pre-wrap text-slate-800"></div>
                </div>

                <div>
                    <div class="text-xs font-semibold text-slate-500">Requirements</div>
                    <div id="vd-req" class="whitespace-pre-wrap text-slate-800"></div>
                </div>

                <div class="text-right text-xs text-slate-500">
                    <span id="vd-created"></span>
                </div>

                <div class="flex justify-end">
                    <button class="rounded-xl border border-slate-300 bg-white hover:bg-slate-100 px-4 py-2.5 text-sm font-bold"
                            data-close="#viewDetailsModal">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Hidden delete form --}}
<form id="swal-delete-form" method="POST" action="{{ url()->current() }}" class="hidden">
    @csrf
    <input type="hidden" name="delete_id" id="swal-delete-id">
</form>

{{-- Add Guideline Modal --}}
<div id="addGuidelineModal" class="fixed inset-0 z-50 hidden">
    <div class="absolute inset-0 bg-black/40" data-close="#addGuidelineModal"></div>

    <div class="relative mx-auto mt-20 w-full max-w-2xl px-4">
        <div class="rounded-2xl bg-white shadow-xl border border-slate-200 overflow-hidden">
            <div class="px-5 py-4 border-b border-slate-200 flex items-center justify-between">
                <h3 class="font-extrabold text-slate-900">Add Guideline</h3>
                <button class="text-slate-500 hover:text-slate-700" data-close="#addGuidelineModal">✕</button>
            </div>

            <form id="add-guideline-form" method="POST" action="{{ url()->current() }}" class="p-5 space-y-4">
                @csrf
                <input type="hidden" name="add_guideline" value="1">

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Certificate</label>
                    <select name="cert_id"
                            class="w-full rounded-xl border border-slate-300 bg-white px-3 py-2.5 text-sm focus:ring-2 focus:ring-slate-900 focus:outline-none"
                            onchange="toggleCustomCert(this)" required>
                        <option value="">-- Select Certificate --</option>
                        {{-- Uncomment if you want “Others” on Add --}}
                        {{-- <option value="0">Others</option> --}}
                        @foreach($certificates as $cert)
                            @php $cId = (int)$cert['Cert_Id']; $disabled = in_array($cId, $usedCerts); @endphp
                            <option value="{{ $cId }}" {{ $disabled ? 'disabled' : '' }}>
                                {{ $cert['Certificates_Name'] }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="custom-cert-group hidden">
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Custom Certificate Name</label>
                    <input type="text" name="custom_cert_name"
                           class="w-full rounded-xl border border-slate-300 bg-white px-3 py-2.5 text-sm focus:ring-2 focus:ring-slate-900 focus:outline-none">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Description</label>
                    <textarea name="guide_description" rows="6"
                              class="w-full rounded-xl border border-slate-300 bg-white px-3 py-2.5 text-sm focus:ring-2 focus:ring-slate-900 focus:outline-none"></textarea>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Requirements</label>
                    <textarea name="requirements" rows="4"
                              class="w-full rounded-xl border border-slate-300 bg-white px-3 py-2.5 text-sm focus:ring-2 focus:ring-slate-900 focus:outline-none"></textarea>
                </div>

                <div class="flex justify-end gap-2 pt-2">
                    <button type="button"
                            class="rounded-xl border border-slate-300 bg-white hover:bg-slate-100 px-4 py-2.5 text-sm font-bold"
                            data-close="#addGuidelineModal">
                        Cancel
                    </button>

                    <button type="button"
                            class="rounded-xl bg-slate-900 hover:bg-slate-800 text-white px-4 py-2.5 text-sm font-bold shadow"
                            id="confirm-add-btn">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
/* ---------- modal system (no bootstrap) ---------- */
function openModal(sel){ document.querySelector(sel)?.classList.remove('hidden'); document.body.classList.add('overflow-hidden'); }
function closeModal(sel){ document.querySelector(sel)?.classList.add('hidden'); document.body.classList.remove('overflow-hidden'); }

document.addEventListener('click', (e) => {
    const openSel = e.target.closest('[data-open]')?.getAttribute('data-open');
    const closeSel = e.target.closest('[data-close]')?.getAttribute('data-close');
    if (openSel) openModal(openSel);
    if (closeSel) closeModal(closeSel);
});

/* ---------- custom cert toggle ---------- */
function toggleCustomCert(selectEl) {
    const wrapper = selectEl.closest('form') || document;
    const customDiv = wrapper.querySelector('.custom-cert-group');
    if (!customDiv) return;

    if (selectEl.value === '0') {
        customDiv.classList.remove('hidden');
    } else {
        customDiv.classList.add('hidden');
        const input = customDiv.querySelector('input');
        if (input) input.value = '';
    }
}

/* ---------- View details modal fill ---------- */
document.addEventListener('click', (e) => {
    const btn = e.target.closest('[data-open="#viewDetailsModal"]');
    if (!btn) return;

    const cert = btn.getAttribute('data-title') || '—';
    const desc = btn.getAttribute('data-desc') || '—';
    const req  = btn.getAttribute('data-req') || '—';
    const created = btn.getAttribute('data-created') || '';

    document.getElementById('vd-cert').textContent = cert;
    document.getElementById('vd-desc').textContent = desc;
    document.getElementById('vd-req').textContent  = req;
    document.getElementById('vd-created').textContent = created;
});

/* ---------- Delete ---------- */
document.querySelectorAll('.swal-delete-btn').forEach(btn => {
    btn.addEventListener('click', function () {
        const id = this.getAttribute('data-id');
        Swal.fire({
            title: 'Are you sure?',
            text: "This action cannot be undone.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'Cancel',
            confirmButtonColor: '#e11d48',
            cancelButtonColor: '#64748b'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('swal-delete-id').value = id;
                document.getElementById('swal-delete-form').submit();
            }
        });
    });
});

/* ---------- Add guideline confirm ---------- */
document.getElementById('confirm-add-btn')?.addEventListener('click', function () {
    Swal.fire({
        icon: 'question',
        title: 'Add Guideline?',
        text: "Do you want to save this new guideline?",
        showCancelButton: true,
        confirmButtonText: 'Yes, save it!',
        cancelButtonText: 'Cancel',
        confirmButtonColor: '#0f172a',
        cancelButtonColor: '#64748b'
    }).then(result => {
        if (result.isConfirmed) {
            document.getElementById('add-guideline-form').submit();
        }
    });
});

/* ---------- Edit guideline confirm ---------- */
document.querySelectorAll('.confirm-edit-btn').forEach(btn => {
    btn.addEventListener('click', function () {
        const form = this.closest('form');
        Swal.fire({
            icon: 'question',
            title: 'Save Changes?',
            text: "Do you want to save the changes to this guideline?",
            showCancelButton: true,
            confirmButtonText: 'Yes, update it!',
            cancelButtonText: 'Cancel',
            confirmButtonColor: '#0f172a',
            cancelButtonColor: '#64748b'
        }).then(result => {
            if (result.isConfirmed && form) form.submit();
        });
    });
});
</script>
@endpush
