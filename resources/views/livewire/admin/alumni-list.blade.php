<div x-data>
    <div class="mb-4 flex justify-end items-center">
        <x-button label="EXPORT TO EXCEL" positive class="font-bold" wire:click="exportReport" spinner="exportReport"
            right-icon="document-text" rounded />
    </div>
    {{ $this->table }}


    <x-modal wire:model.defer="view_modal" max-width="6xl">

        <x-card title="Alumni Information">
            <div class="p-10">
                <div class="grid grid-cols-3 gap-4">
                    <div>
                        <img src="{{ Storage::url($alumni_data->attachment ?? null) }}" class="w-full h-80"
                            alt="">
                    </div>
                    <div class="col-span-2 ">
                        <div class="df grid grid-cols-3 gap-5">
                            <div>
                                <span>Last Name</span>
                                <p class="font-bold uppercase">{{ $alumni_data->lastname ?? null }}</p>
                            </div>
                            <div>
                                <span>First Name</span>
                                <p class="font-bold uppercase">{{ $alumni_data->firstname ?? null }}</p>
                            </div>
                            <div>
                                <span>Middle Name</span>
                                <p class="font-bold uppercase">{{ $alumni_data->middlename ?? null }}</p>
                            </div>
                            <div>
                                <span>Gender</span>
                                <p class="font-bold uppercase">{{ $alumni_data->gender ?? null }}</p>
                            </div>
                            <div>
                                <span>Contact Number</span>
                                <p class="font-bold uppercase">{{ $alumni_data->contact_number ?? null }}</p>
                            </div>
                            <div>
                                <span>Batch</span>
                                <p class="font-bold uppercase">{{ $alumni_data->batch ?? null }}</p>
                            </div>
                            <div>
                                <span>3 Yeas Course</span>
                                <p class="font-bold uppercase">{{ $alumni_data->course ?? 'No Course' }}</p>
                            </div>
                            <div>
                                <span>Short Term Course</span>
                                <p class="font-bold uppercase">{{ $alumni_data->short_course ?? 'No Course' }}</p>
                            </div>
                            <div>
                                <span>Status</span>
                                <p class="font-bold uppercase">{{ $alumni_data->status ?? null }}</p>
                            </div>
                            <div>
                                <span>Civil Status</span>
                                <p class="font-bold uppercase">{{ $alumni_data->civil_status ?? null }}</p>
                            </div>
                            <div>
                                <span>Connected</span>
                                <p class="font-bold uppercase">{{ $alumni_data->connected ?? null }}</p>
                            </div>
                            <div>
                                <span>Nationality</span>
                                <p class="font-bold uppercase">{{ $alumni_data->nationality ?? null }}</p>
                            </div>
                            <div>
                                <span>Region</span>
                                <p class="font-bold uppercase">{{ $alumni_data->region ?? null }}</p>
                            </div>
                            <div>
                                <span>Province</span>
                                <p class="font-bold uppercase">{{ $alumni_data->province ?? null }}</p>
                            </div>
                            <div>
                                <span>City</span>
                                <p class="font-bold uppercase">{{ $alumni_data->city ?? null }}</p>
                            </div>
                            <div>
                                <span>Barangay</span>
                                <p class="font-bold uppercase">{{ $alumni_data->barangay ?? null }}</p>
                            </div>
                            <div>
                                <span>Street</span>
                                <p class="font-bold uppercase">{{ $alumni_data->street ?? null }}</p>
                            </div>
                            <div>
                                <span>Employer</span>
                                <p class="font-bold uppercase">{{ $alumni_data->employer ?? null }}</p>
                            </div>
                            <div>
                                <span>Date of Employment</span>
                                <p class="font-bold uppercase">{{ $alumni_data->doe ?? null }}</p>
                            </div>
                            <div>
                                <span>Salary</span>
                                <p class="font-bold uppercase">{{ $alumni_data->salary ?? null }}</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="p-10 hidden">
                <div x-ref="printContainer">
                    <div class="py-5">
                        <h1 class="text-3xl font-bold">Alumni Information</h1>
                    </div>
                    <div class="grid grid-cols-4 gap-4">
                        <div>
                            <img src="{{ Storage::url($alumni_data->attachment ?? null) }}" class="w-full h-40"
                                alt="">
                        </div>
                        <div class="col-span-3 ">
                            <div class="df grid grid-cols-3 gap-5">
                                <div>
                                    <span>Last Name</span>
                                    <p class="font-bold uppercase">{{ $alumni_data->lastname ?? null }}</p>
                                </div>
                                <div>
                                    <span>First Name</span>
                                    <p class="font-bold uppercase">{{ $alumni_data->firstname ?? null }}</p>
                                </div>
                                <div>
                                    <span>Middle Name</span>
                                    <p class="font-bold uppercase">{{ $alumni_data->middlename ?? null }}</p>
                                </div>
                                <div>
                                    <span>Gender</span>
                                    <p class="font-bold uppercase">{{ $alumni_data->gender ?? null }}</p>
                                </div>
                                <div>
                                    <span>Contact Number</span>
                                    <p class="font-bold uppercase">{{ $alumni_data->contact_number ?? null }}</p>
                                </div>
                                <div>
                                    <span>Batch</span>
                                    <p class="font-bold uppercase">{{ $alumni_data->batch ?? null }}</p>
                                </div>
                                <div>
                                    <span>3 Yeas Course</span>
                                    <p class="font-bold uppercase">{{ $alumni_data->course ?? 'No Course' }}</p>
                                </div>
                                <div>
                                    <span>Short Term Course</span>
                                    <p class="font-bold uppercase">{{ $alumni_data->short_course ?? 'No Course' }}</p>
                                </div>
                                <div>
                                    <span>Status</span>
                                    <p class="font-bold uppercase">{{ $alumni_data->status ?? null }}</p>
                                </div>
                                <div>
                                    <span>Civil Status</span>
                                    <p class="font-bold uppercase">{{ $alumni_data->civil_status ?? null }}</p>
                                </div>
                                <div>
                                    <span>Connected</span>
                                    <p class="font-bold uppercase">{{ $alumni_data->connected ?? null }}</p>
                                </div>
                                <div>
                                    <span>Nationality</span>
                                    <p class="font-bold uppercase">{{ $alumni_data->nationality ?? null }}</p>
                                </div>
                                <div>
                                    <span>Region</span>
                                    <p class="font-bold uppercase">{{ $alumni_data->region ?? null }}</p>
                                </div>
                                <div>
                                    <span>Province</span>
                                    <p class="font-bold uppercase">{{ $alumni_data->province ?? null }}</p>
                                </div>
                                <div>
                                    <span>City</span>
                                    <p class="font-bold uppercase">{{ $alumni_data->city ?? null }}</p>
                                </div>
                                <div>
                                    <span>Barangay</span>
                                    <p class="font-bold uppercase">{{ $alumni_data->barangay ?? null }}</p>
                                </div>
                                <div>
                                    <span>Street</span>
                                    <p class="font-bold uppercase">{{ $alumni_data->street ?? null }}</p>
                                </div>
                                <div>
                                    <span>Employer</span>
                                    <p class="font-bold uppercase">{{ $alumni_data->employer ?? null }}</p>
                                </div>
                                <div>
                                    <span>Date of Employment</span>
                                    <p class="font-bold uppercase">{{ $alumni_data->doe ?? null }}</p>
                                </div>
                                <div>
                                    <span>Salary</span>
                                    <p class="font-bold uppercase">{{ $alumni_data->salary ?? null }}</p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>


            <x-slot name="footer">

                <div class="flex justify-end gap-x-2">
                    <x-button dark rounded label="PRINT" @click="printOut($refs.printContainer.outerHTML);"
                        class="px-6 font-bold" sm right-icon="printer" x-on:click="close" />
                    <x-button flat label="Cancel" x-on:click="close" />


                </div>

            </x-slot>

        </x-card>

    </x-modal>
</div>
