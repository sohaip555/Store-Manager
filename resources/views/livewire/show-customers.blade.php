




<div>
    <div class="mb-3 flex items-center justify-between">
        <a href="/customer/create" class="text-blue-600 p-2 hover:text-blue-400 -indigo-900 rounded-sm" wire:navigate>
            Create Customer
        </a>
    </div>

    <table class="w-full">
        <tbody>
        @foreach($customers as $customer)
            <tr wire:key="{{ $customer->id }}" class="border-b bg-white/5 border-gray-700 flex items-center justify-between">
                <td class="px-6 py-3 text-green-600">{{ $customer->name }}</td>
                <td class="px-6 py-3">
                    <a href="/customer/{{ $customer->id }}/edit" class="text-blue-600 p-2" wire:navigate>
                        Edit
                    </a>
                    <button class="text-gray-200 p-2 bg-red-600 hover:bg-red-900 rounded-sm"
                            wire:click="delete({{ $customer }})" wire:confirm="Are you sure you want to delete this customer?">
                        Delete
                    </button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

