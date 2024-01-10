@extends('layouts.main')

@section('content')
    <div class="container columns-2 mx-auto mt-5">
        <div class="w-full bg-white rounded-lg px-6 py-8 ring-1 ring-slate-900/5 shadow-xl">
            <h1 class="text-gray-500 font-medium tracking-tight">RUB to USD</h1>
            <div class="flex items-end">
                <div class="text-5xl font-bold" id="current-value1">
                    Loading...
                </div>
                <div class="hidden ml-2 text-5xl font-bold text-gray-400" id="currency-symbol1">
                    ₽
                </div>
            </div>
        </div>
        <div class="w-full bg-white rounded-lg px-6 py-8 ring-1 ring-slate-900/5 shadow-xl">
            <h1 class="text-gray-500 text-base font-medium tracking-tight">BTC TO USDT</h1>
            <div class="flex items-end">
                <div class="text-5xl font-bold" id="current-value2">
                    Loading...
                </div>
                <div class="hidden ml-2 text-5xl font-bold text-gray-400" id="currency-symbol2">
                    &#8376;
                </div>
            </div>
        </div>
    </div>


    <script>
        const url = 'http://127.0.0.1:8000/currencies';
        getCurrencies();
        setInterval(getCurrencies, 10000)

        function getCurrencies() {
            fetch(url)
                .then(response => {
                    if (!response.ok) {
                        throw new Error(`HTTP error! Status: ${response.status}`);
                    }
                    return response.json();
                })
                .then(data => {
                    const currency1 = document.getElementById('current-value1');
                    currency1.innerText = data.rub_to_usd;

                    const currency2 = document.getElementById('current-value2');
                    currency2.innerText = data.usdt_to_btc;

                    document.getElementById('currency-symbol1').classList.remove('hidden')
                    document.getElementById('currency-symbol2').classList.remove('hidden')
                })
                .catch(error => {
                    console.error('Fetch error:', error);
                });
        }
    </script>
@endsection
