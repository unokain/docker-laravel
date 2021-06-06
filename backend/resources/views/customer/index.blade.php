<h1>一覧表示</h1>

<form method="GET" action="{{route('customer.getSearch')}}">
  @csrf
  <div>
    <label for="form-search">検索</label>
    <input type="search" name="q" id="form-search">
  </div>

  <button type="submit">検索</button>

</form>

<a href="{{ route('customer.create') }}">{{ __('新規作成') }}</a>

<table>
<tr>
<th>ID</th>
<th>苗字</th>
<th>名前</th>
<th>メールアドレス</th>
</tr>
@foreach($customers as $customer)
<tr>
<td>{{$customer->id}}</td>
<td>{{$customer->FirstName}}</td>
<td>{{$customer->LastName}}</td>
<td>{{$customer->EmailAddress}}</td>
</tr>
@endforeach
</table>






