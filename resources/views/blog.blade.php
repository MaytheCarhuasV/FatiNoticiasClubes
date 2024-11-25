@extends("template")
@section('content')
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    Agregar
</button>
<p></p>


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Mantenimiento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">



                <form action="" method="post" role="form" id="blog" name="blog">
                 <input type="hidden" name="id">
                    {{ csrf_field() }}
                  Título
                    <input type="text" name="title" class="form-control">
                    Descripción

                    <input type="text" name="description" class="form-control">
                    <p></p>
                    <button class="btn btn-primary" onclick="blogStore()">
                        Guardar
                    </button>
                    <button class="btn btn-primary" onclick="blogUpdate()">
                        Modificar
                    </button>
                </form>



            </div>
            <div class="modal-footer">
                {{-- <input type="button" value="Nuevo" class="btn btn-warning"
                    onclick="New();$('#blog')[0].reset(); blog.fotografia.src='https://via.placeholder.com/150';"
                    name="new"> --}}
                {{-- <input type="button" value="Guardar" class="btn btn-success" onclick="blogStore()" id="create">
                <input type="button" value="Modificar" class="btn btn-danger" onclick="blogUpdate();"
                    id="update"> --}}
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div id="mycontent">
    @include('blogtable')
</div>
@endsection