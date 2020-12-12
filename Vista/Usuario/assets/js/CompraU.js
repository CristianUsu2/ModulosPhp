let contalerta=0;
let lista=document.getElementById("secP");
 let agregarC=()=>{
     contalerta++;
    let id=document.getElementById("idProducto").value;
    let nombre=document.getElementById("nombreP").value;
    let foto=document.getElementById("fotoP").value;
    let precio=document.getElementById("precioP").value;

    const objeto={
     id,
     nombre,
     foto,
     precio
    };

    if(localStorage.getItem("productos")== null){
     let productoc=[];
     productoc.push(objeto);
     localStorage.setItem("productos", JSON.stringify(productoc));
    }else{
      let añadidos=JSON.parse(localStorage.getItem("productos"));
      añadidos.push(objeto);  
      localStorage.setItem("productos", JSON.stringify(añadidos));
    }
    /*let icono=document.getElementById("iconC");
    icono.className+=".header-bottom .header-right .shopping-card::before";
    let numero=document.getElementById("mostrarA");
    numero.value=contalerta;*/
  }

let añadidos=JSON.parse(localStorage.getItem("productos"));
añadidos.forEach((a)=>{
    lista.innerHTML+=`
    <tr id="productos">
    <td>
      <div class="media">
        <div class="d-flex">
          <img src="../../../../${a.foto}" alt="" />
        </div>
        <div class="media-body">
          <p>${a.nombre}</p>
        </div>
      </div>
    </td>
    <td>
      <h5></h5>
    </td>
    <td>
      <div class="product_count">       
      
        <input class="input-number" type="text" value="1" min="0" max="10">
       
      </div>
    </td>
    <td>
      
    </td>
    </tr>
    
    `;


})
    
              