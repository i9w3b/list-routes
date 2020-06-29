<p align="center" class="text-center" style="text-align:center;"><a href="https://github.com/i9w3b" target="_blank"><img src="https://cdn.jsdelivr.net/gh/i9w3b/cdn/img/logo-200px.png" width="200"></a></p>
<p align="center" class="text-center" style="text-align:center;">
<p align="center" class="text-center" style="text-align:center;">
<a href="https://github.com/i9w3b/list-routes/blob/master/LICENSE.md"><img src="https://img.shields.io/github/license/i9w3b/list-routes" alt="License"></a>
<a href="https://github.com/i9w3b/list-routes"><img src="https://img.shields.io/github/languages/count/i9w3b/list-routes" alt="GitHub Language Count"></a>
<a href="https://github.com/i9w3b/list-routes"><img src="https://img.shields.io/github/repo-size/i9w3b/list-routes" alt="GitHub Repo Size"></a>
<a href="https://github.com/i9w3b/list-routes/releases"><img src="https://img.shields.io/github/v/release/i9w3b/list-routes" alt="GitHub Release"></a>
<a href="https://packagist.org/packages/i9w3b/list-routes"><img alt="Packagist Downloads" src="https://img.shields.io/packagist/dt/i9w3b/list-routes"></a>
</p>

# ListRoutes

Visualizar rotas (Navegador Web) Laravel.

## Instalação

Execute o seguinte comando:

```bash
composer require i9w3b/list-routes --dev
```

Por padrão, o pacote cria uma rota em /routes, e deve ser ativada. Para configurar isso, execute o seguinte comando:

```bash
php artisan vendor:publish --provider="I9w3b\ListRoutes\ListRoutesServiceProvider"
```

```bash
    /*
    |--------------------------------------------------------------------------
    | Publicar rotas
    |--------------------------------------------------------------------------
    */
    'routes_show' => true,
```

## Segurança

Caso descubra algum problema relacionado à segurança, envie um e-mail para `marcelosenaonline@gmail.com` em vez de usar o rastreador de problemas.

## Licença

[MIT](https://github.com/i9w3b/list-routes/blob/master/LICENSE.md) © [i9W3b](https://github.com/i9w3b) | Consulte [LICENSE.md](https://github.com/i9w3b/list-routes/blob/master/LICENSE.md) para obter mais informações.

