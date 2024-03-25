<div>
    <div class="bg-white rounded-xl p-10">
        <div class="mb-5 font-bold uppercase text-2xl text-green-600">
            Edit Records
        </div>
        {{ $this->form }}
        <div class="mt-5">
            <x-button label="Save Records" icon="save" positive wire:click="saveUpdate" spinner="saveUpdate" />
        </div>
    </div>
</div>
