<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="info-container" >
                        <div class="info-row" >
                            @if ($product->receipt_A != null && $product->dispatch_A != null && $product->receipt_B != null && $product->issue != null)
    <span class="info-activity">Товар выдан</span>
@elseif ($product->receipt_A != null && $product->dispatch_A != null && $product->receipt_B != null)
    <span class="info-activity">Товар готов к выдаче</span>
@elseif ($product->receipt_A != null && $product->dispatch_A != null && $product->receipt_B == null)
    <span class="info-activity">Товар в пути</span>
@elseif ($product->receipt_A != null && $product->dispatch_A == null && $product->receipt_B == null)
    <span class="info-activity">Товар на складе</span>
@endif

                        </div>
                        <div class="info-row" >
                            <span class="info-label">Трек код:</span>
                            <span class="info-value">{{ $product->trek_kod }}</span>
                        </div>
                        <div class="info-row">
                            <span class="info-label">Код:</span>
                            <span class="info-value">{{ $product->kod }}</span>
                        </div>
                        <div class="info-row">
                            <span class="info-label">Вес:</span>
                            <span class="info-value">{{ $product->weight }}</span>
                        </div>
                        <div class="info-row">
                            <span class="info-label">Цена:</span>
                            <span class="info-value">{{ $product->price }}</span>
                        </div>


                        @if ($product->receipt_A != null && $product->dispatch_A != null && $product->receipt_B != null && $product->issue != null)
    <div class="info-row">
        <span class="info-label">Получен на склад:</span>
        <span class="info-value">{{ $product->receipt_A }}</span>
    </div>
    <div class="info-row" style="margin-top:30px;">
        <span class="info-label">Отправлен:</span>
        <span class="info-value">{{ $product->dispatch_A }}</span>
    </div>
    <div class="info-row" style="margin-top:30px;">
        <span class="info-label">Готов к выдаче:</span>
        <span class="info-value">{{ $product->receipt_B }}</span>
    </div>
    <div class="info-row" style="margin-top:30px;">
        <span class="info-label">Выдан:</span>
        <span class="info-value">{{ $product->issue }}</span>
    </div>
@elseif ($product->receipt_A != null && $product->dispatch_A != null && $product->receipt_B != null)
    <div class="info-row">
        <span class="info-label">Получен на склад:</span>
        <span class="info-value">{{ $product->receipt_A }}</span>
    </div>
    <div class="info-row" style="margin-top:30px;">
        <span class="info-label">Отправлен:</span>
        <span class="info-value">{{ $product->dispatch_A }}</span>
    </div>
    <div class="info-row" style="margin-top:30px;">
        <span class="info-label">Готов к выдаче:</span>
        <span class="info-value">{{ $product->receipt_B }}</span>
    </div>
@elseif ($product->receipt_A != null && $product->dispatch_A != null && $product->receipt_B == null)
    <div class="info-row">
        <span class="info-label">Получен на склад:</span>
        <span class="info-value">{{ $product->receipt_A }}</span>
    </div>
    <div class="info-row" style="margin-top:30px;">
        <span class="info-label">Отправлен:</span>
        <span class="info-value">{{ $product->dispatch_A }}</span>
    </div>
@elseif ($product->receipt_A != null && $product->dispatch_A == null && $product->receipt_B == null)
    <div class="info-row">
        <span class="info-label">Получен на склад:</span>
        <span class="info-value">{{ $product->receipt_A }}</span>
    </div>
@endif

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
