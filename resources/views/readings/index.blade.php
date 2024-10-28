<!-- resources/views/readings/index.blade.php -->

<x-app-layout>
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">История показаний</h1>

        <a href="{{ route('readings.create') }}" class="inline-block bg-blue-500 hover:bg-blue-600 text-green font-semibold py-2 px-4 rounded mb-4">
            Добавить новое показание
        </a>

        <br>

        <a href="{{ route('export.readings') }}" class="btn btn-primary">Скачать историю в PDF</a>

        <div class="overflow-x-auto">
            <table class="table-auto w-full bg-white border border-gray-200 rounded-lg shadow-lg">
                <thead>
                    <tr class="bg-gray-100 text-left">
                        <th class="px-4 py-2">ID</th>
                        <th class="px-4 py-2">Счетчик</th>
                        <th class="px-4 py-2">Тип</th>
                        <th class="px-4 py-2">Показания (м³)</th>
                        <th class="px-4 py-2">Дата</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($readings as $reading)
                        <tr class="border-b border-gray-200 hover:bg-gray-50">
                            <td class="px-4 py-2">{{ $reading->id }}</td>
                            <td class="px-4 py-2">№ {{ $reading->meter->number }}</td>
                            <td class="px-4 py-2">{{ $reading->meter->type === 'hot' ? 'Горячая вода' : 'Холодная вода' }}</td>
                            <td class="px-4 py-2">{{ $reading->value }}</td>
                            <td class="px-4 py-2">{{ $reading->date->format('d.m.Y') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
