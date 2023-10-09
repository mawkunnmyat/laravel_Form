@extends('layout.layout')

@section('content')
<h1>お問い合わせ　完了画面</h1>
<hr style="border-top: 5px dashed red;">
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif
    <div class="alert alert-success">
        
        <p>お問い合わせありがとうございました。</p>

        <p>担当者より追ってご連絡をさせていただきます。</p>

        <p>なお、お問い合わせの内容によっては回答できない場合もございます。</p>
        
        <p>予めご了承ください。</p>

    </div>
@endsection