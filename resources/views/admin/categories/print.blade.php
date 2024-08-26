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

        table tr, td, th {
            text-transform: uppercase;
            /* text-transform: lowercase; */
        }
    </style>
    <title>Document</title>
</head>

<body>
    <h2 style="text-align: center">Daftar Kategori Koordinator</h2>
    <table class="mb-1" style="border: none !important;">
        <tr>
            <th>Kategori </th>
            <td>: {{ $category->name }}</td>
        </tr>
        {{-- <tr>
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
        </tr> --}}
    </table>

    <table class="border-table">
        <tr class="border-table">
            <th class="border-table" style="text-align: center; height: 20px; width: 50px">No</th>
            <th class="border-table" style="text-align: center; height: 20px; width: 180px;">NIK</th>
            <th class="border-table" style="text-align: center; height: 20px; width: 180px;">Nama</th>
            <th class="border-table" style="text-align: center; height: 20px; width: 180px;">Kategori</th>
        </tr>
        @forelse ($category->coordinators as $coordinator)
            <tr>
                <td class="border-table" style="text-align: center; ; padding: 5px; height: 20px;">{{ $loop->iteration }}</td>
                <td class="border-table" style="padding-left: 5px; height: 20px;">{{ $coordinator->nik }}</td>
                <td class="border-table" style="padding-left: 5px; height: 20px;">{{ $coordinator->name }}</td>
                <td class="border-table" style="padding-left: 5px; height: 20px;">{{ $category->name }}</td>
            </tr>
        @empty
            Belum ada data terbaru
        @endforelse

    </table>
</body>

</html>
