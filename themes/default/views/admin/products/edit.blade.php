<x-admin-layout>
    <x-slot name="title">
        {{ __('Products') }}
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg dark:bg-darkmode2 dark:shadow-gray-700">
                <div class="p-6 sm:px-20 bg-white dark:bg-darkmode2">
                    <div class="mt-8 text-2xl dark:text-darkmodetext">
                        Update product {{ $product->name }}
                    </div>
                    <!-- extension a href -->
                    <div class="mt-6 text-gray-500 dark:text-darkmodetext ">
                        <a href="{{ route('admin.products.extension', $product->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded dark:text-darkmodetext">Server settings</a>
                    </div>
                    <x-success class="mb-4" />
                    <div class="mt-6 text-gray-500 dark:text-darkmodetext dark:bg-darkmode2">
                        <form method="POST" action="{{ route('admin.products.update', $product->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div>
                                <label for="name">{{ __('Name') }}</label>

                                <input id="name" class="block mt-1 w-full dark:bg-darkmode" type="text" name="name"
                                    value="{{ $product->name }} " required autofocus />
                            </div>
                            <div class="mt-4 ">
                                <label for="description">{{ __('Description') }}</label>

                                <textarea id="description" class="block mt-1 w-full dark:bg-darkmode" name="description" required>{{ $product->description }}</textarea>
                            </div>
                            <div class="mt-4">
                                <label for="price">{{ __('Price') }}</label>

                                {{ App\Models\Settings::first()->currency_sign }}<input id="price" class="block mt-1 w-full dark:bg-darkmode" type="number" name="price"
                                    min="1" step="0.01" value="{{ number_format($product->price, 2) }}" required />
                            </div>
                            <div class="mt-4">
                                <label for="image">{{ __('Image') }}</label>
                                <p>Only upload a new image if you want to replace the existing one</p>
                                <input id="image" class="block mt-1 w-full dark:bg-darkmode" type="file" name="image" />
                            </div>
                            <div class="mt-4">
                                <label for="category">{{ __('Category') }}</label>
                                <select id="category" class="block mt-1 w-full dark:bg-darkmode" name="category_id" required>
                                    @if ($categories->count())
                                        @foreach ($categories as $category)
                                            @if ($category->id == $product->category_id)
                                                <option value="{{ $category->id }}" selected>{{ $category->name }}
                                                </option>
                                            @else
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endif
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
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded dark:text-darkmodetext">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
