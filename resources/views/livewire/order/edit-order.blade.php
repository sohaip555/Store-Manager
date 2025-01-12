





<div>

    <div >
        <x-forms.order.select_customer :$form/>
    </div>

    <div class="w-full">

        <x-forms.order.create_item :$items :$form/>

        <x-forms.order.button_add_item/>
        <x-forms.order.button_update/>

    </div>


</div>
