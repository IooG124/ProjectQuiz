window.Apex = {
    chart: {
      foreColor: '#000',
      toolbar: {
        show: false
      },
    },
    stroke: {
      width: 3
    },
    dataLabels: {
      enabled: false
    },
    tooltip: {
      theme: 'dark'
    },
    grid: {
      borderColor: "rgba(255, 255, 255, 0.2)"
      
    }
  };
  
  
  
  // var options = {
  //     chart: {
  //       type: 'line',
  //       height: '100%',
  //       width: '100%',
  //       animations: {
  //         enabled: true,
  //         easing: 'easeinout',
  //         speed: 800,
  //         animateGradually: {
  //           enabled: true,
  //           delay: 150
  //         },
  //         dynamicAnimation: {
  //           enabled: true,
  //           speed: 350
  //         }
  //       }
  //     },
  //     stroke: {
  //       curve: 'smooth',
  //     },
  //     markers: {
  //       size: 4,
  //   },
  //     series: [{
  //         name: '',
  //         data: [0, 30, 50, 40, 60, 45, 55,], // Mengubah data untuk pola naik turun
  //         style: {
  //           background: '#000', // Mengatur latar belakang teks menjadi hitam
  //           color: '#fff' // Mengatur warna teks menjadi putih
  //         }
  //       }],
        
  //     xaxis: {
  //       categories: ['S', 'M', 'T', 'W', 'T', 'F', 'S',],
  //       labels: {
  //         style: {
  //           colors: '#919191' ,// Mengatur warna teks label sumbu x menjadi putih
  //         }
  //       }
  //     },
  //     yaxis: {
  //       title: {
  //         text: 'Employer',
  //         style: {
  //           color: '#919191' // Mengatur warna teks judul sumbu y menjadi putih
  //         }
  //       },
  //       labels: {
  //         style: {
  //           colors: '#919191' // Mengatur warna teks label sumbu y menjadi putih
  //         }
  //       }
  //     },
  //     tooltip: {
  //       y: {
  //         formatter: function (val) {
  //           return "$ " + val+",00" 
  //         }
  //       }
  //     },
  //     colors: ['#126657', '#126657'], // Mengatur warna area chart menjadi biru dan hijau
  //     grid: {
  //       borderColor: "#2A2A2A",
  //       xaxis: {
  //         lines: {
  //           show: true
  //         }
  //       }
  //     },
  //     dataLabels: {
  //       style: {
  //         colors: ['#919191'] // Mengatur warna teks data label menjadi putih
  //       }
  //     },
  //     fill: {
  //       opacity: 0.5 // Mengatur opasitas area chart untuk memperjelas teks putih
  //     },
      
  //   };
  //   var chart = new ApexCharts(document.querySelector("#employer"), options);
  //   chart.render();
  
  
  
    var optionsBar = {
      chart: {
        height: '100%',
        type: 'bar',
        
      },
      yaxis: {
        labels: {
          style: {
            fontSize: '12px', // Ukuran font label sumbu Y
            fontFamily: 'Urbanist',
            fontWeight: 400
          },
        },
        min: 0, // Nilai minimum sumbu Y
        max: 1000, // Nilai maksimum sumbu Y
        tickAmount: 5, // Jumlah interval pada sumbu Y
      },
      plotOptions: {
        bar: {
          columnWidth: '50%',
          horizontal: false,
           endingShape: 'rounded',
           borderRadius: 10,
           borderRadiusApplication: 'end',
           colors: {
            backgroundBarColors: ['#C7ECFF', '#C7ECFF'], // Warna background bar
            backgroundBarOpacity: 1,
          },
        },
      },
      series: [{
        name: 'Produk Terjual',
        data: [800, 450, 900, 550, 480, 760, 270, 870, 970, 786, 677, 728 ]
      }, ],
      stroke: {
        show: false,
        width: 2,
        colors: ['transparent']
      },
      xaxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Aug', 'Sep', 'Okt', 'Nov', 'Des',],
        labels: {
          style: {
            colors: '#000'
          }
        }
      },
      fill: {
        opacity: 1
      },
      
      colors: ['#10AEFF'], 
      legend: {
        show: false,
        position: 'top',
        horizontalAlign: 'right',
       
      }
    
    }
    
    var chartBar = new ApexCharts(
      document.querySelector("#withdrawn"),
      optionsBar
    );
    
    chartBar.render();
  
  
   
  
  
  
    // var options = {
    //   series: [
    //   {
    //     data: [
    //       {
    //         x: 'week 1',
    //         y: [2800, 3500]
    //       },
    //       {
    //         x: 'week 2',
    //         y: [3200, 4100]
    //       },
    //       {
    //         x: 'week 3',
    //         y: [2950, 4800]
    //       },
    //       {
    //         x: 'week 4',
    //         y: [3000, 4600]
    //       },
          
    //     ]
    //   }
    // ],
    //   chart: {
    //   height: '100%',
    //   type: 'rangeBar',
    //   zoom: {
    //     enabled: false
    //   }
    // },
    // plotOptions: {
    //   bar: {
    //     isDumbbell: true,
    //     columnWidth: 3,
    //     dumbbellColors: [['#126657', '#126657']]
    //   }
    // },
    // legend: {
    //   show: false,
    //   showForSingleSeries: true,
    //   position: 'top',
    //   horizontalAlign: 'left',
    //   customLegendItems: ['Product A', 'Product B']
    // },
    // fill: {
    //   type: 'gradient',
    //   gradient: {
    //     type: 'vertical',
    //     gradientToColors: ['#ED702A'],
    //     inverseColors: true,
    //     stops: [0, 100]
    //   }
    // },
    // grid: {
    //   xaxis: {
    //     lines: {
    //       show: true
    //     }
    //   },
    //   yaxis: {
    //     lines: {
    //       show: true
    //     },
        
    //   }
    // },
    // xaxis: {
    //   categories: ['01', '02', '03','04'],
    //   labels: {
    //     style: {
    //       colors: '#919191'
    //     }
    //   }
    // },
    // axis: {
    //   categories: ['01', '02', '03','04'],
    //   labels: {
    //     style: {
    //       colors: '#919191'
    //     }
    //   }
    // },
    // colors: ['#126657'], 
   
    // };
  
    // var chart = new ApexCharts(document.querySelector("#dumbel"), options);
    // chart.render();
  
   
  
    // var optionsBar = {
    //   chart: {
    //     height: '100%',
    //     type: 'bar',
        
    //   },
    //   plotOptions: {
    //     bar: {
    //       columnWidth: '70%',
    //       horizontal: false,
    //        endingShape: 'rounded',
    //        borderRadius: 3,
    //        borderRadiusApplication: 'end',
    //     },
    //   },
    //   series: [{
    //     name: '',
    //     data: [14, 25, 21, 15, 24, 27, 21]
    //   }, {
    //     name: '',
    //     data: [13, 23, 20, 24, 18, 20, 15]
    //   }, 
    //  ],
    //  stroke: {
    //   show: true,
    //   width: 3,
    //   colors: ['transparent']
    // },
    //   xaxis: {
    //     categories: ['Apr', 'Mei', 'Jun', 'Jul', 'Aug', 'Sep', 'Okt',],
    //     labels: {
    //       style: {
    //         colors: '#919191'
    //       }
    //     }
    //   },
    //   fill: {
    //     opacity: 1
    //   },
    //   tooltip: {
    //     enabled: true,
    //     y: {
    //       formatter: function (val) {
    //         return "$ " + val
    //       }
    //     }
    //   },
    //   colors: ['#126657', '#1AC821'], 
    //   legend: {
    //     show: false
    //   }
    
    // }
    
    // var chartBar = new ApexCharts(
    //   document.querySelector("#order"),
    //   optionsBar
    // );
    
    // chartBar.render();
  
  
  
  //   var optionsCircle4 = {
  //     series: [75],
  //     chart: {
  //         height: '100%',
  //          width: '100%',
  //         type: 'radialBar',
  //     },
  //     plotOptions: {
  //         radialBar: {
  //             hollow: {
  //                 size: '30%',
  //             },
  //             dataLabels: {
  //               name: {
  //                 show: true, // Menampilkan nilai (misalnya '85%')
  //                 offsetY: 80, 
  //                 color: '#919191',
  //                 fontWeight: 500,
  //               },
  //               value: {
  //                   show: true, // Menampilkan nilai (misalnya '85%')
  //                   // offsetY: -10, // Mengatur posisi vertikal
  //                   fontWeight: 'bold', // Ketebalan font
  //                   color: '#919191', // Warna font
  //               }
  //           }
  //         },
  //     },
  //     labels: ['Invoices Mode'],
  //     stroke: {
  //       lineCap: 'round'
  //     }, 
  //     colors: ['#136758'], 
  // };
  
  // var chartCircle4 = new ApexCharts(document.querySelector('#pie1'), optionsCircle4);
  // chartCircle4.render();
  
  
// start: Sidebar
const sidebarToggle = document.querySelector('.sidebar-toggle')
const sidebarOverlay = document.querySelector('.sidebar-overlay')
const sidebarMenu = document.querySelector('.sidebar-menu')
const main = document.querySelector('.main')
sidebarToggle.addEventListener('click', function (e) {
    e.preventDefault()
    main.classList.toggle('active')
    sidebarOverlay.classList.toggle('hidden')
    sidebarMenu.classList.toggle('-translate-x-full')
})
sidebarOverlay.addEventListener('click', function (e) {
    e.preventDefault()
    main.classList.add('active')
    sidebarOverlay.classList.add('hidden')
    sidebarMenu.classList.add('-translate-x-full')
})
document.querySelectorAll('.sidebar-dropdown-toggle').forEach(function (item) {
    item.addEventListener('click', function (e) {
        e.preventDefault()
        const parent = item.closest('.group')
        if (parent.classList.contains('selected')) {
            parent.classList.remove('selected')
        } else {
            document.querySelectorAll('.sidebar-dropdown-toggle').forEach(function (i) {
                i.closest('.group').classList.remove('selected')
            })
            parent.classList.add('selected')
        }
    })
})
// end: Sidebar
  
  // start: Popper
  const popperInstance = {}
  document.querySelectorAll('.dropdown').forEach(function (item, index) {
      const popperId = 'popper-' + index
      const toggle = item.querySelector('.dropdown-toggle')
      const menu = item.querySelector('.dropdown-menu')
      menu.dataset.popperId = popperId
      popperInstance[popperId] = Popper.createPopper(toggle, menu, {
          modifiers: [
              {
                  name: 'offset',
                  options: {
                      offset: [0, 8],
                  },
              },
              {
                  name: 'preventOverflow',
                  options: {
                      padding: 24,
                  },
              },
          ],
          placement: 'bottom-end'
      });
  })
  document.addEventListener('click', function (e) {
      const toggle = e.target.closest('.dropdown-toggle')
      const menu = e.target.closest('.dropdown-menu')
      if (toggle) {
          const menuEl = toggle.closest('.dropdown').querySelector('.dropdown-menu')
          const popperId = menuEl.dataset.popperId
          if (menuEl.classList.contains('hidden')) {
              hideDropdown()
              menuEl.classList.remove('hidden')
              showPopper(popperId)
          } else {
              menuEl.classList.add('hidden')
              hidePopper(popperId)
          }
      } else if (!menu) {
          hideDropdown()
      }
  })
  
  function hideDropdown() {
      document.querySelectorAll('.dropdown-menu').forEach(function (item) {
          item.classList.add('hidden')
      })
  }
  function showPopper(popperId) {
      popperInstance[popperId].setOptions(function (options) {
          return {
              ...options,
              modifiers: [
                  ...options.modifiers,
                  { name: 'eventListeners', enabled: true },
              ],
          }
      });
      popperInstance[popperId].update();
  }
  function hidePopper(popperId) {
      popperInstance[popperId].setOptions(function (options) {
          return {
              ...options,
              modifiers: [
                  ...options.modifiers,
                  { name: 'eventListeners', enabled: false },
              ],
          }
      });
  }
  // end: Popper
  