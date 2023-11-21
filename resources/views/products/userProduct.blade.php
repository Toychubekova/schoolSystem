<nav>


   <!--  <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900"> -->

                    <!-- Форма добавления товара -->


                    <!-- Отображение списка товаров -->
                    @if (count($products) > 0 )
                        <div class="panel panel-default" style="margin-top:20px;">

                            <div class="panel-body">
                                <table class="table table-striped product-table">
     <thead>
        <th>Трек код </th>
        <th>Вес </th>
        <th>Цена </th>
        <th>Детали</th>
    </thead>
    <tbody>
        @if (count($products->where('receipt_A', '!=', null)->where('dispatch_A', '!=', null)->where('receipt_B', '!=', null)) > 0)
        <td><div class="text-gray-900 nametd sm:px-6 lg:px-8">Готово к выдаче</div></td>
        @endif
        @foreach ($products as $product)
        @if ($product->receipt_A !==null && $product->dispatch_A !==null && $product->receipt_B !==null && $product->issue ==null)
        <div style="margin: 10px 0px 10px 0px;">
            <tr class="output">
    <td class="table-text">
        <div class="text-center sm:px-6 lg:px-8">{{ $product->trek_kod }}</div>
    </td>
    <td class="table-text">
        <div class="text-center sm:px-6 lg:px-8">{{ $product->weight }}</div>
    </td>
    <td class="table-text">
        <div class="text-center sm:px-6 lg:px-8">{{ $product->price }}</div>
    </td>
    <td>
        <div class="text-center sm:px-6 lg:px-8"><a href="/details/product/{{$product->id}}">Посмотреть</a></div>
    </td>
</tr>
            </div>
            @endif
        @endforeach
        @if (count($products->where('receipt_A', '!=', null)->where('dispatch_A', '!=', null)->where('receipt_B', '=', null)) > 0)
        <td><div class="text-gray-900 nametd sm:px-6 lg:px-8">В пути</div></td>
        @endif
        @foreach ($products as $product)
        @if ($product->receipt_A !==null && $product->dispatch_A !==null && $product->receipt_B ==null)
        <div style="margin: 10px 0px 10px 0px;">
            <tr class="output">
    <td class="table-text">
        <div class="text-center sm:px-6 lg:px-8">{{ $product->trek_kod }}</div>
    </td>
    <td class="table-text">
        <div class="text-center sm:px-6 lg:px-8">{{ $product->weight }}</div>
    </td>
    <td class="table-text">
        <div class="text-center sm:px-6 lg:px-8">{{ $product->price }}</div>
    </td>
    <td>
        <div class="text-center sm:px-6 lg:px-8"><a href="/details/product/{{$product->id}}">Посмотреть</a></div>
    </td>
</tr>
            </div>
            @endif
        @endforeach
        @if (count($products->where('receipt_A', '!=', null)->where('dispatch_A', '=', null)->where('receipt_B', '=', null)) > 0)
        <td><div class="text-gray-900 nametd sm:px-6 lg:px-8">В пункте А</div></td>
        @endif

        @foreach ($products as $product)

        @if ($product->receipt_A !==null && $product->dispatch_A ==null && $product->receipt_B ==null)
        <div style="margin: 10px 0px 10px 0px;">
            <tr class="output">
    <td class="table-text">
        <div class="text-center sm:px-6 lg:px-8">{{ $product->trek_kod }}</div>
    </td>
    <td class="table-text">
        <div class="text-center sm:px-6 lg:px-8">{{ $product->weight }}</div>
    </td>
    <td class="table-text">
        <div class="text-center sm:px-6 lg:px-8">{{ $product->price }}</div>
    </td>
    <td>
        <div class="text-center sm:px-6 lg:px-8"><a href="/details/product/{{$product->id}}">Посмотреть</a></div>
    </td>
</tr>
            </div>
            @endif
        @endforeach

        @if (count($products->where('receipt_A', '!=', null)->where('dispatch_A', '!=', null)->where('receipt_B', '!=', null)->where('issue', '!=', null)) > 0)
        <td><div class="text-gray-900 nametd sm:px-6 lg:px-8">Выдано</div></td>
        @endif

        @foreach ($products as $product)

        @if ($product->receipt_A !==null && $product->dispatch_A !==null && $product->receipt_B !==null && $product->issue !==null)
        <div style="margin: 10px 0px 10px 0px;">
            <tr class="output">
    <td class="table-text">
        <div class="text-center sm:px-6 lg:px-8">{{ $product->trek_kod }}</div>
    </td>
    <td class="table-text">
        <div class="text-center sm:px-6 lg:px-8">{{ $product->weight }}</div>
    </td>
    <td class="table-text">
        <div class="text-center sm:px-6 lg:px-8">{{ $product->price }}</div>
    </td>
    <td>
        <div class="text-center sm:px-6 lg:px-8"><a href="/details/product/{{$product->id}}">Посмотреть</a></div>
    </td>
</tr>
            </div>
            @endif
        @endforeach
    </tbody>
</table>

                            </div>
                        </div>
                    @endif
                <!-- </div>
            </div>
        </div>
    </div> -->
</nav>
