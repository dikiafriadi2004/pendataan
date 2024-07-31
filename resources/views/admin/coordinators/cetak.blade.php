<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        table {
            font-family: 'Arial';
            margin: 25px auto;
            border-collapse: collapse;
            border: 1px solid #eee;
            border-bottom: 2px solid #00cccc;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.10),
                0px 10px 20px rgba(0, 0, 0, 0.05),
                0px 20px 20px rgba(0, 0, 0, 0.05),
                0px 30px 20px rgba(0, 0, 0, 0.05);

            tr {
                &:hover {
                    background: #f4f4f4;

                    td {
                        color: #555;
                    }
                }
            }

            th,
            td {
                color: #999;
                border: 1px solid #eee;
                padding: 12px 35px;
                border-collapse: collapse;
            }

            th {
                background: #00cccc;
                color: #fff;
                text-transform: uppercase;
                font-size: 12px;

                &.last {
                    border-right: none;
                }
            }
        }
    </style>
    <title>Pendataan</title>
</head>

<body>
    <table>
        <thead>
            <tr>
                <th>Header</th>
                <th>Header</th>
                <th>Header</th>
                <th>Header</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Item</td>
                <td>Item</td>
                <td>Item</td>
                <td>Item</td>
            </tr>
            <tr>
                <td>Item</td>
                <td>Item</td>
                <td>Item</td>
                <td>Item</td>
            </tr>
            <tr>
                <td>Item</td>
                <td>Item</td>
                <td>Item</td>
                <td>Item</td>
            </tr>
            <tr>
                <td>Item</td>
                <td>Item</td>
                <td>Item</td>
                <td>Item</td>
            </tr>
        </tbody>
    </table>
</body>

</html>
