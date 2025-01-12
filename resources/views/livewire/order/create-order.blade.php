





<div>

    <div >
        <x-forms.order.select_customer :$customer_id :$customers/>
    </div>

    <div class="w-full">

        <x-forms.order.create_item :$product_id :$products/>

        @error('quantityOfProduct') <span class="text-red-600"> {{ $message }}</span> @enderror
        @error('customer_Selected') <span class="text-red-600"> {{ $message }}</span> @enderror
        @error('product_Selected') <span class="text-red-600"> {{ $message }}</span> @enderror


        <div class="flex justify-between">
            <x-forms.order.show_price :$price/>

            <div class="flex space-x-2">
                <x-forms.order.button_create />
                <x-forms.order.button_add_item />
            </div>

        </div>

    </div>

    <div class="w-full">
        @foreach($itemsOfOrder as $item)

            <div class="bg-white/5 flex rounded-md items-center mt-4">
                <x-forms.order.show_item :$item/>


            </div>

        @endforeach
    </div>


</div>
