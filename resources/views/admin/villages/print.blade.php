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
    <h2 style="text-align: center">Daftar Keanggotaan Kampung {{ $village->name }}</h2>
    <table class="border-table">
        <tr class="border-table">
            <th class="border-table" style="text-align: center; height: 20px; width: 50px">No</th>
            <th class="border-table" style="text-align: center; height: 20px; width: 150px;">NIK</th>
            <th class="border-table" style="text-align: center; height: 20px; width: 180px;">Nama</th>
            <th class="border-table" style="text-align: center; height: 20px; width: 150px;">No Handphone
            </th>
            <th class="border-table" style="width: 150px; height: 20px; text-align: center;">Koordinator</th>
            <th class="border-table" style="width: 130px; height: 20px; text-align: center;">Kategori</th>
            <th class="border-table" style="width: 70px; height: 20px; text-align: center;">TPS</th>
            <th class="border-table" style="width: 80px; height: 20px; text-align: center;">Paraf</th>
        </tr>
        @forelse ($village->members as $member)
            <tr>
                <td class="border-table" style="text-align: center; ; padding: 5px; height: 20px;">{{ $loop->iteration }}</td>
                <td class="border-table" style="padding-left: 5px; height: 20px;">{{ $member->nik }}</td>
                <td class="border-table" style="padding-left: 5px; height: 20px;">{{ $member->name }}</td>
                <td class="border-table" style="padding-left: 5px; height: 20px;">{{ $member->no_hp }}</td>
                <td class="border-table" style="padding-left: 5px; height: 20px;">{{ $member->coordinator->name }}</td>
                <td class="border-table" style="padding-left: 5px; height: 20px;">{{ $member->coordinator->category->name }}</td>
                <td class="border-table"style="text-align: center; height: 20px;">{{ $member->tps }}</td>
                <td class="border-table" >&nbsp;&nbsp;&nbsp;&nbsp;</td>
            </tr>
        @empty
            Belum ada data terbaru
        @endforelse

    </table>
</body>

</html>
