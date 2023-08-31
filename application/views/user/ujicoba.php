<!DOCTYPE html>
<html>

<head>
    <title>Data from Database</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <h1>Data from Database</h1>
    <div id="dataContainer">
        <table>
            <thead>
                <tr>
                    <th>Year</th>
                    <th>Month</th>
                    <th>Average pH</th>
                </tr>
            </thead>
            <tbody id="dataBody">

            </tbody>
        </table>
    </div>

    <script>
        $(document).ready(function() {
            $.ajax({
                url: '<?= base_url('user/getAverage'); ?>',
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    var dataFromDatabase = response;

                    var tbody = $('#dataBody'); // Select the tbody element

                    $.each(dataFromDatabase.average_jan, function(index, data) {
                        var row = '<tr><td>' + data.year + '</td><td>' + data.month + '</td><td>' + data.average + '</td></tr>';
                        tbody.append(row);
                    });

                    $.each(dataFromDatabase.average_feb, function(index, data) {
                        var row = '<tr><td>' + data.year + '</td><td>' + data.month + '</td><td>' + data.average + '</td></tr>';
                        tbody.append(row);
                    });

                    $.each(dataFromDatabase.average_mar, function(index, data) {
                        var row = '<tr><td>' + data.year + '</td><td>' + data.month + '</td><td>' + data.average + '</td></tr>';
                        tbody.append(row);
                    });

                    $.each(dataFromDatabase.average_apr, function(index, data) {
                        var row = '<tr><td>' + data.year + '</td><td>' + data.month + '</td><td>' + data.average + '</td></tr>';
                        tbody.append(row);
                    });

                    $.each(dataFromDatabase.average_mei, function(index, data) {
                        var row = '<tr><td>' + data.year + '</td><td>' + data.month + '</td><td>' + data.average + '</td></tr>';
                        tbody.append(row);
                    });

                    $.each(dataFromDatabase.average_june, function(index, data) {
                        var row = '<tr><td>' + data.year + '</td><td>' + data.month + '</td><td>' + data.average + '</td></tr>';
                        tbody.append(row);
                    });

                    $.each(dataFromDatabase.average_july, function(index, data) {
                        var row = '<tr><td>' + data.year + '</td><td>' + data.month + '</td><td>' + data.average + '</td></tr>';
                        tbody.append(row);
                    });

                    $.each(dataFromDatabase.average_august, function(index, data) {
                        var row = '<tr><td>' + data.year + '</td><td>' + data.month + '</td><td>' + data.average + '</td></tr>';
                        tbody.append(row);
                    });

                    $.each(dataFromDatabase.average_sept, function(index, data) {
                        var row = '<tr><td>' + data.year + '</td><td>' + data.month + '</td><td>' + data.average + '</td></tr>';
                        tbody.append(row);
                    });

                    $.each(dataFromDatabase.average_okt, function(index, data) {
                        var row = '<tr><td>' + data.year + '</td><td>' + data.month + '</td><td>' + data.average + '</td></tr>';
                        tbody.append(row);
                    });

                    $.each(dataFromDatabase.average_nov, function(index, data) {
                        var row = '<tr><td>' + data.year + '</td><td>' + data.month + '</td><td>' + data.average + '</td></tr>';
                        tbody.append(row);
                    });

                    $.each(dataFromDatabase.average_des, function(index, data) {
                        var row = '<tr><td>' + data.year + '</td><td>' + data.month + '</td><td>' + data.average + '</td></tr>';
                        tbody.append(row);
                    });

                    console.log(dataFromDatabase);
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });
    </script>
</body>

</html>