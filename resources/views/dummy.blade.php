@extends("admin.master")

@section("content")

<p>{{addDays(now(),4,"d M,Y")}}</p>
<p>{{Str::uuid()}}</p>

@endsection