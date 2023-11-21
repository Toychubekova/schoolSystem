<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <!-- Форма добавления товара -->

                    <form action="{{ url('product') }}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}
                        <div class="inputs">
                        <!-- Название товара -->
                        <div class="form-group">
                            <label for="product-trek_kod" class="col-sm-3 control-label">Трек-код товара</label>
                            <div class="col-sm-6">
                                <input type="text" name="trek_kod" id="product-trek_kod" class="form-control">
                            </div>
                        </div>

                        <div class="form-group" style="margin-left:10px;">
        <label for="product-kod" class="col-sm-3 control-label">Код товара</label>
        <div class="col-sm-6">
            <input type="text" name="kod" id="product-kod" class="form-control">
        </div>
    </div>

    <!-- Поле для веса товара -->
    <div class="form-group" style="margin-left:10px;">
    <label for="product-weight" class="col-sm-3 control-label">Вес товара</label>
    <div class="col-sm-6">
        <input type="number" name="weight" id="product-weight" class="form-control" step="0.01">
    </div>
</div>
<div class="form-group" style="margin-left:10px;">
    <label for="product-price" class="col-sm-3 control-label">Цена товара</label>
    <div class="col-sm-6">
        <input type="number" name="price" id="product-price" class="form-control">
    </div>
</div>
</div>
<div class="inputs">
                        <!-- Поля для дат: receipt_A, dispatch_A, receipt_B, issue -->
<div class="form-group" >
    <label for="product-receipt_A" class="col-sm-3 control-label">Дата и время получения A</label>
    <div class="col-sm-6">
        <input type="datetime-local" name="receipt_A" id="product-receipt_A" class="form-control">
    </div>
</div>


<div class="form-group" style="margin-left:10px;">
    <label for="product-dispatch_A" class="col-sm-3 control-label">Дата отправки A</label>
    <div class="col-sm-6">
        <input type="datetime-local" name="dispatch_A" id="product-dispatch_A" class="form-control">
    </div>
</div>

<div class="form-group" style="margin-left:10px;">
    <label for="product-receipt_B" class="col-sm-3 control-label">Дата получения B</label>
    <div class="col-sm-6">
        <input type="datetime-local" name="receipt_B" id="product-receipt_B" class="form-control">
    </div>
</div>

<div class="form-group" style="margin-left:10px;">
    <label for="product-issue" class="col-sm-3 control-label">Дата выдачи</label>
    <div class="col-sm-6">
        <input type="datetime-local" name="issue" id="product-issue" class="form-control">
    </div>
</div>
<!-- Кнопка добавления товара -->
                        <div class="form-group" style="margin:25px 0 0 10px;">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default" style="background-color: #3490dc; color: white; border: none; padding: 8px 15px; border-radius: 20px; cursor: pointer;">
                                    <i class="fa fa-plus"></i> Добавить товар
                                </button>
                            </div>
                        </div>
</div>



                    </form>

                    <!-- Отображение списка товаров -->
                    @if (count($products) > 0)
                        <div class="panel panel-default" style="margin-top:20px;">
                            <div class="panel-heading">
                                Текущие товары
                            </div>

                            <div class="panel-body">
                                <table class="table table-striped product-table">
     <thead>
        <th>Трек код / Дата получения A</th>
        <th>Код / Дата отправки A</th>
        <th>Вес / Дата получения B</th>
        <th>Цена / Дата выпуска</th>
        <th>Действия</th>
    </thead>
    <tbody>
        @foreach ($products as $product)
        <div style="margin: 10px 0px 10px 0px;">
            <tr class="output" >
                <td class="table-text">
                  <form method="POST" action="{{ route('products.update', $product) }}">

                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}
                        <input type="text" name="trek_kod" value="{{ $product->trek_kod }}">
                </td>
                <td class="table-text">
                    <input type="text" name="kod" value="{{ $product->kod }}">
                </td>
                <td class="table-text">
                    <input type="number" name="weight" value="{{ $product->weight }}" step="0.01">
                </td>
                <td class="table-text">
                    <input type="number" name="price" value="{{ $product->price }}">
                </td>
                <td><x-primary-button type="submit" class="btn btn-secondary">
                        <i class="fa fa-save"></i> Сохранить
                </x-primary-button><td>
                </tr><tr class="output2" >
                <td class="table-text">
                    <input type="datetime-local" name="receipt_A" value="{{ $product->receipt_A }}">
                </td>
                <td class="table-text">
                    <input type="datetime-local" name="dispatch_A" value="{{ $product->dispatch_A }}">
                </td>
                <td class="table-text">
                    <input type="datetime-local" name="receipt_B" value="{{ $product->receipt_B }}">
                </td>
                <td class="table-text">
                    <input type="datetime-local" name="issue" value="{{ $product->issue }}">
                </td>
                <td>

                    </form>
                    <!-- Форма удаления товара -->
                    <form method="POST" action="{{ route('products.delete', $product) }}">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <x-danger-button type="submit" class="btn btn-danger">
                            <i class="fa fa-trash"></i> Удалить
                        </x-danger-button>
                    </form>
                </td>
            </tr>
            </div>
        @endforeach
    </tbody>
</table>

                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
