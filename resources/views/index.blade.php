@extends("app")

@section("title", "index")

@section("content")

    <style>
        @keyframes slideInFromLeft {
            0% {
                transform: translateX(-100%);
            }
            100% {
                transform: translateX(0);
            }
        }

        #halloweenBanner {
            animation: 1s ease-out 0s 1 slideInFromLeft;
        }
    </style>

    <div id="halloweenBanner" class="bg-blue-800 text-white text-center py-3">
        <p class="text-lg font-semibold">Free shipping on orders over €50 - 24/7 Customer Service</p>
    </div>


    <section class="py-12 bg-gray-100">
        <div class="container mx-auto px-4">

            <div class="text-center mb-8">
                <h2 class="text-3xl font-extrabold text-gray-800">Featured Products</h2>
                <p class="text-md text-gray-600">Check out our best-selling products</p>
            </div>


            <div class="grid grid-cols-1 sm:grid-cols-3 gap-10">
                @php $count = 0; @endphp
                @foreach ($products as $product)
                    @if ($count < 3)
                        <div class="bg-white rounded-lg overflow-hidden shadow-sm hover:shadow-md transition-shadow duration-300 ease-in-out flex flex-col justify-between">
                            <img class="mx-auto h-48 w-auto p-2" src="{{ $product->image }}" alt="{{ $product->name }}">
                            <div class="flex flex-col p-6 space-y-2">
                                <h5 class="text-lg font-medium text-gray-800">{{ $product->name }}</h5>
                                <p class="text-xl font-semibold text-gray-800">€ {{ $product->price }}</p>
                                <a href="{{ $product->url }}" class="mt-auto bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded text-center transition-colors duration-200">Click For More</a>
                            </div>
                        </div>
                        @php $count++; @endphp
                    @endif
                @endforeach
            </div>
        </div>
    </section>


    </div>

@endsection
