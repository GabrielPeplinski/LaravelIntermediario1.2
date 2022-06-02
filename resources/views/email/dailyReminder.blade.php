@component('mail::message')
# Lembrete Diário

Você tem um livro emprestado da Biblioteca Let's!

Boa Leitura e não esqueça de devolvê-lo mais tarde!

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
