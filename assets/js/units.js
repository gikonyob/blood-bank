  $(document).ready(function () {
    $.ajax({
        url: "http://localhost/web/bloodbank/doctor/units.php",
        method: "GET",
        success: function (data) {
            console.log(data);
            var bloodgroup = [];
            var pints = [];

            for(var i in data){
                bloodgroup.push("Bloodgroup " + data[i].bloodgroup);
                pints.push(data[i].pints);
            }
            var chardata = {
                labels: bloodgroup,
                datasets : [
                    {
                        label: 'Pints',
                        backgroundColor: 'rgb(190, 22, 22)',
                        borderColor: 'rgb(190, 22, 22)',
                        hoverBackgroundColor: 'rgb(190, 22, 22)',
                        hoverBorderColor: 'rgb(190, 22, 22)',
                        data: pints
                    }
                ]
            };

            var ctx = $("#mycanvas");

            var barGraph = new Chart(ctx, {
                type: 'bar',
                data: chardata
            });
        },
        error: function (data) {
            console.log(data);

        }
    });

});

