<table id="citas-table" class="table border-primary mt-5 table-hover">
    <thead class="table-primary">
        <tr>
            <th><strong>Id</strong></th>
            <th><strong>Doc</strong></th>
            <th><strong>Identificacion</strong></th>
            <th><strong>Nombre</strong></th>
            <th><strong>Apellido</strong></th>
            <th><strong>Fecha-Cita</strong></th>
            <th><strong>Hora-Cita</strong></th>
            <th><strong>Turno</strong></th>
            <th><strong>Fecha-Turno</strong></th>
            <th><strong>Tiempo de Atencio</strong>n</th>
            <th><strong>Estado</strong></th>
            <th><strong>Tramite</strong></th>
        </tr>
    </thead>

    <tbody>
        @foreach ($citas as $cita)
            @if ($cita->turnos->isEmpty())
                <tr>
                    <td>{{ $cita->id }}</td>
                    <td>{{ $cita->documento }}</td>
                    <td>{{ $cita->identificacion }}</td>
                    <td>{{ $cita->nombre }}</td>
                    <td>{{ $cita->apellido }}</td>
                    <td>{{ $cita->fechaCita }}</td>
                    <td>{{ $cita->hora }}</td>
                    <td>----</td>
                    <td>----</td>
                    <td>----</td>
                    <td>{{ $cita->estado->name }}</td>
                    <td>{{ $cita->tramite->name }}</td>
                </tr>
            @else
                @foreach ($cita->turnos as $turno)
                    <tr>
                        <td>{{ $cita->id }}</td>
                        <td>{{ $cita->documento }}</td>
                        <td>{{ $cita->identificacion }}</td>
                        <td>{{ $cita->nombre }}</td>
                        <td>{{ $cita->apellido }}</td>
                        <td>{{ $cita->fechaCita }}</td>
                        <td>{{ $cita->hora }}</td>
                        <td>{{ $turno->name }}</td>
                        <td>{{ $turno->created_at->format('d-m-Y H:i:s') }}</td>
                        <td>{{ $turno->time }}</td>
                        <td>{{ $cita->estado->name }}</td>
                        <td>{{ $cita->tramite->name }}</td>
                    </tr>
                @endforeach
            @endif
        @endforeach
    </tbody>
</table>