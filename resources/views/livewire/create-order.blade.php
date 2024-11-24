





<div>

    <div class="">

        <div class="mb-3 grid grid-cols-7 items-center">
            <label for="mySelect" class="block mb-2 text-white">Select customer :</label> <!-- Added a label for accessibility -->
            <select id="mySelect" class="mb-2 col-start-2 p-2 w-full border rounded-md bg-gray-700 text-white" wire:model="form.customer_id">
                @if(isset($form->customer))
                    <option value="{{$form->customer->id }}" >{{$form->customers->name}}</option>
                @endif
                @foreach($form->customers as $customer)
                    <option value="{{$customer->id}}" >{{$customer->name}}</option>
                @endforeach
            </select>
        </div>

    </div>



    <div class="w-full">



            @foreach($form->items as $item)
                <div class="bg-white/5 grid grid-cols-9 rounded-md items-center mt-3">
                    <button class="col-start-1 m-3 text-gray-200 p-2 bg-red-600 hover:bg-red-900 rounded-md"
                            wire:click="delete()" wire:confirm="Are you sure you want to delete this customer?">
                        remove
                    </button>

                    <input
                        type="number"
                        wire:model="form.items.{{$loop->index}}.quantity"
                        class=" m-2 border rounded-md ⬛ bg-gray-700 ⬛ text-white"
                    >

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


            <button wire:click="addItem()" class="mt-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add Item</button>
            <button wire:click="save" class="mt-4 bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Create Order</button>







    </div>


</div>
