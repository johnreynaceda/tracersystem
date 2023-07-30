<div>
    <div class="mb-3 flex justify-end">
        <x-button label="New Event" right-icon="plus-circle" wire:click="$set('add_modal', true)" positive class="font-bold"
            rounded />
    </div>
    <div>
        {{ $this->table }}
    </div>

    <x-modal wire:model.defer="add_modal" max-width="4xl">
        <x-card>
            <div>
                {{ $this->form }}
            </div>

            <x-slot name="footer">
                <div class="flex justify-end gap-x-4">
                    <x-button flat label="Cancel" x-on:click="close" />
                    <x-button positive label="Save Event" wire:click="saveEvent" spinner="saveEvent" rounded
                        right-icon="save" class="font-bold" />
                </div>
            </x-slot>
        </x-card>
    </x-modal>
</div>
