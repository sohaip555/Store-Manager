





<div>
    <div class="mb-3 flex items-center justify-between">
        <a href="/order/create" class="text-blue-600 p-2 hover:text-blue-400 -indigo-900 rounded-sm" wire:navigate>
            Create Order
        </a>
    </div>

    <table class="w-full">
        <thead>
        <tr class="border-b bg-fuchsia-700 text-white">
            <th class="px-6 py-3 text-left">Actions</th>
            <th class="px-6 py-3 text-right">Total Price</th>
            <th class="px-6 py-3 text-right">Quantity</th>
            <th class="px-6 py-3 text-right">Customer Name</th>
        </tr>
        </thead>
        <tbody>
        @foreach($orders as $order)
            <tr wire:key="{{ $order->id }}" class="border-b bg-white/5 text-white hover:bg-gray-600">
                <td class="px-5 py-3 flex items-center">
                    <button class="text-gray-200 p-2 bg-red-600 hover:bg-red-900 rounded-sm mr-2"
                            wire:click="delete({{ $order->id }})" wire:confirm="Are you sure you want to delete this customer?">
                        Delete
                    </button>
                    <a href="/order/{{ $order->id }}/edit" class="text-blue-600 p-2 hover:underline" wire:navigate>
                        Edit
                    </a>
                </td>
                <td class="px-6 py-3 text-right">${{ $order->total_price }}</td>
                <td class="px-6 py-3 text-right">{{ $order->quantity }}</td>
                <td class="px-6 py-3 text-right">{{ $order->customer->name }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>


