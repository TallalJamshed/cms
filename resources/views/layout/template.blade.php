
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    @include('partials.header')
    <body class="animsition">
    @include('partials.navbar')
    <?php $data = Helper::cardData();?>
    @include('partials.cards' , ['data' => $data])
    @if(Session::has('message'))
        <p id="message" style="color:black" class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
    @endif
    
    @yield('content')
    
    @include('partials.footer')
    </body>
</html>
