@extends('layouts.app')

@section('title', $boardingHouse->name)

@section('content')
    <div class="max-w-5xl mx-auto py-10 px-4">
        <div class="bg-gray-50 rounded-2xl shadow-md overflow-hidden transform hover:shadow-lg transition transform duration-500 ease-in-out">
            @if($boardingHouse->image)
                <img src="{{ asset('storage/' . $boardingHouse->image) }}"
                     alt="{{ $boardingHouse->name }}"
                     class="w-full h-96 object-cover">
            @endif

            <div class="p-6">
                <h1 class="text-4xl font-semibold text-gray-900 mb-4">
                    {{ $boardingHouse->name }}
                </h1>

                <div class="text-gray-600 mb-4">
                    <span class="inline-block mr-4">
                        <i class="fas fa-map-marker-alt mr-1 text-gray-500"></i>{{ $boardingHouse->city->name ?? '-' }}
                    </span>
                    <span class="inline-block">
                        <i class="fas fa-venus-mars mr-1 text-gray-500"></i>{{ $boardingHouse->category->name ?? '-' }}
                    </span>
                </div>

                <div class="text-gray-700 leading-relaxed mb-6">
                    <p><strong>Alamat:</strong> {{ $boardingHouse->address }}</p>
                    <p class="mt-2"><strong>Deskripsi:</strong></p>
                    <p>{{ $boardingHouse->description }}</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div class="bg-gray-100 p-4 rounded-md">
                        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Bonus / Fasilitas</h2>
                        <ul class="list-inside list-decimal ml-4">
                            @forelse($boardingHouse->bonuses as $bonus)
                                <li>{{ $bonus->name }}</li>
                            @empty
                                <li>Tidak ada bonus tersedia</li>
                            @endforelse
                        </ul>
                    </div>

                    <div class="bg-gray-100 p-4 rounded-md">
                        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Testimoni Penghuni</h2>
                        @forelse($boardingHouse->testimonials as $testi)
                            <div class="bg-gray-50 p-3 rounded-md shadow-inner mb-2">
                                <p class="italic">“{{ $testi->content }}”</p>
                                <small class="block text-right text-gray-500">— {{ $testi->author }}</small>
                            </div>
                        @empty
                            <p class="text-gray-600">Belum ada testimoni.</p>
                        @endforelse
                    </div>
                </div>

                <a href="{{ route('dashboard') }}"
                   class="inline-block bg-blue-600 text-gray-50 px-6 py-2 rounded-md hover:bg-blue-700 transition transform hover:translate-x-1">
                    &larr; Kembali ke Daftar Kos
                </a>
            </div>
        </div>
    </div>
@endsection
