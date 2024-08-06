<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        th {
            text-align: left;
        }

        .mb-1 {
            margin-bottom: 1em;
        }

        .border-table {
            border: 1px solid black;
        }

        table {
            border-collapse: collapse;
            width: 50%;
        }
    </style>
    <title>Document</title>
</head>

<body>
    <h2 style="text-align: center">Daftar Koordinator</h2>
    {{-- <table class="mb-1" style="border: none !important;">
        <tr>
            <th>Nama </th>
            <td>: #K{{ $coordinator->id }} {{ $coordinator->name }}</td>
        </tr>
        <tr>
            <th>NIK </th>
            <td>: {{ $coordinator->nik }}</td>
        </tr>
        <tr>
            <th>No Handphone </th>
            <td>: {{ $coordinator->no_hp }}</td>
        </tr>
        <tr>
            <th>Kategori </th>
            <td>: {{ $coordinator->category->name }}</td>
        </tr>
    </table> --}}

    <table class="border-table">
        <tr class="border-table">
            <th class="border-table" style="text-align: center; height: 20px; width: 50px">No</th>
            <th class="border-table" style="text-align: center; height: 20px; width: 180px;">NIK</th>
            <th class="border-table" style="text-align: center; height: 20px; width: 180px;">Nama</th>
            <th class="border-table" style="text-align: center; height: 20px; width: 180px;">No Handphone
            </th>
            <th class="border-table" style="width: 150px; height: 20px; text-align: center;">Gampong</th>
            {{-- <th class="border-table" style="height: 20px; width: 100px; text-align: center; padding: 20px;">TPS</th>
            <th class="border-table" style="height: 20px; width: 100px; text-align: center; padding: 20px;">Paraf</th> --}}
        </tr>
        @forelse ($coordinators as $coordinator)
            <tr>
                <td class="border-table" style="text-align: center; ; padding: 5px; height: 20px;">{{ $loop->iteration }}</td>
                <td class="border-table" style="padding-left: 5px; height: 20px;">{{ $coordinator->nik }}</td>
                <td class="border-table" style="padding-left: 5px; height: 20px;">{{ $coordinator->name }}</td>
                <td class="border-table" style="padding-left: 5px; height: 20px;">{{ $coordinator->no_hp }}</td>
                <td class="border-table" style="padding-left: 5px; height: 20px;">{{ $coordinator->village->name }}</td>
                {{-- <td class="border-table"style="text-align: center; height: 50px; padding: 20px;" >{{ $member->tps }}</td>
                <td class="border-table" style="height: 50px; padding: 20px;" >&nbsp;&nbsp;&nbsp;&nbsp;</td> --}}
            </tr>
        @empty
            Belum ada data terbaru
        @endforelse

    </table>
</body>

</html>
