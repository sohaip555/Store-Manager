





<div>

    <div >
        <x-forms.order.select_customer :$customer_id :$customers/>
    </div>

    <div class="w-full">

        <x-forms.order.select_item :$product_id :$products/>

        @error('quantityOfProduct') <span class="text-red-600"> {{ $message }}</span> @enderror
        @error('customer_id') <span class="text-red-600"> {{ $message }}</span> @enderror
        @error('product_id') <span class="text-red-600"> {{ $message }}</span> @enderror


        <div class="flex justify-between">
            <x-order.show_price :$price/>

            <div class="flex space-x-2">
                <x-order.button_create />
                <x-order.button_add_item />
            </div>

        </div>

    </div>

    <div class="w-full">
        @foreach($itemsOfOrder as $item)

            <div class="bg-white/5 flex rounded-md items-center justify-between mt-4">
                <x-order.show_item :$item/>


                <div class="">
                    <x-order.button_edit :index="$loop->index"/>
                    <x-order.button_remove :index="$loop->index"/>
                </div>
            </div>

        @endforeach
    </div>


</div>
