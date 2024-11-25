<div>

    <form wire:submit="save">
        @csrf
        <div class="mb-3">
            <h1 class="block">Name</h1>
            <input
                type="text"
                class="p-2 w-full border rounded-md ⬛ bg-gray-700 ⬛ text-white"
                wire:model="form.name"
            />
        </div>

        <div>
            @error('form.name')
            <h3 class="⬛ text-red-600"> {{ $message }} <h3>
            @enderror
        </div>

        <div class="mb-3">
            <h1 class="block">Email</h1>
            <input
                type="text"
                class="p-2 w-full border rounded-md ⬛ bg-gray-700 ⬛ text-white"
                wire:model="form.email"
            />
        </div>
        <div>
            @error('form.email')
            <h3 class="⬛ text-red-600"> {{ $message }} <h3>
            @enderror
        </div>
        <div class="mb-3">
            <h1 class="block">Phone</h1>
            <input
                type="text"
                class="p-2 w-full border rounded-md ⬛ bg-gray-700 ⬛ text-white"
                wire:model="form.phone"
            />
        </div>

        <div>
            @error('form.phone')
            <h3 class="⬛ text-red-600"> {{ $message }} <h3>
            @enderror
        </div>

        <div class="mb-3">
            <h1 class="block">Address</h1>
            <input
                type="text"
                class="p-2 w-full border rounded-md ⬛ bg-gray-700 ⬛ text-white"
                wire:model="form.address"
            />
        </div>

        <div>
            @error('form.address')
            <h3 class="⬛ text-red-600"> {{ $message }} <h3>
            @enderror
        </div>


    </form>

</div>
