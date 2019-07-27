    </div>
    
        
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
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <footer class="py-4 bg-dark text-white-50 foobar">
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
</body>
</html>