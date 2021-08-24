
var TuFecha = new Date();
var numero=30;
  //dias a sumar
  
  //nueva fecha sumada
  TuFecha.setDate(TuFecha.getDate() + 30);


var dateControl = document.querySelector('input[type="date"]');

dateControl.value = TuFecha.getFullYear() + '-' +
    (TuFecha.getMonth() + 1) + '-' + validar();

function validar()
{
    
    if(TuFecha.getDate()>=1 && TuFecha.getDate()<=9){
        return "0"+TuFecha.getDate();
    }
    return TuFecha.getDate();

}