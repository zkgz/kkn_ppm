<script>
    //From Lighter to Darker color
    var colors = ['#fff5eb', '#fee6ce', '#fdd0a2', '#fdae6b', '#fd8d3c', '#f16913', '#d94801', '#8c2d04'];
    //From Low to High
    var grades = [0, 500000, 1000000, 2500000, 5000000, 10000000, 25000000, 50000000]
    
    function getColor(pajak) {
        return  pajak > grades[7] ? colors[7] :
                pajak > grades[6] ? colors[6] :
                pajak > grades[5] ? colors[5] :
                pajak > grades[4] ? colors[4] :
                pajak > grades[3] ? colors[3] :
                pajak > grades[2] ? colors[2] :
                pajak > grades[1] ? colors[1] :
                                    colors[0] ;
    }

    var legend = L.control({position: 'bottomright'});
    legend.onAdd = function (map) {
        
        var div = L.DomUtil.create('div', 'info legend');
        
        // loop through our density intervals and generate a label with a colored square for each interval
        for (var i = 0; i < grades.length; i++) {
            div.innerHTML +=
            '<i style="background:' + getColor(grades[i] + 1) + '"></i> ' +
            grades[i] + (grades[i + 1] ? '&ndash;' + grades[i + 1] + '<br>' : '+');
        }
        
        return div;
    };
    legend.addTo(map);
        
</script>