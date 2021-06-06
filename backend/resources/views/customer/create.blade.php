<h1>新規作成</h1>

<form method="POST" action="{{route('customer.store')}}">
  @csrf

  <div>
    <label for="form-FirstName">苗字</label>
    <input type="text" name="FirstName" id="form-FirstName" required>
  </div>

  <div>
    <label for="form-LastName">名前</label>
    <input type="text" name="LastName" id="form-LastName" required>
  </div>

  <div>
    <label for="form-email">メールアドレス</label>
    <input type="EmailAddress" name="EmailAddress" id="form-EmailAddress">
  </div>

  <button type="submit">登録</button>

</form>

<a href="{{ route('customer.index') }}">{{ __('一覧へ戻る') }}</a>