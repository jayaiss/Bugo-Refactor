@extends('layouts.admin')

@section('header')
    Time Slot List
@endsection

@section('content')
<div class="px-4 py-6">
    {{-- Page Header --}}
    <div class="flex items-center justify-between mb-5">
        <div>
            <h1 class="text-xl font-extrabold text-slate-900">Time Slot and Holiday List</h1>
            <p class="text-sm text-slate-600 mt-1">Manage time slots, holidays, and custom slot limits.</p>
        </div>

        <button
            type="button"
            class="inline-flex items-center gap-2 rounded-xl bg-slate-900 hover:bg-slate-800 text-white px-4 py-2.5 text-sm font-bold shadow"
            data-open="#addSlotModal"
        >
            <span class="text-base leading-none">+</span> Add Time Slot
        </button>
    </div>

    {{-- TIME SLOTS CARD --}}
    <div class="rounded-2xl border border-slate-200 bg-white shadow-sm overflow-hidden mb-6">
        <div class="px-4 py-3 border-b border-slate-200 bg-slate-900 text-white flex items-center gap-2">
            <span class="text-sm font-semibold">⏰ Time Slots</span>
        </div>

        <div class="overflow-auto max-h-[45vh]">
            <table class="min-w-full text-sm">
                <thead class="sticky top-0 bg-slate-50 z-10">
                    <tr class="text-left text-slate-700 border-b border-slate-200">
                        <th class="px-4 py-3 font-semibold w-[120px]">Time Slot ID</th>
                        <th class="px-4 py-3 font-semibold min-w-[220px]">Name</th>
                        <th class="px-4 py-3 font-semibold w-[140px]">Start</th>
                        <th class="px-4 py-3 font-semibold w-[140px]">End</th>
                        <th class="px-4 py-3 font-semibold w-[120px]">Slot No.</th>
                        <th class="px-4 py-3 font-semibold w-[140px]">Status</th>
                        <th class="px-4 py-3 font-semibold w-[160px] text-right">Action</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-slate-200">
                    @php
                        // frontend placeholder
                        $slots = $slots ?? [];
                    @endphp

                    @forelse($slots as $i => $row)
                        @php
                            $isActive = (data_get($row,'status') === 'Active');
                            $badge = $isActive
                                ? 'bg-emerald-50 text-emerald-700 border-emerald-200'
                                : 'bg-slate-100 text-slate-600 border-slate-200';
                        @endphp

                        <tr class="hover:bg-slate-50">
                            <td class="px-4 py-3">{{ $i + 1 }}</td>
                            <td class="px-4 py-3 font-medium text-slate-900">{{ data_get($row,'time_slot_name') }}</td>
                            <td class="px-4 py-3">{{ data_get($row,'time_slot_start') }}</td>
                            <td class="px-4 py-3">{{ data_get($row,'time_slot_end') }}</td>
                            <td class="px-4 py-3">{{ data_get($row,'time_slot_number') }}</td>
                            <td class="px-4 py-3">
                                <span class="inline-flex items-center gap-2 rounded-full border px-3 py-1 text-xs font-semibold {{ $badge }}">
                                    <span class="inline-block w-2 h-2 rounded-full {{ $isActive ? 'bg-emerald-500' : 'bg-slate-400' }}"></span>
                                    {{ data_get($row,'status') }}
                                </span>
                            </td>

                            <td class="px-4 py-3">
                                <div class="flex justify-end gap-2">
                                    {{-- Toggle status --}}
                                    <form method="POST" onsubmit="return confirmToggle(event, this, 'time slot');">
                                        @csrf
                                        <input type="hidden" name="status_id" value="{{ data_get($row,'Id') }}">
                                        <input type="hidden" name="current_status" value="{{ data_get($row,'status') }}">
                                        <button
                                            type="submit"
                                            class="h-9 w-9 rounded-lg border border-slate-300 bg-white hover:bg-slate-100 text-slate-800 grid place-items-center"
                                            title="{{ $isActive ? 'Deactivate' : 'Activate' }}"
                                        >
                                            {{ $isActive ? '🙈' : '👁️' }}
                                        </button>
                                    </form>

                                    {{-- Edit --}}
                                    <button
                                        type="button"
                                        class="h-9 w-9 rounded-lg bg-amber-500 hover:bg-amber-600 text-white grid place-items-center"
                                        title="Edit"
                                        onclick='openEditSlot(@json($row))'
                                    >
                                        ✏️
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-4 py-10 text-center text-slate-500">No time slots found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- HOLIDAYS CARD --}}
    <div class="rounded-2xl border border-slate-200 bg-white shadow-sm overflow-hidden mb-6">
        <div class="px-4 py-3 border-b border-slate-200 bg-slate-900 text-white flex items-center justify-between">
            <span class="text-sm font-semibold">🎉 Holiday List</span>

            <button
                type="button"
                class="rounded-xl bg-white/10 hover:bg-white/15 text-white px-3 py-2 text-sm font-semibold border border-white/15"
                data-open="#addHolidayModal"
            >
                + Add Holiday
            </button>
        </div>

        <div class="overflow-auto max-h-[30vh]">
            <table class="min-w-full text-sm">
                <thead class="sticky top-0 bg-slate-50 z-10">
                    <tr class="text-left text-slate-700 border-b border-slate-200">
                        <th class="px-4 py-3 font-semibold w-[120px]">Holiday ID</th>
                        <th class="px-4 py-3 font-semibold min-w-[280px]">Holiday Name</th>
                        <th class="px-4 py-3 font-semibold w-[160px]">Date</th>
                        <th class="px-4 py-3 font-semibold w-[140px]">Status</th>
                        <th class="px-4 py-3 font-semibold w-[160px] text-right">Action</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-slate-200">
                    @php $holidays = $holidays ?? []; @endphp

                    @forelse($holidays as $i => $row)
                        @php
                            $isActive = (data_get($row,'status') === 'Active');
                            $badge = $isActive
                                ? 'bg-emerald-50 text-emerald-700 border-emerald-200'
                                : 'bg-slate-100 text-slate-600 border-slate-200';
                        @endphp

                        <tr class="hover:bg-slate-50">
                            <td class="px-4 py-3">{{ $i + 1 }}</td>
                            <td class="px-4 py-3 font-medium text-slate-900">{{ data_get($row,'holiday_name') }}</td>
                            <td class="px-4 py-3">{{ data_get($row,'holiday_date') }}</td>
                            <td class="px-4 py-3">
                                <span class="inline-flex items-center gap-2 rounded-full border px-3 py-1 text-xs font-semibold {{ $badge }}">
                                    <span class="inline-block w-2 h-2 rounded-full {{ $isActive ? 'bg-emerald-500' : 'bg-slate-400' }}"></span>
                                    {{ data_get($row,'status') }}
                                </span>
                            </td>

                            <td class="px-4 py-3">
                                <div class="flex justify-end gap-2">
                                    <form method="POST" onsubmit="return confirmToggle(event, this, 'holiday');">
                                        @csrf
                                        <input type="hidden" name="holiday_id" value="{{ data_get($row,'Id') }}">
                                        <input type="hidden" name="current_status" value="{{ data_get($row,'status') }}">
                                        <button
                                            type="submit"
                                            class="h-9 w-9 rounded-lg border border-slate-300 bg-white hover:bg-slate-100 text-slate-800 grid place-items-center"
                                            title="{{ $isActive ? 'Deactivate' : 'Activate' }}"
                                        >
                                            {{ $isActive ? '🙈' : '👁️' }}
                                        </button>
                                    </form>

                                    <button
                                        type="button"
                                        class="h-9 w-9 rounded-lg bg-amber-500 hover:bg-amber-600 text-white grid place-items-center"
                                        title="Edit"
                                        onclick='openEditHoliday(@json($row))'
                                    >
                                        ✏️
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-4 py-10 text-center text-slate-500">No holidays found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- CUSTOM LIMIT --}}
    <div class="rounded-2xl border border-slate-200 bg-white shadow-sm overflow-hidden">
        <div class="px-4 py-3 border-b border-slate-200 bg-slate-900 text-white">
            <span class="text-sm font-semibold">🎯 Set Custom Time Slot Limit</span>
        </div>

        <div class="p-5">
            <form method="POST" id="customLimitForm" class="grid gap-4 max-w-2xl" onsubmit="return confirmSaveLimit(event, this);">
                @csrf

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Select Date</label>
                    <input type="date" name="date"
                           class="w-full rounded-xl border border-slate-300 bg-white px-3 py-2.5 text-sm
                                  focus:outline-none focus:ring-2 focus:ring-slate-900">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Select Time Slot</label>
                    <select name="time_slot_id"
                            class="w-full rounded-xl border border-slate-300 bg-white px-3 py-2.5 text-sm
                                   focus:outline-none focus:ring-2 focus:ring-slate-900">
                        <option value="">-- Choose a time slot --</option>
                        @php $activeSlots = $activeSlots ?? []; @endphp
                        @foreach($activeSlots as $s)
                            <option value="{{ data_get($s,'Id') }}">
                                {{ data_get($s,'time_slot_name') }}
                                ({{ data_get($s,'time_slot_start') }} - {{ data_get($s,'time_slot_end') }})
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Custom Slot Limit</label>
                    <input type="number" name="custom_limit" min="1"
                           class="w-full rounded-xl border border-slate-300 bg-white px-3 py-2.5 text-sm
                                  focus:outline-none focus:ring-2 focus:ring-slate-900">
                </div>

                <div>
                    <button type="submit"
                            class="inline-flex items-center gap-2 rounded-xl bg-slate-900 hover:bg-slate-800 text-white px-4 py-2.5 text-sm font-bold shadow w-fit">
                        💾 Save
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- ===================== MODALS (Tailwind) ===================== --}}
{{-- Add Slot --}}
<div id="addSlotModal" class="fixed inset-0 z-50 hidden">
    <div class="absolute inset-0 bg-black/40" data-close="#addSlotModal"></div>
    <div class="relative mx-auto mt-24 w-full max-w-lg px-4">
        <div class="rounded-2xl bg-white shadow-xl border border-slate-200 overflow-hidden">
            <div class="px-5 py-4 border-b border-slate-200 flex items-center justify-between">
                <h3 class="font-extrabold text-slate-900">Add Time Slot</h3>
                <button class="text-slate-500 hover:text-slate-700" data-close="#addSlotModal">✕</button>
            </div>

            <form method="POST" id="addSlotForm" class="p-5 space-y-4" onsubmit="return confirmAdd(event, this, 'time slot');">
                @csrf
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Name</label>
                    <input type="text" name="time_slot_name" required
                           class="w-full rounded-xl border border-slate-300 px-3 py-2.5 text-sm focus:ring-2 focus:ring-slate-900 focus:outline-none">
                </div>

                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Start</label>
                        <input type="time" name="time_slot_start" required
                               class="w-full rounded-xl border border-slate-300 px-3 py-2.5 text-sm focus:ring-2 focus:ring-slate-900 focus:outline-none">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">End</label>
                        <input type="time" name="time_slot_end" required
                               class="w-full rounded-xl border border-slate-300 px-3 py-2.5 text-sm focus:ring-2 focus:ring-slate-900 focus:outline-none">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Slot No.</label>
                    <input type="number" name="time_slot_number" min="1" required
                           class="w-full rounded-xl border border-slate-300 px-3 py-2.5 text-sm focus:ring-2 focus:ring-slate-900 focus:outline-none">
                </div>

                <div class="flex justify-end gap-2 pt-2">
                    <button type="button" class="rounded-xl border border-slate-300 bg-white hover:bg-slate-100 px-4 py-2.5 text-sm font-bold"
                            data-close="#addSlotModal">Cancel</button>
                    <button type="submit" class="rounded-xl bg-slate-900 hover:bg-slate-800 text-white px-4 py-2.5 text-sm font-bold shadow">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Edit Slot --}}
<div id="editSlotModal" class="fixed inset-0 z-50 hidden">
    <div class="absolute inset-0 bg-black/40" data-close="#editSlotModal"></div>
    <div class="relative mx-auto mt-24 w-full max-w-lg px-4">
        <div class="rounded-2xl bg-white shadow-xl border border-slate-200 overflow-hidden">
            <div class="px-5 py-4 border-b border-slate-200 flex items-center justify-between">
                <h3 class="font-extrabold text-slate-900">Edit Time Slot</h3>
                <button class="text-slate-500 hover:text-slate-700" data-close="#editSlotModal">✕</button>
            </div>

            <form method="POST" id="editSlotForm" class="p-5 space-y-4" onsubmit="return confirmUpdate(event, this, 'time slot');">
                @csrf
                <input type="hidden" name="edit_id" id="edit_id">

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Name</label>
                    <input type="text" name="edit_name" id="edit_name" required
                           class="w-full rounded-xl border border-slate-300 px-3 py-2.5 text-sm focus:ring-2 focus:ring-slate-900 focus:outline-none">
                </div>

                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Start</label>
                        <input type="time" name="edit_start" id="edit_start" required
                               class="w-full rounded-xl border border-slate-300 px-3 py-2.5 text-sm focus:ring-2 focus:ring-slate-900 focus:outline-none">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">End</label>
                        <input type="time" name="edit_end" id="edit_end" required
                               class="w-full rounded-xl border border-slate-300 px-3 py-2.5 text-sm focus:ring-2 focus:ring-slate-900 focus:outline-none">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Slot No.</label>
                    <input type="number" name="edit_number" id="edit_number" min="1" required
                           class="w-full rounded-xl border border-slate-300 px-3 py-2.5 text-sm focus:ring-2 focus:ring-slate-900 focus:outline-none">
                </div>

                <div class="flex justify-end gap-2 pt-2">
                    <button type="button" class="rounded-xl border border-slate-300 bg-white hover:bg-slate-100 px-4 py-2.5 text-sm font-bold"
                            data-close="#editSlotModal">Cancel</button>
                    <button type="submit" class="rounded-xl bg-slate-900 hover:bg-slate-800 text-white px-4 py-2.5 text-sm font-bold shadow">
                        Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Add Holiday --}}
<div id="addHolidayModal" class="fixed inset-0 z-50 hidden">
    <div class="absolute inset-0 bg-black/40" data-close="#addHolidayModal"></div>
    <div class="relative mx-auto mt-24 w-full max-w-lg px-4">
        <div class="rounded-2xl bg-white shadow-xl border border-slate-200 overflow-hidden">
            <div class="px-5 py-4 border-b border-slate-200 flex items-center justify-between">
                <h3 class="font-extrabold text-slate-900">Add Holiday</h3>
                <button class="text-slate-500 hover:text-slate-700" data-close="#addHolidayModal">✕</button>
            </div>

            <form method="POST" id="addHolidayForm" class="p-5 space-y-4" onsubmit="return confirmAdd(event, this, 'holiday');">
                @csrf
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Holiday Name</label>
                    <input type="text" name="holiday_name" required
                           class="w-full rounded-xl border border-slate-300 px-3 py-2.5 text-sm focus:ring-2 focus:ring-slate-900 focus:outline-none">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Holiday Date</label>
                    <input type="date" name="holiday_date" required
                           class="w-full rounded-xl border border-slate-300 px-3 py-2.5 text-sm focus:ring-2 focus:ring-slate-900 focus:outline-none">
                </div>

                <div class="flex justify-end gap-2 pt-2">
                    <button type="button" class="rounded-xl border border-slate-300 bg-white hover:bg-slate-100 px-4 py-2.5 text-sm font-bold"
                            data-close="#addHolidayModal">Cancel</button>
                    <button type="submit" class="rounded-xl bg-slate-900 hover:bg-slate-800 text-white px-4 py-2.5 text-sm font-bold shadow">
                        Add
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Edit Holiday --}}
<div id="editHolidayModal" class="fixed inset-0 z-50 hidden">
    <div class="absolute inset-0 bg-black/40" data-close="#editHolidayModal"></div>
    <div class="relative mx-auto mt-24 w-full max-w-lg px-4">
        <div class="rounded-2xl bg-white shadow-xl border border-slate-200 overflow-hidden">
            <div class="px-5 py-4 border-b border-slate-200 flex items-center justify-between">
                <h3 class="font-extrabold text-slate-900">Edit Holiday</h3>
                <button class="text-slate-500 hover:text-slate-700" data-close="#editHolidayModal">✕</button>
            </div>

            <form method="POST" id="editHolidayForm" class="p-5 space-y-4" onsubmit="return confirmUpdate(event, this, 'holiday');">
                @csrf
                <input type="hidden" name="edit_holiday_id" id="edit_holiday_id">

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Holiday Name</label>
                    <input type="text" name="edit_holiday_name" id="edit_holiday_name" required
                           class="w-full rounded-xl border border-slate-300 px-3 py-2.5 text-sm focus:ring-2 focus:ring-slate-900 focus:outline-none">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Holiday Date</label>
                    <input type="date" name="edit_holiday_date" id="edit_holiday_date" required
                           class="w-full rounded-xl border border-slate-300 px-3 py-2.5 text-sm focus:ring-2 focus:ring-slate-900 focus:outline-none">
                </div>

                <div class="flex justify-end gap-2 pt-2">
                    <button type="button" class="rounded-xl border border-slate-300 bg-white hover:bg-slate-100 px-4 py-2.5 text-sm font-bold"
                            data-close="#editHolidayModal">Cancel</button>
                    <button type="submit" class="rounded-xl bg-slate-900 hover:bg-slate-800 text-white px-4 py-2.5 text-sm font-bold shadow">
                        Update
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

/* ---------- populate edit modals ---------- */
function openEditSlot(slot){
    document.getElementById('edit_id').value = slot.Id ?? '';
    document.getElementById('edit_name').value = slot.time_slot_name ?? '';
    document.getElementById('edit_start').value = slot.time_slot_start ?? '';
    document.getElementById('edit_end').value = slot.time_slot_end ?? '';
    document.getElementById('edit_number').value = slot.time_slot_number ?? '';
    openModal('#editSlotModal');
}

function openEditHoliday(holiday){
    document.getElementById('edit_holiday_id').value = holiday.Id ?? '';
    document.getElementById('edit_holiday_name').value = holiday.holiday_name ?? '';
    document.getElementById('edit_holiday_date').value = holiday.holiday_date ?? '';
    openModal('#editHolidayModal');
}

/* ---------- SweetAlert confirms ---------- */
function confirmAdd(e, form, type){
    e.preventDefault();
    Swal.fire({
        icon: 'question',
        title: `Add ${type}?`,
        text: `Do you want to save this ${type}?`,
        showCancelButton: true,
        confirmButtonText: 'Yes, save',
        cancelButtonText: 'Cancel',
        confirmButtonColor: '#0f172a'
    }).then(r => r.isConfirmed && form.submit());
    return false;
}

function confirmUpdate(e, form, type){
    e.preventDefault();
    Swal.fire({
        icon: 'question',
        title: `Update ${type}?`,
        text: `Do you want to update this ${type}?`,
        showCancelButton: true,
        confirmButtonText: 'Yes, update',
        cancelButtonText: 'Cancel',
        confirmButtonColor: '#0f172a'
    }).then(r => r.isConfirmed && form.submit());
    return false;
}

function confirmToggle(e, form, type){
    e.preventDefault();
    const current = form.querySelector('[name="current_status"]')?.value || '';
    const next = current === 'Active' ? 'Inactive' : 'Active';

    Swal.fire({
        icon: 'warning',
        title: `Change ${type} status?`,
        text: `Change status to "${next}"?`,
        showCancelButton: true,
        confirmButtonText: 'Yes, change',
        cancelButtonText: 'Cancel',
        confirmButtonColor: '#0f172a'
    }).then(r => r.isConfirmed && form.submit());
    return false;
}

function confirmSaveLimit(e, form){
    e.preventDefault();
    Swal.fire({
        icon: 'question',
        title: 'Save limit?',
        text: 'Are you sure you want to save this custom slot limit?',
        showCancelButton: true,
        confirmButtonText: 'Yes, save',
        cancelButtonText: 'Cancel',
        confirmButtonColor: '#0f172a'
    }).then(r => r.isConfirmed && form.submit());
    return false;
}
</script>
@endpush
