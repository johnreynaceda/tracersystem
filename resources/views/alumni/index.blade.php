<x-alumni-layout>
    <div class="">

        <section>
            <div class=" w-full">
                <div class=" mx-auto text-center lg:p-10">
                    <div>
                        <p class="mt-8  text-5xl font-black tracking-tighter text-white">
                            WELCOME TO KABULING LEARNING CENTER INC. ALUMNI TRACER SYSTEM
                        </p>
                        <p class="max-w-xl mx-auto mt-4 text-lg tracking-tight text-gray-200">
                            An alumni tracer is a system or program designed to track and maintain contact with former
                            students or graduates of an educational institution.
                        </p>
                    </div>
                    <div class="flex flex-col items-center justify-center gap-3 mt-20 lg:flex-row">
                        @if (auth()->user()->is_submitted == 0)
                            <a href="{{ route('alumni.alumni-form') }}"
                                class="items-center justify-center w-full px-6 py-2.5 uppercase  text-center text-white duration-200 bg-transparent border-2 border-white rounded-full inline-flex text-lg hover:bg-transparent hover:bg-white hover:text-green-600 focus:outline-none lg:w-auto focus-visible:outline-black  focus-visible:ring-black">
                                GO TO ALUMNUS/ALUMNAE FORM
                            </a>
                        @endif

                    </div>
                </div>

                <div>
                    <div class="">
                        <h1 class="px-4 text-3xl font-bold text-white mx-auto  sm:px-6  lg:px-8">UPCOMING EVENTS</h1>
                        <div class="px-4 py-10 mx-auto max-w-7xl sm:px-6 lg:py-5 lg:px-8 space-y-3">
                            @forelse (\App\Models\Event::all() as $item)
                                <div class="flex w-full ">
                                    <div class="rounded-l-3xl relative overflow-hidden">
                                        <div class="h-64 w-64 rounded-l-3xl ">
                                            <img src="{{ Storage::url($item->image_path) }}" class="h-full object-cover"
                                                alt="">
                                        </div>
                                    </div>
                                    <div class="flex-1 border-2 rounded-r-3xl h-64 bg-opacity-50 p-10">
                                        <center>
                                            <h1 class="text-3xl text-white font-bold uppercase">{{ $item->title }}</h1>
                                            <span
                                                class="text-gray-100">({{ \Carbon\Carbon::parse($item->schedule)->format('F d, Y') }})</span>
                                        </center>
                                        <p
                                            class="mt-3 h-20 relative overflow-x-hidden overflow-y-hi w-full   text-white text-justify">
                                            {{ $item->description }}</p>

                                    </div>
                                </div>
                            @empty
                                <div class="flex w-full ">
                                    <h1 class="text-white">No Events...😔</h1>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </section>


    </div>
</x-alumni-layout>
