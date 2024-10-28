<!-- resources/views/meters/index.blade.php -->

<x-app-layout>
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">Список счетчиков</h1>
        
        <a href="{{ route('meters.create') }}" class="inline-block bg-blue-500 hover:bg-blue-600 text-green font-semibold py-2 px-4 rounded mb-4">
            Добавить новый счетчик
        </a>
        
        @if($meters->isEmpty())
            <p class="text-gray-600">У вас еще нет добавленных счетчиков.</p>
        @else
            <div class="overflow-x-auto">
                <table class="table-auto w-full bg-white border border-gray-200 rounded-lg shadow-lg">
                    <thead>
                        <tr class="bg-gray-100 text-left">
                            <th class="px-4 py-2">ID</th>
                            <th class="px-4 py-2">Тип</th>
                            <th class="px-4 py-2">Серийный номер</th>
                            <th class="px-4 py-2">Адрес</th>
                            <th class="px-4 py-2">Дата добавления</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($meters as $meter)
                            <tr class="border-b border-gray-200 hover:bg-gray-50">
                                <td class="px-4 py-2">{{ $meter->id }}</td>
                                <td class="px-4 py-2">
                                    {{ $meter->type === 'hot' ? 'Горячая вода' : 'Холодная вода' }}
                                </td>
                                <td class="px-4 py-2">{{ $meter->number }}</td>
                                <td class="px-4 py-2">{{ $meter->address }}</td>
                                <td class="px-4 py-2">{{ $meter->created_at->format('d.m.Y') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</x-app-layout>