











<div class="m-auto w-1/2 mb-4">
    <h3 class="text-lg text-white mb-3">Edit Customer</h3>

     <x-forms.customer />

    <div class="mb-3 flex items-center">

        <button
            class="text-gray-200 p-2 bg-indigo-700 mt-6 rounded-sm hover:bg-indigo-500"
            type="submit"
            wire:click="save()"
        >
            update
        </button>

    </div>

</div>
