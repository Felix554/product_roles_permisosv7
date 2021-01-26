
const api_search_autocomplete = new Vue({
  el: '#api_search_autocomplete',
  data: {
    palabra_a_buscar: '',
    resultados: [],
    
  },
  
  methods: {
    autoComplete() {
      
      this.resultados = [];

      if(this.palabra_a_buscar.length > 2){

        axios.get('/api/autocomplete',
              {params:{ palabraabuscar:this.palabra_a_buscar}}

          ).then(response=> {
            this.resultados = response.data;
            console.log(response.data);

        });

      }        

      
    },
    /*select(resultado) {
            this.palabra_a_buscar=resultado.nombre
            this.$nextTick( ()=>{//Aplaza el callback para ser ejecutado después del siguiente ciclo de actualización del DOM
              this.SubmitForm();
            });
    },*/
    async select(resultado) {
            this.palabra_a_buscar=resultado.nombre

            await this.$nextTick();//Aplaza el callback para ser ejecutado después del siguiente ciclo de actualización del DOM
            this.SubmitForm();
            
    }, 
    SubmitForm() {
      console.log('ejecutando elsubmit');

      this.$refs.SubmitButtonSearch.click();
            
    }, 
  },
  mounted(){
       
        console.log('Datos cargados correctamente');
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