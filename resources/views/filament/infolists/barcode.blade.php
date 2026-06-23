@php
    use Milon\Barcode\DNS1D;

    $barcode = new DNS1D();
    $code = $getRecord()->code ?? '0000';
@endphp

<div class="bg-white shadow rounded-lg p-4">
    {{ $getRecord()->name }}
    <div class="flex justify-center p-4">
        {!! $barcode->getBarcodeSVG($code, 'C39', 2, 80) !!}
    </div>

    <div class="text-center text-sm text-gray-500 mt-2">
        {{ $code }}
    </div>
</div>
