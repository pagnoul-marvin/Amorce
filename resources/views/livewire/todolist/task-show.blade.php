<div>

    <x-page-title-and-description :title="__('texts.the_task')" :description="__('texts.see_and_modify_the_task')"
                                  :bold_part="$task->title"/>

    <livewire:navigations.go-back-nav :text="__('texts.go_back')" :href="route('home')"/>

    <section class="section space_up space task_show_section flex">

        <livewire:todolist.task-edit :$task/>

        <livewire:todolist.task-user-delete :$task/>

        @if($task->user_id === Auth::id())

            <livewire:todolist.task-user-store :$task/>

        @endif

    </section>

    <livewire:messages.success-message wire:key="task-update-success-message"/>

</div>
