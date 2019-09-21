
@extends('layout.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2>Получить данные курса обмена валют</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div style="border: 1px solid #ccc; border-radius: 10px; padding: 20px; margin: 0 0 20px 0;">
                    <a href="/currency/json/">Данные в JSON</a></h3>
                </div>
            </div>
            <div class="col-md-6">
                <div style="border: 1px solid #ccc; border-radius: 10px; padding: 20px; margin: 0 0 20px 0;">
                    <a href="/currency/xml/">Данные в XML</a></h3>
                </div>
            </div>
            <div class="col-md-6">
                <div style="border: 1px solid #ccc; border-radius: 10px; padding: 20px; margin: 0 0 20px 0;">
                    <a href="/currency/excel/">Данные в Excel</a></h3>
                </div>
            </div>
            <div class="col-md-6">
                <div style="border: 1px solid #ccc; border-radius: 10px; padding: 20px; margin: 0 0 20px 0;">
                    <a href="/currency/csv/">Данные в CSV</a></h3>
                </div>
            </div>
        </div>
    </div>

@endsection
