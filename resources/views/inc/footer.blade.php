    </div>
    
    <!-- jQuery first, then Popper, then Bootstrap -->
    <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0/dist/Chart.min.js" integrity="sha256-Uv9BNBucvCPipKQ2NS9wYpJmi8DTOEfTA/nH2aoJALw=" crossorigin="anonymous"></script>
    
    <!-- Datatable -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/datatables.min.css') }}"/>
    <script type="text/javascript" src="{{ asset('js/datatables.min.js') }}"></script>
    
    <!-- Script for Datatables -->
    <script>
        $(document).ready(function(){
            var table = $('#table').DataTable();
            $('#table tfoot th').each( function () {
                var title = $(this).text();
                $(this).html( '<input class="form-control" type="text" placeholder="Search '+title+'" />' );
            } );
            
            table.columns().every( function () {
                var that = this;
                
                $( 'input', this.footer() ).on( 'keyup change', function () {
                    if ( that.search() !== this.value ) {
                        that
                        .search( this.value )
                        .draw();
                    }
                });
            });
        });
    </script>
    
    <!-- Footer Bar -->
    <footer class="py-4 bg-dark text-white-50">
        <div class="text-center">
            <small>Copyright &copy; Team KKN PPM Program Pemetaan Spasial Pendapatan Daerah Kota Parepare & KKN Tematik Pemerintah Kota Parepare Gelombang 102</small>
        </div>
    </footer>
    
    <style>
        main {
            min-height: 530px;
        }
        .main-card{
            min-height: 530px;
        }
        .legend i {
            width: 18px;
            height: 18px;
            float: left;
            margin-right: 8px;
            opacity: 0.7;
        }
        .info {
            padding: 6px 8px;
            background: white;
            background: rgba(255,255,255,0.8);
            box-shadow: 0 0 15px rgba(0,0,0,0.2);
            border-radius: 5px;
        }
        .info h4 {
            margin: 0 0 5px;
            color: #777;
        }
        .leaflet-popup-pane, .leaflet-control {
            cursor: auto;
        }
    </style>
    
    <script>
        var ctx = document.getElementById('myChart');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                datasets: [{
                    label: '# of Votes',
                    data: [12, 19, 3, 5, 2, 3],
                    backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>
</body>
</html>