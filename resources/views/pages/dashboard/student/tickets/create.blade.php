{{-- resources/views/student/tickets/create.blade.php --}}

@extends('layouts.app')

@section('title', 'Create Ticket')
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
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 6v.75m0 3v.75m0 3v.75m0 3V18m-9-5.25h5.25M7.5 15h3M3.375 5.25c-.621 0-1.125.504-1.125 1.125v3.026a2.999 2.999 0 0 1 0 5.198v3.026c0 .621.504 1.125 1.125 1.125h17.25c.621 0 1.125-.504 1.125-1.125v-3.026a2.999 2.999 0 0 1 0-5.198V6.375c0-.621-.504-1.125-1.125-1.125H3.375Z" />
                    </svg>
                </div>
                <div>
                    <h2 class="text-2xl font-bold text-white font-space">Create New Ticket</h2>
                    <p class="text-white/40 text-sm">Submit a support request or report an issue</p>
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
            <form method="POST" action="{{ route('student.tickets.store') }}" class="space-y-6" enctype="multipart/form-data">
                @csrf

                {{-- বিষয় --}}
                <div>
                    <label for="subject" class="block text-sm font-medium text-white/70 mb-1.5">
                        Subject <span class="text-red-400">*</span>
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-white/20" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                            </svg>
                        </div>
                        <input 
                            id="subject" 
                            name="subject" 
                            type="text" 
                            value="{{ old('subject') }}" 
                            required 
                            class="w-full pl-10 pr-4 py-2.5 bg-white/5 border border-white/10 rounded-xl text-white placeholder-white/30 focus:border-[#FF6B35] focus:ring-2 focus:ring-[#FF6B35]/50 focus:ring-offset-2 focus:ring-offset-[#0A0A0F] transition-all duration-200"
                            placeholder="e.g., Printer not working in Lab 101"
                        />
                    </div>
                    @error('subject')
                        <p class="mt-1.5 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
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
                            <option value="Hardware" class="bg-[#1A1A2E]" {{ old('category') == 'Hardware' ? 'selected' : '' }}>🖥️ Hardware</option>
                            <option value="Software" class="bg-[#1A1A2E]" {{ old('category') == 'Software' ? 'selected' : '' }}>💻 Software</option>
                            <option value="Network" class="bg-[#1A1A2E]" {{ old('category') == 'Network' ? 'selected' : '' }}>🌐 Network</option>
                            <option value="CCTV" class="bg-[#1A1A2E]" {{ old('category') == 'CCTV' ? 'selected' : '' }}>📹 CCTV</option>
                            <option value="POS" class="bg-[#1A1A2E]" {{ old('category') == 'POS' ? 'selected' : '' }}>🛒 POS</option>
                            <option value="Lab" class="bg-[#1A1A2E]" {{ old('category') == 'Lab' ? 'selected' : '' }}>🧪 Lab Equipment</option>
                            <option value="Other" class="bg-[#1A1A2E]" {{ old('category') == 'Other' ? 'selected' : '' }}>📌 Other</option>
                        </select>
                        @error('category')
                            <p class="mt-1.5 text-sm text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- প্রায়োরিটি --}}
                    <div>
                        <label for="priority" class="block text-sm font-medium text-white/70 mb-1.5">
                            Priority <span class="text-red-400">*</span>
                        </label>
                        <select 
                            id="priority" 
                            name="priority" 
                            required 
                            class="w-full px-4 py-2.5 bg-white/5 border border-white/10 rounded-xl text-white placeholder-white/30 focus:border-[#FF6B35] focus:ring-2 focus:ring-[#FF6B35]/50 focus:ring-offset-2 focus:ring-offset-[#0A0A0F] transition-all duration-200 appearance-none"
                        >
                            <option value="low" class="bg-[#1A1A2E]" {{ old('priority') == 'low' ? 'selected' : '' }}>🟢 Low</option>
                            <option value="medium" class="bg-[#1A1A2E]" {{ old('priority') == 'medium' ? 'selected' : '' }}>🟡 Medium</option>
                            <option value="high" class="bg-[#1A1A2E]" {{ old('priority') == 'high' ? 'selected' : '' }}>🟠 High</option>
                            <option value="urgent" class="bg-[#1A1A2E]" {{ old('priority') == 'urgent' ? 'selected' : '' }}>🔴 Urgent</option>
                        </select>
                        @error('priority')
                            <p class="mt-1.5 text-sm text-red-400">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- বর্ণনা --}}
                <div>
                    <label for="description" class="block text-sm font-medium text-white/70 mb-1.5">
                        Description <span class="text-red-400">*</span>
                    </label>
                    <div class="relative">
                        <textarea 
                            id="description" 
                            name="description" 
                            rows="6" 
                            required 
                            class="w-full px-4 py-2.5 bg-white/5 border border-white/10 rounded-xl text-white placeholder-white/30 focus:border-[#FF6B35] focus:ring-2 focus:ring-[#FF6B35]/50 focus:ring-offset-2 focus:ring-offset-[#0A0A0F] transition-all duration-200 resize-y"
                            placeholder="Please describe the issue in detail. Include any error messages or steps to reproduce..."
                        >{{ old('description') }}</textarea>
                    </div>
                    @error('description')
                        <p class="mt-1.5 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                {{-- অ্যাটাচমেন্ট (ঐচ্ছিক) --}}
                <div>
                    <label for="attachment" class="block text-sm font-medium text-white/70 mb-1.5">
                        Attachment (Optional)
                    </label>
                    <div class="relative">
                        <input 
                            id="attachment" 
                            name="attachment" 
                            type="file" 
                            class="w-full px-4 py-2.5 bg-white/5 border border-white/10 rounded-xl text-white placeholder-white/30 focus:border-[#FF6B35] focus:ring-2 focus:ring-[#FF6B35]/50 focus:ring-offset-2 focus:ring-offset-[#0A0A0F] transition-all duration-200 file:mr-4 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-sm file:font-medium file:bg-[#FF6B35]/10 file:text-[#FF8F65] hover:file:bg-[#FF6B35]/20"
                        />
                    </div>
                    <p class="mt-1.5 text-xs text-white/20">Allowed: JPG, PNG, PDF, DOCX (Max: 5MB)</p>
                    @error('attachment')
                        <p class="mt-1.5 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                {{-- ফর্ম অ্যাকশন --}}
                <div class="flex flex-col sm:flex-row items-center justify-end gap-4 pt-6 border-t border-white/5">
                    <a href="{{ route('student.tickets.index') }}" class="w-full sm:w-auto px-6 py-2.5 text-sm font-medium text-white/60 hover:text-white bg-white/5 hover:bg-white/10 rounded-xl transition-all duration-200 text-center">
                        Cancel
                    </a>
                    <button 
                        type="submit" 
                        class="w-full sm:w-auto px-8 py-2.5 bg-gradient-to-r from-[#FF6B35] to-[#FF8F65] text-white font-semibold rounded-xl shadow-lg shadow-[#FF6B35]/25 hover:shadow-[#FF6B35]/40 hover:-translate-y-0.5 active:scale-[0.98] transition-all duration-300"
                    >
                        <span class="flex items-center justify-center gap-2">
                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Create Ticket
                        </span>
                    </button>
                </div>
            </form>

            {{-- টিপস --}}
            <div class="mt-6 pt-6 border-t border-white/5">
                <div class="flex items-start gap-3 p-4 bg-white/5 border border-white/5 rounded-xl">
                    <svg class="w-5 h-5 text-[#FF6B35] flex-shrink-0 mt-0.5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                    </svg>
                    <div>
                        <p class="text-white/60 text-sm font-medium">Need help?</p>
                        <p class="text-white/30 text-xs">Provide as much detail as possible. Attach screenshots if available. Our IT team will respond shortly.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .font-space {
        font-family: 'Space Grotesk', sans-serif;
    }
    
    select option {
        background: #1A1A2E;
        color: #fff;
    }
    
    select option:hover {
        background: #FF6B35;
    }
    
    /* ফাইল ইনপুট স্টাইল */
    input[type="file"]::file-selector-button {
        cursor: pointer;
        transition: all 0.2s ease;
    }
</style>
@endpush