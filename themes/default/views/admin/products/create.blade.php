<x-admin-layout>
    <x-slot name="title">
        {{ __('Products') }}
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="dark:bg-darkmode2 bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="dark:bg-darkmode2 p-6 sm:px-20 bg-white">
                    <div class="dark:text-darkmodetext mt-8 text-2xl">
                        Create Product
                    </div>
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <div class="dark:text-darkmodetext mt-6 text-gray-500">
                        <form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div>
                                <label for="name">{{ __('Name') }}</label>

                                <input id="name" class="dark:bg-darkmode rounded-lg block mt-1 w-full" type="text" name="name"
                                    value="{{ old('name') }}" required autofocus />
                            </div>
                            <div class="mt-4">
                                <label for="description">{{ __('Description') }}</label>

                                <textarea id="description" class="dark:bg-darkmode rounded-lg block mt-1 w-full" name="description" required>{{ old('description') }}</textarea>
                            </div>
                            <div class="mt-4">
                                <label for="price">{{ __('Price') }}</label>

                                <input id="price" class="dark:bg-darkmode rounded-lg block mt-1 w-full" type="number" name="price"  min="1" step="any"
                                    value="{{ old('price') }}" required />
                            </div>
                            <div class="mt-4">
                                <label for="image">{{ __('Image') }}</label>

                                <input id="image" class="dark:bg-darkmode rounded-lg block mt-1 w-full" type="file" name="image"
                                    required />
                            </div>
                            <div class="mt-4">
                                <label for="category">{{ __('Category') }}</label>
                                <select id="category" class="dark:bg-darkmode rounded-lg block mt-1 w-full" name="category_id" required>
                                    @if ($categories->count())
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    @else
                                        <option value="">No categories found</option>
                                    @endif
                                </select>
                                <div class="flex items-center justify-end mt-4 text-blue-700">
                                    <a href="{{ route('admin.categories.create') }}">Create Category</a>
                                </div>

                            </div>
                            <div class="flex items-center justify-end mt-4">
                                <button type="submit"
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                    {{ __('Create') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
