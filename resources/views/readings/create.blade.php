<!-- resources/views/readings/create.blade.php -->

<x-app-layout>
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">Добавить показания</h1>

        <form action="{{ route('readings.store') }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
            @csrf

            <div class="mb-4">
                <label for="meter_id" class="block text-sm font-medium text-gray-700">Счетчик</label>
                <select name="meter_id" id="meter_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                    @foreach($meters as $meter)
                        <option value="{{ $meter->id }}">{{ $meter->type === 'hot' ? 'Горячая вода' : 'Холодная вода' }} - № {{ $meter->number }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="value" class="block text-sm font-medium text-gray-700">Показания (м³)</label>
                <input type="number" name="value" id="value" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" step="0.01" min="0" required>
            </div>

            <div class="flex items-center justify-end">
                <a href="{{ route('readings.index') }}" class="mr-4 text-gray-600 hover:text-gray-900">Отмена</a>
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-green font-semibold py-2 px-4 rounded">Добавить показания</button>
            </div>
        </form>
    </div>
</x-app-layout>
