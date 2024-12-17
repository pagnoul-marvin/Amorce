<div>

    <x-page-title-and-description :title="__('texts.the_task')" :description="__('texts.see_and_modify_the_task')"
                                  :bold_part="$task->title"/>

    <livewire:navigations.go-back-nav :text="__('texts.go_back')" :href="route('home')"/>

    <section class="section space_up space task_show_section flex">

        <livewire:task-edit :$task/>

        <livewire:task-user-delete :$task/>

        <livewire:task-user-store :$task/>

    </section>

    <livewire:messages.success-message wire:key="task-update-success-message"/>

</div>
