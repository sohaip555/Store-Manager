










<div>

    @foreach($form->items as $item)
        <div class="bg-white/5 grid grid-cols-9 rounded-md items-center mt-3">
            <button class="col-start-1 m-3 text-gray-200 p-2 bg-red-600 hover:bg-red-900 rounded-md"
                    wire:click="delete({{$loop->index}})" wire:confirm="Are you sure you want to delete this item?">
                remove
            </button>

            <div>
                <input
                    type="number"
                    wire:model="form.items.{{$loop->index}}.quantity"
                    class=" m-2 border rounded-md ⬛ bg-gray-700 ⬛ text-white"
                >


                @error('form.items.' . $loop->index . '.quantity')
                <h3 class="text-red-600">{{ $message }}</h3>
                @enderror

            </div>


            <label for="mySelect" class="-col-start-5 -col-end-3 mt-2 mb-2 ml-24 block text-white">select a product:</label>

            <div class="m-3 -col-start-3 -col-end-1">
                <select  id="mySelect" class="p-2  w-full border rounded-md bg-gray-700 text-white" wire:model="form.items.{{$loop->index}}.product_id">
                    @if(isset($form->product))
                        <option value="{{$form->product->id}}" >{{$form->product->name}}</option>
                    @endif
                    @foreach($form->products as $product)
                        <option value="{{$product->id}}" >{{$product->name}}</option>
                    @endforeach
                </select>
            </div>

        </div>
    @endforeach




</div>
