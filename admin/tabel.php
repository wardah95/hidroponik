<?php
include '../config/koneksi.php';

$view    = "SELECT * FROM tabel ";
$hasil   = mysqli_query($konek, $view)or die(mysql_error());
$data    = mysqli_fetch_array($hasil);
?>
    
<div class="content">
    <div class="card-header">
        <h2 class="text-center"> tes tebel </h2>         
    </div>
    <div class="card-body">
    <div class="table-responsive">
        <table class="table">
            <thead class=" text-primary">
                <th></th>
                <th><b>ID</b></th>
                <th><b>WAKTU</b></th>
                <th><b>SUHU</b></th>
                <th><b>KELEMBAPAN</b></th>
            </thead>
            <tbody>
                <tr>
                <!-- <td class=" text-primary">Minggu 1</td> -->
                <td><?php echo $data["id_tabel"]; ?></td>
                <td><?php echo $data['waktu']; ?> </td>
                <td><?php echo $data['suhu']; ?> °C </td>
                <td><?php echo $data['kelembaban']; ?> %</td>
                </tr>
            </tbody>
        </table>
        </div>
    </div>
    <div class="row">
    <div id="data_barang"></div>
    </div>
</div>

<script type="text/javascrip">
Highcharts.chart('container', {

chart: {
    scrollablePlotArea: {
        minWidth: 700
    }
},

data: {
    csvURL: 'https://cdn.jsdelivr.net/gh/highcharts/highcharts@v7.0.0/samples/data/analytics.csv',
    beforeParse: function (csv) {
        return csv.replace(/\n\n/g, '\n');
    }
},

title: {
    text: 'Daily sessions at www.highcharts.com'
},

subtitle: {
    text: 'Source: Google Analytics'
},

xAxis: {
    tickInterval: 7 * 24 * 3600 * 1000, // one week
    tickWidth: 0,
    gridLineWidth: 1,
    labels: {
        align: 'left',
        x: 3,
        y: -3
    }
},

yAxis: [{ // left y axis
    title: {
        text: null
    },
    labels: {
        align: 'left',
        x: 3,
        y: 16,
        format: '{value:.,0f}'
    },
    showFirstLabel: false
}, { // right y axis
    linkedTo: 0,
    gridLineWidth: 0,
    opposite: true,
    title: {
        text: null
    },
    labels: {
        align: 'right',
        x: -3,
        y: 16,
        format: '{value:.,0f}'
    },
    showFirstLabel: false
}],

legend: {
    align: 'left',
    verticalAlign: 'top',
    borderWidth: 0
},

tooltip: {
    shared: true,
    crosshairs: true
},

plotOptions: {
    series: {
        cursor: 'pointer',
        point: {
            events: {
                click: function (e) {
                    hs.htmlExpand(null, {
                        pageOrigin: {
                            x: e.pageX || e.clientX,
                            y: e.pageY || e.clientY
                        },
                        headingText: this.series.name,
                        maincontentText: Highcharts.dateFormat('%A, %b %e, %Y', this.x) + ':<br/> ' +
                            this.y + ' sessions',
                        width: 200
                    });
                }
            }
        },
        marker: {
            lineWidth: 1
        }
    }
},

series: [{
    name: 'All sessions',
    lineWidth: 4,
    marker: {
        radius: 4
    }
}, {
    name: 'New users'
}]
});
</script>