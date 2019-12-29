<div class="container-fluid bg-light">
    @include('adm.flash-message')
    <div class="position-relative h-100 w-100 d-flex justify-content-center align-items-center">
        <div class="col-xl-4">
            <img src="{{ asset('img/logo/logo.png') }}" alt="Logo" class="mx-auto mb-4 d-block w-75"/>
            <div class="card">
                <form class="col s12 mb-0 pt-3" method="post" action="{{ route('login') }}">
                    @csrf
                    @method('POST')
                    <div class="row">
                        <div class="input-field col s6">
                            <i class="material-icons prefix">account_circle</i>
                            <input type="text" id="user" name="username" class="validate" required/>
                            <label for="user">Usuario</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <i class="material-icons prefix">vpn_key</i>
                            <input type="password" id="pass" name="password" class="validate" required/>
                            <label for="pass">Contraseña</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s6">
                            <button class="waves-effect waves-light btn-block btn-solo" type="submit">Login</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>