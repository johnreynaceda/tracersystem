<div x-animate>
    <section>
        <div class=" w-full">
            <div class=" mx-auto text-center lg:p-10">
                <div>
                    <p class="mt-8  text-5xl font-black tracking-tighter text-white">
                        ALUMNUST / ALUMNAE LIST
                    </p>
                </div>


            </div>
            <div class="flex">
                <div class="bg-white h-14 flex-1 rounded-2xl w-full flex items-center px-5 space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-6 w-6 fill-gray-400">
                        <path
                            d="M11 2C15.968 2 20 6.032 20 11C20 15.968 15.968 20 11 20C6.032 20 2 15.968 2 11C2 6.032 6.032 2 11 2ZM11 18C14.8675 18 18 14.8675 18 11C18 7.1325 14.8675 4 11 4C7.1325 4 4 7.1325 4 11C4 14.8675 7.1325 18 11 18ZM19.4853 18.0711L22.3137 20.8995L20.8995 22.3137L18.0711 19.4853L19.4853 18.0711Z">
                        </path>
                    </svg>
                    <div class="w-full">
                        <input type="text" wire:model="search"
                            class="h-14 w-full  border-0 outline-none  focus:outline-none focus:border-0 focus:ring-0 text-xl text-gray-500"
                            placeholder="Filter name, courses, etc.">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="mt-10 -mx-56 grid grid-cols-4 gap-5">
        @forelse ($alumnis as $alumni)
            <div class="bg-white  rounded-2xl p-5 relative shadow-lg overflow-hidden">
                <img src="{{ asset('images/seclogo.png') }}" class="absolute -bottom-20 left-0 opacity-5"
                    alt="">
                <div class="flex relative space-x-4 items-start">
                    <img src="{{ Storage::url($alumni->attachment) }}" alt=""
                        class="h-24 w-24 object-cover border-2 border-gray-400 rounded-2xl">
                    <div class="flex-1 relative overflow-hidden">
                        <center class="border-b border-blue-700">
                            <h1 class="text-xl font-bold uppercase text-gray-900">
                                {{ $alumni->firstname . ' ' . $alumni->lastname }}
                            </h1>
                        </center>
                        <div class="mt-2">
                            <p class="truncate">Email: <span class="font-semibold">{{ $alumni->user->email }}</span></p>
                            <p class="truncate">Course: <span class="font-semibold">BS INFORMATION TECHNOLOGY</span></p>
                            <p class="truncate">Batch: <span class="font-semibold">{{ $alumni->batch }}</span></p>
                            <p class="truncate">Currently Working in/as: </p>
                            @if ($alumni->status == 'Employed')
                                {{ $alumni->employer }}
                            @else
                                {{ $alumni->status }}
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-4">
                <div class="bg-white  rounded-2xl p-5 relative shadow-lg overflow-hidden">
                    <div class="flex relative space-x-4 items-start">
                        <div class="flex-1 relative overflow-hidden">
                            <center class="border-b border-blue-700">
                                <h1 class="text-xl font-bold uppercase text-gray-900">
                                    No Alumni Found
                                </h1>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
        @endforelse
    </div>
</div>
