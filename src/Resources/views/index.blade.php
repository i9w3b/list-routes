@extends(config('listroutes.view_layout'))

@section('css')
<!-- plugin css -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
<style>
.cls-middleware {
overflow: hidden;
white-space: nowrap;
text-overflow: ellipsis;
}
</style>
@endsection

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-body">
                        <h5 class="mt-0 header-title" id="structure">(<span class="text-primary">{{ $ListRoutes->count }}</span>) @lang('Rotas')</h5>
                        <div class="material-datatables">
                            <div class="toolbar"></div>
                            <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>
                                            @lang('Métodos')</th>
                                        <th>
                                            @lang('Url')</th>
                                        <th>
                                            @lang('Nome')</th>
                                        <th>
                                            @lang('Action')</th>
                                        <th>
                                            @lang('Middleware')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $trColours = ['1' => 'active', '2' => 'info', '3' => 'warning', '4' => 'success']; ?>
                                    @foreach ($ListRoutes->routes as $route)
                                    @php
                                    $tbTr = ' class="table-' . 'i9' . '"';
                                    $uriCk=explode('/',$route->uri());
                                    if (is_array($uriCk)) {
                                    $uriCt=$uriCk[0];
                                    }else {
                                    $uriCt=null;
                                    }
                                    if (isset($uriAt)) {
                                    if ($uriCt != $uriAt) {
                                    if ($iColor == 4) {
                                    $iColor=1;
                                    }else {
                                    $iColor++;
                                    }
                                    $tbTr = ' class="table-' . $trColours[$iColor] . '"';
                                    $uriAt=$uriCt;
                                    }else {
                                    $tbTr = ' class="table-' . $trColours[$iColor] . '"';
                                    }
                                    }else {
                                    $uriAt=$uriCk[0];
                                    $iColor=1;
                                    $tbTr = ' class="table-' . $trColours[$iColor] . '"';
                                    }
                                    @endphp
                                    <tr{!! $tbTr !!}>
                                        <td scope="row" style="max-width:130px;">
                                            @foreach (array_diff($route->methods(), $ListRoutes->hideMethods) as $method)
                                            <span class="badge badge-{{ $ListRoutes->methodColours[$method] }}">{{ $method }}</span>
                                            @endforeach
                                        </td>
                                        <td>{!! preg_replace('#({[^}]+})#', '<span class="text-primary">$1</span>', $route->uri()) !!}</td>
                                        <td>{{ $route->getName() }}</td>
                                        <td>{!! preg_replace('#(@.*)$#', '<span class="text-primary">$1</span>', $route->getActionName()) !!}</td>
                                        <td class="cls-middleware" style="max-width:400px;">
                                            @if (is_callable([$route, 'controllerMiddleware']))
                                            {{ implode(', ', array_map($ListRoutes->middlewareClosure, array_merge($route->middleware(), $route->controllerMiddleware()))) }}
                                            @else
                                            {{ implode(', ', $route->middleware()) }}
                                            @endif
                                        </td>
                                        </tr>
                                        @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>
                                            @lang('Métodos')</th>
                                        <th>
                                            @lang('Url')</th>
                                        <th>
                                            @lang('Nome')</th>
                                        <th>
                                            @lang('Action')</th>
                                        <th>
                                            @lang('Middleware')</th>
                                    </tr>
                                </tfoot>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection

@section('js')
<!-- datatable js -->
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function() {
        $('#datatables').DataTable({
            "pagingType": "full_numbers",
            "displayLength": 20,
            "lengthMenu": [
                [10, 20, 30, 40, 50, 100, -1],
                [10, 20, 30, 40, 50, 100, "All"]
            ],
            "order": [
                [1, 'asc']
            ],
            responsive: true,
            language: {
                url: "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese-Brasil.json",
                search: "_INPUT_",
                searchPlaceholder: "Pesquisar rotas...",
                sZeroRecords: "Nenhum registro encontrado"
            }
        });
        var table = $('#datatable').DataTable();
    });
</script>
@endsection
