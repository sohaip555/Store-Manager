<div>
    <form wire:submit="save">
        @csrf

        <div class="flex justify-between">
            <div class="grid grid-rows-4-4">
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
                    <h1 class="block">Item code</h1>
                    <input
                        type="text"
                        class="p-2 w-full border rounded-md ⬛ bg-gray-700 ⬛ text-white"
                        {{--                wire:model="form."--}}
                    />
                </div>

                <div class="mb-3">
                    <label for="mySelect" class="block mb-2 text-white">Select a brand:</label> <!-- Added a label for accessibility -->
                    <select id="mySelect" class="p-2 w-full border rounded-md bg-gray-700 text-white" wire:model="form.brand">
                        @foreach($form->brands as $brand)
                            <option value="{{$brand}}">{{$brand->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <h1 class="block">Price</h1>
                    <input
                        type="text"
                        class="p-2 w-full border rounded-md ⬛ bg-gray-700 ⬛ text-white"
                        wire:model="form.price"
                    />
                </div>
            </div>


            <div>
                <div>
                    @error('form.price')
                    <h3 class="⬛ text-red-600"> {{ $message }} <h3>
                    @enderror
                </div>

                <div class="mb-3">
                    <h1 class="block">quantity</h1>
                    <input
                        type="text"
                        class="p-2 w-full border rounded-md ⬛ bg-gray-700 ⬛ text-white"
                        wire:model="form.quantity"
                    />
                </div>

                <div>
                    @error('form.quantity')
                    <h3 class="⬛ text-red-600"> {{ $message }} <h3>
                    @enderror
                </div>

                <div class="mb-3">
                    <h1 class="block">url</h1>
                    <input
                        type="text"
                        class="p-2 w-full border rounded-md ⬛ bg-gray-700 ⬛ text-white"
                        wire:model="form.url"
                    />
                </div>

                <div>
                    @error('form.url')
                    <h3 class="⬛ text-red-600"> {{ $message }} <h3>
                    @enderror
                </div>

                <div class="mb-3">
                    <h1 class="block">status</h1>
                    <input
                        type="text"
                        class="p-2 w-full border rounded-md ⬛ bg-gray-700 ⬛ text-white"
                        wire:model="form.status"
                    />
                </div>

                <div>
                    @error('form.status')
                    <h3 class="⬛ text-red-600"> {{ $message }} <h3>
                    @enderror
                </div>


                <div class="mb-3">
                    <h1 class="block">description</h1>
                    <textarea
                        class="p-2 w-full border rounded-md ⬛ bg-gray-700 ⬛ text-white"
                        wire:model="form.description"
                    ></textarea>
                </div>

                <div>
                    @error('form.description')
                    <h3 class="⬛ text-red-600"> {{ $message }} <h3>
                    @enderror
                </div>
            </div>

        </div>

    </form>

</div>
