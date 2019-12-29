@include('adm.partials.header')

<div class="container-fluid">
    <div class="d-flex justify-content-center position-relative h-100 mt-5">
        <div class="row justify-content-center w-100">
            <div class="col-xl-3">
                <img src="{{asset('/img/logo/logo.png')}}" class="w-75 mx-auto d-block mb-3" alt="logo"/>
                <form method="GET" action="login" onsubmit="event.preventDefault();submit()">
                    <div class="form-group">
                        <label for="user">Usuario</label>
                        <input type="text" class="form-control" name="user" id="user" placeholder="Usuario">
                    </div>
                    <div class="form-group">
                        <label for="pass">Contraseña</label>
                        <input type="password" class="form-control" name="pass" id="pass" placeholder="Contraseña">
                    </div>
                    <button type="submit" class="btn btn-block btn-info">Login</button>
                </form>
            </div>
        </div>
    </div>
</div>

@include('adm.partials.footer')