@extends( 'layouts.app' )
@section( 'content' )
@section( 'title', 'Simplifying and visualising finance' )

    <br>
    <div class="jumbotron">
        <h2>Simplifying and visualising finance</h2>
        {{-- <p>For me, for you, for everyone.</p> --}}
        <p>Acid Finance helps you by visualising your incomes and expenses, cut down unnecessary costs and save money.</p>
    </div>
    <br><br>
    <h3 class="text-center">Sponsors</h3>
    <hr><br><br>
    <div class="swiper-container sponsors">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper swiper-no-swiping">
            <!-- Slides -->
            <div class="swiper-slide text-center">
                <a href="{{ url( 'https://orgotech.com' ) }}">
                    <img src="{{ asset( '/img/orgotech.svg' ) }}" alt="Orgo Tech logo" data-toggle="tooltip" data-placement="top" title="Orgo Tech">
                </a>
            </div>
            <div class="swiper-slide text-center">
                <a href="{{ url( 'https://orgowebb.se' ) }}">
                    <img src="{{ asset( '/img/orgowebb.svg' ) }}" alt="Orgo Webb logo"  data-toggle="tooltip" data-placement="top" title="Orgo Webb">
                </a>
            </div>
        </div>
    </div>
    <br><br><hr><br><br>
    <div class="d-none d-md-block">
        <div class="d-flex flex-row">
            <div class="col-8">
                <h2>Save money</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            </div>
            <div class="col-4 d-flex align-items-center justify-content-center">
                <img src="{{ asset( '/img/save-money.svg' ) }}" alt="Bundle of money">
            </div>
        </div>
        <br><br><hr><br><br>
        <div class="d-flex flex-row">
            <div class="col-4 d-flex align-items-center justify-content-center">
                <img src="{{ asset( '/img/visualise-money.svg' ) }}" alt="Hand holding some coins and bills">
            </div>
            <div class="col-8">
                <h2>Visualise you economy</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            </div>
        </div>
        <br><br><hr><br><br>
        <div class="d-flex flex-row">
            <div class="col-8">
                <h2>Calculate your leftovers</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            </div>
            <div class="col-4 d-flex align-items-center justify-content-center">
                <img src="{{ asset( '/img/calculate-money.svg' ) }}" alt="Calculator, dollar bill and two graphs">
            </div>
        </div>
    </div>
    <div class="d-block d-md-none text-center">
        <div class="row">
            <div class="col-12">
                <img src="{{ asset( '/img/save-money.svg' ) }}" alt="Bundle of money">
            </div>
            <div class="col-12">
                <br>
                <h2>Save money</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            </div>
        </div>
        <br><br><hr><br><br>
        <div class="row">
            <div class="col-12">
                <img src="{{ asset( '/img/visualise-money.svg' ) }}" alt="Hand holding some coins and bills">
            </div>
            <div class="col-12">
                <br>
                <h2>Visualise you economy</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            </div>
        </div>
        <br><br><hr><br><br>
        <div class="row">
            <div class="col-12">
                <img src="{{ asset( '/img/calculate-money.svg' ) }}" alt="Calculator, dollar bill and two graphs">
            </div>
            <div class="col-12">
                <br>
                <h2>Calculate your leftovers</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            </div>
        </div>
    </div>

@endsection
