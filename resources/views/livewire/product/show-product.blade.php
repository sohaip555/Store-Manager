





<div>

    <div class="ml-2 mb-3 flex items-center justify-between">
        <a href="/product/create" class="text-xl text-indigo-500 p-2 hover:text-blue-400 -indigo-900 rounded-sm" wire:navigate>
            Create Product
        </a>
    </div>

    <div  class="grid grid-cols-2">

        @foreach($products as $product)

            <div class="container mx-auto p-4 ">
                <div class="max-w-sm rounded overflow-hidden shadow-lg bg-white/5">
                    <div class="px-6 py-4">
                        <div class="font-bold text-xl mb-2">{{$product->name}}</div>
                        <p class="text-blue-500 text-base">
                            {{$product->description}}
                        </p>
                    </div>
                    <div class="px-6 pt-4 pb-2">
                        <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2">{{$product->brand->name}}</span>
                    </div>
                    <div class="px-6 py-4 flex items-center justify-between">
                        <span class="text-xl font-bold mt-2">${{number_format($product->price, 2, '.', ',')}}</span>
                        <div>

                        </div>
                        <div>
                            <button class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-4"
                            >
                                <a href="/product/{{ $product->id }}/edit" wire:navigate>
                                    Edit
                                </a>
                            </button>
                            <button class="bg-red-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-4"
                                    wire:click="delete({{$product}})"
                                    wire:confirm="Are you sure you want to delete this product?">
                                Delete
                            </button>
                        </div>
                    </div>
                </div>
            </div>

        @endforeach
    </div>

</div>













{{--<div>--}}
{{--    <div class="mb-3 flex items-center justify-between">--}}
{{--        <a href="/customer/create" class="text-blue-600 p-2 hover:text-blue-400 -indigo-900 rounded-sm" wire:navigate>--}}
{{--            Show Product--}}
{{--        </a>--}}
{{--    </div>--}}

{{--    <table class="w-full">--}}
{{--        <tbody>--}}
{{--        @foreach($customers as $customer)--}}
{{--            <tr wire:key="{{ $customer->id }}" class="border-b bg-gray-800 border-gray-700 flex items-center justify-between">--}}
{{--                <td class="px-6 py-3">{{ $customer->name }}</td>--}}
{{--                <td class="px-6 py-3">--}}
{{--                    <a href="/customer/{{ $customer->id }}/edit" class="text-gray-200 p-2" wire:navigate>--}}
{{--                        Edit--}}
{{--                    </a>--}}
{{--                    <button class="text-gray-200 p-2 bg-red-600 hover:bg-red-900 rounded-sm" wire:click="delete({{ $customer->id }})" wire:confirm="Are you sure you want to delete this customer?">--}}
{{--                        Delete--}}
{{--                    </button>--}}
{{--                </td>--}}
{{--            </tr>--}}
{{--        @endforeach--}}
{{--        </tbody>--}}
{{--    </table>--}}
{{--</div>--}}

