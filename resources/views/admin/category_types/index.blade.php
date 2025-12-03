@extends('layouts.admin')

@section('title', 'Category Types')

@section('content')
<div x-data="categoryTypeHandler()">

    <!-- Page Title -->
    <h1 class="text-2xl font-semibold mb-6 text-[#25464b]">CATEGORY TYPES</h1>

    <!-- Top Bar -->
    <div class="flex justify-end items-center mb-6">
        <button
            class="inline-flex items-center gap-2 text-sm bg-[#25464b] hover:bg-[#0c2627] text-white px-6 py-3 rounded-xl shadow-md hover:shadow-lg hover:scale-105 transition-transform duration-200"
            @click="openCreateModal = true">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
            </svg>
            Create Category
        </button>
    </div>

    <!-- Table -->
    <div class="overflow-x-auto bg-white border border-gray-200 rounded-lg shadow">
        <table class="table-fixed w-full border-collapse text-center" id="category-types-table">
            <thead>
                <tr class="bg-[#25464b] text-white text-sm font-semibold">
                    <th class="px-6 py-3 rounded-tl-lg w-20">ID</th>
                    <th class="px-6 py-3 text-center">Category Name</th>
                    <th class="px-6 py-3 rounded-tr-lg w-40">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($categories as $category)
                <tr class="border-t hover:bg-gray-100 transition">
                    <td class="px-6 py-3">{{ $category->id }}</td>
                    <td class="px-6 py-3 text-[#0a1a3a] font-medium text-center">
                        {{ $category->category_name }}
                    </td>

                    <td class="px-6 py-3 whitespace-nowrap">
                        <div class="flex justify-center items-center gap-2">

                            {{-- Edit --}}
                            <button type="button"
                                @click="openEdit({{ $category->id }}, '{{ $category->category_name }}')"
                                class="px-3 py-1 rounded text-white bg-blue-500 hover:bg-blue-600 transition text-xs font-semibold">
                                Edit
                            </button>

                            {{-- Delete --}}
                            <button type="button"
                                @click="confirmDelete({{ $category->id }})"
                                class="px-3 py-1 rounded text-white bg-red-500 hover:bg-red-600 transition text-xs font-semibold">
                                Delete
                            </button>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="text-center py-6 text-gray-500">No category types found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Create Modal -->
    <div x-show="openCreateModal" x-transition.opacity
        class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-60 backdrop-blur-sm"
        @click.self="openCreateModal = false">

        <div x-transition.scale.duration.300ms
            class="bg-white text-[#0a1a3a] rounded-2xl shadow-2xl w-96 p-6 border-t-4 border-[#25464b]">

            <h2 class="text-2xl font-bold mb-4 text-[#25464b]">Create Category</h2>

            <form action="{{ route('admin.categories.store') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label class="block mb-1 text-gray-700 font-medium">Category Name</label>
                    <input type="text" name="category_name"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#25464b] focus:border-[#25464b] bg-white text-[#0a1a3a]"
                        placeholder="Enter category name" required>
                </div>

                <div class="flex justify-end gap-3 mt-6">
                    <button type="button" @click="openCreateModal = false"
                        class="px-5 py-2 rounded-lg bg-gray-300 hover:bg-gray-400 transition">
                        Cancel
                    </button>

                    <button type="submit"
                        class="px-5 py-2 rounded-lg bg-[#25464b] text-white hover:bg-[#0c2627] transition">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Edit Modal -->
    <div x-show="openEditModal" x-transition.opacity
        class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-60 backdrop-blur-sm"
        @click.self="openEditModal = false">

        <div x-transition.scale.duration.300ms
            class="bg-white text-[#0a1a3a] rounded-2xl shadow-2xl w-96 p-6 border-t-4 border-blue-500">

            <h2 class="text-2xl font-bold mb-4 text-blue-600">Edit Category</h2>

            <form :action="`{{ url('admin/categories') }}/${editId}`" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="block mb-1 text-gray-700 font-medium">Category Name</label>
                    <input type="text" name="category_name" x-model="editName"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 bg-white text-[#0a1a3a]"
                        required>
                </div>

                <div class="flex justify-end gap-3 mt-6">
                    <button type="button" @click="openEditModal = false"
                        class="px-5 py-2 rounded-lg bg-gray-300 hover:bg-gray-400 transition">
                        Cancel
                    </button>

                    <button type="submit"
                        class="px-5 py-2 rounded-lg bg-blue-600 text-white hover:bg-blue-700 transition">
                        Update
                    </button>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection

@push('scripts')
<script>
    function categoryTypeHandler() {
        return {
            openCreateModal: false,
            openEditModal: false,
            editId: null,
            editName: '',

            openEdit(id, name) {
                this.editId = id;
                this.editName = name;
                this.openEditModal = true;
            },

            confirmDelete(categoryId) {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "Delete this category?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#25464b',
                    cancelButtonColor: '#6B7280',
                    confirmButtonText: 'Yes, delete it!',
                }).then((result) => {
                    if (result.isConfirmed) {
                        let form = document.createElement('form');
                        form.method = 'POST';
                        form.action = `/admin/categories/${categoryId}`;

                        let csrf = document.createElement('input');
                        csrf.type = 'hidden';
                        csrf.name = '_token';
                        csrf.value = "{{ csrf_token() }}";

                        let method = document.createElement('input');
                        method.type = 'hidden';
                        method.name = '_method';
                        method.value = 'DELETE';

                        form.appendChild(csrf);
                        form.appendChild(method);
                        document.body.appendChild(form);
                        form.submit();
                    }
                });
            }
        }
    }

    $(document).ready(function() {
        $('#category-types-table').DataTable({
            ordering: false,
            pageLength: 10,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search categories...",
                paginate: {
                    previous: "Previous",
                    next: "Next"
                }
            },
            columnDefs: [{
                targets: "_all",
                className: "align-middle"
            }]
        });
    });

    @if(session('success'))
    Swal.fire({
        icon: 'success',
        title: 'Success!',
        text: "{{ session('success') }}",
        timer: 2000,
        showConfirmButton: false
    });
    @endif
</script>
@endpush