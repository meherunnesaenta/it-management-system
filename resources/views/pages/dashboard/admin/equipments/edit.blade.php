@extends('layouts.app')

@section('title', 'Edit Equipment')
@section('content')
<div class="max-w-3xl mx-auto space-y-6">
    <div><h1 class="text-2xl font-bold text-white font-space">Edit Equipment</h1><p class="mt-1 text-sm text-white/40">Update inventory information</p></div>
    <form method="POST" action="{{ route('admin.equipments.update', $equipment) }}" class="space-y-5 rounded-2xl border border-white/10 bg-white/5 p-6 sm:p-8">
        @csrf @method('PATCH')
        @foreach ([['name', 'Equipment Name'], ['model', 'Model'], ['serial_no', 'Serial Number'], ['category', 'Category'], ['location', 'Location']] as [$field, $label])
            <div><label for="{{ $field }}" class="mb-2 block text-sm text-white/70">{{ $label }}</label><input id="{{ $field }}" name="{{ $field }}" value="{{ old($field, $equipment->$field) }}" required class="w-full rounded-xl border border-white/10 bg-white/5 px-4 py-3 text-white focus:border-orange-400 focus:outline-none">@error($field)<p class="mt-1 text-sm text-red-400">{{ $message }}</p>@enderror</div>
        @endforeach
        <div><label for="status" class="mb-2 block text-sm text-white/70">Status</label><select id="status" name="status" class="w-full rounded-xl border border-white/10 bg-white/5 px-4 py-3 text-white"><option value="available" @selected(old('status', $equipment->status) === 'available')>Available</option><option value="in-use" @selected(old('status', $equipment->status) === 'in-use')>In Use</option><option value="maintenance" @selected(old('status', $equipment->status) === 'maintenance')>Maintenance</option><option value="retired" @selected(old('status', $equipment->status) === 'retired')>Retired</option></select></div>
        <div><label for="description" class="mb-2 block text-sm text-white/70">Description</label><textarea id="description" name="description" rows="4" class="w-full rounded-xl border border-white/10 bg-white/5 px-4 py-3 text-white focus:border-orange-400 focus:outline-none">{{ old('description', $equipment->description) }}</textarea></div>
        <div class="flex justify-end gap-3"><a href="{{ route('admin.equipments.index') }}" class="rounded-xl bg-white/5 px-5 py-3 text-sm text-white/70">Cancel</a><button class="rounded-xl bg-orange-500 px-5 py-3 text-sm font-semibold text-white">Update Equipment</button></div>
    </form>
</div>
@endsection
