
const apiproduct = new Vue({
  el: '#apiproduct',
  data: {
    nombre: '',
    slug: '',
    div_mensajeslug: 'Slug Existe',
    div_clase_slug: 'badge badge-danger',
    div_aparecer: false,
    deshabilitar_boton: 1,

    //Variables de Precio
    precioanterior:0,
    precioactual:0,
    descuento:0,
    porcentajededescuento:0,
    descuento_mensaje:'0',
  },
  computed: {
    generarSLug: function() {
      var char = {
        "á": "a",
        "é": "e",
        "í": "i",
        "ó": "o",
        "ú": "u",
        "Á": "A",
        "É": "E",
        "Í": "I",
        "Ó": "O",
        "Ú": "U",
        "ñ": "n",
        "Ñ": "n",
        " ": "-",
        "_": "-"
      };
      var expr = /[áéíóúÁÉÍÓÚÑñ_ ]/g;
      this.slug = this.nombre.trim().replace(expr, function (e) {
        return char[e];
      }).toLowerCase();
      return this.slug; //return this.nombre.trim().replace(/ /,'-').toLowerCase()//trim -para eliminar espacios en blanco adelante y al  final de la frase, replace= reemplazar espacios en blancos por un -
    },
    generarDescuento : function(){

      if (this.porcentajededescuento > 100) {
        
        Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: 'El % de Descuento no puede ser mayor a 100!',
        });

        this.porcentajededescuento = 100;
        this.descuento = (this.precioanterior * this.porcentajededescuento)/100;
        this.precioactual = this.precioanterior - this.descuento;
        this.descuento_mensaje = 'Este producto tiene un 100% de descuento, por lo tanto es gratuito';

        return this.descuento_mensaje;

      }else
      if (this.porcentajededescuento < 0) {

        Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: 'El % de Descuento no puede ser menor a 0!',
        });

        this.porcentajededescuento = 0;
        this.descuento = (this.precioanterior * this.porcentajededescuento)/100;
        this.precioactual = this.precioanterior - this.descuento;
        this.descuento_mensaje = 'Este producto no tiene descuento';

        return this.descuento_mensaje;

      }else
      if (this.porcentajededescuento > 0) {

        this.descuento = (this.precioanterior * this.porcentajededescuento)/100;
        this.precioactual = this.precioanterior - this.descuento;
        if (this.porcentajededescuento == 100) {
          this.descuento_mensaje = 'Este producto tiene un 100% de descuento, por lo tanto es gratuito';
        }else{
          this.descuento_mensaje = 'Hay un descuento de $US ' + this.descuento;
        }

        return this.descuento_mensaje;
      }else{
        this.descuento = '';
        this.precioactual = this.precioanterior;
        
        this.descuento_mensaje = '';
        

        return this.descuento_mensaje;
      }

      
    }
  },
  methods: {
    eliminarimagen(imagen) {
      //console.log(imagen);

      Swal.fire({
        title: 'Desea eliminar la imagen '+ imagen.id+ '?',
        text: "Esta completamente segur@!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, Eliminar!',
        cancelButtonText: 'Cancelar'
      }).then((result) => {

        if (result.value) {

          let url = '/api/eliminarimagen/'+imagen.id;
          axios.delete(url).then(response=> {
            console.log(response.data);
        });

          //Eliminar el elemento
          var elemento = document.getElementById('idimagen-'+imagen.id);
          //console.log(elemento);
          //Elimina la Imagen desde el elemento padre de Modo Visual
          elemento.parentNode.removeChild(elemento);

          Swal.fire(
            'Eliminado!',
            'El archivo ha sido Eliminado.',
            'success'
          )
        }
      })

    },
    //Funcion SLUG
    getProduct: function() {
      if(this.slug){
        let url = '/api/product/' + this.slug;
        axios.get(url).then(response=> {
        this.div_mensajeslug = response.data;

            if (this.div_mensajeslug === "Slug Disponible") {
              this.div_clase_slug = 'badge badge-success';
              this.deshabilitar_boton = 0;
            } else {
              this.div_clase_slug = 'badge badge-danger';
              this.deshabilitar_boton = 1;
            }

            if (data.datos.nombre) {

                if (data.datos.nombre === this.nombre) {
                    this.deshabilitar_boton = 0;
                    this.div_mensajeslug= '';
                    this.div_clase_slug = '';
                     this.div_aparecer = false;
                }
            }
        
        });

      }else{
        this.div_mensajeslug = "Debe indicar una categoría"
        this.div_clase_slug = 'badge badge-danger';
        this.deshabilitar_boton = 1;
      }

      this.div_aparecer = true;
    }
    
  },
  mounted(){
        if (data.editar == 'SI') {
            this.nombre = data.datos.nombre;
            this.precioanterior = data.datos.precioanterior;
            this.porcentajededescuento = data.datos.porcentajededescuento;
            this.deshabilitar_boton=0;

        }
        //console.log(data);
    }
});
/*const apicategory = new Vue({
    el: '#apicategory',
    data: {
    nombre: ' ',
    slug: '',
    div_mensajeslug: 'Slug Existe',
    div_clase_slug: 'badge badge-danger',
    div_aparecer: false,
    deshabilitar_boton: 1
  },
  computed: {
    generarSLug: function() {
      var char = {
        "á": "a",
        "é": "e",
        "í": "i",
        "ó": "o",
        "ú": "u",
        "Á": "A",
        "É": "E",
        "Í": "I",
        "Ó": "O",
        "Ú": "U",
        "ñ": "n",
        "Ñ": "n",
        " ": "-",
        "_": "-"
      };
      var expr = /[áéíóúÁÉÍÓÚÑñ_ ]/g;
      this.slug = this.nombre.trim().replace(expr, function (e) {
        return char[e];
      }).toLowerCase();
      return this.slug; //return this.nombre.trim().replace(/ /,'-').toLowerCase()//trim -para eliminar espacios en blanco adelante y al  final de la frase, replace= reemplazar espacios en blancos por un -
    }
  },
  methods: {
    getCategory: function() {
      if(this.slug){
        let url = '/api/category/' + this.slug;
        axios.get(url).then(response=> {
        this.div_mensajeslug = response.data;

        if (this.div_mensajeslug === "Slug Disponible") {
          this.div_clase_slug = 'badge badge-success';
          this.deshabilitar_boton = 0;
        } else {
          this.div_clase_slug = 'badge badge-danger';
          this.deshabilitar_boton = 1;
        }

        
        });

      }else{
        this.div_mensajeslug = "Debe indicar una categoría"
        this.div_clase_slug = 'badge badge-danger';
        this.deshabilitar_boton = 1;
      }

      this.div_aparecer = true;
    }
  },
  /*unted(){
    if(document.getElementById('editar').innerHTML){
      this.nombre=document.getElementById('nombretemp').innerHTML;  
      this.deshabilitar_boton = 0;
   }
  } 
});*/