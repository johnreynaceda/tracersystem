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
        {{-- @forelse ($alumnis as $alumni)
            <div wire:loading.remove class="bg-white  rounded-2xl p-5 relative shadow-lg overflow-hidden">
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
                            <p class="truncate">Course: <span
                                    class="font-semibold">{{ $alumni->course ? $alumni->course : $alumni->short_course }}</span>
                            </p>
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
            <div wire:loading>

                <div class="w-full mb-3">
                    <div class=" px-4 w-full  py-6 lg:py-4  sm:p-6 sm:rounded-lg lg:rounded-lg">
                        <article aria-labelledby="question-title-81614">
                            <div>
                                <div class="flex space-x-3">
                                    <div class="flex-shrink-0">
                                        <div class="h-10 w-10 bg-gray-200 rounded-md  animate-pulse"></div>
                                    </div>
                                    <div class="min-w-0 flex-1">
                                        <p
                                            class="text-sm font-bold text-gray-200 bg-gray-200 animate-pulse rounded-md ">
                                            <a href="#" class="hover:underline">adsadsadaddsadssddasd</a>
                                        </p>
                                        <p class="text-sm mt-1 text-gray-200 bg-gray-200 animate-pulse rounded-md">
                                            <a href="#" class="hover:underline">
                                                <time datetime="2020-12-09T11:43:00">asdasdasdsadasdsadsad</time>
                                            </a>
                                        </p>
                                    </div>
                                    <div class="flex-shrink-0 self-center flex">
                                        <div class="relative inline-block text-left">
                                            <div>

                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div
                                class="mt-2 text-md font-semibold animate-pulse text-gray-200 bg-gray-200 rounded-md space-y-4">
                                <p>asdasdasdasdasdsadsadasdsad</p>

                            </div>
                            <div
                                class="mt-1 text-md font-semibold animate-pulse text-gray-200 bg-gray-200 rounded-md space-y-4">
                                <p>asdasdasdasdasdsadsadasdsad</p>

                            </div>

                            <div class="mt-4 flex justify-between space-x-8">
                                <div class="flex space-x-6">

                                    <span class="inline-flex items-center text-sm">
                                        <a href="" type="button"
                                            class="inline-flex space-x-1 text-main hover:text-gray-500">
                                            <!-- Heroicon name: solid/chat-alt -->

                                            </svg>
                                            <span
                                                class="font-semibold text-gray-200 bg-gray-200 animate-pulse rounded-md">sad</span>
                                            <span class="sr-only">replies</span>
                                        </a>
                                    </span>

                                </div>
                                <div class="flex text-sm ">
                                    <span
                                        class="inline-flex items-center text-sm text-main cursor-pointer hover:text-main">

                                    </span>
                                </div>
                            </div>
                        </article>
                        </li>
                    </div>

                </div>
            @empty

                <div class="col-span-4 w-full">
                    <div class="flex justify-center items-center">
                        <span class="text-xl text-white">No ALumni Record...</span>
                    </div>
                </div>
        @endforelse --}}

        @forelse ($alumnis as $alumni)
            <div wire:loading.remove class="bg-white  rounded-2xl p-5 relative shadow-lg overflow-hidden">
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
                            <p class="truncate">Course: <span
                                    class="font-semibold">{{ $alumni->course ? $alumni->course : $alumni->short_course }}</span>
                            </p>
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
        @empty <div class="col-span-4 w-full">
                <div class="flex justify-center items-center">
                    <span class="text-xl text-white">No ALumni Record...</span>
                </div>
            </div>
        @endforelse
    </div>
</div>
