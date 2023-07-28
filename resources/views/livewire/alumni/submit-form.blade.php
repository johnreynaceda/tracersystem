<div>
    <div class=" mx-auto">
        <div class="bg-white relative bg-opacity-80 rounded-lg p-10">
            <div>
                {{ $this->form }}
            </div>
            {{-- <div class="grid grid-cols-3 gap-5">
                <x-input label="Last Name" wire:model="lastname" placeholder="" />
                <x-input label="First Name" wire:model="firstname" placeholder="" />
                <x-input label="Middle Name" wire:model="middlename" placeholder="" />
                <x-native-select label="Gender" wire:model="gender">
                    <option selected hidden>Select An Option</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </x-native-select>
                <x-input label="Batch" wire:model="batch" placeholder="" />
                <x-native-select label="Course Graduated" wire:model="course">
                    <option selected hidden>Select An Option</option>
                    <option>Male</option>
                    <option>Female</option>
                </x-native-select>
                <x-input label="Contact Number" wire:model="contact_number" placeholder="" />
                <x-native-select label="Employment Status" wire:model="status">
                    <option selected hidden>Select An Option</option>
                    <option value="Unemployed">Unemployed</option>
                    <option value="Employed">Employed</option>
                </x-native-select>
            </div>
            <div class="grid grid-cols-3 gap-5 mt-5">
                <x-native-select label="Civil Status" wire:model="civil">
                    <option selected hidden>Select An Option</option>
                    <option value="Single">Single</option>
                    <option value="Married">Married</option>
                    <option value="Separated">Separated</option>
                    <option value="Divorced">Divorced</option>
                    <option value="Widowed">Widowed</option>
                </x-native-select>
                <x-input label="Currently Connected to" wire:model="connected" placeholder="" />
                <x-input label="Nationality" wire:model="nationality" placeholder="" />
            </div>
            @if ($status == 'Employed')
                <div class="grid grid-cols-3 gap-5 mt-5 p-3 border border-gray-400 rounded-lg">
                    <div class="col-span-3">
                        <h1 class="font-bold text-lg text-gray-600">Employed Status</h1>
                    </div>
                    <x-input label="Employer Name" wire:model="employer" placeholder="" />
                    <x-datetime-picker label="Date of Employment" without-time wire:model.defer="doe" />
                    <x-input label="Salary/Income" wire:model="salary" type="number" placeholder="" />
                </div>
            @endif
            <div class="grid grid-cols-3 gap-5 mt-5 p-3 border border-gray-400 rounded-lg">
                <div class="col-span-3">
                    <h1 class="font-bold text-lg text-gray-600">Permanent Address</h1>
                </div>
                <x-input label="Region" wire:model="region" placeholder="" />
                <x-input label="Province" wire:model="province" placeholder="" />
                <x-input label="City" wire:model="city" placeholder="" />
                <x-input label="Barangay" wire:model="barangay" placeholder="" />
                <x-input label="Street" wire:model="street" placeholder="" />
            </div> --}}
            <div class="mt-5 flex items-center justify-between space-x-3">
                <x-button label="Submit Form" wire:click="submitForm" spinner="submitForm" class="px-4 uppercase font-bold"
                    right-icon="arrow-right" lg rounded positive />
                <x-button label="CLOSE" href="{{ route('alumni.dashboard') }}" class="px-4 uppercase font-bold" outline
                    lg rounded negative />
            </div>
        </div>
    </div>
</div>
