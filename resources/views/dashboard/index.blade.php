<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Статистика') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-lg font-bold mb-4">Общая статистика</h3>
                    <ul>
                        <li>Общее количество счетчиков: {{ $totalMeters }}</li>
                        <li>Общее количество показаний: {{ $totalReadings }}</li>
                        <li>Общее количество платежей: {{ $totalPayments }}</li>
                        <li>Общая сумма платежей: {{ number_format($totalPaymentAmount, 2, ',', ' ') }} руб.</li>
                    </ul>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-6">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-lg font-bold mb-4">График потребления воды за последние 6 месяцев</h3>
                    <canvas id="consumptionChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <script>
        const ctx = document.getElementById('consumptionChart').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: @json($labels),
                datasets: [
                    {
                        label: 'Холодная вода (м³)',
                        data: @json($coldValues),
                        borderColor: 'rgba(54, 162, 235, 1)',
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        fill: true,
                    },
                    {
                        label: 'Горячая вода (м³)',
                        data: @json($hotValues),
                        borderColor: 'rgba(255, 99, 132, 1)',
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        fill: true,
                    }
                ]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'м³'
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Месяц'
                        }
                    }
                }
            }
        });
    </script>
</x-app-layout>
