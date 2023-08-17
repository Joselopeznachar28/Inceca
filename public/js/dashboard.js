let labels = [];
let data = [];

for(let i in arrayData){
  labels.push(arrayData[i].name);
  data.push(arrayData[i].cant);
}

let myChart = {
    // Tipo de Grafica
    type:"polarArea", 
    // Le pasamos la data
    data:{
      'labels': labels,
      datasets:[{
        label: 'Registros',
        data,
        backgroundColor: [
          'rgba(255, 99, 132, 0.2)',
          'rgba(255, 159, 64, 0.2)',
          'rgba(255, 205, 86, 0.2)',
          'rgba(75, 192, 192, 0.2)',
          'rgba(54, 162, 235, 0.2)',
          'rgba(153, 102, 255, 0.2)',
          'rgba(201, 203, 207, 0.2)',
        ],
        borderColor: [
          'rgba(255, 99, 132, 0.2)',
          'rgba(255, 159, 64, 0.2)',
          'rgba(255, 205, 86, 0.2)',
          'rgba(75, 192, 192, 0.2)',
          'rgba(54, 162, 235, 0.2)',
          'rgba(153, 102, 255, 0.2)',
          'rgba(201, 203, 207, 0.2)',
        ],
        borderWidth: 1
        
      }],
      // Añadimos las etiquetas correspondientes a la data
    },
    // Le pasamos como opcion adicional que sea responsivo
    options:{
      responsive:true,
    }
}

// Seleccionamos el Canvas
var myGrafic = document.getElementById('myGrafic');
// Le pasamos el grafico y la data para representarlo
window.pie = new Chart(myGrafic,myChart);