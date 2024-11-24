





<div>
    <div class="mb-3 flex items-center justify-between">
        <a href="/order/create" class="text-blue-600 p-2 hover:text-blue-400 -indigo-900 rounded-sm" wire:navigate>
            Create Order
        </a>
    </div>

    <table class="w-full">
        <tbody>
        @foreach($orders as $order)
            <tr wire:key="{{ $order->id }}" class="border-b bg-white/5 border-gray-700 flex items-center justify-between">
                <td class="px-6 py-3">
                    <button class="text-gray-200 p-2 bg-red-600 hover:bg-red-900 rounded-sm"
                            wire:click="delete({{ $order }})" wire:confirm="Are you sure you want to delete this customer?">
                        Delete
                    </button>
                    <a href="/order/{{ $order->id }}/edit" class="text-blue-600 p-2" wire:navigate>
                        Edit
                    </a>
                </td>

                <td  class=" ">
                    <span class="px-6 py-3 text-green-600">{{ $order->customer->name }}</span>
                    <span class="px-6 py-3 text-green-600">{{ $order->customer->name }}</span>

                </td>

            </tr>
        @endforeach
        </tbody>
    </table>
</div>


