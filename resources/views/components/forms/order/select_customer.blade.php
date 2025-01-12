


<div>

    <div class="mb-3 grid grid-cols-7 items-center">
        <label for="mySelect" class="block mb-2 text-white">Select customer :</label> <!-- Added a label for accessibility -->
        <select id="mySelect" class="mb-2 col-start-2 p-2 w-full border rounded-md bg-gray-700 text-white" wire:model="customer">
            @if(isset($customer))
                <option value="{{$customer }}" >{{$customers->name}}</option>
            @endif
            @foreach($customers as $customer)
                <option value="{{$customer}}" >{{$customer->name}}</option>
            @endforeach
        </select>
{{--        @error('form.customer_id')--}}
{{--        <h3 class="text-red-600">{{ $message }}</h3>--}}
{{--        @enderror--}}
    </div>

</div>
