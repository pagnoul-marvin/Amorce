<section class="section space_up space fund_details_section flex">

    <h2 class="section_title hel_bold">{{$form->name}} <small class="small">({{number_format($fund->transactions->sum('amount')/100, 2, ',', ' ')}}&euro;)</small></h2>

    <form wire:submit="save" class="flex fund_details_section_form">

        <x-layout.input-label-container id="name" class="fund_details_section_form_label_and_input_container"
                                        :label="__('texts.name')">

            <input class="input" type="text" id="name" wire:model.live="form.name" required>

            @error('form.name')
            <x-input-error :messages="$errors->get('form.name')"/>
            @enderror

        </x-layout.input-label-container>
        <x-layout.input-label-container id="pourcentage" class="fund_details_section_form_label_and_input_container"
                                        :label="__('texts.pourcentage')">

            <input class="input" type="number" id="pourcentage" min="0" wire:model.blur="form.pourcentage" required>

            <svg class="input_icon" width="18" height="16" viewBox="0 0 18 16" xmlns="http://www.w3.org/2000/svg">
                <path d="M10.0547 11.6504C10.0547 10.6413 10.4095 9.7819 11.1191 9.07227C11.8288 8.36914 12.6849 8.01758 13.6875 8.01758C14.6901 8.01758 15.5462 8.3724 16.2559 9.08203C16.9655 9.79167 17.3203 10.6478 17.3203 11.6504C17.3203 12.653 16.9655 13.5091 16.2559 14.2188C15.5462 14.9284 14.6901 15.2832 13.6875 15.2832C12.6849 15.2832 11.8288 14.9284 11.1191 14.2188C10.4095 13.5091 10.0547 12.653 10.0547 11.6504ZM1.62695 7.10938C0.917318 6.39974 0.5625 5.54362 0.5625 4.54102C0.5625 3.53841 0.917318 2.68229 1.62695 1.97266C2.33659 1.26302 3.19271 0.908203 4.19531 0.908203C5.19792 0.908203 6.05404 1.26302 6.76367 1.97266C7.47331 2.68229 7.82812 3.53841 7.82812 4.54102C7.82812 5.54362 7.47331 6.39974 6.76367 7.10938C6.06055 7.81901 5.20443 8.17383 4.19531 8.17383C3.19271 8.17383 2.33659 7.81901 1.62695 7.10938ZM5.72852 15.3711H4.21484L12.1348 0.839844H13.6191L5.72852 15.3711ZM12.5938 12.7441C12.8932 13.0501 13.2578 13.2031 13.6875 13.2031C14.1172 13.2031 14.4818 13.0534 14.7812 12.7539C15.0872 12.4479 15.2402 12.0801 15.2402 11.6504C15.2402 11.2207 15.0872 10.8561 14.7812 10.5566C14.4818 10.2507 14.1172 10.0977 13.6875 10.0977C13.2578 10.0977 12.89 10.2507 12.584 10.5566C12.2845 10.8561 12.1348 11.2207 12.1348 11.6504C12.1348 12.0801 12.2878 12.4447 12.5938 12.7441ZM3.10156 5.63477C3.40104 5.94076 3.76562 6.09375 4.19531 6.09375C4.625 6.09375 4.98958 5.94401 5.28906 5.64453C5.59505 5.33854 5.74805 4.9707 5.74805 4.54102C5.74805 4.11133 5.59505 3.74674 5.28906 3.44727C4.98958 3.14128 4.625 2.98828 4.19531 2.98828C3.76562 2.98828 3.39779 3.14128 3.0918 3.44727C2.79232 3.74674 2.64258 4.11133 2.64258 4.54102C2.64258 4.9707 2.79557 5.33529 3.10156 5.63477Z"/>
            </svg>

            @error('form.pourcentage')
            <x-input-error :messages="$errors->get('form.pourcentage')"/>
            @enderror

        </x-layout.input-label-container>
        <x-layout.input-label-container id="description" class="fund_details_section_form_label_and_input_container"
                                        :label="__('texts.description')">

            <textarea class="input" id="description" rows="5" wire:model.blur="form.description" required></textarea>

            @error('form.description')
            <x-input-error :messages="$errors->get('form.description')"/>
            @enderror

        </x-layout.input-label-container>
        <x-form.submit-button :text="__('texts.modify')"
                              div_class="fund_details_section_form_label_and_input_container"
                              btn_class="fund_details_section_form_submit_btn submit_btn button"/>

    </form>

</section>
