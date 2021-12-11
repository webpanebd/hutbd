
<!DOCTYPE html>
<html lang="en_US">
<head>
    
    @livewire('frontend.partials.head')
    <title>{{ config('app.name', 'Laravel') }}</title>
    @livewireStyles
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

   
    @livewire('frontend.partials.hamburger')
    <!-- Header Section Begin -->
    @livewire('frontend.partials.header')
    <!-- Header Section End -->

    <!-- Hero Section Begin -->
    @livewire('frontend.partials.hero')
    <!-- Hero Section End -->

    {{$slot}}
    <!-- Footer Section Begin -->
    @livewire('frontend.partials.footer')
    <!-- Footer Section End -->
    @livewireScripts

    <!-- Js Plugins -->

    @livewire('frontend.partials.js')

    <script>
        Livewire.on("notLoggedIn",function(){
            alert("You are not logged in.")
        });
        Livewire.on("cartAdded",function(){
            alert("This product is added to your cart")
        });
    </script>


</body>

</html>