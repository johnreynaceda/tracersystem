@section('title', 'Home')
<x-admin-layout>
    <div>
        <div class="grid grid-cols-4 gap-5">
            <div class="bg-white p-5 px-8 rounded-lg relative overflow-hidden border border-blue-100">
                <h1 class="text-3xl">{{ \App\Models\AlumniInformation::count() }}</h1>
                <h1 class="text-lg font-semibold text-gray-700">Alumni</h1>
                <div class="absolute -bottom-5 right-0">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-20  fill-blue-100">
                        <path
                            d="M2 22C2 17.5817 5.58172 14 10 14C14.4183 14 18 17.5817 18 22H16C16 18.6863 13.3137 16 10 16C6.68629 16 4 18.6863 4 22H2ZM10 13C6.685 13 4 10.315 4 7C4 3.685 6.685 1 10 1C13.315 1 16 3.685 16 7C16 10.315 13.315 13 10 13ZM10 11C12.21 11 14 9.21 14 7C14 4.79 12.21 3 10 3C7.79 3 6 4.79 6 7C6 9.21 7.79 11 10 11ZM18.2837 14.7028C21.0644 15.9561 23 18.752 23 22H21C21 19.564 19.5483 17.4671 17.4628 16.5271L18.2837 14.7028ZM17.5962 3.41321C19.5944 4.23703 21 6.20361 21 8.5C21 11.3702 18.8042 13.7252 16 13.9776V11.9646C17.6967 11.7222 19 10.264 19 8.5C19 7.11935 18.2016 5.92603 17.041 5.35635L17.5962 3.41321Z">
                        </path>
                    </svg>
                </div>
            </div>
            <div class="bg-white p-5 px-8 rounded-lg relative overflow-hidden border border-green-100">
                <h1 class="text-3xl">{{ \App\Models\Gallery::count() }}</h1>
                <h1 class="text-lg font-semibold text-gray-700">Gallery </h1>
                <div class="absolute -bottom-5 right-0">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-20  fill-green-100">
                        <path
                            d="M17.409 19C16.633 16.6012 15.1323 15.1147 13.1434 13.3979C15.0238 11.8971 17.4071 11 20 11V3H21.0082C21.556 3 22 3.44495 22 3.9934V20.0066C22 20.5552 21.5447 21 21.0082 21H2.9918C2.44405 21 2 20.5551 2 20.0066V3.9934C2 3.44476 2.45531 3 2.9918 3H6V1H8V5H4V12C9.22015 12 13.6618 14.4616 15.3127 19H17.409ZM18 1V5H10V3H16V1H18ZM16.5 10C15.6716 10 15 9.32843 15 8.5C15 7.67157 15.6716 7 16.5 7C17.3284 7 18 7.67157 18 8.5C18 9.32843 17.3284 10 16.5 10Z">
                        </path>
                    </svg>
                </div>
            </div>
            <div class="bg-white p-5 px-8 rounded-lg relative overflow-hidden border border-red-100">
                <h1 class="text-3xl">{{ \App\Models\Event::count() }}</h1>
                <h1 class="text-lg font-semibold text-gray-700">Events </h1>
                <div class="absolute -bottom-5 right-0">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-20  fill-red-100">
                        <path
                            d="M17 3H21C21.5523 3 22 3.44772 22 4V20C22 20.5523 21.5523 21 21 21H3C2.44772 21 2 20.5523 2 20V4C2 3.44772 2.44772 3 3 3H7V1H9V3H15V1H17V3ZM4 9V19H20V9H4ZM6 11H8V13H6V11ZM6 15H8V17H6V15ZM10 11H18V13H10V11ZM10 15H15V17H10V15Z">
                        </path>
                    </svg>
                </div>
            </div>
            <div class="bg-white p-5 px-8 rounded-lg relative overflow-hidden border border-yellow-100">
                <h1 class="text-3xl">{{ \App\Models\User::count() }}</h1>
                <h1 class="text-lg font-semibold text-gray-700">Users </h1>
                <div class="absolute -bottom-5 right-0">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-20  fill-yellow-100">
                        <path
                            d="M14 14.252V16.3414C13.3744 16.1203 12.7013 16 12 16C8.68629 16 6 18.6863 6 22H4C4 17.5817 7.58172 14 12 14C12.6906 14 13.3608 14.0875 14 14.252ZM12 13C8.685 13 6 10.315 6 7C6 3.685 8.685 1 12 1C15.315 1 18 3.685 18 7C18 10.315 15.315 13 12 13ZM12 11C14.21 11 16 9.21 16 7C16 4.79 14.21 3 12 3C9.79 3 8 4.79 8 7C8 9.21 9.79 11 12 11ZM17.7929 19.9142L21.3284 16.3787L22.7426 17.7929L17.7929 22.7426L14.2574 19.2071L15.6716 17.7929L17.7929 19.9142Z">
                        </path>
                    </svg>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
