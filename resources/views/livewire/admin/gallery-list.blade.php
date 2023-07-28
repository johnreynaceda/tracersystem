<div>
    <div class="mb-3 justify-end flex">
        <x-button label="New Gallery" right-icon="plus-circle" wire:click="$set('add_modal', true)" positive rounded
            class="font-bold" />
    </div>
    <div>
        {{-- //table --}}
    </div>
    <x-modal wire:model.defer="add_modal" max-width="6xl">
        <x-card title="Upload Gallery">
            {{-- <div>{{ $this->form }}</div> --}}

            <x-slot name="footer">
                <div class="flex justify-end gap-x-4">
                    <x-button flat label="Cancel" x-on:click="close" />
                    <x-button class="font-bold" rounded right-icon="save" positive label="Upload Images"
                        wire:click="uploadImage" spinner="uploadImage" />
                </div>
            </x-slot>
        </x-card>
    </x-modal>
</div>
