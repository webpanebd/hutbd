<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{csrf_token()}}">
<meta name="description" content="{{site()->description}}">
<meta name="keywords" content="{{site()->keywords}}">
{{-- Facebook Meta Tags --}}
<meta property="og:title" content="{{site()->title}}">
<meta property="og:description" content="{{site()->description}}">
<meta property="og:image" content="{{asset(site()->logo)}}">
<meta property="og:url" content="{{config('app.url')}}">

{{-- Twitter Meta Tags --}}

<meta name="twitter:title" content="{{site()->title}}">
<meta name="twitter:description" content="{{site()->description}}">
<meta name="twitter:image" content="{{asset(site()->logo)}}">
