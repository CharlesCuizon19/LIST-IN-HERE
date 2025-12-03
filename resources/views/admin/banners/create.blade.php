@extends('layouts.admin')

@section('title', 'Homepage Banner / Create Banner')

@section('content')
<div class="max-w-screen-xl mx-auto bg-white px-14 py-12 rounded-2xl shadow-xl border border-gray-200">

    <h1 class="text-3xl font-extrabold mb-8 text-[#25464b] tracking-wide">
        CREATE BANNER
    </h1>

    <form action="{{ route('admin.banners.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
        @csrf

        {{-- Title --}}
        <div>
            <label for="title" class="block text-sm font-medium text-[#25464b] mb-2">Title</label>
            <input
                type="text"
                name="title"
                id="title"
                class="w-full bg-white text-[#0a1a3a] placeholder-gray-400 border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-[#25464b]/60 focus:border-[#25464b] transition"
                value="{{ old('title') }}"
                placeholder="Enter banner title"
                required>
            @error('title')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Subtitle --}}
        <!-- <div>
            <label for="subtitle" class="block text-sm font-medium text-[#25464b] mb-2">Subtitle</label>
            <textarea
                name="subtitle"
                id="subtitle"
                rows="5"
                class="w-full bg-white text-[#0a1a3a] placeholder-gray-400 border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-[#25464b]/60 focus:border-[#25464b] transition"
                placeholder="Enter a short banner description">{{ old('subtitle') }}</textarea>
            @error('subtitle')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div> -->

        {{-- Image Upload --}}
        <div
            class="border-2 border-dashed border-gray-300 rounded-xl p-8 text-center bg-gray-50 hover:border-[#25464b]/60 transition">
            <p class="font-semibold text-[#25464b] text-lg mb-1">Image Upload</p>
            <p class="text-sm text-gray-500 mb-5">
                Upload a banner image (Max 5MB • JPG • PNG • WEBP • GIF)
            </p>

            <div class="flex flex-col items-center gap-4">
                <label for="media" class="cursor-pointer flex flex-col items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-400 mb-2" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3 15a4 4 0 014-4h.586a1 1 0 01.707.293l2.414 2.414a1 1 0 001.414 0l2.414-2.414a1 1 0 01.707-.293H17a4 4 0 014 4v1a2 2 0 01-2 2H5a2 2 0 01-2-2v-1z" />
                    </svg>

                    <span class="text-gray-500 mb-3">
                        Click below or drag an image to upload
                    </span>

                    <input type="file" name="media" id="media" class="hidden" accept="image/*">

                    {{-- Upload Button --}}
                    <span
                        class="mt-2 px-6 py-2 bg-[#25464b] text-white rounded-lg font-semibold hover:bg-[#0c2627] hover:scale-105 transition-transform shadow-md">
                        Upload Image
                    </span>
                </label>
            </div>

            @error('media')
            <p class="text-red-500 text-sm mt-3">{{ $message }}</p>
            @enderror
        </div>

        {{-- Preview Section --}}
        <div id="preview-container" class="hidden mt-6 text-center">
            <p class="font-semibold text-[#25464b] mb-3">Preview</p>
            <div id="preview" class="relative flex justify-center"></div>
        </div>

        {{-- Buttons --}}
        <div class="flex justify-between pt-6">
            <a href="{{ route('admin.banners.index') }}"
                class="px-6 py-2 rounded-lg border border-gray-300 text-gray-600 hover:bg-gray-100 hover:text-[#0a1a3a] transition">
                ← Back
            </a>
            <button type="submit"
                class="px-6 py-2 bg-[#25464b] text-white rounded-lg font-semibold hover:bg-[#0c2627] hover:scale-105 shadow-lg transition">
                Save Banner
            </button>
        </div>
    </form>
</div>

@push('scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
<script>
    // CKEditor (light mode – uses default styling)
    ClassicEditor
        .create(document.querySelector('#subtitle'))
        .catch(error => console.error(error));

    // Image Preview (centered with floating X)
    document.getElementById('media').addEventListener('change', function(event) {
        const file = event.target.files[0];
        const previewContainer = document.getElementById('preview-container');
        const preview = document.getElementById('preview');
        preview.innerHTML = "";

        if (file && file.type.startsWith("image/")) {
            previewContainer.classList.remove('hidden');
            const reader = new FileReader();

            reader.onload = function(e) {
                const wrapper = document.createElement("div");
                wrapper.className = "relative inline-block";
                wrapper.style.position = "relative";
                wrapper.style.display = "inline-block";

                const img = document.createElement("img");
                img.src = e.target.result;
                img.className = "w-80 h-48 object-cover rounded-lg shadow-lg border border-gray-300";
                img.style.display = "block";

                const removeBtn = document.createElement("button");
                removeBtn.innerHTML = "✖";
                removeBtn.type = "button";
                removeBtn.className =
                    "absolute bg-red-600 text-white rounded-full w-7 h-7 flex items-center justify-center text-sm shadow-lg hover:bg-red-700 transition";

                removeBtn.style.top = "-10px";
                removeBtn.style.right = "-10px";
                removeBtn.style.zIndex = "50";

                removeBtn.onclick = function() {
                    document.getElementById('media').value = "";
                    preview.innerHTML = "";
                    previewContainer.classList.add('hidden');
                };

                wrapper.appendChild(img);
                wrapper.appendChild(removeBtn);
                preview.appendChild(wrapper);
            };

            reader.readAsDataURL(file);
        }
    });
</script>
@endpush
@endsection