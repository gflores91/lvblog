<template>
  <div class="dropdown-menu dropdown-menu-right">
    <a
      class="dropdown-item"
      :href="'/'+ notificacion.data.follower.username"
      v-for="notificacion in notificaciones"
      :key="notificacion.id"
    >El usuario @{{ notificacion.data.follower.username }} te ha seguido</a>
  </div>
</template>

<script>
export default {
    props: [
        'user'
    ],
  data() {
    return {
      notificaciones: []
    };
  },
  mounted() {
    axios.get("/api/notificaciones").then(respuesta => {
      this.notificaciones = respuesta.data;

      Echo.private(`lvblog.Models.User.${this.user}`).notification(notificacion => {
        this.notificaciones.unshift(notificacion);
      });
    });
  }
};
</script>
