
const apicategory = new Vue({
  el: '#apicategory',
  data: {
    nombre: '',
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

            if (document.getElementById('editar')) {

              if (document.getElementById('nombretemp').innerHTML === this.nombre) {
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
        if (document.getElementById('editar')) {
            this.nombre = document.getElementById('nombretemp').innerHTML;
            this.deshabilitar_boton=0;

        }
    }
});