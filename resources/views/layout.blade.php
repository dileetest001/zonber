<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        @include('common/head')
    </head>
    @yield('sass')
    <body>
      <div class="container">
            
        <nav class="navbar navbar-default">
          <div class="container-fluid">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#">Zonber</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav">
                @foreach (config('app.access_coin') as $coin)
                    <li><a href="/homepage/view/coin/{{ $coin }}">{{ strtoupper($coin) }}</a></li>
                @endforeach
              </ul>
            </div>
          </div>
        </nav>
        
        <div id="app">
            <div class="row">
                <!-- 정보 -->
                <div class='col-lg-8 col-xs-12'>
                    @yield('info')
                </div>
                    
                <!-- 대화 -->
                <div class='col-lg-4 col-xs-12'>
                    @yield('chat')
                </div>
            </div>
        </div>    
        
        
      </div>
    </body>
    @yield('script')
</html>