{{-- resources/views/admin/equipments/create.blade.php --}}

@extends('layouts.app')

@section('title', 'Create Equipment')
@section('content')
<div class="max-w-3xl mx-auto py-8">
    {{-- গ্লাসমরফিক কার্ড --}}
    <div class="relative">
        {{-- ডেকোরেটিভ গ্লো --}}
        <div class="absolute -top-20 -right-20 w-64 h-64 bg-[#FF6B35]/10 rounded-full blur-3xl"></div>
        <div class="absolute -bottom-20 -left-20 w-64 h-64 bg-[#FF8F65]/10 rounded-full blur-3xl"></div>
        
        <div class="relative bg-white/5 backdrop-blur-xl border border-white/10 rounded-2xl shadow-2xl p-8">
            {{-- হেডার --}}
            <div class="flex items-center gap-4 mb-8">
                <div class="inline-flex items-center justify-center w-14 h-14 bg-gradient-to-br from-[#FF6B35] to-[#FF8F65] rounded-2xl shadow-lg shadow-[#FF6B35]/20">
                    <svg class="w-7 h-7 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 3v1.5M4.5 8.25H3m1.5 0H3m1.5 0V6m0 2.25h4.5M12 3v1.5M12 12h.008M20.25 12h-1.5M21.75 12h-1.5M19.5 8.25h-1.5M21 8.25h-1.5M19.5 3v1.5M21 3v1.5m-4.5 0V3m0 1.5h-4.5m4.5 0h1.5M3 21h18M3 21l4.5-4.5M3 21l4.5 4.5M21 21l-4.5-4.5M21 21l-4.5 4.5" />
                    </svg>
                </div>
                <div>
                    <h2 class="text-2xl font-bold text-white font-space">Add New Equipment</h2>
                    <p class="text-white/40 text-sm">Enter equipment details to add to inventory</p>
                </div>
            </div>

            {{-- সেশন স্ট্যাটাস --}}
            @if(session('success'))
                <div class="mb-6 p-4 bg-green-500/10 border border-green-500/20 rounded-xl text-green-400 text-sm">
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="mb-6 p-4 bg-red-500/10 border border-red-500/20 rounded-xl text-red-400 text-sm">
                    <ul class="list-disc list-inside">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- ফর্ম --}}
            <form method="POST" action="{{ route('admin.equipments.store') }}" class="space-y-6" enctype="multipart/form-data">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    {{-- নাম --}}
                    <div class="md:col-span-2">
                        <label for="name" class="block text-sm font-medium text-white/70 mb-1.5">
                            Equipment Name <span class="text-red-400">*</span>
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-white/20" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 3v1.5M4.5 8.25H3m1.5 0H3m1.5 0V6m0 2.25h4.5M12 3v1.5M12 12h.008M20.25 12h-1.5M21.75 12h-1.5M19.5 8.25h-1.5M21 8.25h-1.5M19.5 3v1.5M21 3v1.5m-4.5 0V3m0 1.5h-4.5m4.5 0h1.5M3 21h18M3 21l4.5-4.5M3 21l4.5 4.5M21 21l-4.5-4.5M21 21l-4.5 4.5" />
                                </svg>
                            </div>
                            <input 
                                id="name" 
                                name="name" 
                                type="text" 
                                value="{{ old('name') }}" 
                                required 
                                class="w-full pl-10 pr-4 py-2.5 bg-white/5 border border-white/10 rounded-xl text-white placeholder-white/30 focus:border-[#FF6B35] focus:ring-2 focus:ring-[#FF6B35]/50 focus:ring-offset-2 focus:ring-offset-[#0A0A0F] transition-all duration-200"
                                placeholder="e.g., Dell XPS 13 Laptop"
                            />
                        </div>
                        @error('name')
                            <p class="mt-1.5 text-sm text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- মডেল --}}
                    <div>
                        <label for="model" class="block text-sm font-medium text-white/70 mb-1.5">
                            Model <span class="text-red-400">*</span>
                        </label>
                        <input 
                            id="model" 
                            name="model" 
                            type="text" 
                            value="{{ old('model') }}" 
                            required 
                            class="w-full px-4 py-2.5 bg-white/5 border border-white/10 rounded-xl text-white placeholder-white/30 focus:border-[#FF6B35] focus:ring-2 focus:ring-[#FF6B35]/50 focus:ring-offset-2 focus:ring-offset-[#0A0A0F] transition-all duration-200"
                            placeholder="e.g., XPS 13 9310"
                        />
                        @error('model')
                            <p class="mt-1.5 text-sm text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- সিরিয়াল নম্বর --}}
                    <div>
                        <label for="serial_no" class="block text-sm font-medium text-white/70 mb-1.5">
                            Serial Number <span class="text-red-400">*</span>
                        </label>
                        <input 
                            id="serial_no" 
                            name="serial_no" 
                            type="text" 
                            value="{{ old('serial_no') }}" 
                            required 
                            class="w-full px-4 py-2.5 bg-white/5 border border-white/10 rounded-xl text-white placeholder-white/30 focus:border-[#FF6B35] focus:ring-2 focus:ring-[#FF6B35]/50 focus:ring-offset-2 focus:ring-offset-[#0A0A0F] transition-all duration-200"
                            placeholder="e.g., SN-2024-001"
                        />
                        @error('serial_no')
                            <p class="mt-1.5 text-sm text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- ক্যাটাগরি --}}
                    <div>
                        <label for="category" class="block text-sm font-medium text-white/70 mb-1.5">
                            Category <span class="text-red-400">*</span>
                        </label>
                        <select 
                            id="category" 
                            name="category" 
                            required 
                            class="w-full px-4 py-2.5 bg-white/5 border border-white/10 rounded-xl text-white placeholder-white/30 focus:border-[#FF6B35] focus:ring-2 focus:ring-[#FF6B35]/50 focus:ring-offset-2 focus:ring-offset-[#0A0A0F] transition-all duration-200 appearance-none"
                        >
                            <option value="" class="bg-[#1A1A2E]">Select Category</option>
                            <option value="Computer" class="bg-[#1A1A2E]" {{ old('category') == 'Computer' ? 'selected' : '' }}>Computer</option>
                            <option value="Printer" class="bg-[#1A1A2E]" {{ old('category') == 'Printer' ? 'selected' : '' }}>Printer</option>
                            <option value="Projector" class="bg-[#1A1A2E]" {{ old('category') == 'Projector' ? 'selected' : '' }}>Projector</option>
                            <option value="CCTV" class="bg-[#1A1A2E]" {{ old('category') == 'CCTV' ? 'selected' : '' }}>CCTV</option>
                            <option value="POS" class="bg-[#1A1A2E]" {{ old('category') == 'POS' ? 'selected' : '' }}>POS</option>
                            <option value="Network" class="bg-[#1A1A2E]" {{ old('category') == 'Network' ? 'selected' : '' }}>Network</option>
                            <option value="Other" class="bg-[#1A1A2E]" {{ old('category') == 'Other' ? 'selected' : '' }}>Other</option>
                        </select>
                        @error('category')
                            <p class="mt-1.5 text-sm text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- স্থান --}}
                    <div>
                        <label for="location" class="block text-sm font-medium text-white/70 mb-1.5">
                            Location <span class="text-red-400">*</span>
                        </label>
                        <input 
                            id="location" 
                            name="location" 
                            type="text" 
                            value="{{ old('location') }}" 
                            required 
                            class="w-full px-4 py-2.5 bg-white/5 border border-white/10 rounded-xl text-white placeholder-white/30 focus:border-[#FF6B35] focus:ring-2 focus:ring-[#FF6B35]/50 focus:ring-offset-2 focus:ring-offset-[#0A0A0F] transition-all duration-200"
                            placeholder="e.g., Lab 101, Office 202"
                        />
                        @error('location')
                            <p class="mt-1.5 text-sm text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- ক্রয় তারিখ --}}
                    <div>
                        <label for="purchase_date" class="block text-sm font-medium text-white/70 mb-1.5">
                            Purchase Date <span class="text-red-400">*</span>
                        </label>
                        <input 
                            id="purchase_date" 
                            name="purchase_date" 
                            type="date" 
                            value="{{ old('purchase_date') }}" 
                            required 
                            class="w-full px-4 py-2.5 bg-white/5 border border-white/10 rounded-xl text-white placeholder-white/30 focus:border-[#FF6B35] focus:ring-2 focus:ring-[#FF6B35]/50 focus:ring-offset-2 focus:ring-offset-[#0A0A0F] transition-all duration-200"
                        />
                        @error('purchase_date')
                            <p class="mt-1.5 text-sm text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- ওয়ারেন্টি এক্সপাইরি --}}
                    <div>
                        <label for="warranty_expiry" class="block text-sm font-medium text-white/70 mb-1.5">
                            Warranty Expiry
                        </label>
                        <input 
                            id="warranty_expiry" 
                            name="warranty_expiry" 
                            type="date" 
                            value="{{ old('warranty_expiry') }}" 
                            class="w-full px-4 py-2.5 bg-white/5 border border-white/10 rounded-xl text-white placeholder-white/30 focus:border-[#FF6B35] focus:ring-2 focus:ring-[#FF6B35]/50 focus:ring-offset-2 focus:ring-offset-[#0A0A0F] transition-all duration-200"
                        />
                        @error('warranty_expiry')
                            <p class="mt-1.5 text-sm text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- স্ট্যাটাস --}}
                    <div>
                        <label for="status" class="block text-sm font-medium text-white/70 mb-1.5">
                            Status <span class="text-red-400">*</span>
                        </label>
                        <select 
                            id="status" 
                            name="status" 
                            required 
                            class="w-full px-4 py-2.5 bg-white/5 border border-white/10 rounded-xl text-white placeholder-white/30 focus:border-[#FF6B35] focus:ring-2 focus:ring-[#FF6B35]/50 focus:ring-offset-2 focus:ring-offset-[#0A0A0F] transition-all duration-200 appearance-none"
                        >
                            <option value="available" class="bg-[#1A1A2E]" {{ old('status') == 'available' ? 'selected' : '' }}>Available</option>
                            <option value="in-use" class="bg-[#1A1A2E]" {{ old('status') == 'in-use' ? 'selected' : '' }}>In Use</option>
                            <option value="maintenance" class="bg-[#1A1A2E]" {{ old('status') == 'maintenance' ? 'selected' : '' }}>Maintenance</option>
                            <option value="retired" class="bg-[#1A1A2E]" {{ old('status') == 'retired' ? 'selected' : '' }}>Retired</option>
                        </select>
                        @error('status')
                            <p class="mt-1.5 text-sm text-red-400">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- বিবরণ --}}
                <div>
                    <label for="description" class="block text-sm font-medium text-white/70 mb-1.5">
                        Description
                    </label>
                    <textarea 
                        id="description" 
                        name="description" 
                        rows="4" 
                        class="w-full px-4 py-2.5 bg-white/5 border border-white/10 rounded-xl text-white placeholder-white/30 focus:border-[#FF6B35] focus:ring-2 focus:ring-[#FF6B35]/50 focus:ring-offset-2 focus:ring-offset-[#0A0A0F] transition-all duration-200 resize-y"
                        placeholder="Additional details about the equipment..."
                    >{{ old('description') }}</textarea>
                    @error('description')
                        <p class="mt-1.5 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                {{-- ফর্ম অ্যাকশন --}}
                <div class="flex items-center justify-end gap-4 pt-6 border-t border-white/5">
                    <a href="{{ route('admin.equipments.index') }}" class="px-6 py-2.5 text-sm font-medium text-white/60 hover:text-white bg-white/5 hover:bg-white/10 rounded-xl transition-all duration-200">
                        Cancel
                    </a>
                    <button 
                        type="submit" 
                        class="px-8 py-2.5 bg-gradient-to-r from-[#FF6B35] to-[#FF8F65] text-white font-semibold rounded-xl shadow-lg shadow-[#FF6B35]/25 hover:shadow-[#FF6B35]/40 hover:-translate-y-0.5 active:scale-[0.98] transition-all duration-300"
                    >
                        <span class="flex items-center gap-2">
                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                            Add Equipment
                        </span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .font-space {
        font-family: 'Space Grotesk', sans-serif;
    }
    
    /* সিলেক্ট এর ড্রপডাউন কালার ফিক্স */
    select option {
        background: #1A1A2E;
        color: #fff;
    }
    
    select option:hover {
        background: #FF6B35;
    }
</style>
@endpush