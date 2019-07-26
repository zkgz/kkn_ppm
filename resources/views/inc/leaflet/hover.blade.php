<script>
    var info = L.control();
    
    info.onAdd = function (map) {
        return this.updatesidebar();
    };
    
    info.updatesidebar = function (props) {
        document.getElementById("mySidenav").innerHTML = '<a href="javascript:void(0)" class="closebtn" onclick="closesidebar()">&times;</a><h2>Kota Parepare</h2></br><h4>' + props.NAME_4+'</h4>';
    };
    
    // method that we will use to update the control based on feature properties passed    
    
    info.addTo(map);
</script>
