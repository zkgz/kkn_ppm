@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card mt-5">
        <div class="card-header text-center">
            Data Pajak Per Bulan dari Wajib Pajak di Kota Parepare
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col text-center">
                    <canvas id="timeline"></canvas>
                </div>
            </div>
            <div class="row">
                <div class="col text-center">
                    <canvas id="potensi"></canvas>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table id="table" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Region</th>
                        <th>Restaurant</th>
                        <th>Hotel</th>
                        <th>Property</th>
                        <th>Parking</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($taxpayers as $taxpayer)
                    <tr>
                        <td>{{$taxpayer['Region']}}</td>
                        <td><label>Rp. </label><label class="uang">{{$taxpayer['Restaurant']}}+"00"</label></td>
                        <td><label>Rp. </label><label class="uang">{{$taxpayer['Hotel']}}+"00"</label></td>
                        <td><label>Rp. </label><label class="uang">{{$taxpayer['Property']}}+"00"</label></td>
                        <td><label>Rp. </label><label class="uang">{{$taxpayer['Parking']}}+"00"</label></td>
                        <td><label>Rp. </label><label class="uang">{{$taxpayer['Parking'] + $taxpayer['Hotel'] + $taxpayer['Property'] + $taxpayer['Restaurant']}}+"00"</label></td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tfoot>
            </table>
        </div>
    </div>
</div>
<script>
    
    var ctx = document.getElementById('timeline');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['2014', '2015', '2016', '2017', '2018'],
            datasets: [{
                label: 'Restaurant',
                type: 'bar',
                data: [1990241346, 2192355709, 2305721570, 2390851007, 2608184399],
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
            },{
                label: 'Hotel',
                type: 'bar',
                data: [870230329, 903066650, 982834818, 1133622601, 1108908632],
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            },{
                label: 'Property',
                type: 'bar',
                data: [4177279190, 4586714234, 4565163375, 4961613484, 4712637825],
                backgroundColor: 'rgba(255, 206, 86, 0.2)',
                borderColor: 'rgba(255, 206, 86, 1)',
                borderWidth: 1
            },{
                label: 'Parking',
                type: 'bar',
                data: [389059000, 406476000, 476587000, 534474000, 541510000],
                backgroundColor: 'rgba(255, 159, 64, 0.5)',
                borderColor: 'rgba(255, 159, 64, 1)',
                borderWidth: 1
            }
            ]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                        callback:function(value, index, values) {
                            if(parseInt(value) >= 1000){
                                return 'Rp. ' + value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")+'.00';
                            } else {
                                return 'Rp. ' + value+'.00';
                            }
                        }
                    }
                }]
            },tooltips: {
                callbacks: {
                    label: function(tooltipItem, data) {
                        return "Rp. " + Number(tooltipItem.yLabel).toFixed(0).replace(/./g, function(c, i, a) {
                        return i > 0 && c !== "." && (a.length - i) % 3 === 0 ? "," + c : c;
                    })+".00";
                }
            }
            }
        }
    });
    
    
    ctx = document.getElementById('potensi');
    myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Restaurant', 'Hotel', 'Property', 'Parking'],
            datasets: [{
                label: '2018 (Real)',
                data: [2608184399, 1108908632, 4712637825, 541510000],
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
            },{
                label: '2019 (Potensi)',
                data: [{{$potensi['restaurant']*12}}, {{$potensi['hotel']*12}}, {{$potensi['property']*12}}, {{$potensi['parking']*12*2}}],
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                        callback: function(value, index, values) {
                            if(parseInt(value) >= 1000){
                                return 'Rp. ' + value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")+'.00';
                            } else {
                                return 'Rp. ' + value+'.00';
                            }
                        }
                    }
                }]
            },tooltips: {
                callbacks: {
                    label: function(tooltipItem, data) {
                        return "Rp. " + Number(tooltipItem.yLabel).toFixed(0).replace(/./g, function(c, i, a) {
                        return i > 0 && c !== "." && (a.length - i) % 3 === 0 ? "," + c : c;
                    })+".00";
                }
            }
            }
        }
    });
</script>
@endsection