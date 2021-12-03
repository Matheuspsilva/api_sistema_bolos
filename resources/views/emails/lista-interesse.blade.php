<div>
    <p>
        Olá, {{ $lista_interesse->cliente->nome }}!
        <br>
        @if(count($lista_interesse->tipo_bolo->bolos) > 0)
            O bolo de {{ $lista_interesse->tipo_bolo->nome }} está disponível em nosso estoque.
        @else
            O bolo de {{ $lista_interesse->tipo_bolo->nome }} está indisponível no momento.
        @endif
    </p>
</div>
