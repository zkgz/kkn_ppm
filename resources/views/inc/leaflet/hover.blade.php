<script>
    var info = L.control();
    
    info.onAdd = function (map) {
        this._div = L.DomUtil.create('div', 'info'); // create a div with a class "info"
        this.update();
        return this._div;
    };
    
    // method that we will use to update the control based on feature properties passed
    info.update = function (props) {
        this._div.innerHTML = '<h4>Pajak Per Bulan</h4>' +  (props ?
        '<b>' + props.NAME_4 + '</b><br />' + props.pajak_per_bulan + ' pajak per bulan'
        : 'Hover over a region');
    };
    
    info.addTo(map);
</script>