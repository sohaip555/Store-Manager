<div>
    <div class="bg-white/5 grid grid-cols-9 rounded-md items-center mt-3">
        <button class="col-start-1 m-3 text-gray-200 p-2 bg-red-600 hover:bg-red-900 rounded-md"
                wire:click="delete()" wire:confirm="Are you sure you want to delete this customer?">
            Remove
        </button>

        <input
            type="number"
            wire:model.live="count"
            class=" m-2 border rounded-md ⬛ bg-gray-700 ⬛ text-white"

        >

        <label for="mySelect" class="-col-start-4 -col-end-3 mt-2 block mb-2 text-white">Select a brand:</label> <!-- Added a label for accessibility -->

        <div class="m-3 -col-start-3 -col-end-1">
            <select  id="mySelect" class="p-2  w-full border rounded-md bg-gray-700 text-white" wire:model.live="product_id">
                @if(isset($form->product))
                    <option value="{{$form->product->id}}" >{{$form->product->name}}</option>
                @endif
                @foreach($form->products as $product)
                    <option value="{{$product->id}}" >{{$product->name}}</option>
                @endforeach
            </select>
        </div>

    </div>
</div>
