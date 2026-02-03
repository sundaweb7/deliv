/* =====================================================
   COMMON HELPERS (SAFE ONLY)
===================================================== */
function renderApex(id, config) {
  const el = document.querySelector(id);
  if (!el) return;
  new ApexCharts(el, config).render();
}

/* =====================================================
   BOOTSTRAP VARIABLES
===================================================== */
const cssVar = n =>
  getComputedStyle(document.documentElement).getPropertyValue(n).trim();

const bs = {
  bodyBg: cssVar('--bs-body-bg'),
  bodyColor: cssVar('--bs-body-color'),
  border: cssVar('--bs-border-color'),
  heading: cssVar('--bs-heading-color'),
  font: cssVar('--bs-body-font-family')
};

/* =====================================================
   EMPLOYEE BAR CHART
===================================================== */
renderApex('#chartEmployee', {
  series: [
    { name: 'Net Profit', data: [390,115,305,250,102,40,195,235,280] },
    { name: 'Revenue', data: [105,205,120,380,105,205,290,310,105] },
    { name: 'Free Cash Flow', data: [180,200,180,250,100,400,90,115,195] }
  ],
  chart: { type: 'bar', height: 320, toolbar: { show: false } },
  colors: ['var(--bs-primary)','var(--bs-secondary)','var(--bs-info)'],
  plotOptions: { bar: { columnWidth: '55%', borderRadius: 3 } },
  stroke: { show:true, width:2, colors:['transparent'] },
  dataLabels: { enabled: false },
  xaxis: {
    categories: ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep'],
    labels: { style:{ colors:bs.bodyColor,fontFamily:bs.font,fontSize:'13px' } }
  },
  yaxis: {
    max: 500,
    labels:{ style:{ colors:bs.bodyColor,fontFamily:bs.font,fontSize:'13px' } }
  },
  grid: {
    borderColor: bs.border,
    strokeDashArray: 5,
    yaxis:{ lines:{ show:true } }
  },
  tooltip:{ y:{ formatter:v=>`$ ${v} thousands` } },
  legend:{ position:'bottom' }
});

/* =====================================================
   ATTENDANCE RATE
===================================================== */
renderApex('#chartAttendanceRate', {
  series: [
    { name:'One Time', data:[35,55,41,67,22,43,21,49,49,49,49,49] },
    { name:'Late', data:[13,23,20,8,13,27,33,12,12,12,12,12] },
    { name:'Absent', data:[11,17,15,15,21,14,15,13,13,13,13,13] }
  ],
  chart:{ type:'bar', height:350, stacked:true, stackType:'100%', toolbar:{show:false} },
  colors:['var(--bs-primary)','var(--bs-secondary)','var(--bs-gray)'],
  plotOptions:{ bar:{ columnWidth:'25%', borderRadius:6 } },
  stroke:{ width:1, colors:[bs.bodyBg] },
  yaxis:{ max:100, labels:{ formatter:v=>`${v}%` }, style: { colors: 'var(--bs-body-color)', fontSize: '13px', fontFamily: 'var(--bs-body-font-family)' } },
  xaxis:{ categories:['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'], axisBorder: {
            color: 'var(--bs-border-color)',
            axisBorder: {
                show: true,
                color: 'var(--bs-light)',
                height: 0.5,
                width: '100%',
                offsetX: 0,
                offsetY: 0
            },
        },
        axisTicks: {
            show: false,
        },
        labels: {
            rotate: -90,
            style: {
                colors: 'var(--bs-body-color)',
                fontSize: '13px',
                fontFamily: 'var(--bs-body-font-family)'
            }
        }, },
  legend:{ show: true, position: 'bottom', horizontalAlign: 'center', markers: { size: 5, shape: 'circle', radius: 10, width: 8, height: 8, }, labels: { colors: 'var(--bs-heading-color)', fontFamily: 'var(--bs-body-font-family)', fontSize: '13px', } },
  grid:{ show:false },
  dataLabels: { enabled: false },
});

/* =====================================================
   PAYROLL SUMMARY
===================================================== */
renderApex('#chartPayrollSummary', {
  series: [
    { name:'Gross Salary', data:[55000,60000,68000,52000,69000,73000,71000,74000,70000,75000,72000,77000] },
    { name:'Net Salary', data:[25000,27000,16000,15500,16500,17200,15800,17000,16200,16800,16000,17500] },
    { name:'Tax Deduction', type:'line',
      data:[25000,50000,40000,20000,52500,45000,55200,47000,25800,58200,36000,59500] }
  ],
  chart:{ type:'bar', height:320, stacked:true, toolbar:{show:false}, zoom: { enabled: true }, dropShadow:{ enabled:true, enabledOnSeries: undefined, top:3, left: 0, blur:4, color: "#000", opacity:0.1 } },
  grid: { borderColor: 'var(--bs-border-color)', strokeDashArray: 3 },
  yaxis:{ min: 100000, max: 0, tickAmount: 5, labels:{ formatter:v=>`${v/1000}K` }, style: { colors: 'var(--bs-body-color)', fontSize: '13px', fontFamily: 'var(--bs-body-font-family)' } },
  xaxis:{ type: "month", categories:['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'], axisBorder: { color: 'var(--bs-border-color)', axisBorder: { show: true, color: 'var(--bs-light)', height: 0.5, width: '100%', offsetX: 0, offsetY: 0 } }, axisTicks: { show: false, }, labels: { rotate: -90, style: { colors: 'var(--bs-body-color)', fontSize: '13px', fontFamily: 'var(--bs-body-font-family)' } } },
  stroke:{ curve: 'straight', width:[0,0,2.5] },
  colors:['var(--bs-secondary)','var(--bs-primary)','var(--bs-info)'],
  legend:{  show: true, position: 'bottom', horizontalAlign: 'center', markers: { size: 5, shape: 'circle', radius: 10, width: 8, height: 8, }, labels: { colors: 'var(--bs-heading-color)', fontFamily: 'var(--bs-body-font-family)', fontSize: '13px', }, position:'bottom' },
  markers: { size: 4, colors: ['var(--bs-info)'],  strokeColors: '#ffffff', strokeWidth: 2, hover: {
      size: 4 } },
  plotOptions: { bar: { columnWidth: "40%", borderRadius: 0, } },
  dataLabels: { enabled: false },
  fill: { opacity: 1 }
});

renderApex('#taskStatusChart',{
  series:[65.7],
  chart:{type:'radialBar',height:380,offsetY:-15,sparkline:{enabled:true}},
  plotOptions:{radialBar:{
    startAngle:-90,endAngle:90,
    track:{
      background:'#fff',strokeWidth:'100%',margin:25,
      dropShadow:{enabled:true,top:10,left:0,blur:15,color:'rgba(2,180,250,1)',opacity:.25}
    },
    dataLabels:{
      name:{show:false},
      value:{show:true,offsetY:-30,fontSize:'30px',fontFamily:'var(--bs-body-font-family)',fontWeight:800,color:'var(--bs-dark)'}
    }
  }},
  grid:{padding:{top:0,bottom:0,left:0,right:0}},
  fill:{colors:['var(--bs-info)']}
});

renderApex('#averageTeamKPI',{
  series:[{data:[300,200,190,100,250,300,350,500]}],
  chart:{type:'area',height:280,toolbar:{show:false}},
  colors:['var(--bs-secondary)'],
  dataLabels:{enabled:false},
  stroke:{curve:'smooth',width:2},
  legend:{show:false},
  grid:{show:true,strokeDashArray:3,borderColor:'var(--bs-border-color)'},
  yaxis:{
    min:0,max:500,tickAmount:5,
    labels:{style:{colors:'var(--bs-body-color)',fontSize:'14px'},formatter:v=>v}
  },
  xaxis:{
    categories:['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug'],
    labels:{style:{colors:'var(--bs-body-color)',fontSize:'12px'}},
    axisTicks:{show:false},axisBorder:{show:false}
  },
  fill:{type:'gradient',gradient:{colorStops:[[
    {offset:0,color:'var(--bs-secondary)',opacity:.2},
    {offset:50,color:'var(--bs-secondary)',opacity:.1},
    {offset:80,color:'var(--bs-secondary)',opacity:0}
  ]]}},
  tooltip:{x:{show:true},y:{formatter:v=>v.toLocaleString()},theme:'light'},
  responsive:[{breakpoint:575,options:{
    chart:{height:200},
    yaxis:{labels:{style:{fontSize:'11px'}}},
    xaxis:{labels:{style:{fontSize:'11px'}}}
  }}]
});



/* =====================================================
   RADIAL SCORES
===================================================== */
function radialScore(val,color,bg,size=60){
  return {
    series:[val],
    chart:{ type:'radialBar', height:size, width:size, sparkline:{enabled:true} },
    plotOptions:{
      radialBar:{
        hollow:{ size:size>60?'75%':'80%' },
        track:{ background:bg, strokeWidth:'100%', margin:-2 },
        dataLabels:{
          name:{show:false},
          value:{
            fontSize:size>60?'15px':'14px',
            fontWeight:600,
            fontFamily:bs.font,
            color:bs.heading,
            offsetY:5
          }
        }
      }
    },
    stroke:{ lineCap:'round' },
    colors:[color]
  };
}

renderApex('#employeeScore1', radialScore(83,'var(--bs-primary)','rgba(var(--bs-primary-rgb),.1)'));
renderApex('#employeeScore2', radialScore(37,'var(--bs-danger)','rgba(var(--bs-danger-rgb),.1)'));
renderApex('#employeeScore3', radialScore(46,'var(--bs-warning)','rgba(var(--bs-warning-rgb),.1)'));
renderApex('#employeeScore4', radialScore(64,'var(--bs-secondary)','rgba(var(--bs-secondary-rgb),.1)'));

renderApex('#leavesPresentsScore', radialScore(80,'var(--bs-primary)','rgba(var(--bs-primary-rgb),.1)',90));
renderApex('#leavesPlannedScore', radialScore(20,'var(--bs-danger)','rgba(var(--bs-danger-rgb),.1)',90));
renderApex('#leavesUnplannedScore', radialScore(49,'var(--bs-info)','rgba(var(--bs-info-rgb),.1)',90));
renderApex('#leavesPendingScore', radialScore(68,'var(--bs-secondary)','rgba(var(--bs-secondary-rgb),.1)',90));

/* ===============================
   CENTER TEXT PLUGIN FACTORY
=============================== */
function centerTextPlugin({ defaultLabel = 'Total', hoverEnabled = false }) {
  return {
    id: 'centerTextPlugin',
    afterDraw(chart) {
      const { ctx, chartArea: { left, right, top, bottom } } = chart;
      const cx = (left + right) / 2;
      const cy = (top + bottom) / 2;
      const dataset = chart.data.datasets[0];

      let value = dataset.data.reduce((a, b) => a + b, 0);
      let label = defaultLabel;

      if (hoverEnabled) {
        const active = chart.getActiveElements();
        if (active.length) {
          value = dataset.data[active[0].index];
          label = chart.data.labels[active[0].index];
        }
      }

      ctx.save();
      ctx.textAlign = 'center';
      ctx.textBaseline = 'middle';

      ctx.font = '700 26px sans-serif';
      ctx.fillStyle = bs.heading;
      ctx.fillText(value, cx, cy - 6);

      ctx.font = '14px sans-serif';
      ctx.fillStyle = bs.bodyColor;
      ctx.fillText(label, cx, cy + 16);

      ctx.restore();
    }
  };
}

/* ===============================
   EMPLOYEE TYPE CHART
=============================== */
function employeeTypeChartConfig() {
  const $el = $('#employeeTypeChart');
  if (!$el.length) return;

  new Chart($el[0], {
    type: 'doughnut',
    data: {
      labels: ['Onsite', 'Remote', 'Hybrid'],
      datasets: [{
        data: [600, 200, 200],
        backgroundColor: ['#316AFF', '#FF8110', '#FDBB1F'],
        borderRadius: 10,
        hoverOffset: 5,
        borderWidth: 5,
        borderColor: bs.bodyBg
      }]
    },
    options: {
      cutout: '65%',
      devicePixelRatio: 2,
      layout: { padding: 20 },
      plugins: {
        legend: { display: false },
        tooltip: {
          callbacks: {
            label: c => `${c.label}: ${c.formattedValue}`
          }
        }
      }
    },
    plugins: [centerTextPlugin({ defaultLabel: 'Employee' })]
  });
}

/* ===============================
   COMPANY PAY CHART
=============================== */
function companyPayChartConfig() {
  const $el = $('#companyPayChart');
  if (!$el.length) return;

  new Chart($el[0], {
    type: 'doughnut',
    data: {
      labels: ['Salary', 'Bonus', 'Commission', 'Overtime', 'Reimbursement', 'Benefits'],
      datasets: [{
        data: [600, 643, 1608, 884, 2251, 1447],
        backgroundColor: ['#FF401C', '#22B07E', '#02B4FA', '#FF8110', '#316AFF', '#FDBB1F'],
        borderRadius: 30,
        hoverOffset: 5,
        borderWidth: 2,
        borderColor: bs.bodyBg
      }]
    },
    options: {
      cutout: '85%',
      devicePixelRatio: 2,
      layout: { padding: 10 },
      plugins: {
        legend: { display: false },
        tooltip: { enabled: false }
      }
    },
    plugins: [centerTextPlugin({ defaultLabel: 'Total Data', hoverEnabled: true })]
  });
}

/* ===============================
   DOCUMENT READY INIT
=============================== */
$(function () {
  employeeTypeChartConfig();
  companyPayChartConfig();
});

/* =====================================================
   DATATABLES – FULL ORIGINAL LOGIC (NOT REMOVED)
===================================================== */

/* Employee Leave (Dashboard) */
if ($('#dt_EmployeeLeave').length) {
  $('#dt_EmployeeLeave').DataTable({
    searching: true,
    pageLength: 6,
    paging: false,
    info: false,
    lengthChange: false,
    scrollY: '300px',
    scrollCollapse: true,
    language: {
      search: "",
      searchPlaceholder: 'Search'
    },
    initComplete: function () {
      var dtSearch = $('#dt_EmployeeLeave_wrapper .dt-search').detach();
      $('#dt_EmployeeLeave_Search').append(dtSearch);
      $('#dt_EmployeeLeave_Search .dt-search').prepend('<i class="fi fi-rr-search"></i>');
      $('#dt_EmployeeLeave_Search .dt-search label').remove();
      $('#dt_EmployeeLeave_wrapper > .row.mt-2.justify-content-between').first().remove();
    }
  });
}

/* Employee Leave Page */
if ($('#dt_PageEmployeeLeave').length) {
  $('#dt_PageEmployeeLeave').DataTable({
    searching: true,
    pageLength: 10,
    paging: true,
    info: true,
    lengthChange: false,
    language: {
      search: "",
      searchPlaceholder: 'Search',
      paginate: {
        previous: "<i class='fi fi-rr-angle-left'></i>",
        next: "<i class='fi fi-rr-angle-right'></i>",
        first: "<i class='fi fi-rr-angle-double-left'></i>",
        last: "<i class='fi fi-rr-angle-double-right'></i>"
      }
    },
    initComplete: function () {
      var dtSearch = $('#dt_PageEmployeeLeave_wrapper .dt-search').detach();
      $('#dt_PageEmployeeLeave_Search').append(dtSearch);
      $('#dt_PageEmployeeLeave_Search .dt-search').prepend('<i class="fi fi-rr-search"></i>');
      $('#dt_PageEmployeeLeave_Search .dt-search label').remove();
      $('#dt_PageEmployeeLeave_wrapper > .row.mt-2.justify-content-between').first().remove();
    }
  });
}

/* Employee Attendance */
if ($('#dt_EmployeeAttendance').length) {
  $('#dt_EmployeeAttendance').DataTable({
    searching: true,
    pageLength: 9,
    paging: true,
    info: true,
    lengthChange: false,
    language: {
      search: "",
      searchPlaceholder: 'Search',
      paginate: {
        previous: "<i class='fi fi-rr-angle-left'></i>",
        next: "<i class='fi fi-rr-angle-right'></i>",
        first: "<i class='fi fi-rr-angle-double-left'></i>",
        last: "<i class='fi fi-rr-angle-double-right'></i>"
      }
    },
    initComplete: function () {
      var dtSearch = $('#dt_EmployeeAttendance_wrapper .dt-search').detach();
      $('#dt_EmployeeAttendance_Search').append(dtSearch);
      $('#dt_EmployeeAttendance_Search .dt-search').prepend('<i class="fi fi-rr-search"></i>');
      $('#dt_EmployeeAttendance_Search .dt-search label').remove();
      $('#dt_EmployeeAttendance_wrapper > .row.mt-2.justify-content-between').first().remove();
    },
    columnDefs: [{
      targets: [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32],
      orderable: false
    }]
  });
}

/* Payroll List */
if ($('#dt_PayrollList').length) {
  $('#dt_PayrollList').DataTable({
    searching: true,
    pageLength: 10,
    paging: true,
    info: true,
    lengthChange: false,
    language: {
      search: "",
      searchPlaceholder: 'Search',
      paginate: {
        previous: "<i class='fi fi-rr-angle-left'></i>",
        next: "<i class='fi fi-rr-angle-right'></i>",
        first: "<i class='fi fi-rr-angle-double-left'></i>",
        last: "<i class='fi fi-rr-angle-double-right'></i>"
      }
    },
    initComplete: function () {
      var dtSearch = $('#dt_PayrollList_wrapper .dt-search').detach();
      $('#dt_PayrollList_Search').append(dtSearch);
      $('#dt_PayrollList_Search .dt-search').prepend('<i class="fi fi-rr-search"></i>');
      $('#dt_PayrollList_Search .dt-search label').remove();
      $('#dt_PayrollList_wrapper > .row.mt-2.justify-content-between').first().remove();
    },
    columnDefs: [{
      targets: [0],
      orderable: false
    }]
  });
}

/* =====================================================
   FLATPICKR
===================================================== */
if ($('#dateTimeFlatpickr').length) {
  flatpickr('#dateTimeFlatpickr', {
    enableTime: false,
    dateFormat: 'Y-m-d H:i',
    inline: true
  });
}

if ($('.flatpickr-date').length) {
  flatpickr('.flatpickr-date', {
    enableTime: false,
    dateFormat: 'Y-m-d H:i'
  });
}
