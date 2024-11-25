
<table border="1">
    <thead>
        <th>opciones</th>
        <th>Id </th>
        <th>Título </th>
        <th>Descripcion </th>

    </thead>


    @foreach ($blog as $blogs)
        <tr>
            <td>
                <button class="btn bg-warning"
                data-toggle="modal" data-target="#exampleModal"
                onclick="blogEdit('{{ $blogs->id }}')">Editar</button>
                <button class="btn bg-danger" onclick="blogDestroy('{{ $blogs->id }}')">
                Borrar</button>

            </td>
            <td>
                {{ $blogs->id }}

            </td>

            <td>
                {{ $blogs->title }}

            </td>
            <td>
                {{ $blogs->description }}

            </td>
        </tr>
    @endforeach
</table>
