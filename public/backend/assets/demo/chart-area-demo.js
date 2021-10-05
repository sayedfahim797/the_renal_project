// <block:setup:1>
  const labels = _ydata;
  const data = {
    labels: labels,
    datasets: [{
      label: 'No of patients',
      backgroundColor: 'rgb(255, 99, 132)',
      borderColor: 'rgb(255, 99, 132)',
      data: _xdata,
    }]
  };
  // </block:setup>

  // <block:config:0>
  const config = {
    type: 'line',
    data: data,
    options: {}
  };
  // </block:config>

  module.exports = {
    actions: [],
    config: config,
  };