  ( function ( $ ) {
    var charts = {
        init: function () {
            // -- Set new default font family and font color to mimic Bootstrap's default styling
            Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
            Chart.defaults.global.defaultFontColor = '#292b2c';
            //remove this function and add it to request.done function and pass the response
            // charts.createCompletedJobsChart(); 

            this.ajaxGetMonthlyData();

        },



        ajaxGetMonthlyData: function () {
            //get the host url 
            //check if im using 127.0.0.1 or live website
            // var urlPath =  'http://' + window.location.hostname + '/get-data-for-chart';
            if (window.location.hostname == "127.0.0.1") {
                var urlPath =  'http://127.0.0.1:8000/reservationData';
            } else {
                var urlPath =  'http://' + window.location.hostname + '/reservationData';
            }
            // console.log(window.location.hostname);
            
            var request = $.ajax( {
                method: 'GET',
                url: urlPath
        } );

            request.done( function (response) {
                // console.log( response );
                charts.createCompletedJobsChart(response);
            });
        },

        /**
         * Created the Completed Jobs Chart
         */
        createCompletedJobsChart: function ( response ) {
       
                        // single bar chart
            var ctx = document.getElementById( "singelBarChart" );
            ctx.height = 200;
            var myChart = new Chart( ctx, {
                type: 'bar',
                data: {
                    labels: response.months,
                    datasets: [
                        {
                            label: "Monthly Reservations",
                            data: response.ReservationCount,
                            borderColor: "rgba(0, 123, 255, 0.9)",
                            borderWidth: "0",
                            backgroundColor: "rgba(0, 123, 255, 0.5)"
                                    }
                                ]
                },
                options: {
                    scales: {
                        yAxes: [ {
                            ticks: {
                              min: 0,
                              // max: 1000,
                              max: response.maxNum,
                              maxTicksLimit: 5
                                // beginAtZero: true
                            }
                        } ]
                    }
                }
            } );
        }
    };

    charts.init();

} )( jQuery );








  // // single bar chart
  //   var ctx = document.getElementById( "singelBarChart" );
  //   ctx.height = 150;
  //   var myChart = new Chart( ctx, {
  //       type: 'bar',
  //       data: {
  //           labels: [ "Sun", "Mon", "Tu", "Wed", "Th", "Fri", "Sat" ],
  //           datasets: [
  //               {
  //                   label: "My First dataset",
  //                   data: [ 40, 55, 75, 81, 56, 55, 40 ],
  //                   borderColor: "rgba(0, 123, 255, 0.9)",
  //                   borderWidth: "0",
  //                   backgroundColor: "rgba(0, 123, 255, 0.5)"
  //                           }
  //                       ]
  //       },
  //       options: {
  //           scales: {
  //               yAxes: [ {
  //                   ticks: {
  //                       beginAtZero: true
  //                   }
  //                               } ]
  //           }
  //       }
  //   } );
