<!-- resources/views/payments/index.blade.php -->

<x-app-layout>
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">История платежей</h1>

        <a href="{{ route('export.payments') }}" class="btn btn-primary">Скачать историю в PDF</a>

        <div class="overflow-x-auto">
            <table class="table-auto w-full bg-white border border-gray-200 rounded-lg shadow-lg">
                <thead>
                    <tr class="bg-gray-100 text-left">
                        <th class="px-4 py-2">ID</th>
                        <th class="px-4 py-2">Пользователь</th>
                        <th class="px-4 py-2">Сумма к оплате (руб)</th>
                        <th class="px-4 py-2">Дата</th>
                        <th class="px-4 py-2">Статус</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($payments as $payment)
                        <tr class="border-b border-gray-200 hover:bg-gray-50">
                            <td class="px-4 py-2">{{ $payment->id }}</td>
                            <td class="px-4 py-2">{{ $payment->user->name }}</td>
                            <td class="px-4 py-2">{{ number_format($payment->amount, 2, ',', ' ') }}</td>
                            <td class="px-4 py-2">{{ $payment->date->format('d.m.Y') }}</td>
                            <td class="px-4 py-2">{{ ucfirst($payment->status) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
