<x-alumni-layout>
    <div class="">

        <section>
            <div class=" w-full">
                <div class=" mx-auto text-center lg:p-10">
                    <div>
                        <p class="mt-8  text-5xl font-black tracking-tighter text-white">
                            GALLERY
                        </p>

                    </div>
                    <div class="flex flex-col items-center justify-center gap-3 mt-20 lg:flex-row">
                        <div class="grid grid-cols-5">
                            @foreach (\App\Models\Gallery::all() as $item)
                                <img src="{{ Storage::url($item->gallery_path) }}" class=" h-full border object-cover"
                                    alt="">
                            @endforeach
                        </div>

                    </div>
                </div>


            </div>
        </section>


    </div>
</x-alumni-layout>
