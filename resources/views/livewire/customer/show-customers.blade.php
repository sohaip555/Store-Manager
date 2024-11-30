<div>
    <div class="mb-3 flex items-center justify-between">
        <a href="/customer/create" class="text-blue-600 p-2 hover:text-blue-400 -indigo-900 rounded-sm" wire:navigate>
            Create Customer
        </a>
    </div>

    <table class="w-full">
        <thead>
        <tr class="border-b bg-white/5 border-gray-700">
            <th class="px-6 py-3 text-blue-600 p-2 hover:text-blue-400 text-left">Actions</th>
            <th class="px-6 py-3 text-blue-600 p-2 hover:text-blue-400 text-right">Address</th>
            <th class="px-6 py-3 text-blue-600 p-2 hover:text-blue-400 text-right">Phone Number</th>
            <th class="px-6 py-3 text-blue-600 p-2 hover:text-blue-400 text-right">Name</th>
        </tr>
        </thead>
        <tbody >
        @foreach($customers as $customer)
            <tr wire:key="{{ $customer->id }}" class="border-b bg-white/5 border-gray-700 ">
                <td class="px-6 py-3">
                    <button class="text-gray-200 p-2 bg-red-600 hover:bg-red-900 rounded-sm"
                            wire:click="delete({{ $customer }})" wire:confirm="Are you sure you want to delete this customer?">
                        Delete
                    </button>
                    <a href="/customer/{{ $customer->id }}/edit" class="text-blue-600 p-2" wire:navigate>
                        Edit
                    </a>
                </td>
                <td class="px-6 py-3 text-gray-6000 text-right">{{ ($customer->address) }}</td>
                <td class="px-6 py-3 text-gray-6000 text-right">{{ $customer->phone }}</td>
                <td class="px-6 py-3 text-gray-6000 text-right">{{ $customer->name }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
