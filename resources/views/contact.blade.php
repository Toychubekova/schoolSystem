<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Контактные Данные') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <div class="contact-info">

                <div class="contact-info-item">

            <span >Адрес головного офиса:</span>
            <p>Кыргызская Республика, г. Бишкек, мкр. Джал-23, 76</p>
                </div>

        <div class="contact-info-item">
            <span>Служба поддержки:</span><br>
        <a href="https://wa.me/996555829363">+996 (555) 82-93-63</a><br>
        <a href="tel:+996555829363">+996 (555) 82-93-63</a><br>
        <a href="mailto:danielsydykov12@gmail.com">danielsydykov12@gmail.com</a><br>
        </div>
                <div class="contact-info-item">

            <span>График работы:</span>
            <p> 09:00-20:00 Пн-Вс</p>
                </div>
</div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
