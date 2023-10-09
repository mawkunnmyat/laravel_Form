@extends('layout.layout')

@section('content')

    <h3>お問い合わせ　入力画面</h3>
    <hr style="border-top: 5px dashed red;">
    <h6>株式会社スカラネクストへのお問い合わせは、下記フォームからお願いいたします。</h6>
    <ul style="border: 3px dashed grey;">
        <li>半角カタカナは使用しないでください。数字は半角でお願いします。</li>
        <li>当フォームは、128bit SSL通信(暗号化通信)によって、第三者の盗聴、改ざん、なりすましなどから保護されています。</li>
        <li>送信いただいた情報は、お問い合わせ対応以外には使用しません。</li>
    </ul>
    <form action="/products/create-step1" method="post">
        {{ csrf_field() }}

        @if ($errors->any())
            <div class="alert alert-danger">
                <p style="color:red;">
                  <i class="fa fa-info-circle" style="font-size:20px;color:red"></i>
                    下記の入力項目が未入力か、入力内容に不備があるようです。<br>
                    お手数ですが、「入力画面に戻る」ボタンで前のページに戻り、入力内容をご確認下さい。
                </p>
            </div>
        @endif

        <h4 style="border-left: 5px solid red;">&nbsp;&nbsp;&nbsp;お問い合わせ項目</h4>

        <table class="table">
            <tr>
                <td class="form-group">
                    <label for="contentOfInquiry">お問い合わせ内容</label>
                </td>
                <td>
                    <select class="form-control" name="contentOfInquiry">
                <option value="">下記から項目をお選びください</option>
                <option {{{ (isset($product->contentOfInquiry) && $product->contentOfInquiry == 'i-giftについて') ? "selected=\"selected\"" : "" }}}>i-giftについて</option>
                <option {{{ (isset($product->contentOfInquiry) && $product->contentOfInquiry == 'Saas型IVRについて') ? "selected=\"selected\"" : "" }}}>Saas型IVRについて</option>
                <option {{{ (isset($product->contentOfInquiry) && $product->contentOfInquiry == 'i-searchについて') ? "selected=\"selected\"" : "" }}}>i-searchについて</option>
                <option {{{ (isset($product->contentOfInquiry) && $product->contentOfInquiry == 'i-askについて') ? "selected=\"selected\"" : "" }}}>i-askについて</option>
                <option {{{ (isset($product->contentOfInquiry) && $product->contentOfInquiry == 'i-linkcheckについて') ? "selected=\"selected\"" : "" }}}>i-linkcheckについて</option>
                <option {{{ (isset($product->contentOfInquiry) && $product->contentOfInquiry == 'i-printについて') ? "selected=\"selected\"" : "" }}}>i-printについて</option>
                <option {{{ (isset($product->contentOfInquiry) && $product->contentOfInquiry == 'i-catalogについて') ? "selected=\"selected\"" : "" }}}>i-catalogについて</option>
                <option {{{ (isset($product->contentOfInquiry) && $product->contentOfInquiry == 'i-flowについて') ? "selected=\"selected\"" : "" }}}>i-flowについて</option>
                <option {{{ (isset($product->contentOfInquiry) && $product->contentOfInquiry == 'i-linkplusについて') ? "selected=\"selected\"" : "" }}}>i-linkplusについて</option>
                <option {{{ (isset($product->contentOfInquiry) && $product->contentOfInquiry == 'i-shopnaviについて') ? "selected=\"selected\"" : "" }}}>i-shopnaviについて</option>
                <option {{{ (isset($product->contentOfInquiry) && $product->contentOfInquiry == 'i-pointについて') ? "selected=\"selected\"" : "" }}}>i-pointについて</option>
                <option {{{ (isset($product->contentOfInquiry) && $product->contentOfInquiry == 'i-livechatについて') ? "selected=\"selected\"" : "" }}}>i-livechatについて</option>
                <option {{{ (isset($product->contentOfInquiry) && $product->contentOfInquiry == 'hostingホスティングサービスについて') ? "selected=\"selected\"" : "" }}}>hostingホスティングサービスについて</option>
                <option {{{ (isset($product->contentOfInquiry) && $product->contentOfInquiry == 'i-campaingキャンペーンサービスについて') ? "selected=\"selected\"" : "" }}}>i-campaingキャンペーンサービスについて</option>
                <option {{{ (isset($product->contentOfInquiry) && $product->contentOfInquiry == 'othersその他(会社に関する事など)について') ? "selected=\"selected\"" : "" }}}>othersその他(会社に関する事など)について</option>
            </select>
            @if ($errors->has('contentOfInquiry'))
                <p style="color:red;">
                  <i class="fa fa-info-circle" style="font-size:22px;color:red"></i>
                項目を選択してください
                </p>
            @endif
                </td>
            </tr>
            <tr>
                <td class="form-group">
                    <label for="content">内容<br>(できるだけ具体的にお書き下さい)</label>
                    <button class="btn btn-outline-secondary" type="button" style="float: right;color: red;">必須</button>
                </td>
                <td>
                    <textarea type="text"  value="{{{ $product->content or '' }}}" class="form-control" id="content"  name="content" placeholder="内容を入力してください"></textarea>
                    @if ($errors->has('companyName')) 
                        <p style="color:red;">
                            <i class="fa fa-info-circle" style="font-size:22px;color:red"></i>
                            内容を入力してください
                        </p> 
                    @endif
                </td>
            </tr>
        </table>

        <h4 style="border-left: 5px solid red;">&nbsp;&nbsp;&nbsp;お客さまの情報</h4>
        <table class="table">
            <tr>
                <td class="form-group">
                    <label for="companyName">会社名 / 団体名</label>
                    <button class="btn btn-outline-secondary" type="button" style="float: right;color: red;">必須</button>
                </td>
                <td>
                    <input type="text" value="{{{ $product->companyName or '' }}}" class="form-control" id="companyName"  name="companyName" placeholder="会社名/団体名を入力してください">
                    @if ($errors->has('companyName')) 
                        <p style="color:red;">
                            <i class="fa fa-info-circle" style="font-size:22px;color:red"></i>
                            会社名/団体名を入力してください
                        </p> 
                    @endif
                </td>
            </tr>
            <tr>
                <td class="form-group">
                    <label for="departmentName">部署名</label>
                    <button class="btn btn-outline-secondary" type="button" style="float: right;">任意</button>
                </td>
                <td>
                    <input type="text" value="{{{ $product->departmentName or '' }}}" class="form-control" id="departmentName"  name="departmentName" placeholder="部署名を入力してください">
                </td>
            </tr>
            <tr>
                <td class="form-group">
                    <label for="name">Name:お名前</label>
                    <button class="btn btn-outline-secondary" type="button" style="float: right;color: red;">必須</button>
                </td>
                <td>
                    <input type="text" value="{{{ $product->name or '' }}}" class="form-control" id="name"  name="name" placeholder="お名前を入力してください">
                    @if ($errors->has('name')) 
                        <p style="color:red;">
                            <i class="fa fa-info-circle" style="font-size:30px;color:red"></i>
                            お名前を入力してください
                        </p> 
                    @endif
                </td>
            </tr>
            <tr>
                <td class="form-group">
                    <label for="furigana">ふりがな</label>
                    <button class="btn btn-outline-secondary" type="button" style="float: right;">任意</button>
                </td>
                <td>
                    <input type="text" value="{{{ $product->furigana or '' }}}" class="form-control" id="furigana"  name="furigana" placeholder="ふりがなを入力してください">
                </td>
            </tr>
            <tr>
                <td class="form-group">
                    <label for="phoneNo">
                        電話番号(半角数字/ハイフン無し)
                    </label>
                    <button class="btn btn-outline-secondary" type="button" style="float: right;color: red;">必須</button>
                </td>
                <td>
                    <input type="tel" name="phoneNo" id="phoneNo" class="form-control" value="{{{ $product->phoneNo or '' }}}" placeholder="電話番号を入力してください">
                    @if ($errors->has('phoneNo')) 
                        <p style="color:red;">
                            <i class="fa fa-info-circle" style="font-size:30px;color:red"></i>
                            電話番号を入力してください
                        </p> 
                    @endif
                </td>
            </tr>
            <tr>
                <td class="form-group">
                    <label for="email">メールアドレス(半角英数字)</label>
                    <button class="btn btn-outline-secondary" type="button" style="float: right;color: red;">必須</button>
                </td>
                <td>
                    <input type="email" value="{{{ $product->email or '' }}}" class="form-control" id="email" name="email" placeholder="メールアドレスを入力してください" />
            @if ($errors->has('email')) 
                <p style="color:red;">
                  <i class="fa fa-info-circle" style="font-size:30px;color:red"></i>
                    メールアドレスを入力してください
                </p> 
            @endif
                </td>
            </tr>
        </table>

        <!-- <h4 style="border-left: 5px solid red;">&nbsp;&nbsp;&nbsp;お問い合わせ項目</h4>
        
        <div class="form-group">
            <label for="contentOfInquiry">お問い合わせ内容 : Contents of inquiry</label>
            <select class="form-control" name="contentOfInquiry">
                <option value="">下記から項目をお選びください</option>
                <option {{{ (isset($product->contentOfInquiry) && $product->contentOfInquiry == 'i-giftについて') ? "selected=\"selected\"" : "" }}}>i-giftについて</option>
                <option {{{ (isset($product->contentOfInquiry) && $product->contentOfInquiry == 'Saas型IVRについて') ? "selected=\"selected\"" : "" }}}>Saas型IVRについて</option>
                <option {{{ (isset($product->contentOfInquiry) && $product->contentOfInquiry == 'i-searchについて') ? "selected=\"selected\"" : "" }}}>i-searchについて</option>
                <option {{{ (isset($product->contentOfInquiry) && $product->contentOfInquiry == 'i-askについて') ? "selected=\"selected\"" : "" }}}>i-askについて</option>
                <option {{{ (isset($product->contentOfInquiry) && $product->contentOfInquiry == 'i-linkcheckについて') ? "selected=\"selected\"" : "" }}}>i-linkcheckについて</option>
                <option {{{ (isset($product->contentOfInquiry) && $product->contentOfInquiry == 'i-printについて') ? "selected=\"selected\"" : "" }}}>i-printについて</option>
                <option {{{ (isset($product->contentOfInquiry) && $product->contentOfInquiry == 'i-catalogについて') ? "selected=\"selected\"" : "" }}}>i-catalogについて</option>
                <option {{{ (isset($product->contentOfInquiry) && $product->contentOfInquiry == 'i-flowについて') ? "selected=\"selected\"" : "" }}}>i-flowについて</option>
                <option {{{ (isset($product->contentOfInquiry) && $product->contentOfInquiry == 'i-linkplusについて') ? "selected=\"selected\"" : "" }}}>i-linkplusについて</option>
                <option {{{ (isset($product->contentOfInquiry) && $product->contentOfInquiry == 'i-shopnaviについて') ? "selected=\"selected\"" : "" }}}>i-shopnaviについて</option>
                <option {{{ (isset($product->contentOfInquiry) && $product->contentOfInquiry == 'i-pointについて') ? "selected=\"selected\"" : "" }}}>i-pointについて</option>
                <option {{{ (isset($product->contentOfInquiry) && $product->contentOfInquiry == 'i-livechatについて') ? "selected=\"selected\"" : "" }}}>i-livechatについて</option>
                <option {{{ (isset($product->contentOfInquiry) && $product->contentOfInquiry == 'hostingホスティングサービスについて') ? "selected=\"selected\"" : "" }}}>hostingホスティングサービスについて</option>
                <option {{{ (isset($product->contentOfInquiry) && $product->contentOfInquiry == 'i-campaingキャンペーンサービスについて') ? "selected=\"selected\"" : "" }}}>i-campaingキャンペーンサービスについて</option>
                <option {{{ (isset($product->contentOfInquiry) && $product->contentOfInquiry == 'othersその他(会社に関する事など)について') ? "selected=\"selected\"" : "" }}}>othersその他(会社に関する事など)について</option>
            </select>
            @if ($errors->has('contentOfInquiry')) 
                <p style="color:red;">
                  <i class="fa fa-info-circle" style="font-size:30px;color:red"></i>
                    {{ $errors->first('contentOfInquiry') }}
                </p> 
            @endif
        </div>

        <div class="form-group">
            <label for="content">Content : 内容(できるだけ具体的にお書き下さい)</label>
            <input type="text" value="{{{ $product->content or '' }}}" class="form-control" id="content"  name="content">
        </div>

        <div class="form-group">
            <label for="companyName">Company name / organization name:会社名 / 団体名</label>
            <input type="text" value="{{{ $product->companyName or '' }}}" class="form-control" id="companyName"  name="companyName">
            @if ($errors->has('companyName')) 
                <p style="color:red;">
                  <i class="fa fa-info-circle" style="font-size:30px;color:red"></i>
                    {{ $errors->first('companyName') }}
                </p> 
            @endif
        </div>

        <div class="form-group">
            <label for="departmentName">Department name:部署名</label>
            <input type="text" value="{{{ $product->departmentName or '' }}}" class="form-control" id="departmentName"  name="departmentName">
        </div>

        <div class="form-group">
            <label for="name">Name:お名前</label>
            <input type="text" value="{{{ $product->name or '' }}}" class="form-control" id="name"  name="name">
            @if ($errors->has('name')) 
                <p style="color:red;">
                  <i class="fa fa-info-circle" style="font-size:30px;color:red"></i>
                    {{ $errors->first('name') }}
                </p> 
            @endif
        </div>

        <div class="form-group">
            <label for="furigana">Furigana:ふりがな</label>
            <input type="text" value="{{{ $product->furigana or '' }}}" class="form-control" id="furigana"  name="furigana">
        </div>

        <div class="form-group">
            <label for="phoneNo">
                Phone number(Half-width numeric / no hyphen):電話番号(半角数字/ハイフン無し)
            </label>                  
            <input type="tel" name="phoneNo" id="phoneNo" class="form-control" value="{{{ $product->phoneNo or '' }}}">
            @if ($errors->has('phoneNo')) 
                <p style="color:red;">
                  <i class="fa fa-info-circle" style="font-size:30px;color:red"></i>
                    {{ $errors->first('phoneNo') }}
                </p> 
            @endif
        </div>

        <div class="form-group">
            <label for="email">Email address (alphanumeric characters):メールアドレス(半角英数字)</label>
            <input type="email" value="{{{ $product->email or '' }}}" class="form-control" id="email" name="email"/>
            @if ($errors->has('email')) 
                <p style="color:red;">
                  <i class="fa fa-info-circle" style="font-size:30px;color:red"></i>
                    {{ $errors->first('email') }}
                </p> 
            @endif
        </div> -->

        <div id="form_notice">
            <div class="h2ttl">
                <h2 style="border-left: 5px solid red;">&nbsp;&nbsp;&nbsp;お問い合わせをいただく前の注意</h2>
            </div>
            <div class="form_notice_area">
                <div class="form_list">
                    <ul>
                        <li>お客様のご入力いただく個人情報を含む情報は、問い合わせに対する回答を差し上げるために利用させていただきます。</li>
                        <li>お客様は、お客様ご自身の個人情報について、開示、訂正、削除をご請求いただけます。その際には下記お問い合わせ先までご連絡ください。</li>
                        <li>同意いただけない場合には、弊社からのご回答を差し上げることができない場合がございますので、ご了承ください。</li>
                        <li>お客様の個人情報の取扱全般に関する当社の考え方をご覧になりたい方は、下記の個人情報保護方針のページをご覧ください。</li>
                    </ul>
                </div>
                <div class="to_inquiry">
                    <p>お問い合わせ先：株式会社スカラネクスト<br>TEL:03-6418-3972</p>
                </div>
            </div>
            <!-- /.form_notice_area -->
            <div class="doui_area">
                <p>お問い合わせいただく前の注意に同意いただける場合は、<br>下記の「同意する」にチェックをつけ、「確認画面へ進む」ボタンを押してください。</p>
                <div class="privacy_check">
                    <input type="checkbox" name="agree" id="doi"><label for="doi">同意する</label>
                    @if (session()->has('agree'))
                        <div class="alert alert-danger">{{ session()->first('agree') }}  </div>
                    @endif
                </div>
            </div><!-- ./doui_area -->

        </div>
        <!-- /.form_notice -->
        
        <button type="submit" class="btn btn_confirm">確認画面へ進む</button>
    </form>
@endsection