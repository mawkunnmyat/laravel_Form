@extends('layout.layout')

@section('content')
    <h1>お問い合わせ　確認画面</h1>
    <hr style="border-top: 3px dashed red;">
    
    <form action="/products/store" method="post" >
        {{ csrf_field() }}

        <table class="table">
            <tr>
                <td>お問い合わせ内容</td>
                <td><strong>{{ $product->contentOfInquiry }}</strong></td>
            </tr>
            <tr>
                <td>内容(できるだけ具体的にお書き下さい)</td>
                <td><strong>{{ $product->content }}</strong></td>
            </tr>
        </table>

        <table class="table">
            <tr>
                <td>会社名 / 団体名</td>
                <td><strong>{{ $product->companyName }}</strong></td>
            </tr>
            <tr>
                <td>部署名</td>
                <td><strong>{{ $product->departmentName }}</strong></td>
            </tr>
            <tr>
                <td>お名前</td>
                <td><strong>{{ $product->name }}</strong></td>
            </tr>
            <tr>
                <td>ふりがな</td>
                <td><strong>{{ $product->furigana }}</strong></td>
            </tr>
            <tr>
                <td>電話番号(半角数字/ハイフン無し)</td>
                <td><strong>{{ $product->phoneNo }}</strong></td>
            </tr>
            <tr>
                <td>メールアドレス(半角英数字)</td>
                <td><strong>{{ $product->email }}</strong></td>
            </tr>
        </table>

        <a type="button" href="/products/create-step1" class="btn btn-warning">戻る: Back</a>
        
        <button type="submit" class="btn btn-primary">送　信 : Submit</button>
    </form>
@endsection