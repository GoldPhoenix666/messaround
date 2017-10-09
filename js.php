<html>

<head>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript">
function drawChart () {
    var data = new google.visualization.DataTable();
    data.addColumn('string', 'Name');
    data.addColumn({type: 'string', role: 'annotation'});
    data.addColumn('number', 'Value');

    data.addRows([
        ['Foo', null, 4],
        ['Bar', null, 3],
        ['Baz', null, 7],
        ['Bat', null, 9],
        ['Cad', 'Vertical line here', 9],
        ['Qud', null, 2],
        ['Piz', null, 6]
    ]);

    var chart = new google.visualization.LineChart(document.querySelector('#chart_div'));
    chart.draw(data, {
        height: 300,
        width: 400,
        annotation: {
            // index here is the index of the DataTable column providing the annotation
            1: {
                style: 'line'
            }
        }
    });
}
</script>


</head>

<body>
<div id="chart_div"></div>
</body>

</html>