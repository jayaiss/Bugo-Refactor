@extends('layouts.admin')

@section('header')
    Zone Leaders
@endsection

@section('content')
<div class="px-4 py-6">
    {{-- Header --}}
    <div class="flex items-start justify-between mb-5">
        <div>
            <h1 class="text-2xl font-extrabold text-slate-900">Zone Leaders</h1>
        </div>

        <div class="flex items-center gap-2">
            <button
                type="button"
                class="inline-flex items-center gap-2 rounded-full bg-slate-900 hover:bg-slate-800 text-white px-4 py-2 text-sm font-bold shadow"
                data-open="#assignLeaderModal"
            >
                + Assign Zone Leader
            </button>

            <button
                type="button"
                class="inline-flex items-center gap-2 rounded-full bg-white hover:bg-slate-50 text-slate-900 px-4 py-2 text-sm font-bold border border-slate-200 shadow-sm"
                data-open="#addZoneModal"
            >
                + Add Zone
            </button>
        </div>
    </div>

    {{-- Optional message --}}
    @if(!empty($message))
        <div class="mb-4">
            {!! $message !!}
        </div>
    @endif

    {{-- Table card --}}
    <div class="rounded-2xl border border-slate-200 bg-white shadow-sm overflow-hidden max-w-5xl mx-auto">
        <div class="overflow-auto">
            <table class="min-w-full text-sm">
                <thead class="bg-slate-50">
                    <tr class="text-left text-slate-700 border-b border-slate-200">
                        <th class="px-4 py-3 font-semibold w-[260px]">ZONE LEADER</th>
                        <th class="px-4 py-3 font-semibold w-[220px]">CONTACT</th>
                        <th class="px-4 py-3 font-semibold w-[180px]">ZONE</th>
                        <th class="px-4 py-3 font-semibold w-[160px]">STATUS</th>
                        <th class="px-4 py-3 font-semibold w-[180px] text-center">ACTIONS</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-slate-200">
                    @php
                        $zone_leaders = $zone_leaders ?? [];
                    @endphp

                    @forelse($zone_leaders as $zl)
                        @php
                            $active = (data_get($zl,'Leader_Status') == 1);
                        @endphp

                        <tr class="hover:bg-slate-50">
                            <td class="px-4 py-3 font-medium text-slate-900 whitespace-nowrap">
                                {{ data_get($zl,'Leader_FullName') }}
                            </td>

                            <td class="px-4 py-3 whitespace-nowrap">
                                {{ data_get($zl,'Contact_Number') }}
                            </td>

                            <td class="px-4 py-3">
                                {{ data_get($zl,'Zone_Name') }}
                            </td>

                            <td class="px-4 py-3">
                                <span class="inline-flex items-center gap-2 rounded-full px-3 py-1 text-xs font-semibold border
                                    {{ $active ? 'bg-emerald-50 text-emerald-700 border-emerald-200' : 'bg-slate-100 text-slate-600 border-slate-200' }}">
                                    <span class="w-2 h-2 rounded-full {{ $active ? 'bg-emerald-500' : 'bg-slate-400' }}"></span>
                                    {{ $active ? 'Active' : 'Inactive' }}
                                </span>
                            </td>

                            <td class="px-4 py-3">
                                <div class="flex justify-center gap-2">
                                    {{-- Edit --}}
                                    <button
                                        type="button"
                                        class="h-9 w-9 rounded-full border border-blue-500 text-blue-600 hover:bg-blue-50 grid place-items-center"
                                        title="Edit"
                                        onclick='openEditLeader(@json($zl))'
                                    >
                                        ✎
                                    </button>

                                    {{-- Toggle Status --}}
                                    <form method="POST" class="inline" onsubmit="return confirmToggleStatus(event, this);">
                                        @csrf
                                        <input type="hidden" name="toggle_status_id" value="{{ data_get($zl,'id') }}">
                                        <input type="hidden" name="current_status" value="{{ data_get($zl,'Leader_Status') }}">
                                        <button
                                            type="submit"
                                            name="update_status"
                                            value="1"
                                            class="h-9 w-9 rounded-full border border-emerald-500 text-emerald-600 hover:bg-emerald-50 grid place-items-center"
                                            title="Toggle status"
                                        >
                                            ⟳
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-4 py-10 text-center text-slate-500">
                                No zone leaders assigned yet.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- ===================== MODALS (Tailwind) ===================== --}}

{{-- Assign Leader Modal --}}
<div id="assignLeaderModal" class="fixed inset-0 z-50 hidden">
    <div class="absolute inset-0 bg-black/40" data-close="#assignLeaderModal"></div>

    <div class="relative mx-auto mt-24 w-full max-w-lg px-4">
        <div class="rounded-2xl bg-white shadow-xl border border-slate-200 overflow-hidden">
            <div class="px-5 py-4 border-b border-slate-200 flex items-center justify-between">
                <h3 class="font-extrabold text-slate-900">Assign Zone Leader</h3>
                <button class="text-slate-500 hover:text-slate-700" data-close="#assignLeaderModal">✕</button>
            </div>

            <form method="POST" id="assignLeaderForm" class="p-5 space-y-4" onsubmit="return confirmAssign(event, this);">
                @csrf

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Zone Leader</label>
                    <select id="Leader_FullName" name="Leader_FullName" required
                            class="w-full rounded-xl border border-slate-300 bg-white px-3 py-2.5 text-sm focus:ring-2 focus:ring-slate-900 focus:outline-none">
                        <option value="">-- Select --</option>
                        @php $residents = $residents ?? []; @endphp
                        @foreach($residents as $resident)
                            @php
                                $full = trim(
                                    ($resident['first_name'] ?? '') . ' ' .
                                    (($resident['middle_name'] ?? '') ? ($resident['middle_name'].' ') : '') .
                                    ($resident['last_name'] ?? '')
                                );
                            @endphp
                            <option value="{{ $full }}" data-contact="{{ $resident['contact_number'] ?? '' }}">
                                {{ $full }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Contact Number</label>
                    <input type="text" name="Contact_Number" id="Contact_Number" readonly required
                           class="w-full rounded-xl border border-slate-300 bg-slate-50 px-3 py-2.5 text-sm focus:outline-none">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Zone</label>
                    <select name="Zone" id="Zone" required
                            class="w-full rounded-xl border border-slate-300 bg-white px-3 py-2.5 text-sm focus:ring-2 focus:ring-slate-900 focus:outline-none">
                        <option value="">-- Select Zone --</option>
                        @php $zones = $zones ?? []; @endphp
                        @foreach($zones as $zone)
                            <option value="{{ $zone['Id'] ?? '' }}">{{ $zone['Zone_Name'] ?? '' }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="flex justify-end gap-2 pt-2">
                    <button type="reset" class="rounded-xl border border-slate-300 bg-white hover:bg-slate-100 px-4 py-2.5 text-sm font-bold">
                        Reset
                    </button>
                    <button type="submit" class="rounded-xl bg-slate-900 hover:bg-slate-800 text-white px-4 py-2.5 text-sm font-bold shadow">
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Add Zone Modal --}}
<div id="addZoneModal" class="fixed inset-0 z-50 hidden">
    <div class="absolute inset-0 bg-black/40" data-close="#addZoneModal"></div>

    <div class="relative mx-auto mt-24 w-full max-w-lg px-4">
        <div class="rounded-2xl bg-white shadow-xl border border-slate-200 overflow-hidden">
            <div class="px-5 py-4 border-b border-slate-200 flex items-center justify-between">
                <h3 class="font-extrabold text-slate-900">Add Zone</h3>
                <button class="text-slate-500 hover:text-slate-700" data-close="#addZoneModal">✕</button>
            </div>

            <form method="POST" id="addZoneForm" class="p-5 space-y-4" onsubmit="return confirmAddZone(event, this);">
                @csrf

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Zone Name</label>
                    <input type="text" name="Zone_Name" id="Zone_Name" required
                           class="w-full rounded-xl border border-slate-300 bg-white px-3 py-2.5 text-sm focus:ring-2 focus:ring-slate-900 focus:outline-none">
                </div>

                <div class="flex justify-end gap-2 pt-2">
                    <button type="reset" class="rounded-xl border border-slate-300 bg-white hover:bg-slate-100 px-4 py-2.5 text-sm font-bold">
                        Reset
                    </button>
                    <button type="submit" class="rounded-xl bg-slate-900 hover:bg-slate-800 text-white px-4 py-2.5 text-sm font-bold shadow">
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Edit Zone Leader Modal --}}
<div id="editLeaderModal" class="fixed inset-0 z-50 hidden">
    <div class="absolute inset-0 bg-black/40" data-close="#editLeaderModal"></div>

    <div class="relative mx-auto mt-24 w-full max-w-lg px-4">
        <div class="rounded-2xl bg-white shadow-xl border border-slate-200 overflow-hidden">
            <div class="px-5 py-4 border-b border-slate-200 flex items-center justify-between">
                <h3 class="font-extrabold text-slate-900">Edit Zone Leader</h3>
                <button class="text-slate-500 hover:text-slate-700" data-close="#editLeaderModal">✕</button>
            </div>

            <form method="POST" id="editLeaderForm" class="p-5 space-y-4" onsubmit="return confirmEdit(event, this);">
                @csrf
                <input type="hidden" name="edit_zone_leader_id" id="edit_zone_leader_id">

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Select Zone Leader</label>
                    <select id="edit_Leader_FullName" name="edit_Leader_FullName" required
                            class="w-full rounded-xl border border-slate-300 bg-white px-3 py-2.5 text-sm focus:ring-2 focus:ring-slate-900 focus:outline-none">
                        <option value="">-- Select Zone Leader --</option>
                        @foreach($residents as $resident)
                            @php
                                $full = trim(
                                    ($resident['first_name'] ?? '') . ' ' .
                                    (($resident['middle_name'] ?? '') ? ($resident['middle_name'].' ') : '') .
                                    ($resident['last_name'] ?? '')
                                );
                            @endphp
                            <option value="{{ $full }}" data-contact="{{ $resident['contact_number'] ?? '' }}">
                                {{ $full }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Contact Number</label>
                    <input type="text" name="edit_Contact_Number" id="edit_Contact_Number" readonly
                           class="w-full rounded-xl border border-slate-300 bg-slate-50 px-3 py-2.5 text-sm focus:outline-none">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Select Zone</label>
                    <select id="edit_Zone" name="edit_Zone" required
                            class="w-full rounded-xl border border-slate-300 bg-white px-3 py-2.5 text-sm focus:ring-2 focus:ring-slate-900 focus:outline-none">
                        <option value="">-- Select Zone --</option>
                        @foreach($zones as $zone)
                            <option value="{{ $zone['Id'] ?? '' }}">{{ $zone['Zone_Name'] ?? '' }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="flex justify-end gap-2 pt-2">
                    <button type="button" class="rounded-xl border border-slate-300 bg-white hover:bg-slate-100 px-4 py-2.5 text-sm font-bold"
                            data-close="#editLeaderModal">
                        Cancel
                    </button>
                    <button type="submit" name="update_zone_leader"
                            class="rounded-xl bg-slate-900 hover:bg-slate-800 text-white px-4 py-2.5 text-sm font-bold shadow">
                        Save Changes
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
/* ---------- simple modal system (no bootstrap) ---------- */
function openModal(sel){ document.querySelector(sel)?.classList.remove('hidden'); document.body.classList.add('overflow-hidden'); }
function closeModal(sel){ document.querySelector(sel)?.classList.add('hidden'); document.body.classList.remove('overflow-hidden'); }

document.addEventListener('click', (e) => {
    const openSel = e.target.closest('[data-open]')?.getAttribute('data-open');
    const closeSel = e.target.closest('[data-close]')?.getAttribute('data-close');
    if (openSel) openModal(openSel);
    if (closeSel) closeModal(closeSel);
});

/* ---------- contact autofill ---------- */
function fillContact(selectId, inputId){
    const sel = document.getElementById(selectId);
    const opt = sel?.selectedOptions?.[0];
    const contact = opt?.getAttribute('data-contact') || '';
    const input = document.getElementById(inputId);
    if (input) input.value = contact;
}

document.getElementById('Leader_FullName')?.addEventListener('change', () => fillContact('Leader_FullName', 'Contact_Number'));
document.getElementById('edit_Leader_FullName')?.addEventListener('change', () => fillContact('edit_Leader_FullName', 'edit_Contact_Number'));

/* ---------- open edit modal ---------- */
function openEditLeader(zl){
    document.getElementById('edit_zone_leader_id').value = zl.id ?? '';

    // set dropdown selected by name
    const leaderSel = document.getElementById('edit_Leader_FullName');
    if (leaderSel) {
        for (let i = 0; i < leaderSel.options.length; i++) {
            if ((leaderSel.options[i].value || '').trim() === (zl.Leader_FullName || '').trim()) {
                leaderSel.selectedIndex = i;
                break;
            }
        }
        fillContact('edit_Leader_FullName', 'edit_Contact_Number');
    }

    // set zone by zone name
    const zoneSel = document.getElementById('edit_Zone');
    if (zoneSel) {
        for (let i = 0; i < zoneSel.options.length; i++) {
            if ((zoneSel.options[i].textContent || '').trim() === (zl.Zone_Name || '').trim()) {
                zoneSel.selectedIndex = i;
                break;
            }
        }
    }

    openModal('#editLeaderModal');
}

/* ---------- SweetAlert confirms ---------- */
function confirmToggleStatus(e, form){
    e.preventDefault();
    Swal.fire({
        title: 'Update Status?',
        text: "Are you sure you want to change this leader's status?",
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#0f172a',
        cancelButtonColor: '#64748b',
        confirmButtonText: 'Yes, update'
    }).then(r => r.isConfirmed && form.submit());
    return false;
}

function confirmAddZone(e, form){
    e.preventDefault();
    Swal.fire({
        title: 'Add Zone?',
        text: 'Proceed with adding this zone?',
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#0f172a',
        cancelButtonColor: '#64748b',
        confirmButtonText: 'Yes, Add'
    }).then(r => r.isConfirmed && form.submit());
    return false;
}

function confirmAssign(e, form){
    e.preventDefault();
    Swal.fire({
        title: 'Assign Zone Leader?',
        text: 'Proceed with assignment?',
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#0f172a',
        cancelButtonColor: '#64748b',
        confirmButtonText: 'Yes, Assign'
    }).then(r => r.isConfirmed && form.submit());
    return false;
}

function confirmEdit(e, form){
    e.preventDefault();
    Swal.fire({
        title: 'Save Changes?',
        text: 'Proceed with updating this zone leader?',
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#0f172a',
        cancelButtonColor: '#64748b',
        confirmButtonText: 'Yes, Save'
    }).then(r => r.isConfirmed && form.submit());
    return false;
}
</script>
@endpush
