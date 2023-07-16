@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body text-center">
                        <h1 class="display-4">BMA stock</h1>
                        <p class="lead">Bem vindo</p>
                        <div class="d-grid gap-2">
                            <a href="{{ route('login') }}" class="btn btn-primary btn-lg">Fazer Login</a>
                            <a href="{{ route('register') }}" class="btn btn-secondary btn-lg">Criar Conta</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer bg-light text-center py-3 position-fixed bottom-0 w-100">
        <div class="container">
            &copy; {{ date('Y') }} Realizado em processo seletivo para <a href="https://bmasolucoesdigitais.com.br/">BMA soluções digitais</a>. Todos os direitos reservados.
        </div>
    </footer>
@endsection
