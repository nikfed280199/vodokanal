<!-- resources/views/meters/create.blade.php -->

<x-app-layout>
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">Добавить новый счетчик</h1>

        <form action="{{ route('meters.store') }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
            @csrf

            <div class="mb-4">
                <label for="type" class="block text-sm font-medium text-gray-700">Тип счетчика</label>
                <select name="type" id="type" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                    <option value="cold">Холодная вода</option>
                    <option value="hot">Горячая вода</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="number" class="block text-sm font-medium text-gray-700">Серийный номер</label>
                <input type="text" name="number" id="number" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
            </div>

            <div class="mb-4">
                <label for="address" class="block text-sm font-medium text-gray-700">Адрес</label>
                <input type="text" name="address" id="address" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
            </div>

            <div class="flex items-center justify-end">
                <a href="{{ route('meters.index') }}" class="mr-4 text-gray-600 hover:text-gray-900">Отмена</a>
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-green font-semibold py-2 px-4 rounded">Добавить счетчик</button>
            </div>
        </form>
    </div>
</x-app-layout>
