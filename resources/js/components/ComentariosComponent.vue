<template>
  <div class="row">
    <div class="col-12 mt-2">
      <div class="col-12 text-center">
        <a href="#" class="btn btn-outline-primary" v-on:click="load">Ver comentarios</a>
      </div>

      <div class="col-12 mt-2">
        <div class="card" v-for="comentario in comentarios">
          <div class="card-header">
            <strong>Escrito por:</strong>
            @{{ comentario.user.username }}
          </div>
          <div class="card-body">
            <p class="card-text">{{ comentario.message }}</p>
          </div>
          <div class="card-footer text-muted text-right">Escrito el: {{ comentario.created_at }}</div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ["noticia_id"],
  data() {
    return {
      comentarios: []
    };
  },
  methods: {
    load() {
      axios
        .get("/api/noticias/" + this.noticia_id + "/comentarios")
        .then(comentario => {
          this.comentarios = comentario.data;
        });
    }
  }
};
</script>
