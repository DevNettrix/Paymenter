<x-app-layout>
    <x-slot name="title">
        {{ __('Checkout') }}
    </x-slot>
    <x-success class="mb-4 m-2" />
    <div class="flex flex-col md:p-12">
        @empty(!$products)
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50 dark:bg-darkmode2">
                    <tr>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-darkmodetext">
                            Product
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-darkmodetext">
                            Update
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-darkmodetext">
                            Quantity
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-darkmodetext">
                            Remove
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200 dark:bg-darkmode2 table-auto	">
                    @foreach ($products as $product)
                        <tr>
                            <td
                                class="flex flex-row items-center px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-darkmodetext ">
                                <img src="{{ $product->image }}" alt="{{ $product->name }}" class="w-10 h-10">
                                <div class="flex flex-col ml-4">
                                    <span class="text-lg font-bold">{{ $product->name }}</span>
                                    <span class="text-gray-500">{{ $product->description }}</span>
                                </div>
                            </td>
                            <td >
                                <form method="POST" action="{{ route('checkout.update', $product->id) }}">
                                @csrf
                                <div
                                    class="flex flex-row items-center px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-darkmodetext">
                                    <input type="number" name="quantity" value="{{ $product->quantity }}"
                                        class="w-20 h-10 text-center rounded-md dark:bg-darkmode2 dark:text-darkmodetext"
                                        min="1">
                                    <button type="submit" class="ml-4">
                                        <span name="refresh" class="w-6 h-6 text-gray-500 hover:text-gray-700"> Update
                                        </span>
                                    </button>
                                </div>
                                </form>
                            </td>
                            <td class="text-lg  px-6 py-4 whitespace-nowrap text-gray-500 dark:text-darkmodetext">
                                <span class="text-lg font-bold">{{ App\Models\Settings::first()->currency_sign }}
                                    {{ $product->price }} each </span>
                                <br>
                                <span class="text-gray-500">Quantity: {{ $product->quantity }}</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-gray-500 dark:text-darkmodetext">
                                <form method="POST" action="{{ route('checkout.remove', $product->id) }}">
                                    @csrf
                                    <button type="submit" class="text-red-500 hover:text-red-600 text-xl">
                                        <i class="ri-delete-bin-2-line"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="flex flex-row justify-between items-center mt-4">
                <div class="flex flex-row items-center">
                    <span class="text-lg font-bold">Total</span>
                </div>
                <div class="flex flex-col">
                    <span class="text-lg font-bold">{{ App\Models\Settings::first()->currency_sign }}
                        {{ $total }}</span>
                </div>
            </div>
            <br><br>

            <form method="POST" action="{{ route('checkout.pay') }}">

                <div class="flex flex-col">
                    <label for="payment_method"
                        class="block text-sm font-medium text-gray-700 dark:text-darkmodetext">Payment
                        method</label>
                    <select id="payment_method" name="payment_method" autocomplete="payment_method"
                        class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-darkmode2 dark:text-darkmodetext">
                        @foreach (App\Models\Extensions::where('type', 'gateway')->where('enabled', true)->get() as $gateway)
                            <option value="{{ $gateway->id }}">{{ $gateway->name }}</option>
                        @endforeach
                    </select>
                </div>
                @csrf
                <div class="flex flex-row justify-end mt-4">
                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded dark:text-darkmodetext">
                        {{ __('Checkout') }}
                    </button>
                </div>
            </form>
        @else
            <div class="flex flex-row justify-between items-center">
                <div class="flex flex-row items-center">
                    <span class="text-lg font-bold">Your cart is empty</span>
                </div>
                <br>
                <a href="{{ route('products') }}" class="ml-4">
                    <span name="refresh" class="w-6 h-6 text-gray-500 hover:text-gray-700"> Go to products </span>
                </a>
            </div>

        @endempty
    </div>
</x-app-layout>
