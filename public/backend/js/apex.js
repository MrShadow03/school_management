
        var options = {
            series: [80,20],
            chart: {
            width: '100%',
            type: 'pie',
          },
          labels: ["MALE", "FEMALE",],
          theme: {
            monochrome: {
              enabled: true
            }
          },
          plotOptions: {
            pie: {
              dataLabels: {
                offset: -5
              }
            }
          },
          title: {
            text: "All Teacher's"
          },
          dataLabels: {
            formatter(val, opts) {
              const name = opts.w.globals.labels[opts.seriesIndex]
              return [name, val.toFixed(1) + '%']
            }
          },
          legend: {
            show: false
          }
          };
  
          var chart = new ApexCharts(document.querySelector("#teacher_range"), options);
          chart.render();