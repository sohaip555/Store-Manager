










<div>

        <div class="bg-white/5 grid grid-cols-9 rounded-md items-center mt-3">

            <div>
                <input
                    type="number"
                    wire:model="quantityOfProduct"
                    class="m-2 border rounded-md bg-gray-700 text-white"
                >


            </div>

            <label for="mySelect" class="-col-start-5 -col-end-3 mt-2 mb-2 ml-24 block text-white">select a product:</label>

            <div class="m-3 -col-start-3 -col-end-1">
                <select id="mySelect" class="p-2 w-full border rounded-md bg-gray-700 text-white" wire:model="product_Selected">
                    @foreach($products as $product)
                        <option value="{{$product->id}}">{{$product->name}}</option>
                    @endforeach
                </select>
            </div>

        </div>

</div>
