function trim(value) {
    var temp = value;
    var obj = /^(\s*)([\W\w]*)(\b\s*$)/;
    if (obj.test(temp)) { temp = temp.replace(obj, '$2');}
    var obj = /  /g;
    while (temp.match(obj)) { temp = temp.replace(obj, " ");}
    return temp;
}

//Funcion para calcular el largo en pixels del texto dado
function getTextWidth(texto)
{
    //Valor por default : 150 pixels
    var ancho = 150;

    if(trim(texto) == "")
    {
        return ancho;
    }

    //Creación de un span escondido que se podrá medir
    var span = document.createElement("span");
    span.style.visibility = "hidden";
    span.style.position = "absolute";

    //Se agrega el texto al span y el span a la página
    span.appendChild(document.createTextNode(texto));
    document.getElementsByTagName("body")[0].appendChild(span);

    //tamaño del texto
    ancho = span.offsetWidth;

    //Eliminación del span
    document.getElementsByTagName("body")[0].removeChild(span);
    span = null;

    return ancho;
}


//Funcion de modificacion del elemento seleccionado mediante doble-click
function modificar(obj)
{
    //Objeto que sirve para editar el valor en la pagina
    var input = null;

    input = document.createElement("input");


    //Asignar en la caja el valor de la casilla
    if (obj.innerText)
        input.value = obj.innerText;
    else
        input.value = obj.textContent;
    input.value = trim(input.value);

    //a la caja INPUT se la asigna un tamaño un poco mayor que el texto a modificar
    input.style.width  = getTextWidth(input.value) + 30 + "px";

    //Se remplaza el texto por el objeto INPUT
    obj.replaceChild(input, obj.firstChild);

    //Se selecciona el elemento y el texto a modificar
    input.focus();
    input.select();

    //Asignación de los 2 eventos que provocarán la escritura en la base de datos

    //Salida de la INPUT
    input.onblur = function salir()
    {
        salvarMod(obj, input.value);
        delete input;
    };

    //La tecla Enter
    input.onkeydown = function keyDown(event)
    {
        if(event.keyCode == 13)
        {
            salvarMod(obj, input.value);
            delete input;

        }
    };
}

function ajax_borrar(btn) {
    var xmlhttp;
    if(window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    } else {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    var a = btn.id;
    var myid = "hacer=borrarFila"+"&id="+a;

    xmlhttp.onreadystatechange = function () {
        if(xmlhttp.readyState === 4 && xmlhttp.status === 200) {
            var row = btn.parentNode.parentNode;
            row.parentNode.removeChild(row);
            var mensaje = xmlhttp.responseText;
        }
    }

    xmlhttp.open("POST", "servidor.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send(myid);
}

// noinspection JSAnnotator
function ajax_post(obj, valor){

    var id = obj.id.substring(1 + obj.id.indexOf("-"), obj.id.length);
    var campo = obj.id.substring(0, obj.id.indexOf("-"));

    var xmlhttp;

    if(window.XMLHttpRequest)
    {
        xmlhttp = new XMLHttpRequest();
    } else {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    var datos = "hacer=actualizar"+"&id="+id+"&campo="+campo+"&valor="+valor;

    xmlhttp.onreadystatechange = function (){
        if(xmlhttp.readyState === 4 && xmlhttp.status === 200)
        {
            var mensaje = xmlhttp.responseText;
        }
    }

    xmlhttp.open("POST", "servidor.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send(datos);
}

function ajax_agregar() {

    var xmlhttp;

    var tabla = document.getElementById("tabla-maestros");
    var rowCount = tabla.rows.length;
    var row = tabla.insertRow(rowCount);

    var adder = "agrega";
    var id = rowCount;
    var sender = "hacer="+adder+"&id="+id;

    var cell1 = row.insertCell(0);
    cell1.id = "nombre-"+rowCount;
    cell1.className = "celda";
    cell1.setAttribute("ondblclick", "modificar(this)");
    cell1.innerHTML = "nomina";

    var cell2 = row.insertCell(1);
    cell2.id = "apellido-"+rowCount;
    cell2.className = "celda";
    cell2.setAttribute("ondblclick", "modificar(this)");
    cell2.innerHTML = "nombre";

    var cell3 = row.insertCell(2);
    cell3.id = "direccion-"+rowCount;
    cell3.className = "celda";
    cell3.setAttribute("ondblclick", "modificar(this)");
    cell3.innerHTML = "telefono";

    var cell4 = row.insertCell(3);
    cell4.id = "codigo-"+rowCount;
    cell4.className = "celda";
    cell4.setAttribute("ondblclick", "modificar(this)");
    cell4.innerHTML = "0";

    var cell5 = row.insertCell(4);
    cell5.id = "ciudad-"+rowCount;
    cell5.className = "celda";
    cell5.setAttribute("ondblclick", "modificar(this)");
    cell5.innerHTML = "email";

    var cell8 = row.insertCell(5);
    cell8.className = "celda";
    var borrar = document.createElement("button");
    borrar.id = ""+rowCount;
    borrar.setAttribute("onclick", "ajax_borrar(this)");
    borrar.innerHTML = "Borrar";
    cell8.appendChild(borrar);

    if(window.XMLHttpRequest)
    {
        xmlhttp = new XMLHttpRequest();
    } else {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp.onreadystatechange = function (){
        if(xmlhttp.readyState === 4 && xmlhttp.status === 200)
        {
            var mensaje = xmlhttp.responseText;
        }
    }

    xmlhttp.open("POST", "servidor.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send(sender);
}


//Salvando las modificaciones
function salvarMod(obj, valor)
{
    obj.replaceChild(document.createTextNode(valor), obj.firstChild);
    ajax_post(obj, valor);
}