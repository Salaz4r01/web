document.addEventListener("DOMContentLoaded", function () {
  document
    .getElementById("settingsButton")
    .addEventListener("click", function () {
      openSettings();
    });

  document.getElementById("closeButton").addEventListener("click", function () {
    closeSettings();
  });

  document
    .getElementById("savePasswordButton")
    .addEventListener("click", function () {
      // Lógica para cambiar la contraseña
      alert("Contraseña cambiada correctamente");
      closeSettings();
    });

  document
    .getElementById("saveThemeButton")
    .addEventListener("click", function () {
      var theme = document.getElementById("theme").value;
      // Lógica para cambiar el tema
      alert("Tema cambiado a " + theme);
      closeSettings();
    });
});

function openSettings() {
  document.getElementById("settingsPopup").style.display = "block";
}

function closeSettings() {
  document.getElementById("settingsPopup").style.display = "none";
}

const getOptionChart2 = () => {
  return {
    color: ["#3246a8", "#00cc66", "#ff5050", "#c6de76", "#D96A8D"],
    tooltip: {
      show: true,
      trigger: "axis",
    },
    legend: {
      data: [
        "Registros insertados",
        "Registros actualizados",
        "Registros eliminados",
        "Registros consultados",
      ],
    },
    grid: {
      left: "3%",
      right: "4%",
      bottom: "3%",
      containLabel: true,
    },
    toolbox: {
      feature: {
        saveAsImage: {},
      },
    },
    xAxis: [
      {
        type: "category",
        boundaryGap: false,
        data: [
          "Lunes",
          "Martes",
          "Miercoles",
          "Jueves",
          "Viernes",
          "Sabado",
          "Domingo",
        ],
        axisLine: { show: false },
        axisTick: { show: false },
        axisPointer: { type: "shadow" },
      },
    ],
    yAxis: [
      {
        type: "value",
      },
    ],
    series: [
      {
        name: "Registros insertados",
        type: "line",
        stack: "Total",
        data: [120, 132, 101, 134, 90, 230, 210],
      },
      {
        name: "Registros actualizados",
        type: "line",
        stack: "Total",
        data: [220, 182, 191, 234, 290, 330, 310],
      },
      {
        name: "Registros eliminados",
        type: "line",
        stack: "Total",
        data: [150, 232, 201, 154, 190, 330, 410],
      },
      {
        name: "Registros consultados",
        type: "line",
        stack: "Total",
        data: [320, 332, 301, 334, 390, 330, 320],
      },
    ],
  };
};

const getOptionChart4 = () => {
  return {
    tooltip: {
      trigger: "item",
    },
    legend: {
      top: "5%",
      left: "center",
    },
    series: [
      {
        name: "Obtenido de la BD final",
        type: "pie",
        radius: ["40%", "70%"],
        avoidLabelOverlap: false,
        itemStyle: {
          borderRadius: 10,
          borderColor: "#fff",
          borderWidth: 2,
        },
        label: {
          show: false,
          position: "center",
        },
        emphasis: {
          label: {
            show: true,
            fontSize: "40",
            fontWeight: "bold",
          },
        },
        labelLine: {
          show: false,
        },
        data: [
          { value: 100, name: "Registros insertados" },
          { value: 36, name: "Registros actualizados" },
          { value: 20, name: "Registros eliminados" },
          { value: 100, name: "Registros consultados" },
        ],
      },
    ],
  };
};

const initCharts = () => {
  const chart2 = echarts.init(document.getElementById("chart2"));
  const chart4 = echarts.init(document.getElementById("chart4"));

  chart2.setOption(getOptionChart2());

  chart4.setOption(getOptionChart4());

  chart2.resize();

  chart4.resize();
};

window.addEventListener("load", () => {
  initCharts();
});
