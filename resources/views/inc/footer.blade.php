    </div>

    <footer id="sticky-footer" class="py-4 bg-dark text-white-50">
        <div class="container text-center">
            <small>Copyright &copy; Team KKN PPM Program Pemetaan Spasial Pendapatan Daerah Kota Parepare</small>
        </div>
    </footer>

    <style>
        #sticky-footer{
            position: absolute;
            right: 0;
            bottom: 0;
            left: 0;
            padding: 1rem;
            background-color: #efefef;
            text-align: center;
        }
    </style>
    
    <!-- jQuery first, then Popper, then Bootstrap -->
    <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    
    <!-- Datatable -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/datatables.min.css') }}"/>
    <script type="text/javascript" src="{{ asset('js/datatables.min.js') }}"></script>

    <!-- Script for datatables -->
    <script>
        $(document).ready(function() {
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
</body>
</html>

