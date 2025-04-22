$(function () {
  'use strict'

  var userChartData = {
    usersNormal: [],
    usersAffiliates: [],
  }
  var orderChartData = {
    totalMoney: [],
  }
  var projectChartData = {
    eventLabels: [],
    eventData: [],
    projectData: []
  }
  var projectTypeChartData = {
    labels: [],
    coachTarget: [],
    coachActual: [],
    adminTarget: []
  }

  getChartData();
  showUserChart(userChartData);
  showOrderChart(orderChartData);
  showProjectChart(projectChartData);
  showProjectChartDetail(projectChartData);
  showProjectTypeChart(projectTypeChartData);

  function showUserChart(userData) {
    var ticksStyle = {
      fontColor: '#495057',
      fontStyle: 'bold'
    }
  
    var mode      = 'index'
    var intersect = true
  
    var userChart = $('#users-chart')
    var userChart  = new Chart(userChart, {
      type   : 'bar',
      data   : {
        labels  : ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'],
        datasets: [
          {
            backgroundColor: '#007bff',
            borderColor    : '#007bff',
            data           : userData.usersNormal
          },
          {
            backgroundColor: '#ced4da',
            borderColor    : '#ced4da',
            data           : userData.usersAffiliates
          }
        ]
      },
      options: {
        maintainAspectRatio: false,
        tooltips           : {
          mode     : mode,
          intersect: intersect
        },
        hover              : {
          mode     : mode,
          intersect: intersect
        },
        legend             : {
          display: false
        },
        scales             : {
          yAxes: [{
            // display: false,
            gridLines: {
              display      : true,
              lineWidth    : '4px',
              color        : 'rgba(0, 0, 0, .2)',
              zeroLineColor: 'transparent'
            },
            ticks    : $.extend({
              beginAtZero: true,
	      callback: function(value) {
                if (value % 1 === 0) {
                   return value;
                }
              }
            }, ticksStyle)
          }],
          xAxes: [{
            display  : true,
            gridLines: {
              display: false
            },
            ticks    : ticksStyle
          }]
        }
      }
    });
  }

  function showProjectChart(projectChartData) {
    var ticksStyle = {
      fontColor: '#495057',
      fontStyle: 'bold'
    }
  
    var mode      = 'index'
    var intersect = true
  
    var projectChart = $('#project-chart')
    var projectChart  = new Chart(projectChart, {
      type   : 'bar',
      data   : {
        labels  : projectChartData.eventLabels,
        datasets: [
          {
            backgroundColor: '#007bff',
            borderColor    : '#007bff',
            data           : projectChartData.projectData
          },
          {
            backgroundColor: '#ced4da',
            borderColor    : '#ced4da',
            data           : projectChartData.eventData
          }
        ]
      },
      options: {
        maintainAspectRatio: false,
        tooltips           : {
          mode     : mode,
          intersect: intersect
        },
        hover              : {
          mode     : mode,
          intersect: intersect
        },
        legend             : {
          display: false
        },
        scales             : {
          yAxes: [{
            // display: false,
            gridLines: {
              display      : true,
              lineWidth    : '4px',
              color        : 'rgba(0, 0, 0, .2)',
              zeroLineColor: 'transparent'
            },
            ticks    : $.extend({
              beginAtZero: true,
	      callback: function(value) {
                if (value % 1 === 0) {
                  return value;
                }
              }
            }, ticksStyle)
          }],
          xAxes: [{
            display  : true,
            gridLines: {
              display: false
            },
            ticks    : ticksStyle
          }]
        }
      }
    });
  }

  function showProjectTypeChart(projectTypeChartData) {
    console.log(projectTypeChartData);
    var ticksStyle = {
      fontColor: '#495057',
      fontStyle: 'bold'
    }
  
    var mode      = 'index'
    var intersect = true
  
    var projectTypeChart = $('#projectType-chart')
    var projectTypeChart  = new Chart(projectTypeChart, {
      type   : 'bar',
      data   : {
        labels  : projectTypeChartData.labels,
        datasets: [
          {
            backgroundColor: '#007bff',
            borderColor    : '#007bff',
            data           : projectTypeChartData.adminTarget
          },
          {
            backgroundColor: 'red',
            borderColor    : 'red',
            data           : projectTypeChartData.coachTarget
          },
          {
            backgroundColor: '#ced4da',
            borderColor    : '#ced4da',
            data           : projectTypeChartData.coachActual
          }
        ]
      },
      options: {
        maintainAspectRatio: false,
        tooltips           : {
          mode     : mode,
          intersect: intersect
        },
        hover              : {
          mode     : mode,
          intersect: intersect
        },
        legend             : {
          display: false
        },
        scales             : {
          yAxes: [{
            // display: false,
            gridLines: {
              display      : true,
              lineWidth    : '4px',
              color        : 'rgba(0, 0, 0, .2)',
              zeroLineColor: 'transparent'
            },
            ticks    : $.extend({
              beginAtZero: true,
	      callback: function(value) {
                if (value % 1 === 0) {
                  return value;
                }
              }
            }, ticksStyle)
          }],
          xAxes: [{
            display  : true,
            gridLines: {
              display: false
            },
            ticks    : ticksStyle
          }]
        }
      }
    });
  }

  function showProjectChartDetail(projectChartData) {
    var ticksStyle = {
      fontColor: '#495057',
      fontStyle: 'bold'
    }
  
    var mode      = 'index'
    var intersect = true
  
    var projectDetailChart = $('#project-chart-detail')
    var projectDetailChart  = new Chart(projectDetailChart, {
      type   : 'bar',
      data   : {
        labels  : projectChartData.eventLabels,
        datasets: [
          {
            backgroundColor: '#007bff',
            borderColor    : '#007bff',
            data           : projectChartData.eventData
          }
        ]
      },
      options: {
        maintainAspectRatio: false,
        tooltips           : {
          mode     : mode,
          intersect: intersect
        },
        hover              : {
          mode     : mode,
          intersect: intersect
        },
        legend             : {
          display: false
        },
        scales             : {
          yAxes: [{
            // display: false,
            gridLines: {
              display      : true,
              lineWidth    : '4px',
              color        : 'rgba(0, 0, 0, .2)',
              zeroLineColor: 'transparent'
            },
            ticks    : $.extend({
              beginAtZero: true,
	      callback: function(value) {
                if (value % 1 === 0) {
                  return value;
                }
              }
            }, ticksStyle)
          }],
          xAxes: [{
            display  : true,
            gridLines: {
              display: false
            },
            ticks    : ticksStyle
          }]
        }
      }
    });
  }

  function showOrderChart(orderData) {
    var ticksStyle = {
      fontColor: '#495057',
      fontStyle: 'bold'
    }
  
    var mode      = 'index'
    var intersect = true
  
    var orderChart = $('#orders-chart')
    var orderChart  = new Chart(orderChart, {
      type   : 'bar',
      data   : {
        labels  : ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'],
        datasets: [
          {
            backgroundColor: '#007bff',
            borderColor    : '#007bff',
            data           : orderChartData.totalMoney
          },
        ]
      },
      options: {
        maintainAspectRatio: false,
        tooltips           : {
          mode     : mode,
          intersect: intersect
        },
        hover              : {
          mode     : mode,
          intersect: intersect
        },
        legend             : {
          display: false
        },
        scales             : {
          yAxes: [{
            // display: false,
            gridLines: {
              display      : true,
              lineWidth    : '4px',
              color        : 'rgba(0, 0, 0, .2)',
              zeroLineColor: 'transparent'
            },
            ticks    : $.extend({
              beginAtZero: true,
              callback: function (value) {
                return value.toLocaleString('it-IT', {style : 'currency', currency : 'VND'});
              }
            }, ticksStyle)
          }],
          xAxes: [{
            display  : true,
            gridLines: {
              display: false
            },
            ticks    : ticksStyle
          }]
        }
      }
    });
  }

  function getChartData() {
    var year = $('.select_year').val();
    var shop = $('.select_shop').val();

    $('span.year').text(year);
    var url = `/manage/getData?year=${year}&shopId=${shop}`;
    var start_date = $('input[name="start_date"]').val();
    var end_date = $('input[name="end_date"]').val();
    var project_id = $('input[name="project_id"]').val();
    if (start_date) {
      url = url + `&start_date=${start_date}`;
    }
    if (end_date) {
      url = url + `&end_date=${end_date}`;
    }
    if (project_id) {
      url = url + `&project_id=${project_id}`;
    }

    $.ajax({
      url: url,
      method: "GET",
      async: false,
      success:function(data){
        userChartData.usersNormal = Object.values(data.usersNormal);
        userChartData.usersAffiliates = Object.values(data.usersAffiliates);
        orderChartData.totalMoney = Object.values(data.ordersData);
        projectChartData.eventLabels = Object.values(data.eventStatisticData.labels);
        projectChartData.eventData = Object.values(data.eventStatisticData.chartData);
        projectChartData.projectData = Object.values(data.projectStatisticData.chartData);
        projectTypeChartData.coachTarget = Object.values(data.projectTypeStatisticData.coachTarget);
        projectTypeChartData.coachActual = Object.values(data.projectTypeStatisticData.coachActual);
        projectTypeChartData.adminTarget = Object.values(data.projectTypeStatisticData.adminTarget);
        projectTypeChartData.labels = Object.values(data.projectTypeStatisticData.labels);
        $('b.project_name').text(data.projectTypeStatisticData.projectTarget.title);
        $('span.donvi').text(data.projectTypeStatisticData.projectTarget.donvi);
      },
      error: function() {
        console.log('co loi xay ra');
      }
    });
  }

  $('#menu2').hide();
  function handleTab() {
    $('.tab1').click(function() {
      $('#menu1').show();
      $('.tab1').addClass('active');
      $('#menu2').hide();
      $('.tab2').removeClass('active');
    });

    $('.tab2').click(function() {
      $('#menu2').show();
      $('.tab2').addClass('active');
      $('#menu1').hide();
      $('.tab1').removeClass('active');
    });

    var selectedTab = $('input[name="tab_name"]').val();
    if (selectedTab == 'tab_2') {
      $('#menu2').show();
      $('.tab2').addClass('active');
      $('#menu1').hide();
      $('.tab1').removeClass('active');
    }
  }
  handleTab();

  function showDatePicker() {
    var date = new Date();
    var currentDate = date.getFullYear() + "-" + (date.getMonth()+1) + "-" + date.getDate();
    $('input.date-picker').datepicker({
      dateFormat: 'yy-mm-dd'
      //maxDate: currentDate
    });
  }
  showDatePicker();

  function selectYear() {
    $('.chartInput').change(function () {
      $('#formChartInput').submit();
    });
  }
  selectYear();

  function showCoachSelect() {
    var statisticType = $('select[name="type"]').val();
    if (statisticType == 3) {
      $('select[name="shop"]').show();
    } else {
      $('select[name="shop"]').hide();
    }
  }
  showCoachSelect();

  function showProjectTypeSelect() {
    $('.dont_need_time').hide();
    $('.choose_static').show();
    var statisticType = $('select[name="type"]').val();
    if (statisticType == 5) {
      $('.dont_need_time').show();
      $('.choose_static').hide();
      $('select[name="project_type"]').show();
      $('select[name="project_name"]').show();
    } else {
      $('select[name="project_type"]').hide();
      $('select[name="project_name"]').hide();
    }
  }
  showProjectTypeSelect();

  function showProjects() {
    var projectType = $('select[name="project_type"]').val();
    var statisticType = $('select[name="type"]').val();
    $('select.project_name').hide();
    $('select.project_name').attr('name', '');
    if (projectType == 1 && statisticType == 5) {
      $('select.project_name').hide();
      $('select.project_name_running').show();
      $('select.project_name_running').attr('name', 'project_name');
    } else if(projectType == 2 && statisticType == 5) {
      $('select.project_name').hide();
      $('select.project_name_livestream').show();
      $('select.project_name_livestream').attr('name', 'project_name');
    } else if(projectType == 3 && statisticType == 5) {
      $('select.project_name').hide();
      $('select.project_name_other').show();
      $('select.project_name_other').attr('name', 'project_name');
    }
  }
  showProjects();

  function changeProjectType() {
    $('select.project_type').change(function () {
      showProjects();
    });
  }
  changeProjectType();

  function changeStatisticType() {
    $('select.type').change(function () {
      showCoachSelect();
      showProjectTypeSelect();
      $('select.project_name').hide();
    });
  }
  changeStatisticType();

});
